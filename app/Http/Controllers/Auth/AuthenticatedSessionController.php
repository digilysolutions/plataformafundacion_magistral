<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Membership;
use App\Models\MembershipHistory;
use App\Models\MembershipStatus;
use App\Models\RegisterStudyCenter;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        Log::info("Entre al autenticar");
        if (!Auth::check()) {
            return view('auth.login');
        }
        $roleid = Auth::user()->roleid;

        // Redirigir al dashboard correspondiente
        switch ($roleid) {
            case 1:
                Log::info("Cao 1");
                return redirect()->route('study-center.dashboard');
            case 2:
                Log::info("Cao 2");
                return redirect()->route('student.dashboard');
            case 3:
                Log::info("Cao 3");
                return redirect()->route('tutor.dashboard');
            case 4:
                Log::info("Cao 4");
                return redirect()->route('validator.dashboard');
            case 5:
                Log::info("Cao 5");
                return redirect()->route('admin.dashboard');
                Log::info("Cao 6");
            case 6:
                return redirect()->route('user.dashboard');
            default:
                return redirect('/');
        }
    }

    /**
     * Handle an incoming authentication request.
     */
    /* public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }*/

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'codigo_seguimiento' => 'required|string', // Agrega la validación del código
        ]);

       
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
           
            // Autenticación exitosa: el usuario existe y las credenciales son correctas
            // **********************************************************************
            // Obtener el rol del usuario
            $user = Auth::user();
            if (!$user->activated) {
                Auth::logout(); // Desloguear al usuario
                return redirect('/login')->with('error', 'Tu cuenta no está activada.');
            }

            $roleid = $user->roleid;
            if ($roleid != 1) {

                if (!$user->person->where('id', $request->codigo_seguimiento)->first()) {
                    Auth::logout();
                    return redirect('/login')->with('error', 'Este usuario no tiene los permisos necesarios.Error de código');
                }
            }
            if ($user->first_login) {
                // Establecer el mensaje de sesión flash
                session()->flash('first_login', true);

                // Actualizar el campo para indicar que ya no es su primer inicio
                $user->first_login = false;
                $user->save();
            }
            // Redirigir al dashboard correspondiente
            switch ($roleid) {
                case 1:;
                    if (
                        !$user->person ||
                        !$user->person->studyCenter
                    ) {
                        Auth::logout();
                        return redirect('/login')->with('error', 'Este usuario no está asignado a un centro de estudio o no tiene los permisos necesarios.');
                    }
                    $studyCenter = $user->person->studyCenter->where('id', $request->codigo_seguimiento)->first();

                    if (!$studyCenter) {
                        Auth::logout();
                        return redirect('/login')->with('error', 'Este usuario no tiene los permisos necesarios.Error de código');
                    }

                    $segisterStudyCenter  =   RegisterStudyCenter::where('mail', $studyCenter->mail)->first();
                    if ($segisterStudyCenter && $segisterStudyCenter?->state != "Completada") {
                        $segisterStudyCenter->state = "Completada";
                        $segisterStudyCenter->update();
                    }
                   // $user = auth()->user();

                    $membership_id = $user->person->studyCenter->membership_id;

                    $this->change_membership_status($user, $membership_id);
                    return redirect()->route('study-center.dashboard');
                case 2:

                    return redirect()->route('student.dashboard');
                case 3:
                    return redirect()->route('tutor.dashboard');
                case 4:
                    // Comprobar si la persona asociada al usuario tiene un validador activado
                    if (!$user->person || !$user->person->validator || !$user->person->validator->activated) {
                        Auth::logout(); // Desloguear al usuario
                        return redirect('/login')->with('error', 'Tu cuenta no está activada.');
                    }
                    $user->person->validator->activated = true;
                    $user->person->validator->save();
                    return redirect()->route('validator.dashboard');
                case 5:
                    return redirect()->route('admin.dashboard');
                case 6:
                    $user = auth()->user();
                    $membership_id = $user->membership_id;
                    $this->change_membership_status($user, $membership_id);
                    return redirect()->route('user.dashboard');
                default:
                    return redirect('/');
            }
        } else {
            // **********************************************************************
            // La autenticación falló
            // Verifica si el usuario existe con el email y código de seguimiento
            $userExists = User::where('email', $request->email)
                ->exists();
            // **********************************************************************

            if ($userExists) {
                // El usuario existe con el email y código de seguimiento, pero la contraseña es incorrecta
                return back()->withErrors([
                    'password' => 'Contraseña incorrecta.',
                ]);
            } else {
                // El usuario no existe con las credenciales proporcionadas (email y/o código incorrectos)
                return back()->withErrors([
                    'email' => 'Las credenciales (email y/o código de seguimiento) proporcionadas no coinciden con nuestros registros.',
                ]);
            }
        }
    }

    private function change_membership_status($user, $membership_id)
    {
        $membership = Membership::findOrFail($membership_id);
        $now = now();
        $startDate = \Carbon\Carbon::parse($membership->start_date);
        $endDate = \Carbon\Carbon::parse($membership->end_date);
        if ($membership->activated == 1 && $startDate > $now && $endDate > $now) {
            $mebershipStatus = MembershipStatus::where('name', 'Pendiente')->first();
            $estadoActualId = $mebershipStatus->id;
        } elseif ($membership->activated == 1 && $startDate <= $now && $endDate >= $now) {
            $mebershipStatus = MembershipStatus::where('name', 'Activo')->first();
            $estadoActualId = $mebershipStatus->id;
        } elseif ($membership->activated == 1 && $endDate < $now && $startDate->diffInDays($endDate) <= 7) {
            $$mebershipStatus = MembershipStatus::where('name', 'Finalizada Reciente')->first();
            $estadoActualId = $mebershipStatus->id;
        } elseif ($membership->activated == 1 && $endDate < $now && $startDate->diffInDays($endDate) > 7) {
            $mebershipStatus = MembershipStatus::where('name', 'Finalizada Antiguamente')->first();

            $estadoActualId = $mebershipStatus->id;
        }
        // Obtener el último historial de la membresía
        $ultimoHistorial = MembershipHistory::where('membership_id', $membership->id)
            ->where('user_id', $user->id)
            ->latest('created_at')
            ->first();


        // Determinar si se necesita crear un nuevo registro
        $debeCrearRegistro = false;

        if (!$ultimoHistorial) {
            // Si no hay historial, se crea el primero
            $debeCrearRegistro = true;

        } else {
            // Comparar el estado actual con el último estado registrado
            if ($ultimoHistorial->membership_statuses_id != $estadoActualId) {
                $debeCrearRegistro = true;
            }
        }
      /*  if ($ultimoHistorial->membership_statuses_id == $estadoActualId) {
            return false;
        }*/
        // Crear el nuevo registro si es necesario
        if ($debeCrearRegistro) {
            MembershipHistory::create([
                'id' => Str::uuid(), // No necesitas esto si usas HasUuids en el modelo MembershipHistory
                'user_id' => $user->id, // Asumiendo que tienes autenticación
                'membership_id' => $membership->id,
                'start_date' => $now->toDateString(), // Usar la fecha actual
                'membership_statuses_id' => $estadoActualId,
            ]);
        }
        return true;
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

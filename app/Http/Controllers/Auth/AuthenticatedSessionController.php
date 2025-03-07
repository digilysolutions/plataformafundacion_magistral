<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        if (!Auth::check())
            return view('auth.login');
        else
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
        $roleid = $user->roleid;

        // Redirigir al dashboard correspondiente
        switch ($roleid) {
            case 1:
                if (
                    !$user->person ||
                    !$user->person->studyCenter
                ) {
                    Auth::logout();
                    return redirect('/login')->with('error', 'Este usuario no está asignado a un centro de estudio o no tiene los permisos necesarios.');
                }
                if(!$user->person->studyCenter->where('id',$request->codigo_seguimiento)->first())
                {
                    Auth::logout();
                    return redirect('/login')->with('error', 'Este usuario no tiene los permisos necesarios.Error de código');
                }
                return redirect()->route('study-center.dashboard');
            case 2:
                return redirect()->route('student.dashboard');
            case 3:
                return redirect()->route('tutor.dashboard');
            case 4:
                return redirect()->route('validator.dashboard');
            case 5:

                return redirect()->route('admin.dashboard');
            case 6:
                if(!$user->person->student->where('id',$request->codigo_seguimiento)->first())
                {
                    Auth::logout();
                    return redirect('/login')->with('error', 'Este usuario no tiene los permisos necesarios.Error de código');
                }
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

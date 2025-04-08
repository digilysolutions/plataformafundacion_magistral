<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Mail\VerificationEmail;
use App\Models\Person;
use App\Models\Student;
use App\Validators\PasswordValidator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validación
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            // Aquí estamos usando 'unique:users,email' para verificar que el correo sea único en la tabla 'users'
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'email.unique' => 'El correo electrónico ya está en uso. Por favor, elija otro.', // Mensaje personalizado
        ]);


        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // Si la validación falla, redirigir de vuelta con errores
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'activated' => true,
                'password' => Hash::make($request->password),
                'verification_token' => Str::random(40),
                'verification_code' => random_int(100000, 999999),
                'membership_id' => 'BA0001',
                'role' => 'Usuario',
                'roleid' => 6,

            ]);

            $person = Person::create([
                'name' => $request->name,
                'email' => $request->email,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'activated' => true,
                'user_id' => $user->id
            ]);

            $student = Student::create([
                'name' => $request->name,
                'activated' => true,
                'course' => $request->course,
                'people_id' => $person->id,
                'membership_id' => 'BA0001',
            ]);

            event(new Registered($user));
            Mail::to($user->email)->send(new VerificationEmail($user));
            DB::commit();
            return redirect()->route('thankYou');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Ocurrió un error al procesar la solicitud: ' . $e->getMessage()]); // Muestra el mensaje de error que ocurrió
        }
    }

    public function verify($token)
    {
        // Verifica que el token existe
        $user = User::where('verification_token', $token)->first();

        if (!$user) {
            return redirect('/login')->with('error', 'Token de verificación inválido o expirado.');
        }

        return view('auth.verify', compact('user'));
    }

    public function verifyEmail(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'verification_code' => 'required|integer',
            'verification_token' => 'required|string',
        ]);

        $user = User::where('email', $request->email)
            ->where('verification_token', $request->verification_token)
            ->first();

        if (!$user || $user->verification_code !== (int)$request->verification_code) {
            return response()->json(['error' => 'Código de verificación inválido'], 400);
        }

        $user->is_verified = true;
        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->verification_token = null;
        $user->save();
        // Mail::to($user->email)->send(new VerificationEmail($user));

        if ($user->roleid == 4) {
            // Asegúrate de que la relación está definida correctamente en tu modelo
            $validator = $user->person->validator; // Obtiene el validador asociado a la persona

            if ($validator) { // Asegúrate de que el validador exista
                $validator->activated = true; // Cambia el estado de activated a true
                $validator->save(); // Guarda los cambios en la base de datos
            } else {
                // Manejo de error si el validador no existe
                return redirect()->route('/login') // Cambia 'some.route' al adecuado
                    ->with('error', 'El validador no se encontró.');
            }
            Auth::login($user);
            return redirect()->route('validator.dashboard') // Redirige al Dashboard del validador
                ->with('user', $user); // Opcional, si necesitas pasar el usuario
        }
        if ($user->roleid == 3) {
            $tutor = $user->person->tutor;
            if ($tutor) { // Asegúrate de que el validador exista
                $tutor->activated = true; // Cambia el estado de activated a true
                $tutor->save(); // Guarda los cambios en la base de datos
            } else {
                // Manejo de error si el validador no existe
                return redirect()->route('/login') // Cambia 'some.route' al adecuado
                    ->with('error', 'El tutor no se encontró.');
            }
            Auth::login($user);
            return redirect()->route('tutor.dashboard') // Redirige al Dashboard del validador
                ->with('user', $user); // Opcional, si necesitas pasar el usuario
        }

        if ($user->roleid == 6)
            Auth::login($user);

        return redirect()->route('user.dashboard')
            ->with('user', $user);
        // return response()->json(['message' => '¡Correo verificado exitosamente! Puedes iniciar sesión.']);
    }
    public function thankYou()
    {
        return view('user.thankyou'); // Aquí llamas a la vista de agradecimiento
    }
}

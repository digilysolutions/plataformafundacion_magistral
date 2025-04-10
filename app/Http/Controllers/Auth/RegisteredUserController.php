<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendEmailToAdminStudyCenter;
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
use App\Models\RegisterStudyCenter;
use App\Models\Student;
use App\Models\StudyCenter;
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
        // Validación de la solicitud
        $request->validate([
            'email' => 'required|string|email',
            'verification_code' => 'required|integer',
            'verification_token' => 'required|string',
        ]);

        // Buscar usuario por correo y token de verificación
        $user = User::where('email', $request->email)
            ->where('verification_token', $request->verification_token)
            ->first();

        if (!$user || $user->verification_code !== (int)$request->verification_code) {
            return response()->json(['error' => 'Código de verificación inválido'], 400);
        }

        // Marca el usuario como verificado
        $this->markUserAsVerified($user);

        // Manejo de roles
        switch ($user->roleid) {
            case 4:
                return $this->activateValidator($user);
            case 3:
                return $this->activateTutor($user);
            case 1:
                return $this->handleStudyCenterRegistration($user);
            case 6:
                Auth::login($user);
                return redirect()->route('user.dashboard')->with('user', $user);
            default:
                return redirect('/login')->with('error', 'Rol no reconocido.');
        }
    }

    private function markUserAsVerified(User $user)
    {
        $user->is_verified = true;
        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->verification_token = null;
        $user->save();
    }

    private function activateValidator(User $user)
    {
        // Asegúrate de que la relación está definida correctamente
        $validator = $user->person->validator;

        if (!$validator) {
            return redirect('/login')->with('error', 'El validador no se encontró.');
        }

        $validator->activated = true;
        $validator->save();

        Auth::login($user);
        return redirect()->route('validator.dashboard')->with('user', $user);
    }

    private function activateTutor(User $user)
    {
        $tutor = $user->person->tutor;

        if (!$tutor) {
            return redirect('/login')->with('error', 'El tutor no se encontró.');
        }
        $tutor->activated = true;
        $tutor->save();

        Auth::login($user);
        return redirect()->route('tutor.dashboard')->with('user', $user);
    }

    private function handleStudyCenterRegistration(User $user)
    {
        $studyCenter = RegisterStudyCenter::where('mail', $user->email)->first();

        if (!$studyCenter) {
            return redirect('/login')->with('error', 'La solicitud del centro de estudio no se encontró.');
        }

        $studyCenter->state = 'Pendiente';
        $studyCenter->save();

        Mail::to('registro@plataforma.fundacionmagistral.org')->send(new SendEmailToAdminStudyCenter($studyCenter));
        return redirect()->route('register-study-center.okVerificationStudyCenter');
    }
    public function thankYou()
    {
        return view('user.thankyou'); // Aquí llamas a la vista de agradecimiento
    }
}

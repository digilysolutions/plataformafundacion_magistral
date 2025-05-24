<?php

namespace App\Http\Controllers;

use App\Http\Requests\TutorValidatorRegisterRequest;
use App\Models\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ValidatorRequest;
use App\Mail\SendEmailValidatorFundacion;
use App\Mail\VerificationEmail;
use App\Mail\VerificationEmailRegisterValidator;
use App\Mail\VerificationEmailValidator;
use App\Models\NotificationsQuestion;
use App\Models\Person;
use App\Models\Question;
use App\Models\Specialty;
use App\Models\TutorValidatorRegister;
use App\Models\User;
use App\Validators\PasswordValidator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rules;

use Illuminate\Support\Facades\Validator as ValidatorFacades;

class ValidatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Obtener todos los validadores
        $validators = Validator::all();
        return view('validator.index', compact('validators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $validator = new Validator();
        $specialties = Specialty::allActivated();
        return view('validator.create', compact('validator', 'specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidatorRequest $request): RedirectResponse
    {
        // Validación
        $validatorFacades = ValidatorFacades::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            // Aquí estamos usando 'unique:users,email' para verificar que el correo sea único en la tabla 'users'
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required',  Rules\Password::defaults()]
        ], [
            'email.unique' => 'El correo electrónico ya está en uso. Por favor, elija otro.', // Mensaje personalizado
        ]);


        if ($validatorFacades->fails()) {
            return back()->withErrors($validatorFacades)->withInput();
        }
        $data['username'] = !empty($request->username) ? $request->username : $request->name;
        $data['password'] = $request->password;
        $validatorPass = PasswordValidator::validate($data);
        if ($validatorPass->fails()) {
            return back()->withErrors($validatorPass)->withInput();
        }
        DB::beginTransaction();

        try {
            // Generar una contraseña aleatoria

            $user = User::create([
                'name' => $data['username'],
                'email' => $request->email,
                'activated' => true,
                'password' =>   $data['password'],
                'verification_token' => Str::random(40),
                'verification_code' => random_int(100000, 999999),
                'role' => 'Validador',
                'first_login' => true,
                'roleid' => 4,

            ]);

            $person = Person::create([
                'name' => $request->name,
                'email' => $request->email,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'activated' => true,
                'user_id' => $user->id
            ]);
            //Crear Validador
            $validator =  Validator::create([
                'name' => $request->name,
                'activated' => false,
                'people_id' => $person->id,
                'specialty_id' => $request->specialty_id
            ]);


            event(new Registered($validator));
            Mail::to($user->email)->send(new VerificationEmailValidator($user, $request->password));
            DB::commit();
            return Redirect::route('validators.index')
                ->with('success', 'Validador creado satisfactoriamente. Esperando su confirmación de correo');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Ocurrió un error al procesar la solicitud']); // Muestra el mensaje de error que ocurrió
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $validator = Validator::find($id);

        return view('validator.show', compact('validator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $validator = Validator::find($id);

        $specialties = Specialty::allActivated();
        return view('validator.edit', compact('validator', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidatorRequest $request, Validator $validator): RedirectResponse
    {
        // Validación
        $validatorFacades = ValidatorFacades::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            // Aquí estamos usando 'unique:users,email' para verificar que el correo sea único en la tabla 'users'
            'password' => ['required',  Rules\Password::defaults()],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                // Aquí se agrega la excepción del usuario actual
                'unique:users,email,' . $validator->person->user_id,
            ],

        ], [
            'email.unique' => 'El correo electrónico ya está en uso. Por favor, elija otro.', // Mensaje personalizado
        ]);


        if ($validatorFacades->fails()) {
            return back()->withErrors($validatorFacades)->withInput();
        }
        // Preparar los datos para la actualización
        $data = [
            'username' => !empty($request->username) ? $request->username : $request->name,
            'email' => $request->email,
            'activated' =>  $request->input('activated') === 'on' ? 1 : 0
        ];

        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']); // Si no hay contraseña nueva, removemos la clave
        }
        DB::beginTransaction();
        try {
            $user = User::find($validator->person->user_id);
            if ($user) {
                $user->update($data); // Actualizar datos del usuario

                // Actualizar la información de la persona asociada al usuario
                $user->person->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'lastname' => $request->lastname,
                    'phone' => $request->phone,
                    'activated' =>  $request->input('activated') === 'on' ? 1 : 0
                ]);
                $validator->update([
                    'name' => $request->name,
                    'activated' =>  $request->input('activated') === 'on' ? 1 : 0,
                    'specialty_id' => $request->specialty_id
                ]);
            }

            DB::commit();
            return Redirect::route('validators.index')
                ->with('success', 'Validador actualizado satisfactoriamente.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Ocurrió un error al procesar la actualización. ' . $e->getMessage()]);
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $validator = Validator::find($id);

            if ($validator) {

                // Obtén a la persona
                $people = $validator->person;
                $user =  $people->user;

                // Elimina el validador
                $validator->delete();

                // Ahora elimina a la persona si es necesario
                if ($people) {
                    $people->delete();
                }
                if ($user) {
                    $user->delete();
                }
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            // O puedes hacer un dd($e) para ver el error.
        }

        return Redirect::route('validators.index')
            ->with('success', 'Validador eliminado satisfactoriamente');
    }
    public function registerValidator(TutorValidatorRegisterRequest $request)
    {

        $data = $request->validated();
        DB::beginTransaction();
        try {

            $data['verification_token'] = Str::random(40);
            $data['verification_code'] = random_int(100000, 999999);
            $data['type'] = 'Tutor';

            $user_register = TutorValidatorRegister::create($data);

            DB::commit();
            Mail::to($data['mail'])->send(new VerificationEmailRegisterValidator($user_register));

            return redirect()->route('thankYouTutorRegisterValidator');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Ocurrió un error al procesar el registro.' . $e->getMessage()]);
        }
    }
    public function thankYou()
    {
        return view('validator.thankyouRegisterValidator');
    }

    public function verify($token)
    {

        // Verifica que el token existe
        $user = TutorValidatorRegister::where('verification_token', $token)->first();

        if (!$user) {
            return redirect('/login')->with('error', 'Token de verificación inválido o expirado.');
        }

        return view('validator.verify', compact('user'));
    }
    public function verifyCodeValidator(Request $request)
    {

        // Validación de la solicitud
        $request->validate([
            'email' => 'string|email',
            'verification_code' => 'required|integer',
            'verification_token' => 'required|string',
        ]);

        // Buscar usuario por correo y token de verificación
        $user = TutorValidatorRegister::where('mail', $request->mail)
            ->where('verification_token', $request->verification_token)
            ->first();

        if (!$user || $user->verification_code !== (int)$request->verification_code) {
            return back()->withErrors(['error' => 'Código de verificación inválido']);
        }
        // Marca el usuario como verificado
        $this->markUserAsVerified($user);
        Mail::to('registro@plataforma.fundacionmagistral.org')->send(new SendEmailValidatorFundacion($user));
        return view('tutor.registerTutorValid');
    }
    private function markUserAsVerified(TutorValidatorRegister $user)
    {
        $user->is_verified = true;
        $user->email_verified_at = now();
        $user->verification_code = null;
        $user->verification_token = null;
        $user->save();
    }
}

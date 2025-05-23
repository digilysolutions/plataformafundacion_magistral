<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TutorRequest;
use App\Http\Requests\TutorValidatorRegisterRequest;
use App\Mail\SendEmailTutorFundacion;
use App\Mail\VerificationEmailRegisterTutor;
use App\Mail\VerificationEmailTutor;
use App\Models\Person;
use App\Models\Specialty;
use App\Models\StudyCenter;
use App\Models\TutorValidatorRegister;
use App\Models\User;
use App\Validators\PasswordValidator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator as ValidatorFacades;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tutors = Tutor::all();

        return view('tutor.index', compact('tutors'));
    }
    public function indexToStudyCenter($studycenters_id): View
    {
        $tutors = Tutor::allActivated()->where('studycenters_id', $studycenters_id);
        return view('tutor.index', compact('tutors'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tutor = new Tutor();
        $studyCenters = StudyCenter::allActivated();
        if (count($studyCenters) == 0) {
            $error = 'No podemos crear tutores, no hay centros de estudios activos o creados. '
                . 'Si quieres crear un centro de estudio, puedes hacerlo '
                . '<a href="' . route('study-centers.create') . '"> aquí</a>.';
            $tutors = Tutor::all();
            return view('tutor.index', compact('tutors'))->with('error', $error);
        }
        $specialties = Specialty::allActivated();
        return view('tutor.create', compact('tutor', 'studyCenters', 'specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TutorRequest $request)
    {
        /* $data = $request->validated();
        $data['lastname'] = $request->lastname;
        $data['email'] = $request->email;
        $data['username'] = isset($request->username) && !empty($request->username) ? $request->username : $request->name;
        $data['activated'] = true;
        $data['password'] = Hash::make($request->password); // Hashea la contraseña

        // Asegúrate de que specialty_id sea un array
        if (!empty($data['specialty_id']) && is_array($data['specialty_id'])) {
            foreach ($data['specialty_id'] as $specialtyId) {
                // Verificar si cada specialty_id existe
                if (!Specialty::where('id', $specialtyId)->exists()) {
                    return redirect()->back()->withErrors(['specialty_id' => 'La especialidad con ID ' . $specialtyId . ' no es válida.']);
                }
            }
        } else {
            return redirect()->back()->withErrors(['specialty_id' => 'Debes proporcionar uno o más specialty_id válidos.']);
        }
*/
        // Validación
        $tutor = ValidatorFacades::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            // Aquí estamos usando 'unique:users,email' para verificar que el correo sea único en la tabla 'users'
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required',  Rules\Password::defaults()]
        ], [
            'email.unique' => 'El correo electrónico ya está en uso. Por favor, elija otro.', // Mensaje personalizado
        ]);

        if ($tutor->fails()) {
            return back()->withErrors($tutor)->withInput();
        }
        // Si la validación falla, redirigir de vuelta con errores
        if ($tutor->fails()) {
            return back()->withErrors($tutor)->withInput();
        }

        $data['username'] = !empty($request->username) ? $request->username : $request->name;
        $data['password'] = $request->password;
        $validator = PasswordValidator::validate($data);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {

            // Genera una contraseña aleatoria de 10 caracteres
            $user = User::create([
                'name' => $data['username'],
                'email' => $request->email,
                'activated' => true,
                'password' =>  $data['password'],
                'verification_token' => Str::random(40),
                'verification_code' => random_int(100000, 999999),
                'role' => 'Tutor',
                'first_login' => true,
                'roleid' => 3,

            ]);

            $person = Person::create([
                'name' => $request->name,
                'email' => $request->email,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'activated' => true,
                'user_id' => $user->id
            ]);


            //Crear Tutor
            $tutor =  Tutor::create([
                'name' => $request->name,
                'activated' => true,
                'people_id' => $person->id,
                'specialty_id' => $request->specialty_id,
                'studycenters_id' => $request->studycenters_id
            ]);

            // Agregar especialidades

            $studyCenter = StudyCenter::find($request->studycenters_id);
            event(new Registered($tutor));
            Session::flash('password', $request->password);
            Mail::to($user->email)->send(new VerificationEmailTutor($user, $studyCenter));
            DB::commit();
            return Redirect::route('tutors.index')
                ->with('success', 'Tutor creado satisfactoriamente. Esperando su confrimacion de correo');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Ocurrió un error al procesar la solicitud: ' . $e->getMessage()]); // Muestra el mensaje de error que ocurrió
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tutor = Tutor::find($id);

        return view('tutor.show', compact('tutor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tutor = Tutor::find($id);
        $studyCenters = StudyCenter::allActivated();
        $specialties = Specialty::allActivated();
        return view('tutor.edit', compact('tutor', 'studyCenters', 'specialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TutorRequest $request, Tutor $tutor): RedirectResponse
    {
        $data = $request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        $tutor->update($data);

        return Redirect::route('tutors.index')
            ->with('success', 'Tutor actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        try {
            $tutor = Tutor::find($id);

            if ($tutor) {

                // Obtén a la persona
                $people = $tutor->person;
                $user =  $people->user;

                // Elimina el validador
                $tutor->delete();

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

        return Redirect::route('tutors.index')
            ->with('success', 'Tutor eliminado satisfactoriamente');
    }
    public function registerTutor(TutorValidatorRegisterRequest $request)
    {

        $data = $request->validated();
        DB::beginTransaction();
        try {

            $data['verification_token'] = Str::random(40);
            $data['verification_code'] = random_int(100000, 999999);
            $data['type'] = 'Tutor';

            $user_register = TutorValidatorRegister::create($data);

            DB::commit();
            Mail::to($data['mail'])->send(new VerificationEmailRegisterTutor($user_register));

            return redirect()->route('thankYouTutorRegister');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Ocurrió un error al procesar el registro.' . $e->getMessage()]);
        }
    }

    public function verify($token)
    {

         // Verifica que el token existe
        $user = TutorValidatorRegister::where('verification_token', $token)->first();

        if (!$user) {
            return redirect('/login')->with('error', 'Token de verificación inválido o expirado.');        }

        return view('tutor.verify', compact('user'));
    }

    public function verifyCodeTutor(Request $request)
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
          Mail::to('registro@plataforma.fundacionmagistral.org')->send(new SendEmailTutorFundacion($user));
     return view('tutor.registerTutorValid');
    }

        public function thankYou()
        {
            return view('tutor.thankyouRegisterTutor');
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

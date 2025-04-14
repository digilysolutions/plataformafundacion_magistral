<?php

namespace App\Http\Controllers;

use App\Models\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ValidatorRequest;
use App\Mail\VerificationEmail;
use App\Mail\VerificationEmailValidator;
use App\Models\Person;
use App\Models\Specialty;
use App\Models\User;
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
        $validator = ValidatorFacades::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            // Aquí estamos usando 'unique:users,email' para verificar que el correo sea único en la tabla 'users'
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],

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
        $data['username'] = !empty($request->username) ? $request->username : $request->name;
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']); // Si no hay contraseña nueva, removemos la clave
        }
        DB::beginTransaction();

        try {
            // Generar una contraseña aleatoria

            $user = User::create([
                'name' => $data['username'],
                'email' => $request->email,
                'activated' => true,
                'password' => Hash::make($data['password']),
                'verification_token' => Str::random(40),
                'verification_code' => random_int(100000, 999999),
                'membership_id' => 'BA0001',
                'role' => 'Validador',
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
            Mail::to($user->email)->send(new VerificationEmailValidator($user,$request->password));
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
        return view('validator.edit', compact('validator','specialties'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidatorRequest $request, Validator $validator): RedirectResponse
    {
        $data = $request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $validator->update($data);

        return Redirect::route('validators.index')
            ->with('success', 'Validador actualizado satisfactoriamente');
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
}

<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelper;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Mail\StudentConfirmationMail;
use App\Models\Membership;
use App\Models\Person;
use App\Models\StudyCenter;
use App\Models\User;
use App\Validators\PasswordValidator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $students = Student::all();

        return view('student.index', compact('students'));
    }

    public function indexToStudyCenter($studycenters_id): View
    {
        $students = Student::allActivated()->where('studycenters_id', $studycenters_id);
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $student = new Student();
        $studyCenters = StudyCenter::allActivated();
        $memberships = Membership::allActivated();
        if (count($studyCenters) == 0) {
            $error = 'NO podemos crear estudiantes, no hay centros de estudios activos o creados. '
                . 'Si quieres crear un centro de estudio, puedes hacerlo '
                . '<a href="' . route('study-centers.create') . '"> aquí</a>.';
            $students = Student::allActivated();
            return view('student.index', compact('students'))->with('error', $error);
        }
        return view('student.create', compact('student', 'studyCenters', 'memberships'));
    }
    public function createStudentToStudyCenter($idStudyCenter): View
    {
        $student = new Student();
        $studyCenters = StudyCenter::allActivated();

        if (count($studyCenters) == 0) {
            $error = 'NO podemos crear estudiantes, no hay centros de estudios activos o creados. '
                . 'Si quieres crear un centro de estudio, puedes hacerlo '

                . '<a href="' . route('study-centers.create') . '"> aquí</a>.';
            $students = $this->indexToStudyCenter($idStudyCenter);
            return view('student.index', compact('students'))->with('error', $error);
        }
        return view('student.create', compact('student', 'studyCenters', 'idStudyCenter'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $data = $request->validated();

        $data['username'] = (isset($request->username) && !empty($request->username)) ? $request->username : $request->name;
        $data['activated'] = true;
        $data['password'] = $request->password;
        $data['name'] = $request->name;
        $data['lastname'] = $request->lastname;
        $data['studycenters_id'] = $request->studycenters_id;

        // Iniciar una transacción para asegurar la consistencia
        $validator = PasswordValidator::validate($data);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $students = Student::allActivated()->count();
        $studyCenter = StudyCenter::find($data['studycenters_id']);

        //Obtener la membresía del centro de estudio
        $membership = $studyCenter->membership;
        $studentLimit = $membership->student_limit;
        $data['membership_id'] = $membership->id;

        if ($studentLimit === null || $students < $studentLimit) {
            DB::transaction(function () use ($data) {


                // Crear el usuario
               /* $user = User::create([
                    'name' => $data['username'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']), // Contraseña inicial
                    'activated' => true,
                    'role' => 'Estudiante',
                    'roleid' => 2
                ]);*/
                $user = UserHelper::createDefaultUser($data['username'], $data['lastname'], 'Estudiante', 2);

                $data['user_id'] = $user['user']->id;
                $person = Person::create($data);

                $data['people_id'] = $person->id;
                // Crear el estudiante


                $student = Student::create($data);

                // Enviar correo de confirmación
                //  Mail::to($person->email)->send(new StudentConfirmationMail($student->id));
            });

            return Redirect::route('students.index')
                ->with('success', 'Estudiante creado satisfactoriamente.');
        }

        return Redirect::route('students.index')
            ->with('error', 'No puede agregar más estudiantes.');
    }
    public function updatePassword(Request $request, $studentId)
    {
        $request->validate([
            'password' => 'required|string|confirmed|min:8',
        ]);

        $student = Student::findOrFail($studentId);
        $user = User::findOrFail($student->user_id);
        $user->password = bcrypt($request->password);
        $user->activated = true; // Activar el usuario
        $user->save();
        return redirect()->route('home')->with('message', 'Contraseña actualizada con éxito. Ahora puedes iniciar sesión.');
    }
    public function activate($tracking_code)
    {
        $person = Person::where('tracking_code', $tracking_code)->firstOrFail();

        // Activar el estudiante aquí
        $student = $person->student;
        if ($student) {
            $student->activated = true;
            $student->save();

            // Redirigir a la pantalla de cambio de contraseña
            return view('students.set_password', ['student' => $student]);
        }

        return response()->json(['message' => 'Estudiante no encontrado.'], 404);
    }
    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $student = Student::find($id);

        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $student = Student::with('person')->findOrFail($id);
        $studyCenters = StudyCenter::allActivated();
        return view('student.edit', compact('student', 'studyCenters'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdateRequest $request, Student $student): RedirectResponse
    {

        // Validamos los datos del request
        $data = $request->validated();

        // Establecemos el username
        $data['username'] = !empty($request->username) ? $request->username : $request->name;
        $data['activated'] = true;

        // Solo asignar la nueva contraseña si se proporciona
        if (!empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']); // Si no hay contraseña nueva, removemos la clave
        }

        // Obtenemos el centro de estudio y su membresía
        $studyCenter = StudyCenter::find($data['studycenters_id']);
        $membership = $studyCenter ? $studyCenter->membership : null;

        if ($membership) {
            $data['membership_id'] = $membership->id;
        } else {
            return back()->withErrors(['studycenters_id' => 'El centro de estudio no es válido.'])->withInput();
        }

        // Iniciar una transacción para asegurar la consistencia
        DB::transaction(function () use ($data, $student) {
            // Actualizamos el usuario relacionado con el estudiante
            $studentUser = User::find($student->person->user_id);
            if ($studentUser) {
                $studentUser->update([
                    'name' => $data['username'],
                    'email' => $data['email'], // El correo será validado en StudentRequest
                    'password' => $data['password'] ?? $studentUser->password, // Solo actualiza si hay una nueva contraseña
                    'activated' => true,
                    'role' => 'Estudiante',
                    'roleid' => 2
                ]);
            }

            // Actualizar datos de la persona

            $student->person->update($data);
            // Actualizar los datos del estudiante
            $student->update($data);

            // Enviar correo de confirmación (opcional)
            // Mail::to($person->email)->send(new StudentConfirmationMail($student->id));

            return Redirect::route('students.index')
                ->with('success', 'Estudiante actualizado satisfactoriamente');
        });

        // En caso de que la transacción falle, se puede manejar mejor el mensaje de error
        return Redirect::route('students.index')
            ->with('error', 'No se pudo actualizar el estudiante.');
    }

    public function destroy($id): RedirectResponse
    {

        try {
            $student = Student::find($id);

            if ($student) {
                // Obtén a la persona
                $people = $student->person;
                $user =  $people->user;
                // Elimina el validador
                $student->delete();
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
        return Redirect::route('students.index')
            ->with('success', 'Estudiante eliminado satisfactoriamente');
    }
}

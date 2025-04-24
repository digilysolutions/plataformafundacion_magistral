<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelper;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Mail\StudentConfirmationMail;
use App\Models\Course;
use App\Models\Membership;
use App\Models\Person;
use App\Models\StudyCenter;
use App\Models\User;
use App\Validators\PasswordValidator;
use Illuminate\Support\Facades\Auth;
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

    /**
     * Show the form for creating a new resource.
     */

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

            $role = Auth::user()->role;
            if ($role == "Centro Educativo")
                return Redirect::route('students.indexToStudyCenter', [$request->studycenters_id])
                    ->with('success', 'Estudiante creado satisfactoriamente.');
            else
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


    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $role = Auth::user()->role;
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
        DB::beginTransaction();
        // Iniciar una transacción para asegurar la consistencia

        // Actualizamos el usuario relacionado con el estudiante
        $studentUser = User::find($student->person->user_id);
        if ($studentUser) {
            $studentUser->update([
                'name' => $data['username'],
                'password' => $data['password'] ?? $studentUser->password, // Solo actualiza si hay una nueva contraseña
                'activated' => true,
                'role' => 'Estudiante',
                'roleid' => 2
            ]);
        }

        // Actualizar datos de la persona

        $student->person->update($data);

        if ($role == "Administrador") {
            return Redirect::route('students.index')
                ->with('success', 'Estudiante actualizado satisfactoriamente');
        }
        if ($role == "Centro Educativo") {
            return Redirect::route('students.indexToStudyCenter', [$student->studyCenter->id])
                ->with('success', 'Estudiante actualizado satisfactoriamente');
        }

        DB::commit();
        if ($role == "Administrador") {
            return Redirect::route('students.index')
                ->with('error', 'No se pudo actualizar el estudiante.');
        }
        if ($role == "Centro Educativo") {
            return Redirect::route('students.indexToStudyCenter', [$student->studyCenter->id])
                ->with('error', 'No se pudo actualizar el estudiante.');
        }
    }

    private function destroyStudent($student)
    {
        $studyCenter_id=$student->studyCenter->id;
        $role = Auth::user()->role;
        try {

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

            if ($role == "Administrador") {
                return Redirect::route('students.index')
                    ->with('error', 'Error al eliminar al estudiante.');
            }
            if ($role == "Centro Educativo") {
                return Redirect::route('students.indexToStudyCenter', [$student->studyCenter->id])
                    ->with('error', 'Error al eliminar al estudiante.');
            }
        }
        if ($role == "Administrador") {
            return Redirect::route('students.index')
                ->with('success', 'Estudiante eliminado satisfactoriamente');
        }
        if ($role == "Centro Educativo") {
            return Redirect::route('students.indexToStudyCenter', [ $studyCenter_id])
                ->with('success', 'Estudiante eliminado satisfactoriamente');
        }
    }



    //-----Functiones  del administrador---
    public function destroy($id)
    {
        $student = Student::find($id);
        return $this->destroyStudent($student);
    }

    public function edit($id): View
    {
        $student = Student::with('person')->findOrFail($id);
        $studyCenters = StudyCenter::allActivated();
        $memberships = Membership::allActivated();
        $courses = Course::allActivated();
        return view('student.edit', compact('student', 'studyCenters', 'memberships','courses'));
    }
    public function show($id): View
    {
        $student = Student::find($id);
        return view('student.show', compact('student'));
    }
    public function index(Request $request): View
    {
        $students = Student::all();

        return view('student.index', compact('students'));
    }
    public function create(): View
    {
        $student = new Student();
        $studyCenters = StudyCenter::allActivated();
        $memberships = Membership::allActivated();
        $courses = Course::allActivated();
        if (count($studyCenters) == 0) {
            $error = 'NO podemos crear estudiantes, no hay centros de estudios activos o creados. '
                . 'Si quieres crear un centro de estudio, puedes hacerlo '
                . '<a href="' . route('study-centers.create') . '"> aquí</a>.';
            $students = Student::allActivated();
            return view('student.index', compact('students'))->with('error', $error);
        }
        return view('student.create', compact('student', 'studyCenters', 'memberships','courses'));
    }







    //-----Functiones del centro educativo para gestionar sus estudiantes
    public function destroyStutendToStudyCenter($id, $idStudyCenter)
    {
        $student = Student::where('studycenters_id', $idStudyCenter)->find($id);
        return $this->destroyStudent($student);
    }
    public function editStutendToStudyCenter($id, $idStudyCenter): View
    {
        $student = Student::where('studycenters_id', $idStudyCenter)->find($id);
        $studyCenters = StudyCenter::allActivated();
        return view('student.edit', compact('student', 'studyCenters', 'idStudyCenter'));
    }
    public function showStutendToStudyCenter($id, $idStudyCenter): View
    {
        $student = Student::where('studycenters_id', $idStudyCenter)->find($id);
        return view('student.show', compact('student'));
    }
    public function indexToStudyCenter($studycenters_id): View
    {
        $students = Student::allActivated()->where('studycenters_id', $studycenters_id);
        return view('student.indexStudyCenter', compact('students', 'studycenters_id'));
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
}

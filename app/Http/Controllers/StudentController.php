<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Mail\StudentConfirmationMail;
use App\Models\Person;
use App\Models\StudyCenter;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;

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
        $students = Student::allActivated()->where('studycenters_id',$studycenters_id);
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $student = new Student();
        $studyCenters = StudyCenter::allActivated();

        if (count($studyCenters) == 0) {
            $error = 'NO podemos crear estudiantes, no hay centros de estudios activos o creados. '
                . 'Si quieres crear un centro de estudio, puedes hacerlo '
                . '<a href="' . route('study-centers.create') . '"> aquí</a>.';
            $students = Student::allActivated();
            return view('student.index', compact('students'))->with('error', $error);
        }
        return view('student.create', compact('student', 'studyCenters'));
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
        return view('student.create', compact('student', 'studyCenters','idStudyCenter'));



    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $data = $request->validated();
        $data['username']= (isset($request->username) && !empty($request->username))? $request->username: $request->name;
        $data['activated'] = true;
        $data['password']=$request->password;
        $data['studycenters_id']=$request->studycenters_id;
        // Iniciar una transacción para asegurar la consistencia

        DB::transaction(function () use ($data) {
            // Crear la persona

            // Crear el usuario
            $user = User::create([
                'name' => $data['username'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']), // Contraseña inicial
                'activated' => true,
                'role' => 'Estudiante',
                'roleid' => 2
            ]);

            $data['user_id'] = $user->id;
            $person = Person::create($data);

            $data['people_id'] = $person->id;
            // Crear el estudiante
            $studyCenter = StudyCenter::find($data['studycenters_id']);
            $data['membership_id'] = $studyCenter->membership_id;
            $student = Student::create($data);

            // Enviar correo de confirmación
            //  Mail::to($person->email)->send(new StudentConfirmationMail($student->id));
        });

        return Redirect::route('students.index')
            ->with('success', 'Estudiante creado satisfactoriamente.');
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
        $student = Student::find($id);

        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student): RedirectResponse
    {
        $data = $request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $student->update($data);
        return Redirect::route('students.index')
            ->with('success', 'Student actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        Student::find($id)->delete();

        return Redirect::route('students.index')
            ->with('success', 'Student eliminado satisfactoriamente');
    }
}

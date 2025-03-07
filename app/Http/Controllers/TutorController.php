<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TutorRequest;
use App\Models\Person;
use App\Models\Specialty;
use App\Models\StudyCenter;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

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
        $tutors = Tutor::allActivated()->where('studycenters_id',$studycenters_id);
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

        $data = $request->validated();

                DB::transaction(function () use ($data) {

            // Crear la persona
            $person = Person::create($data);
            $data['people_id'] = $person->id;


            // Crear el usuario
            $user = User::create([
                'name' => $person->name,
                'email' => $person->email,
                'password' => bcrypt($person->email), // Contraseña inicial
                'activated' => true,
                'role' => 'Tutor',
                'roleid' => 3
            ]);
            $data['user_id'] = $user->id;
            // Crear el estudiante

            $tutor = Tutor::create($data);

            // Enviar correo de confirmación
            //  Mail::to($person->email)->send(new StudentConfirmationMail($student->id));
        });

        return Redirect::route('tutors.index')
            ->with('success', 'Tutor creado satisfactoriamente.');
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

        return view('tutor.edit', compact('tutor'));
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
        Tutor::find($id)->delete();

        return Redirect::route('tutors.index')
            ->with('success', 'Tutor eliminado satisfactoriamente');
    }
}

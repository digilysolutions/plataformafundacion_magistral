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
use Illuminate\Support\Facades\Hash;

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
    $data = $request->validated();
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

    DB::transaction(function () use ($data) {
        // Crear el usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'], // Usar la contraseña hasheada
            'activated' => true,
            'role' => 'Tutor',
            'roleid' => 3,
        ]);

        // Crear la persona
        $personData = [
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'user_id' => $user->id,
        ];
        $person = Person::create($personData);

        // Crear el tutor
        $tutorData = array_merge($data, ['user_id' => $user->id, 'people_id' => $person->id]);
        $tutor = Tutor::create($tutorData);

        // Agregar especialidades
        if (!empty($data['specialty_id'])) {
            // Usa attach en lugar de sync
            $tutor->specialties()->attach($data['specialty_id']);
        }
    });

    return Redirect::route('tutors.index')->with('success', 'Tutor creado satisfactoriamente.');
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
        return view('tutor.edit', compact('tutor','studyCenters','specialties'));
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

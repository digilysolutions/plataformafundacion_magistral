<?php

namespace App\Http\Controllers;

use App\Helpers\UserHelper;
use App\Models\StudyCenter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StudyCenterRequest;
use App\Models\District;
use App\Models\Membership;
use App\Models\Person;
use App\Models\Regional;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudyCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $studyCenters = StudyCenter::all();

        return view('study-center.index', compact('studyCenters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $studyCenter = new StudyCenter();
        $regionals = Regional::allActivated();
        $destritos = District::allActivated();
        $memberships = Membership::allActivated();
        return view('study-center.create', compact('studyCenter', 'memberships', 'regionals', 'destritos'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StudyCenterRequest $request)
    {


        $data = $request->validated();
        $data['name_people'] = $request['name_people'];
        $data['lastname'] = $request['lastname'];

        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        DB::beginTransaction();
        try {
            $user = UserHelper::createDefaultUser($data['name_people'], $data['lastname'], 'Centro Educativo', 1);

            $data['user_id'] = $user['user']->id;
            $data['email'] = $user['user']->email;
            $person = Person::create($data);

            $data['people_id'] = $person->id;
            // Crear el estudiante
            $password = $user['password'];
            $studyCenter = StudyCenter::create($data);
            Log::info('Se creo el centro de estudio');

            DB::commit();

            // Retornar a la vista con el mensaje de éxito y la información necesaria
            return view('study-center.show', compact('studyCenter'))->with('password', $user['password']);
        } catch (\Exception $e) {
            // Si hay un error, revertir todos los cambios
            DB::rollback();
            Log::error('Error al crear el centro de estudio: ' . $e->getMessage());

            // Retornar a la vista de lista con un mensaje de error
            return Redirect::route('study-centers.index')
                ->with('error', 'Error. No se pudo insertar el Centro de estudio.');
        }



        //Crear el usurio y la persona

    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $studyCenter = StudyCenter::find($id);

        return view('study-center.show', compact('studyCenter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $studyCenter = new StudyCenter();
        $regionals = Regional::allActivated();
        $destritos = District::allActivated();
        $memberships = Membership::allActivated();
        $studyCenter = StudyCenter::find($id);

        return view('study-center.edit', compact('studyCenter', 'memberships', 'regionals', 'destritos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudyCenterRequest $request, StudyCenter $studyCenter): RedirectResponse
    {

        $data = $request->validated();
        $data["activated"] = $request->input('activated') === 'on' ? 1 : 0;
        $data['name_people'] = $request['name_people'];
        $data['lastname'] = $request['lastname'];

        DB::transaction(function () use ($data, $studyCenter) {

            $user = UserHelper::createDefaultUser($data['name_people'], $data['lastname'], 'Centro Educativo', 1);

            $data['user_id'] = $user['user']->id;
            $data['email'] = $user['user']->email;
            $person = Person::create($data);

            $data['people_id'] = $person->id;
            // Crear el estudiante
            $password = $user['password'];
            $studyCenter->update($data);

            /*   return Redirect::route('study-center.show', compact('studyCenter', 'password'))
                ->with('success', 'Centro de estudio creado satisfactoriamente.');*/
            return view('study-center.show', compact('studyCenter'))
                ->with('password', $password);
        });
        return Redirect::route('study-centers.index')
            ->with('success', 'Centro de estudio actualizado satisfactoriamente');
    }
    public function destroy($id): RedirectResponse
    {
        StudyCenter::find($id)->delete();

        return Redirect::route('study-centers.index')
            ->with('success', 'Centro de estudio eliminado satisfactoriamente');
    }
    public function getDistritos($regional_id)
    {
        // Obtén los distritos que pertenecen a la regional seleccionada
        $distritos = District::where('regional_id', $regional_id)->get();

        return response()->json($distritos);
    }

    public function dashboard()
    {
        return view('study-center.dashboard');
    }
}

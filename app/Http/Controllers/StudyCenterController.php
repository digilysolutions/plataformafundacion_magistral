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
use App\Models\RegisterStudyCenter;
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
        $data['name_people'] = $request->input('name_people');
        $data['lastname'] = $request->input('lastname');
        $data['email'] = $request->input('mail');
        $data['activated'] = $request->has('activated') ? 1 : 0;

        DB::beginTransaction();

        try {
            // Obtener el usuario por correo
            $user = User::where('mail', $request->mail)->firstOrFail();

            // Obtener la solicitud del centro de estudio por correo
            $studyCenter = RegisterStudyCenter::where('mail', $request->mail)->firstOrFail();

            // Verificar el estado del centro de estudio
            if ($studyCenter->state == "Pendiente") {
                // Crear entidad de Persona y Centro de Estudio
                $person = Person::create($data);
                $studyCenter = StudyCenter::create($data);
                $studyCenter->state = "Completada";
                $studyCenter->save(); // Asegúrate de guardar el cambio del estado
            } else if ($studyCenter->state == "Completada") {
                return Redirect::route('study-centers.index')
                    ->with('error', 'El centro de estudio ya está completado.');
            }

            // Commita la transacción si todo ha ido bien
            DB::commit();

            // Retorna a la vista con éxito
            return view('study-center.show', compact('studyCenter'))->with('password', $user->password);
        } catch (\Exception $e) {
            // Si hay un error, revertir todos los cambios
            DB::rollback();
            Log::error('Error al crear el centro de estudio: ' . $e->getMessage());

            // Retornar a la vista de lista con un mensaje de error
            return Redirect::route('study-centers.index')
                ->with('error', 'Error. No se pudo insertar el Centro de estudio.');
        }
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

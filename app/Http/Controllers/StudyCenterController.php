<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Helpers\UserHelper;
use App\Models\StudyCenter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StudyCenterRequest;
use App\Mail\SendEmailToAdminStudyCenter;
use App\Mail\SendEmailToStudyCenter;
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
use Illuminate\Support\Facades\Mail;

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
    public function store(StudyCenterRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['activated'] = $request->has('activated');

        DB::beginTransaction();


        try {

            $studyCenter = $this->getStudyCenterByEmail($request->input('mail'));
            if (!$studyCenter) {
                DB::rollback();
                return back()->withErrors(['error' => 'No se ha encontrado un centro de estudio asociado a la solicitud de registro con el correo: ' . $request->input('mail') . '. Por favor, verifica si el correo electrónico es correcto o contáctanos para obtener asistencia.']);
            }

            $user = $this->getUserByEmail($request->input('mail'));
            $password = Str::random(10);
            $user->password = $password;
            $user->save();



            // Verificar el estado del centro de estudio
            if ($studyCenter->state === "Completada") {
                DB::rollback();
                return Redirect::route('study-centers.index')
                    ->with('error', 'El centro de estudio ya está registrado y ha accedido a la plataforma al menos una vez. No es posible realizar el registro nuevamente.');
            }

            // Crear persona y centro de estudio
            $person = $this->createPerson($request, $user->id);

            $newstudyCenter = $this->createStudyCenter($request, $person->id, $data);

            // Completando el proceso
            $studyCenter->state = "Completada";
            $studyCenter->save();

            // Enviar correo de confirmación
            Mail::to($user->email)->send(new SendEmailToStudyCenter($user, $studyCenter, $password));

            DB::commit();
            return Redirect::route('study-centers.index')->with('success', 'Centro de estudio creado satisfactoriamente');
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Error al crear el centro de estudio: ' . $e->getMessage());
            return Redirect::route('study-centers.index')->withErrors(['error' => 'Error. No se pudo insertar el Centro de estudio. ' . $e->getMessage()]);
        }
    }

    private function getUserByEmail(string $email)
    {
        $user = User::where('email', $email)->firstOrFail();
        if (!$user) {
            return Redirect::route('study-centers.index')
                ->with('error', 'No se ha encontrado un centro de estudio asociado a la solicitud de registro con el correo: ' . $email . '. <br> Por favor, verifica si el correo electrónico es correcto o contáctanos para obtener asistencia.');
        }
        return $user;
    }

    private function getStudyCenterByEmail(string $email)
    {
        return RegisterStudyCenter::where('mail', $email)->first();
    }

    private function createPerson(Request $request, string $userId): Person
    {
        return Person::create([
            'name' => $request->input('name_people'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('mail'),
            'phone' => $request->input('phone'),
            'activated' => true,
            'user_id' => $userId,
        ]);
    }

    private function createStudyCenter(Request $request, string $personId, array $data): StudyCenter
    {
        return StudyCenter::create([
            'name' => $request->input('name'),
            'activated' => $data['activated'],
            'code' => $request->input('code'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'mail' => $request->input('mail'),
            'regional_id' => $request->input('regional_id'),
            'district_id' => $request->input('district_id'),
            'people_id' => $personId,
            'membership_id' => $request->input('membership_id'),
        ]);
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

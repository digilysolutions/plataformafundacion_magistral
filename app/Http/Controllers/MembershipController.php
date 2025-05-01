<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MembershipRequest;
use App\Models\MembershipFeature;
use App\Models\MembershipFeaturesMembership;
use App\Models\MembershipHistory;
use App\Models\MembershipStatus;
use App\Models\StudyCenter;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Carbon\Carbon;
use Database\Seeders\MemberShipMemberShipFeatureSeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $memberships = Membership::all();
        return view('membership.index', compact('memberships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $membership = new Membership();
        $membershipsFeature = MembershipFeature::allActivated();

        return view('membership.create', compact('membership', 'membershipsFeature'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MembershipRequest $request)
    {
        $data = $request->all();

        // Convertimos duration_days a entero
        $durationDays = (int)$data['duration_days'];

        // Preparar datos para crear la membresía
        $membershipData = [
            "activated" => $request->input('activated') === 'on' ? 1 : 0,
            "is_studio_center" => $request->input('is_studio_center') === 'on' ? 1 : 0,
            "name" => $data['name'],
            "price" => (float)$data['price'],
            "type" => $data['type'],
            "duration_days" => $durationDays,
            "start_date" => now(),
            "end_date" => $durationDays > 0 ? now()->addDays($durationDays) : null,
        ];

        // Iniciar transacción
        DB::beginTransaction();
        try {
            // Crear la membresía
            $membership = Membership::create($membershipData);

            // Inicializar un array para agrupar las características de membresía
            $membershipFeatures = [];

            // Recorrer todos los campos en $data
            foreach ($data as $key => $value) {
                // Dividir la clave en dos partes: el identificador y el tipo de campo
                if (strpos($key, '-') !== false) {
                    list($featureType, $fieldType) = explode('-', $key, 2);

                    // Verifica que fieldType sea uno de los tipos esperados
                    if (in_array($fieldType, ['description', 'url', 'has_access', 'usage_limit'])) {
                        // Si no existe una entrada para este featureType, inicializarla
                        if (!isset($membershipFeatures[$featureType])) {
                            $membershipFeatures[$featureType] = [
                                'membership_id' => $membership->id,
                                'membership_feature_id' => $featureType, // Necesitas tener una forma de mapear esto correctamente
                                'description' => null,
                                'usage_limit' => null,
                                'has_access' => false,
                                'url' => null,
                                'created_at' => now(), // Marca de tiempo de creación
                                'updated_at' => now(), // Marca de tiempo de actualización
                            ];
                        }

                        // Reunir datos para la característica
                        switch ($fieldType) {
                            case 'description':
                                $membershipFeatures[$featureType]['description'] = $value;
                                break;
                            case 'usage_limit':
                                $membershipFeatures[$featureType]['usage_limit'] = ($value === 'null' ? null : (int)$value);
                                break;
                            case 'has_access':
                                $membershipFeatures[$featureType]['has_access'] = (strtolower($value) === 'true');
                                break;
                            case 'url':
                                $membershipFeatures[$featureType]['url'] = $value;
                                break;
                        }
                    }
                }
            }

            // Insertar los datos en la base de datos
            foreach ($membershipFeatures as $feature) {
                // Comprobar si tanto description como url son vacíos o nulos
                if (!empty($feature['description']) || !empty($feature['url'])) {
                    // Guardar las características solo si al menos una de las propiedades es relevante
                    DB::table('membership_features_memberships')->insert($feature);
                }
            }

            // Confirmar transacción
            DB::commit();

            return Redirect::route('memberships.index')
                ->with('success', 'Membresía creada satisfactoriamente.');
        } catch (\Exception $e) {
            // Revertir transacción en caso de error
            DB::rollBack();

            return Redirect::route('memberships.index')
                ->with('error', 'Ocurrió un error al crear la membresía.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $membership = Membership::findOrFail($id);
        $user = auth()->user();
        $membership_id = null;
        $not_membership = true;
        if ($user->role != "Administrador") {

            if ($user->role == "Centro Educativo") {

                if ($membership->id != $user->person->studyCenter->membership_id) {
                    $not_membership = false;
                }
            } else {
                if ($membership->id != $user->membership_id) {
                    $not_membership = false;
                }
            }
            if( $not_membership == false)
            {
                $messageActivate = 'La membresía no corresponde a la que tien activa';
                return view('membership.show', compact('membership', 'messageActivate', 'not_membership'));
            }
        }
        $now = now();
        $messageActivate = "Esta membresía no está activa.";
        $startDate = \Carbon\Carbon::parse($membership->start_date);
        $endDate = \Carbon\Carbon::parse($membership->end_date);

        // Obtener los IDs de los estados de la base de datos
        $estadoPendienteId = MembershipStatus::where('name', 'Pendiente')->value('id');
        $estadoActivoId = MembershipStatus::where('name', 'Activo')->value('id');
        $estadoVencidaRecienteId = MembershipStatus::where('name', 'Expirado')->value('id'); // Ajusta el nombre si es diferente
        $estadoDesactivadaId = MembershipStatus::where('name', 'Expirado')->value('id'); // Ajusta el nombre si es diferente
        $estadoInactivaId = MembershipStatus::where('name', 'Inactivo')->value('id');

        // Determinar el estado actual y el mensaje
        $estadoActualId = null; // Inicializar con null
        if ($membership->activated == 1 && $startDate > $now && $endDate > $now) {
            $mebershipStatus = MembershipStatus::where('name', 'Pendiente')->first();
            $messageActivate =    $mebershipStatus->description;
            $estadoActualId = $mebershipStatus->id;
        } elseif ($membership->activated == 1 && $startDate <= $now && $endDate >= $now) {
            $mebershipStatus = MembershipStatus::where('name', 'Activo')->first();
            $messageActivate =    $mebershipStatus->description;
            $estadoActualId = $mebershipStatus->id;
        } elseif ($membership->activated == 1 && $endDate < $now && $startDate->diffInDays($endDate) <= 7) {
            $$mebershipStatus = MembershipStatus::where('name', 'Finalizada Reciente')->first();
            $messageActivate =    $mebershipStatus->description;
            $estadoActualId = $mebershipStatus->id;
        } elseif ($membership->activated == 1 && $endDate < $now && $startDate->diffInDays($endDate) > 7) {
            $mebershipStatus = MembershipStatus::where('name', 'Finalizada Antiguamente')->first();
            $messageActivate =    $mebershipStatus->description;
            $estadoActualId = $mebershipStatus->id;
        }


        $membershipMemberShipFeature = MembershipFeaturesMembership::where('membership_id', $membership->id)->get();

        $features = MembershipFeature::allActivated();

        return view('membership.show', compact('membership', 'messageActivate', 'features', 'membershipMemberShipFeature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $membership = Membership::find($id);
        $membershipsFeature = MembershipFeature::allActivated();
        return view('membership.edit', compact('membership', 'membershipsFeature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MembershipRequest $request,  $membership_id): RedirectResponse
    {
        $data = $request->all();

        // Convertimos duration_days a entero
        $durationDays = (int)$data['duration_days'];

        // Obtener la membresía por su ID
        $membership = Membership::findOrFail($membership_id);

        // Preparar datos para la actualización de la membresía
        $membershipData = [
            "activated" => $request->input('activated') === 'on' ? 1 : 0,
            "is_studio_center" => $request->input('is_studio_center') === 'on' ? 1 : 0,
            "name" => $data['name'],
            "price" => (float)$data['price'],
            "type" => $data['type'],
            "duration_days" => $durationDays,
            "start_date" => now(),
            "end_date" => $durationDays > 0 ? now()->addDays($durationDays) : null,
        ];

        // Iniciar transacción
        DB::beginTransaction();
        try {
            // Actualizar la membresía
            $membership->update($membershipData);

            // Inicializar un array para agrupar las características de membresía
            $membershipFeatures = [];

            // Recorrer todos los campos en $data
            foreach ($data as $key => $value) {
                // Dividir la clave en dos partes: el identificador y el tipo de campo
                if (strpos($key, '-') !== false) {
                    list($featureType, $fieldType) = explode('-', $key, 2);

                    // Verifica que fieldType sea uno de los tipos esperados
                    if (in_array($fieldType, ['description', 'url', 'has_access', 'usage_limit'])) {
                        // Si no existe una entrada para este featureType, inicializarla
                        if (!isset($membershipFeatures[$featureType])) {
                            $membershipFeatures[$featureType] = [
                                'membership_id' => $membership->id,
                                'membership_feature_id' => $featureType, // Necesitas tener una forma de mapear esto correctamente
                                'description' => null,
                                'usage_limit' => null,
                                'has_access' => false,
                                'url' => null,
                                'created_at' => now(), // Marca de tiempo de creación
                                'updated_at' => now(), // Marca de tiempo de actualización
                            ];
                        }

                        // Reunir datos para la característica
                        switch ($fieldType) {
                            case 'description':
                                $membershipFeatures[$featureType]['description'] = $value;
                                break;
                            case 'usage_limit':
                                $membershipFeatures[$featureType]['usage_limit'] = ($value === 'null' ? null : (int)$value);
                                break;
                            case 'has_access':
                                $membershipFeatures[$featureType]['has_access'] = (strtolower($value) === 'true');
                                break;
                            case 'url':
                                $membershipFeatures[$featureType]['url'] = $value;
                                break;
                        }
                    }
                }
            }

            // Actualizar o insertar los datos en la tabla de características de membresía
            foreach ($membershipFeatures as $feature) {
                // Comprobar si tanto description como url son vacíos o nulos
                if (!empty($feature['description']) || !empty($feature['url'])) {
                    // Comprobar si la característica ya existe
                    $existingFeature = DB::table('membership_features_memberships')
                        ->where('membership_id', $membership->id)
                        ->where('membership_feature_id', $feature['membership_feature_id'])
                        ->first();

                    if ($existingFeature) {
                        // Actualizar si ya existe
                        DB::table('membership_features_memberships')
                            ->where('id', $existingFeature->id)
                            ->update([
                                'description' => $feature['description'],
                                'usage_limit' => $feature['usage_limit'],
                                'has_access' => $feature['has_access'],
                                'url' => $feature['url'],
                                'updated_at' => now(),
                            ]);
                    } else {
                        // Insertar solo si al menos una de las propiedades es relevante
                        DB::table('membership_features_memberships')->insert($feature);
                    }
                }
            }

            // Confirmar transacción
            DB::commit();

            return Redirect::route('memberships.index')
                ->with('success', 'Membresía actualizada satisfactoriamente.');
        } catch (\Exception $e) {
            // Revertir transacción en caso de error
            DB::rollBack();

            return Redirect::route('memberships.index')
                ->with('error', 'Ocurrió un error al actualizar la membresía.');
        }
    }

    public function destroy($id): RedirectResponse
    {
        Membership::find($id)->delete();

        return Redirect::route('memberships.index')
            ->with('success', 'Membresía eliminado satisfactoriamente');
    }
    public function pricing()
    {
        $memberships = Membership::allActivated();
        $features = MembershipFeature::allActivated();
        $membershipMemberShipFeature = MembershipFeaturesMembership::all();

        return view('membership.pricing', compact('memberships', 'features', 'membershipMemberShipFeature'));
    }

    public function remembership_studyCenter($studyCenterId): View
    {
        $memberships = Membership::allActivated();
        $user = StudyCenter::find($studyCenterId);
        return view('membership.renew_membership', compact('memberships', 'user'));
    }
    public function remembership_user($userId): View
    {
        $memberships = Membership::allActivated();
        $user = User::find($userId);
        return view('membership.renew_membership_user', compact('memberships', 'user'));
    }
    function renew_studyCenter(Request $request, $studyCenterId)
    {

        // Validar el request
        $request->validate([
            'membership_id' => 'required|exists:memberships,id',
            'payment_method' => 'required|string', // Por ejemplo: 'credit_card', 'paypal', etc.
        ]);
        // Encontrar el centro de estudio
        $studyCenter = StudyCenter::findOrFail($studyCenterId);
        return $this->renew($studyCenter, $request->membership_id);
    }
    function renew_user(Request $request, $id)
    {

        // Validar el request
        $request->validate([
            'membership_id' => 'required|exists:memberships,id',
            'payment_method' => 'required|string', // Por ejemplo: 'credit_card', 'paypal', etc.
        ]);
        // Encontrar el centro de estudio
        $user = User::findOrFail($id);

        return $this->renew($user, $request->membership_id);
    }

    //renovar membresia
    private function renew($user_change_membership, $membership_id)
    {
        $now = now();
        $membership = Membership::findOrFail($membership_id);
        // Obtener la membresía actual del centro de estudio
        $currentMembership = $user_change_membership->membership;
        $membershipMemberShipFeature = MembershipFeaturesMembership::where('membership_id', $membership->id)->get();
        $features = MembershipFeature::allActivated();

        // Si el centro de estudio ya tiene una membresía
        if ($currentMembership && $user_change_membership->membership_id !== $membership->id) {
            // La nueva membresía es diferente a la actual, actualizamos el ID y creamos un nuevo historial
            $estadoPendienteId = MembershipStatus::where('name', 'Pendiente')->value('id');

            // Crear un nuevo historial de membresía
            $ultimoHistorial = MembershipHistory::create([
                'id' => Str::uuid(), // No necesitas esto si usas HasUuids en el modelo MembershipHistory
                'user_id' => $user_change_membership->person->user->id,
                'membership_id' => $membership->id,
                'start_date' => $now, // Usar la fecha actual
                'membership_statuses_id' => $estadoPendienteId,
            ]);

            // Actualizar el ID de la membresía en el centro de estudio
            $user_change_membership->membership_id = $membership->id;
            $user_change_membership->update(); // Guardar los cambios en el centro de estudio

            // Mensaje de activación
            $messageActivate = $ultimoHistorial->membershipStatus?->description;
            return view('membership.show', compact('membership', 'messageActivate', 'features', 'membershipMemberShipFeature'));
        } elseif ($currentMembership && $user_change_membership->membership_id === $membership->id) {
            // Si la membresía es igual, retornar el mensaje correspondiente
            $ultimoHistorial = MembershipHistory::where('membership_id', $membership->id)
                ->latest('created_at')
                ->first();

            if ($ultimoHistorial) {
                $messageActivate = $ultimoHistorial->membershipStatus?->description;
            } else {
                $messageActivate = 'No hay historial de membresía. Acción no requerida.';
            }

            return view('membership.show', compact('membership', 'messageActivate', 'features', 'membershipMemberShipFeature'));
        } else {
            $messageActivate = 'No tiene una membresía activa.';
            return view('membership.show', compact('membership', 'messageActivate', 'features', 'membershipMemberShipFeature'));
        }
    }
}

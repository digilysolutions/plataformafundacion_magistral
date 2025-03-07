<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MembershipRequest;
use App\Models\MembershipFeature;
use App\Models\MembershipHistory;
use App\Models\MembershipStatus;
use App\Models\StudyCenter;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Carbon\Carbon;
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
        $membershipFeatures = MembershipFeature::allActivated();

        return view('membership.create', compact('membership', 'membershipFeatures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MembershipRequest $request)
    {
        $data = $request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $data["is_studio_center"] =  $request->input('is_studio_center') === 'on' ? 1 : 0;
        // Establecer la fecha de inicio
        $data['duration_days'] = (int)  $data['duration_days']; // Convierte a entero

        // Luego configuras las fechas
        $data['start_date'] = Carbon::now();

        // Calcular la fecha final
        if ($data['duration_days'] > 0) { // Verifica que duration_days sea mayor que cero
            $data['end_date'] = Carbon::now()->addDays($data['duration_days']);
        } else {
            $data['end_date'] = null; // O establece otro valor si no es válido
        }

        Membership::create($data);

        return Redirect::route('memberships.index')
            ->with('success', 'Membresía creada satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
     $resultado =$this->SumarDosNumros(1526,256);
     dd($resultado);

        $membership = Membership::findOrFail($id);

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
            $messageActivate = "Esta membresía está activada y aún no ha comenzado.";
            $estadoActualId = $estadoPendienteId;
        } elseif ($membership->activated == 1 && $startDate <= $now && $endDate >= $now) {
            $messageActivate = "Esta membresía está actualmente activa.";
            $estadoActualId = $estadoActivoId;
        } elseif ($membership->activated == 1 && $endDate < $now && $startDate->diffInDays($endDate) <= 7) {
            $messageActivate = "El tiempo para activar esta membresía ha pasado recientemente. Contacte con soporte.";
            $estadoActualId = $estadoVencidaRecienteId;
        } elseif ($membership->activated == 1 && $endDate < $now && $startDate->diffInDays($endDate) > 7) {
            $messageActivate = "Esta membresía está desactivada debido a que el tiempo para activarla ha expirado.";
            $estadoActualId = $estadoDesactivadaId;
        } else {
            $estadoActualId = $estadoInactivaId;
        }

        // Obtener el último historial de la membresía
        $ultimoHistorial = MembershipHistory::where('membership_id', $membership->id)
            ->latest('created_at')
            ->first();

        // Determinar si se necesita crear un nuevo registro
        $debeCrearRegistro = false;

        if (!$ultimoHistorial) {
            // Si no hay historial, se crea el primero
            $debeCrearRegistro = true;
        } else {
            // Comparar el estado actual con el último estado registrado
            if ($ultimoHistorial->membership_statuses_id != $estadoActualId) {
                $debeCrearRegistro = true;
            }
        }

        // Crear el nuevo registro si es necesario
        if ($debeCrearRegistro) {
            MembershipHistory::create([
                'id' => Str::uuid(), // No necesitas esto si usas HasUuids en el modelo MembershipHistory
                'user_id' => auth()->user()->id, // Asumiendo que tienes autenticación
                'membership_id' => $membership->id,
                'start_date' => $now->toDateString(), // Usar la fecha actual
                'membership_statuses_id' => $estadoActualId,
            ]);
        }

        $features = MembershipFeature::allActivated();

        return view('membership.show', compact('membership', 'messageActivate', 'features'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $membership = Membership::find($id);

        return view('membership.edit', compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MembershipRequest $request, Membership $membership): RedirectResponse
    {
        $data = $request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $data["is_studio_center"] =  $request->input('is_studio_center') === 'on' ? 1 : 0;
        // Establecer la fecha de inicio
        $data['duration_days'] = (int)  $data['duration_days']; // Convierte a entero

        // Luego configuras las fechas
        $data['start_date'] = Carbon::now();

        // Calcular la fecha final
        if ($data['duration_days'] > 0) { // Verifica que duration_days sea mayor que cero
            $data['end_date'] = Carbon::now()->addDays($data['duration_days']);
        } else {
            $data['end_date'] = null; // O establece otro valor si no es válido
        }
        $membership->update($data);

        return Redirect::route('memberships.index')
            ->with('success', 'Membresía actualizado satisfactoriamente');
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
        return view('membership.pricing', compact('memberships', 'features'));
    }

    public function remembership($studyCenterId): View
    {
        $memberships = Membership::allActivated();
        $studyCenter = StudyCenter::find($studyCenterId);
        return view('membership.renew_membership', compact('memberships', 'studyCenter'));
    }

    //renovar membresia
    public function renew(Request $request, $studyCenterId)
    {


        // Validar el request
        $request->validate([
            'membership_id' => 'required|exists:memberships,id',
            'payment_method' => 'required|string', // Por ejemplo: 'credit_card', 'paypal', etc.
        ]);


        // Encontrar el centro de estudio
        $studyCenter = StudyCenter::findOrFail($studyCenterId);

        // Encontrar la membresía seleccionada
        $membership = Membership::findOrFail($request->membership_id);
        $now = now();
        $features = MembershipFeature::allActivated();

        // Obtener la membresía actual del centro de estudio
        $currentMembership = $studyCenter->membership;

        // Si el centro de estudio ya tiene una membresía
        if ($currentMembership && $studyCenter->membership_id !== $membership->id) {
            // La nueva membresía es diferente a la actual, actualizamos el ID y creamos un nuevo historial
            $estadoPendienteId = MembershipStatus::where('name', 'Pendiente')->value('id');

            // Crear un nuevo historial de membresía
            $ultimoHistorial = MembershipHistory::create([
                'id' => Str::uuid(), // No necesitas esto si usas HasUuids en el modelo MembershipHistory
                'user_id' => $studyCenter->person->user->id,
                'membership_id' => $membership->id,
                'start_date' => $now, // Usar la fecha actual
                'membership_statuses_id' => $estadoPendienteId,
            ]);

            // Actualizar el ID de la membresía en el centro de estudio
            $studyCenter->membership_id = $membership->id;
            $studyCenter->update(); // Guardar los cambios en el centro de estudio

            // Mensaje de activación
            $messageActivate = $ultimoHistorial->membershipStatus->description;
            return view('membership.show', compact('membership', 'messageActivate', 'features'));
        } elseif ($currentMembership && $studyCenter->membership_id === $membership->id) {
            // Si la membresía es igual, retornar el mensaje correspondiente
            $ultimoHistorial = MembershipHistory::where('membership_id', $request->membership_id)
                ->latest('created_at')
                ->first();

            if ($ultimoHistorial) {
                $messageActivate = $ultimoHistorial->membershipStatus->description;
            } else {
                $messageActivate = 'No hay historial de membresía. Acción no requerida.';
            }

            return view('membership.show', compact('membership', 'messageActivate', 'features'));
        } else {
            $messageActivate = 'Centro de estudio no tiene una membresía activa.';
            return view('membership.show', compact('membership', 'messageActivate', 'features'));
        }
    }


    public function SumarDosNumros($numero1, $numero2) {
        $resultado =$numero1 - $numero2;
        return $resultado ." Excelente calcula. Gracias Hellen";
    }
}

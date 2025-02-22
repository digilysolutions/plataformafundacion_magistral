<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MembershipRequest;
use App\Models\MembershipFeature;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Carbon\Carbon;

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

        return view('membership.create', compact('membership'));
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
        $membership = Membership::find($id);

        return view('membership.show', compact('membership'));
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
    public function pricing(){
        $memberships = Membership::where('activated', true)->get();
        $features = MembershipFeature::where('activated', true)->get();
        return view('membership.pricing', compact('memberships','features'));
    }
}

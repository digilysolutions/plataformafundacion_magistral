<?php

namespace App\Http\Controllers;

use App\Models\StudyCenter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StudyCenterRequest;
use App\Models\District;
use App\Models\Membership;
use App\Models\Person;
use App\Models\Regional;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        StudyCenter::create($data);

        return Redirect::route('study-centers.index')
            ->with('success', 'Centro de estudio creado satisfactoriamente.');
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
        $studyCenter->update($data);
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

    public function dashboard()   {
        return view('study-center.dashboard');}


}

<?php

namespace App\Http\Controllers;

use App\Models\StudyCenter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StudyCenterRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StudyCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $studyCenters = StudyCenter::paginate();

        return view('study-center.index', compact('studyCenters'))
            ->with('i', ($request->input('page', 1) - 1) * $studyCenters->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $studyCenter = new StudyCenter();

        return view('study-center.create', compact('studyCenter'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudyCenterRequest $request): RedirectResponse
    {
        StudyCenter::create($request->validated());

        return Redirect::route('study-centers.index')
            ->with('success', 'StudyCenter creado satisfactoriamente.');
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
        $studyCenter = StudyCenter::find($id);

        return view('study-center.edit', compact('studyCenter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudyCenterRequest $request, StudyCenter $studyCenter): RedirectResponse
    {
        $studyCenter->update($request->validated());

        return Redirect::route('study-centers.index')
            ->with('success', 'StudyCenter actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        StudyCenter::find($id)->delete();

        return Redirect::route('study-centers.index')
            ->with('success', 'StudyCenter eliminado satisfactoriamente');
    }
}

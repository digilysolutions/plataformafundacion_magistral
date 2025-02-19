<?php

namespace App\Http\Controllers;

use App\Models\Specialty;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SpecialtyRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $specialties = Specialty::paginate();

        return view('specialty.index', compact('specialties'))
            ->with('i', ($request->input('page', 1) - 1) * $specialties->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $specialty = new Specialty();

        return view('specialty.create', compact('specialty'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SpecialtyRequest $request): RedirectResponse
    {
        Specialty::create($request->validated());

        return Redirect::route('specialties.index')
            ->with('success', 'Specialty created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $specialty = Specialty::find($id);

        return view('specialty.show', compact('specialty'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $specialty = Specialty::find($id);

        return view('specialty.edit', compact('specialty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SpecialtyRequest $request, Specialty $specialty): RedirectResponse
    {
        $specialty->update($request->validated());

        return Redirect::route('specialties.index')
            ->with('success', 'Specialty actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        Specialty::find($id)->delete();

        return Redirect::route('specialties.index')
            ->with('success', 'Specialty eliminado satisfactoriamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TutorRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tutors = Tutor::paginate();

        return view('tutor.index', compact('tutors'))
            ->with('i', ($request->input('page', 1) - 1) * $tutors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tutor = new Tutor();

        return view('tutor.create', compact('tutor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TutorRequest $request): RedirectResponse
    {
        Tutor::create($request->validated());

        return Redirect::route('tutors.index')
            ->with('success', 'Tutor creado satisfactoriamente.');
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

        return view('tutor.edit', compact('tutor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TutorRequest $request, Tutor $tutor): RedirectResponse
    {
        $tutor->update($request->validated());

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

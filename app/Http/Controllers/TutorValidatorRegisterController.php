<?php

namespace App\Http\Controllers;

use App\Models\TutorValidatorRegister;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TutorValidatorRegisterRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TutorValidatorRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tutorValidatorRegisters = TutorValidatorRegister::all();

        return view('tutor-validator-register.index', compact('tutorValidatorRegisters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tutorValidatorRegister = new TutorValidatorRegister();

        return view('tutor-validator-register.create', compact('tutorValidatorRegister'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TutorValidatorRegisterRequest $request): RedirectResponse
    {
         $data =$request->validated();
        TutorValidatorRegister::create($data);
dd("sssss");
        return Redirect::route('tutor-validator-registers.index')
            ->with('success', 'TutorValidatorRegister creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tutorValidatorRegister = TutorValidatorRegister::find($id);

        return view('tutor-validator-register.show', compact('tutorValidatorRegister'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tutorValidatorRegister = TutorValidatorRegister::find($id);

        return view('tutor-validator-register.edit', compact('tutorValidatorRegister'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TutorValidatorRegisterRequest $request, TutorValidatorRegister $tutorValidatorRegister): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $tutorValidatorRegister->update($data);

        return Redirect::route('tutor-validator-registers.index')
            ->with('success', 'TutorValidatorRegister actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        TutorValidatorRegister::find($id)->delete();

        return Redirect::route('tutor-validator-registers.index')
            ->with('success', 'TutorValidatorRegister eliminado satisfactoriamente');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\LevelRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $levels = Level::all();
        return view('level.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $level = new Level();

        return view('level.create', compact('level'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LevelRequest $request): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        Level::create($data);

        return Redirect::route('levels.index')
            ->with('success', 'Nivel creado satisfactoriamentes.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $level = Level::find($id);

        return view('level.show', compact('level'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $level = Level::find($id);

        return view('level.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LevelRequest $request, Level $level): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $level->update($data);

        return Redirect::route('levels.index')
            ->with('success', 'Nivel actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        Level::find($id)->delete();

        return Redirect::route('levels.index')
            ->with('success', 'Nivel eliminado satisfactoriamente');
    }
}

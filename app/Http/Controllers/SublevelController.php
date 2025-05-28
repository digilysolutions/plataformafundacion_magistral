<?php

namespace App\Http\Controllers;

use App\Models\Sublevel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\SublevelRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SublevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sublevels = Sublevel::all();

        return view('sublevel.index', compact('sublevels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $sublevel = new Sublevel();

        return view('sublevel.create', compact('sublevel'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SublevelRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        Sublevel::create($data);

        return Redirect::route('sublevels.index')
            ->with('success', 'Sublevel creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $sublevel = Sublevel::find($id);

        return view('sublevel.show', compact('sublevel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $sublevel = Sublevel::find($id);

        return view('sublevel.edit', compact('sublevel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SublevelRequest $request, Sublevel $sublevel): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $sublevel->update($data);

        return Redirect::route('sublevels.index')
            ->with('success', 'Sublevel actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        Sublevel::find($id)->delete();

        return Redirect::route('sublevels.index')
            ->with('success', 'Sublevel eliminado satisfactoriamente');
    }
}

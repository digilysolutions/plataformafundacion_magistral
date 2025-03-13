<?php

namespace App\Http\Controllers;

use App\Models\Regional;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RegionalRequest;
use App\Models\Country;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $regionals = Regional::all();

        return view('regional.index', compact('regionals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $regional = new Regional();
        $countries = Country::allActivated();

        return view('regional.create', compact('regional','countries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegionalRequest $request): RedirectResponse
    {
       
        $data =$request->validated();
        
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        Regional::create($data);

        return Redirect::route('regionals.index')
            ->with('success', 'Regional creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $regional = Regional::find($id);

        return view('regional.show', compact('regional'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $regional = Regional::find($id);
        $countries = Country::allActivated();

        return view('regional.edit', compact('regional','countries'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegionalRequest $request, Regional $regional)
    {
        $data =$request->validated();
        $data["activated"] = $request->input('activated') === 'on' ? 1 : 0;

        $regional->update($data);

        return Redirect::route('regionals.index')
            ->with('success', 'Regional actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        Regional::find($id)->delete();

        return Redirect::route('regionals.index')
            ->with('success', 'Regional eliminado satisfactoriamente');
    }
}

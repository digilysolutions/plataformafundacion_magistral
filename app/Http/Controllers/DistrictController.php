<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DistrictRequest;
use App\Models\Regional;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View    {
        $districts = District::paginate();
        return view('district.index', compact('districts'))
            ->with('i', ($request->input('page', 1) - 1) * $districts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $district = new District();
        $regionals = Regional::all();
        return view('district.create', compact('district', 'regionals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DistrictRequest $request)
    {

        $data = $request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        District::create($data);
        return Redirect::route('districts.index')
            ->with('success', 'Distrito creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $district = District::find($id);

        return view('district.show', compact('district'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $district = District::find($id);
        $regionals = Regional::all();
        return view('district.edit', compact('district', 'regionals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DistrictRequest $request, District $district): RedirectResponse
    {
        $data = $request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        $district->update($data);
        return Redirect::route('districts.index')
            ->with('success', 'Distrito actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        District::find($id)->delete();

        return Redirect::route('districts.index')
            ->with('success', 'Distrito eliminado satisfactoriamente');
    }
}

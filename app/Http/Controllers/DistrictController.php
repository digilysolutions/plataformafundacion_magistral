<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DistrictRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
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

        return view('district.create', compact('district'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DistrictRequest $request): RedirectResponse
    {
        District::create($request->validated());

        return Redirect::route('districts.index')
            ->with('success', 'District created successfully.');
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

        return view('district.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DistrictRequest $request, District $district): RedirectResponse
    {
        $district->update($request->validated());

        return Redirect::route('districts.index')
            ->with('success', 'District actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        District::find($id)->delete();

        return Redirect::route('districts.index')
            ->with('success', 'District eliminado satisfactoriamente');
    }
}

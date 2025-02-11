<?php

namespace App\Http\Controllers;

use App\Models\Regional;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RegionalRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class RegionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $regionals = Regional::paginate();

        return view('regional.index', compact('regionals'))
            ->with('i', ($request->input('page', 1) - 1) * $regionals->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $regional = new Regional();

        return view('regional.create', compact('regional'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegionalRequest $request): RedirectResponse
    {
        Regional::create($request->validated());

        return Redirect::route('regionals.index')
            ->with('success', 'Regional created successfully.');
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

        return view('regional.edit', compact('regional'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegionalRequest $request, Regional $regional): RedirectResponse
    {
        $regional->update($request->validated());

        return Redirect::route('regionals.index')
            ->with('success', 'Regional updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Regional::find($id)->delete();

        return Redirect::route('regionals.index')
            ->with('success', 'Regional deleted successfully');
    }
}

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
        $levels = Level::paginate();

        return view('level.index', compact('levels'))
            ->with('i', ($request->input('page', 1) - 1) * $levels->perPage());
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
        Level::create($request->validated());

        return Redirect::route('levels.index')
            ->with('success', 'Level created successfully.');
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
        $level->update($request->validated());

        return Redirect::route('levels.index')
            ->with('success', 'Level updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Level::find($id)->delete();

        return Redirect::route('levels.index')
            ->with('success', 'Level deleted successfully');
    }
}

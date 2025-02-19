<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MembershipRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $memberships = Membership::paginate();

        return view('membership.index', compact('memberships'))
            ->with('i', ($request->input('page', 1) - 1) * $memberships->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $membership = new Membership();

        return view('membership.create', compact('membership'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MembershipRequest $request): RedirectResponse
    {
        Membership::create($request->validated());

        return Redirect::route('memberships.index')
            ->with('success', 'Membership created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $membership = Membership::find($id);

        return view('membership.show', compact('membership'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $membership = Membership::find($id);

        return view('membership.edit', compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MembershipRequest $request, Membership $membership): RedirectResponse
    {
        $membership->update($request->validated());

        return Redirect::route('memberships.index')
            ->with('success', 'Membership actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        Membership::find($id)->delete();

        return Redirect::route('memberships.index')
            ->with('success', 'Membership eliminado satisfactoriamente');
    }
}

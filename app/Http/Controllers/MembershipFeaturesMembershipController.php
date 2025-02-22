<?php

namespace App\Http\Controllers;

use App\Models\MembershipFeaturesMembership;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MembershipFeaturesMembershipRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MembershipFeaturesMembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $membershipFeaturesMemberships = MembershipFeaturesMembership::all();

        return view('membership-features-membership.index', compact('membershipFeaturesMemberships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $membershipFeaturesMembership = new MembershipFeaturesMembership();

        return view('membership-features-membership.create', compact('membershipFeaturesMembership'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MembershipFeaturesMembershipRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        MembershipFeaturesMembership::create($data);

        return Redirect::route('membership-features-memberships.index')
            ->with('success', 'MembershipFeaturesMembership creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $membershipFeaturesMembership = MembershipFeaturesMembership::find($id);

        return view('membership-features-membership.show', compact('membershipFeaturesMembership'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $membershipFeaturesMembership = MembershipFeaturesMembership::find($id);

        return view('membership-features-membership.edit', compact('membershipFeaturesMembership'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MembershipFeaturesMembershipRequest $request, MembershipFeaturesMembership $membershipFeaturesMembership): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $membershipFeaturesMembership->update($data);

        return Redirect::route('membership-features-memberships.index')
            ->with('success', 'MembershipFeaturesMembership actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        MembershipFeaturesMembership::find($id)->delete();

        return Redirect::route('membership-features-memberships.index')
            ->with('success', 'MembershipFeaturesMembership eliminado satisfactoriamente');
    }
}

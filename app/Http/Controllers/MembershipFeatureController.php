<?php

namespace App\Http\Controllers;

use App\Models\MembershipFeature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MembershipFeatureRequest;
use App\Models\Membership;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MembershipFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request):View
    {

        $membershipFeatures = MembershipFeature::all();
        return view('membership-feature.index', compact('membershipFeatures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $membershipFeature = new MembershipFeature();

        return view('membership-feature.create', compact('membershipFeature'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MembershipFeatureRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        MembershipFeature::create($data);

        return Redirect::route('membership-features.index')
            ->with('success', 'MembershipFeature creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $membershipFeature = MembershipFeature::find($id);

        return view('membership-feature.show', compact('membershipFeature'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $membershipFeature = MembershipFeature::find($id);

        return view('membership-feature.edit', compact('membershipFeature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MembershipFeatureRequest $request, MembershipFeature $membershipFeature): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $membershipFeature->update($data);

        return Redirect::route('membership-features.index')
            ->with('success', 'MembershipFeature actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        MembershipFeature::find($id)->delete();

        return Redirect::route('membership-features.index')
            ->with('success', 'MembershipFeature eliminado satisfactoriamente');
    }
}

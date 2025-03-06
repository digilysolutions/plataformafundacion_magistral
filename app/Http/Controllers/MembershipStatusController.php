<?php

namespace App\Http\Controllers;

use App\Models\MembershipStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MembershipStatusRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MembershipStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $membershipStatuses = MembershipStatus::all();

        return view('membership-status.index', compact('membershipStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $membershipStatus = new MembershipStatus();

        return view('membership-status.create', compact('membershipStatus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MembershipStatusRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        MembershipStatus::create($data);

        return Redirect::route('membership-statuses.index')
            ->with('success', 'MembershipStatus creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $membershipStatus = MembershipStatus::find($id);

        return view('membership-status.show', compact('membershipStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $membershipStatus = MembershipStatus::find($id);

        return view('membership-status.edit', compact('membershipStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MembershipStatusRequest $request, MembershipStatus $membershipStatus): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $membershipStatus->update($data);

        return Redirect::route('membership-statuses.index')
            ->with('success', 'MembershipStatus actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        MembershipStatus::find($id)->delete();

        return Redirect::route('membership-statuses.index')
            ->with('success', 'MembershipStatus eliminado satisfactoriamente');
    }
}

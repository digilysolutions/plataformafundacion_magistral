<?php

namespace App\Http\Controllers;

use App\Models\MembershipPaymentStatus;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MembershipPaymentStatusRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MembershipPaymentStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $membershipPaymentStatuses = MembershipPaymentStatus::paginate();

        return view('membership-payment-status.index', compact('membershipPaymentStatuses'))
            ->with('i', ($request->input('page', 1) - 1) * $membershipPaymentStatuses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $membershipPaymentStatus = new MembershipPaymentStatus();

        return view('membership-payment-status.create', compact('membershipPaymentStatus'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MembershipPaymentStatusRequest $request): RedirectResponse
    {
        MembershipPaymentStatus::create($request->validated());

        return Redirect::route('membership-payment-statuses.index')
            ->with('success', 'MembershipPaymentStatus created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $membershipPaymentStatus = MembershipPaymentStatus::find($id);

        return view('membership-payment-status.show', compact('membershipPaymentStatus'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $membershipPaymentStatus = MembershipPaymentStatus::find($id);

        return view('membership-payment-status.edit', compact('membershipPaymentStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MembershipPaymentStatusRequest $request, MembershipPaymentStatus $membershipPaymentStatus): RedirectResponse
    {
        $membershipPaymentStatus->update($request->validated());

        return Redirect::route('membership-payment-statuses.index')
            ->with('success', 'MembershipPaymentStatus updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        MembershipPaymentStatus::find($id)->delete();

        return Redirect::route('membership-payment-statuses.index')
            ->with('success', 'MembershipPaymentStatus deleted successfully');
    }
}

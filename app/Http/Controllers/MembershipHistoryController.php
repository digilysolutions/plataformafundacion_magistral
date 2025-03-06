<?php

namespace App\Http\Controllers;

use App\Models\MembershipHistory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MembershipHistoryRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MembershipHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $membershipHistories = MembershipHistory::all();

        return view('membership-history.index', compact('membershipHistories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $membershipHistory = new MembershipHistory();

        return view('membership-history.create', compact('membershipHistory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MembershipHistoryRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        MembershipHistory::create($data);

        return Redirect::route('membership-histories.index')
            ->with('success', 'MembershipHistory creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $membershipHistory = MembershipHistory::find($id);

        return view('membership-history.show', compact('membershipHistory'));
    }
    public function showToUser($userId): View
    {
        $membershipHistories = MembershipHistory::where('user_id', $userId)->get();

        return view('membership-history.show-membership-user', compact('membershipHistories'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $membershipHistory = MembershipHistory::find($id);

        return view('membership-history.edit', compact('membershipHistory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MembershipHistoryRequest $request, MembershipHistory $membershipHistory): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $membershipHistory->update($data);

        return Redirect::route('membership-histories.index')
            ->with('success', 'MembershipHistory actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        MembershipHistory::find($id)->delete();

        return Redirect::route('membership-histories.index')
            ->with('success', 'MembershipHistory eliminado satisfactoriamente');
    }
}

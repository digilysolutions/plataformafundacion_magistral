<?php

namespace App\Http\Controllers;

use App\Models\ItemsPisa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ItemsPisaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ItemsPisaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $itemsPisas = ItemsPisa::all();

        return view('items-pisa.index', compact('itemsPisas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $itemsPisa = new ItemsPisa();

        return view('items-pisa.create', compact('itemsPisa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemsPisaRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        ItemsPisa::create($data);

        return Redirect::route('items-pisas.index')
            ->with('success', 'ItemsPisa creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $itemsPisa = ItemsPisa::find($id);

        return view('items-pisa.show', compact('itemsPisa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $itemsPisa = ItemsPisa::find($id);

        return view('items-pisa.edit', compact('itemsPisa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ItemsPisaRequest $request, ItemsPisa $itemsPisa): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $itemsPisa->update($data);

        return Redirect::route('items-pisas.index')
            ->with('success', 'ItemsPisa actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        ItemsPisa::find($id)->delete();

        return Redirect::route('items-pisas.index')
            ->with('success', 'ItemsPisa eliminado satisfactoriamente');
    }
}

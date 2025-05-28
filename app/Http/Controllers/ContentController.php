<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ContentRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $contents = Content::all();

        return view('content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $content = new Content();

        return view('content.create', compact('content'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContentRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        Content::create($data);

        return Redirect::route('contents.index')
            ->with('success', 'Content creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $content = Content::find($id);

        return view('content.show', compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $content = Content::find($id);

        return view('content.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContentRequest $request, Content $content): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $content->update($data);

        return Redirect::route('contents.index')
            ->with('success', 'Content actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        Content::find($id)->delete();

        return Redirect::route('contents.index')
            ->with('success', 'Content eliminado satisfactoriamente');
    }
}

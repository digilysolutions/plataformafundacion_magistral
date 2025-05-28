<?php

namespace App\Http\Controllers;

use App\Models\AnswersPisa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnswersPisaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AnswersPisaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $answersPisas = AnswersPisa::all();

        return view('answers-pisa.index', compact('answersPisas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $answersPisa = new AnswersPisa();

        return view('answers-pisa.create', compact('answersPisa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnswersPisaRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        AnswersPisa::create($data);

        return Redirect::route('answers-pisas.index')
            ->with('success', 'AnswersPisa creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $answersPisa = AnswersPisa::find($id);

        return view('answers-pisa.show', compact('answersPisa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $answersPisa = AnswersPisa::find($id);

        return view('answers-pisa.edit', compact('answersPisa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnswersPisaRequest $request, AnswersPisa $answersPisa): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $answersPisa->update($data);

        return Redirect::route('answers-pisas.index')
            ->with('success', 'AnswersPisa actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        AnswersPisa::find($id)->delete();

        return Redirect::route('answers-pisas.index')
            ->with('success', 'AnswersPisa eliminado satisfactoriamente');
    }
}

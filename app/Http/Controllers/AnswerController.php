<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $answers = Answer::all();

        return view('answer.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $answer = new Answer();

        return view('answer.create', compact('answer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnswerRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        $data['name'] =$request->answer;
        Answer::create($data);

        return Redirect::route('answers.index')
            ->with('success', 'Answer creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $answer = Answer::find($id);

        return view('answer.show', compact('answer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $answer = Answer::find($id);

        return view('answer.edit', compact('answer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnswerRequest $request, Answer $answer): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $answer->update($data);

        return Redirect::route('answers.index')
            ->with('success', 'Answer actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        Answer::find($id)->delete();

        return Redirect::route('answers.index')
            ->with('success', 'Answer eliminado satisfactoriamente');
    }
}

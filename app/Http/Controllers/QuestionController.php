<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use App\Models\Level;
use App\Models\Specialty;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $questions = Question::all();
        return view('question.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $question = new Question();
        $specialties = Specialty::allActivated();
        $levels = Level::allActivated();

        return view('question.create', compact('question','levels','specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(QuestionRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        Question::create($data);

        return Redirect::route('questions.index')
            ->with('success', 'Question creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $question = Question::find($id);

        return view('question.show', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $question = Question::find($id);

        return view('question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(QuestionRequest $request, Question $question): RedirectResponse
    {
        $data = $request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $question->update($data);

        return Redirect::route('questions.index')
            ->with('success', 'Question actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        Question::find($id)->delete();

        return Redirect::route('questions.index')
            ->with('success', 'Question eliminado satisfactoriamente');
    }
}

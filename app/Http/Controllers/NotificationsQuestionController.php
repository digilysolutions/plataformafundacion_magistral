<?php

namespace App\Http\Controllers;

use App\Models\NotificationsQuestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NotificationsQuestionRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NotificationsQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $notificationsQuestions = NotificationsQuestion::all();

        return view('notifications-question.index', compact('notificationsQuestions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $notificationsQuestion = new NotificationsQuestion();

        return view('notifications-question.create', compact('notificationsQuestion'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificationsQuestionRequest $request): RedirectResponse
    {
         $data =$request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;
        NotificationsQuestion::create($data);

        return Redirect::route('notifications-questions.index')
            ->with('success', 'NotificationsQuestion creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $notificationsQuestion = NotificationsQuestion::find($id);

        return view('notifications-question.show', compact('notificationsQuestion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $notificationsQuestion = NotificationsQuestion::find($id);

        return view('notifications-question.edit', compact('notificationsQuestion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotificationsQuestionRequest $request, NotificationsQuestion $notificationsQuestion): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $notificationsQuestion->update($data);

        return Redirect::route('notifications-questions.index')
            ->with('success', 'NotificationsQuestion actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        NotificationsQuestion::find($id)->delete();

        return Redirect::route('notifications-questions.index')
            ->with('success', 'NotificationsQuestion eliminado satisfactoriamente');
    }
}

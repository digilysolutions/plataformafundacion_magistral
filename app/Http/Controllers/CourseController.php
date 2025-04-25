<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CourseRequest;
use App\Models\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $courses = Course::all();

        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $course = new Course();

        return view('course.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request): RedirectResponse
    {
        $data =$request->validated();
        $data['activated'] = $request->input('activated') === 'on' ? 1 : 0;

        return Redirect::route('courses.index')
            ->with('success', 'Curso creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $course = Course::find($id);

        return view('course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $course = Course::find($id);

        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, Course $course): RedirectResponse
    {
        $data =$request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        $course->update($data);

        return Redirect::route('courses.index')
            ->with('success', 'Curso actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        Course::find($id)->delete();

        return Redirect::route('courses.index')
            ->with('success', 'Curso eliminado satisfactoriamente');
    }
}

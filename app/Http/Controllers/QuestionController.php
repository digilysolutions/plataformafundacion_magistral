<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use App\Mail\SentMailToValidatorValidateItem;
use App\Models\Answer;
use App\Models\Level;
use App\Models\NotificationsQuestion;
use App\Models\Specialty;
use App\Models\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator as ValidatorFacades;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
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

        return view('question.create', compact('question', 'levels', 'specialties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validación
        $validator = ValidatorFacades::make($request->all(), [
            'question' => 'required|string|max:255',
            'specialty_id' => 'required',
            'level_id' => 'required',
            'answers.*.answer' => 'required|string|max:255',
            'answers' => 'required|array|min:2', // Asegura que haya al menos dos respuestas
            'correct_answer' => 'required|integer|between:0,' . (count($request->answers) - 1), // Asegura que se seleccione una respuesta correcta
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        DB::beginTransaction();
        try {
            $id = Str::uuid();

            // Crear la Pregunta
            $question = Question::create([
                'name' => $request->question,// Generar y asignar un UUID
                'question' => $request->question,
                'specialty_id' => $request->specialty_id,
                'level_id' => $request->level_id,
                'activated' => $request->input('activated') === 'on' ? 1 : 0,
                'state' => 'En Proceso',
            ]);


            // Guardar Respuestas
            foreach ($request->answers as $key => $answer) {

                Answer::create([

                    'name' =>  $answer['answer'],
                    'question_id' => $question->id,
                    'answer' => $answer['answer'],
                    'is_correct' => $key == $request->correct_answer, // Determina si la respuesta es correcta
                    'activated' => true,
                ]);

            }
            //Buscar el validador que tenga la misma especialidad  y enviar el correo

            $validator = Validator::where('specialty_id', $question->specialty_id)->first();
            NotificationsQuestion::create([
                'question_id' => $question->id,
                'validator_id' =>$validator->id,
                'action' => 'ha sido creada una nueva pregunta para su revisión.',
                'is_read' => false,
            ]);

            // Enviar correo al validador para revisar el items
              Mail::to($validator->person->email)->send(new SentMailToValidatorValidateItem($question, $validator ));

            DB::commit();
            return redirect()->route('questions.index')->with('success', 'Pregunta creada exitosamente.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => 'Ocurrió un error al procesar el Item ' . $e->getMessage()]); // Muestra el mensaje de error que ocurrió
        }
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
        $specialties = Specialty::allActivated();
        $levels = Level::allActivated();
        return view('question.edit', compact('question','specialties','levels'));
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

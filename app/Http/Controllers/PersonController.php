<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PersonRequest;
use App\Mail\SendEmailwhitCode;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $people = Person::all();
        return view('person.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $person = new Person();

        return view('person.create', compact('person'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request): RedirectResponse
    {
        $data = $request->all();
        $data["activated"] =  $request->input('activated') === 'on' ? 1 : 0;
        Person::create($data);

        return Redirect::route('people.index')
            ->with('success', 'Person creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $message = null;
        $person = Person::find($id);
        if (empty($person))
            $message = "No existe la persona";
        return view('person.show', compact('person', "message"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $person = Person::find($id);

        return view('person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Person $person): RedirectResponse
    {
        $person->update($request->validated());

        return Redirect::route('people.index')
            ->with('success', 'Person actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        Person::find($id)->delete();

        return Redirect::route('people.index')
            ->with('success', 'Person eliminado satisfactoriamente');
    }
    public function createCode() {}
    public function sendEmailWhithCode(Request $request)
    {
        
        try {
            DB::beginTransaction();
            // Obtener el correo desde el request
            $email = $request->email;
            
            // Encontrar el usuario usando el correo
            $user = User::where('email', $email)->first();
            if ($user) {
                $user->verification_token = Str::random(40);
                $user->verification_code = random_int(100000, 999999);                  
                $user->save();
                $person = $user?->person;
                Mail::to($user->email)->send(new SendEmailwhitCode($user, $person));
                DB::commit();
                return redirect()->route('login')->with('status', "Te hemos enviado un correo electrónico con todas las instrucciones necesarias para que puedas verificar tu cuenta de manera sencilla y rápida.");
            }
            return redirect()->route('login')->withErrors(['error'=> "Error, no existe el correo"]);
        } catch (\Exception $e) 
        {
            DB::rollback();
            
            return back()->withErrors(['error' => 'Ocurrió un error al enviar el código de seguimiento ']); // Muestra el mensaje de error que ocurrió
        }
    }
}

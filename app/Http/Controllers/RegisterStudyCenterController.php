<?php

namespace App\Http\Controllers;

use App\Models\RegisterStudyCenter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterStudyCenterRequest;
use App\Mail\VerificationEmailStudyCenter;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;

class RegisterStudyCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $registerStudyCenters = RegisterStudyCenter::all();

        return view('register-study-center.index', compact('registerStudyCenters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $registerStudyCenter = new RegisterStudyCenter();
        return view('register-study-center.create', compact('registerStudyCenter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(RegisterStudyCenterRequest $request): RedirectResponse
    {
        return $this->processStore($request);
    }
    public function processStore(RegisterStudyCenterRequest $request): RedirectResponse
{
    $data = $request->validated();

    DB::beginTransaction();
    try {
        $password = Str::random(10); // Genera una contraseña aleatoria de 10 caracteres
        $user = User::create([
            'name' => $request->name,
            'email' => $request->mail,
            'activated' => true,
            'password' => Hash::make($password),
            'verification_token' => Str::random(40),
            'verification_code' => random_int(100000, 999999),
            'membership_id' => 'BA0001',
            'role' => 'Centro Educativo',
            'roleid' => 1,
        ]);

        $studyCenter = RegisterStudyCenter::create($data);
        event(new Registered($user));

        Mail::to($user->email)->send(new VerificationEmailStudyCenter($user, $studyCenter));

        DB::commit();
        return redirect()->route('thankYouStudyCenter');
    } catch (\Exception $e) {
        DB::rollback();
        return back()->withErrors(['error' => 'Ocurrió un error al procesar la solicitud: ' . $e->getMessage()]);
    }
}
    public function thankYou()
    {
        return view('register-study-center.thankyouStudyCenter');
    }
    /*
     // Envío de correo al administrador
       Mail::raw("Se ha solicitado el registro del centro educativo: {$studyCenter->name} con el correo: {$studyCenter->name}.", function ($message) {
           $message->to('yrpiloto@gmail.com')->subject('Nueva Solicitud de Registro de Centro Educativo');
       });
        return Redirect::route('register-study-centers.index')
            ->with('success', 'RegisterStudyCenter creado satisfactoriamente.');

    */

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $registerStudyCenter = RegisterStudyCenter::find($id);

        return view('register-study-center.show', compact('registerStudyCenter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $registerStudyCenter = RegisterStudyCenter::find($id);

        return view('register-study-center.edit', compact('registerStudyCenter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegisterStudyCenterRequest $request, RegisterStudyCenter $registerStudyCenter): RedirectResponse
    {
        $data = $request->all();
        $registerStudyCenter->update($data);

        return Redirect::route('register-study-centers.index')
            ->with('success', 'RegisterStudyCenter actualizado satisfactoriamente');
    }

    public function destroy($id): RedirectResponse
    {
        RegisterStudyCenter::find($id)->delete();

        return Redirect::route('register-study-centers.index')
            ->with('success', 'RegisterStudyCenter eliminado satisfactoriamente');
    }
}

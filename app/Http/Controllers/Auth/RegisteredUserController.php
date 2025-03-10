<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Mail\VerificationEmail;
use App\Models\Person;
use App\Models\Student;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'activated' => true,
            'password' => Hash::make($request->password),
            'verification_token' => Str::random(40),
            'role' => 'Usuario',
            'roleid' => 6
        ]);

        $person = Person::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'lastname' => $request->lastname,
                'phone' => $request->lastname,
                'activated' => true,
                'user_id' => $user->id
            ]
        );

        $student = Student::create(
            [
                'name' => $request->name,
                'activated' => true,
                'course' => $request->course,
                'people_id' =>$person->id,
                'membership_id' =>null,


            ]
        );

        event(new Registered($user));
        Auth::login($user);
        Mail::to($user->email)->send(new VerificationEmail($user));
        return redirect()->route('user.dashboard');

      //  return redirect(route('dashboard', absolute: false));
    }
}

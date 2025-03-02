<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        Log::info("Authen ..controller create");
        if (!Auth::check())
            return view('auth.login');

            else
            $roleid = Auth::user()->roleid;

            // Redirigir al dashboard correspondiente
            switch ($roleid) {
                case 1:
                    Log::info("Cao 1");
                    return redirect()->route('study-center.dashboard');
                case 2:
                    Log::info("Cao 2");
                    return redirect()->route('student.dashboard');
                case 3:
                    Log::info("Cao 3");
                    return redirect()->route('tutor.dashboard');
                case 4:
                    Log::info("Cao 4");
                    return redirect()->route('validator.dashboard');
                case 5:
                    Log::info("Cao 5");
                    return redirect()->route('admin.dashboard');
                    Log::info("Cao 6");
                case 6:
                    return redirect()->route('user.dashboard');
                default:
                    return redirect('/');
            }

    }

    /**
     * Handle an incoming authentication request.
     */
    /* public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }*/

    public function store(Request $request)
    {
        Log::info("Authen ..controller store");

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = Auth::attempt($request->only('email', 'password'));

        if ($user) {
            // Obtener el rol del usuario

            $roleid = Auth::user()->roleid;

            // Redirigir al dashboard correspondiente
            switch ($roleid) {
                case 1:
                    Log::info("Cao 1");
                    return redirect()->route('study-center.dashboard');
                case 2:
                    Log::info("Cao 2");
                    return redirect()->route('student.dashboard');
                case 3:
                    Log::info("Cao 3");
                    return redirect()->route('tutor.dashboard');
                case 4:
                    Log::info("Cao 4");
                    return redirect()->route('validator.dashboard');
                case 5:
                    Log::info("Cao 5");
                    return redirect()->route('admin.dashboard');
                    Log::info("Cao 6");
                case 6:
                    return redirect()->route('user.dashboard');
                default:
                    return redirect('/');
            }
        }

        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

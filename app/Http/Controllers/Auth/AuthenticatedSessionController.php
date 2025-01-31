<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
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
                    return redirect()->route('educationalcenter.dashboard');
                case 2:
                    return redirect()->route('student.dashboard');
                case 3:
                    return redirect()->route('tutor.dashboard');
                case 4:

                    return redirect()->route('validator.dashboard');
                case 5:
                    return redirect()->route('admin.dashboard');
                case 6:
                    return redirect()->route('user.dashboard');
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

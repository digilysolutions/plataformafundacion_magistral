<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(route('dashboard', absolute: false) . '?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(route('dashboard', absolute: false) . '?verified=1');
    }
    public function handleInvalidToken($email)
    {
        return redirect()->route('login')->with([
            'error' => 'El token de verificación es inválido o ha expirado. Por favor, solicita un nuevo enlace de verificación.'
        ]);
    }

    /**
     * Resend the verification email to the user.
     */
    public function resendVerificationEmail(Request $request,$verificationEmail)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();

        if ($user && !$user->hasVerifiedEmail()) {
            // Regenera el token de verificación
            $user->verification_token = Str::random(40);
            $user->save();

            // Envía el correo de verificación
            Mail::to($user->email)->send($verificationEmail);

            return redirect()->back()->with('status', 'Se ha enviado un nuevo enlace de verificación a tu correo.');
        }

        return redirect()->back()->with('error', 'El correo proporcionado no está registrado o ya ha verificado su correo.');
    }
}

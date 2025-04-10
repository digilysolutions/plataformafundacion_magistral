<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

trait EmailVerificationTrait
{
    /**
     * Resend the verification email to the user.
     */
    public function resendVerificationEmail(Request $request, $verificationEmail)
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

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        try {
            return Socialite::driver('google')->redirect();
        } catch (\Exception $e) {
            Log::error('Error durante la redirección a Google: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Hubo un problema al intentar autenticarse.');
        }
    }

    public function handleGoogleCallback()
    {
        try {
            // Intenta obtener el usuario de Google
            $user = Socialite::driver('google')->user();

            // Verifica si el objeto usuario es nulo
            if (!$user) {
                return redirect()->route('login')->with('error', 'No se pudo obtener la información del usuario.');
            }

            // Busca el usuario en la base de datos
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                // Si el usuario ya existe, iniciar sesión
                Auth::login($finduser);
                return redirect()->intended('dashboard');
            } else {
                // Si no existe, crea un nuevo usuario
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy'), // Considera usar una mejor manera de manejar contraseñas
                ]);

                // Inicia sesión con el nuevo usuario
                Auth::login($newUser);
                return redirect()->intended('dashboard');
            }
        } catch (\Exception $e) {
            // Manejo de excepciones
            Log::error('Error de inicio de sesión con Google: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Algo salió mal durante el proceso de autenticación. Por favor, intenta nuevamente.');
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\SendEmailToGoogle;
use App\Models\Person;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        try {
            // Intenta obtener el usuario de Google
            $user = Socialite::driver('google')->user();

            // Busca el usuario en la base de datos
            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                return redirect()->route('login')->with('status', "Ya tienes una cuenta registrada con Google. Por favor, inicia sesión para continuar.");
            } else {
                $password = Str::random(10);
                // Si no existe, crea un nuevo usuario
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'role' => 'Usuario',
                    'roleid' => 6,
                    'membership_id'=>'BA0001',
                    'password' => Hash::make( $password ), // Considera usar una mejor manera de manejar contraseñas
                ]);
                $person = Person::create(
                    [
                        'name' => $user->name,
                        'email' => $user->email,
                        'activated' => true,
                        'user_id' => $newUser->id
                    ]
                );
                $student = Student::create(
                    [
                        'name' => $user->name,
                        'activated' => true,
                        'people_id' => $person->id,
                        'membership_id'=>'BA0001',
                    ]
                );
                Mail::to($user->email)->send(new SendEmailToGoogle($person, $password));
                return redirect()->route('login')->with('status', "Tu registro ha sido exitoso. Ahora puedes iniciar sesión con tu cuenta de Google. Tu código de seguimiento y contraseña ha sido enviado a tu correo electrónico.");
            }
        } catch (\Exception $e) {
            // Manejo de excepciones
            Log::error('Error de inicio de sesión con Google: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Algo salió mal durante el proceso de autenticación. Por favor, intenta nuevamente.'. $e->getMessage());
        }
    }
}

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
use Illuminate\Support\Facades\DB;

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

            // Busca en la base de datos un usuario con el mismo google_id
            $finduser = User::where('google_id', $user->id)->first();

            // Verifica si ya existe un usuario con ese email
            $userEmailExists = User::where('email', $user->email)->first();

            if ($finduser) {
                // Usuario ya registrado con ese google_id
                return redirect()->route('login')->with('status', "Ya tienes una cuenta registrada con Google. Por favor, inicia sesión para continuar.");
            } elseif ($userEmailExists) {
                // El correo ya está en uso por otro usuario
                return redirect()->route('login')->with('error', "El correo electrónico {$user->email} ya está en uso por otra cuenta. Por favor, inicia sesión con esa cuenta o contacta al administrador.");
            } else {
                DB::beginTransaction();
                $password = Str::random(10);
                // Si no existe, crea un nuevo usuario
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'role' => 'Usuario',
                    'roleid' => 6,
                    'membership_id' => 'BA0001',
                    'password' => Hash::make($password), // Considera usar una mejor manera de manejar contraseñas
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
                        'membership_id' => 'BA0001',
                    ]
                );
                Mail::to($user->email)->send(new SendEmailToGoogle($person, $password));
                DB::commit();
                return redirect()->route('login')->with('status', "Tu registro ha sido exitoso. Ahora puedes iniciar sesión con tu cuenta de Google. Tu código de seguimiento y contraseña ha sido enviado a tu correo electrónico.");
            }
        } catch (\Exception $e) {
            DB::rollback();
            // Manejo de excepciones
            Log::error('Error de inicio de sesión con Google: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'Algo salió mal durante el proceso de autenticación. Por favor, intenta nuevamente.' . $e->getMessage());
        }
    }
}

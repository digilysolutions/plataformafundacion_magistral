<?php

use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/setup-permissions', function () {
    $role = Role::create(['name' => 'admin']);
    $permission = Permission::create(['name' => 'edit articles']);

    $role->givePermissionTo($permission);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('auth/google/callback', function () {
    $user = Socialite::driver('google')->user();
    // Aquí debes manejar la lógica de registro/autenticación
});

Route::get('auth/facebook', function () {
    return Socialite::driver('facebook')->redirect();
});

Route::get('auth/facebook/callback', function () {
    $user = Socialite::driver('facebook')->user();
    // Aquí debes manejar la lógica de registro/autenticación
});

Route::get('auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();
    $user = User::where('email', $googleUser->getEmail())->first();

    if (!$user) {
        $user = User::create([
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'password' => bcrypt(str_random(10)),
        ]);
    }

    Auth::login($user);
    return redirect('/home'); // Redirigir a la ruta deseada
});

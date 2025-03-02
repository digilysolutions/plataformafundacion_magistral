<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MembershipFeatureController;
use App\Http\Controllers\MembershipFeaturesMembershipController;
use App\Http\Controllers\MembershipPaymentStatusController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudyCenterController;
use App\Http\Controllers\TutorController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;
/*
Route::get('/', function () {
    return view('auth.login');
});*/

//Inicio de sesión
/*Route::get('/login', function () {
    return view('auth.login');
})->name('login');
*/

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');
Route::get('/error404', function () {
    return view('error404'); // Asegúrate de tener este view creado
});
Route::get('/notaccess', function () {
    return view('not-access'); // Asegúrate de tener este view creado
});
//Registro (register):
Route::get('register', function () {
    return view('auth.register');
})->name('register');

//Recuperación de contraseña (forgot-password):
Route::get('forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

//Restablecimiento de contraseña (reset-password):
Route::get('reset-password/{token}', function () {
    return view('auth.reset-password');
})->name('password.reset');

// Rutas de inicio de sesión
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');
    Route::get('/', [AuthenticatedSessionController::class, 'create']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Rutas de registro
Route::get('/register', [RegisteredUserController::class, 'create'])
    ->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Rutas de recuperación de contraseña
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

// Rutas de restablecimiento de contraseña
Route::get('reset-password/{token}', [PasswordResetLinkController::class, 'edit'])
    ->name('password.reset');
Route::post('reset-password', [PasswordResetLinkController::class, 'update'])
    ->name('password.update');
/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/

//Route::resource('levels', LevelController::class)->middleware('roles:Administrador');





/*

Route::group(['middleware' => ['role:Administrador']], function () {


    // otras rutas
});
Route::middleware('roles:Administrator')->group(function () {

});*/
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //---------nuevas rutas
    Route::resource('people', PersonController::class);
    Route::resource('levels', LevelController::class)->middleware('role:Administrador');
    Route::resource('memberships', MembershipController::class);
    Route::get('/pricing', [MembershipController::class, 'pricing'])->name('membership.pricing');
    Route::resource('membership-features', MembershipFeatureController::class);
    Route::resource('membership-features-memberships', MembershipFeaturesMembershipController::class);


    Route::resource('tutors', TutorController::class);
    Route::resource('membership-payment-statuses', MembershipPaymentStatusController::class);

    Route::resource('study-centers', StudyCenterController::class)->middleware('role:Administrador');
    Route::resource('students', StudentController::class);
    Route::get('/students/activate/{tracking_code}', [StudentController::class, 'activate'])->name('students.activate');
    Route::post('/students/updatePassword', [StudentController::class, 'updatePassword'])->name('students.update_password');


    Route::get('/study-center/dashboard', [StudyCenterController::class, 'dashboard'])->name('study-center.dashboard');

    Route::get('/distritos/{regional_id}', [StudyCenterController::class, 'getDistritos']);


    //Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboardAmdin'])->name('admin.dashboard');
    Route::resource('specialties', SpecialtyController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('regionals', RegionalController::class);
    Route::resource('districts', DistrictController::class);
    ///-------End nuevas rutass
});

/*

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/study-center/dashboard', function () {
        return view('study-center.dashboard'); // Vista para el dashboard del admin
    })->name('study-center.dashboard');

    // Dashboard para el estudiante
    Route::get('/student/dashboard', function () {
        return view('student.dashboard'); // Vista para el dashboard del usuario
    })->name('student.dashboard');

    // Dashboard para el tutor
    Route::get('/tutor/dashboard', function () {
        return view('tutor.dashboard'); // Vista para el dashboard del usuario
    })->name('tutor.dashboard');



    // Dashboard para el      // Dashboard para el validator
    Route::get('/user/dashboard', function () {
        return view('user.dashboard'); // Vista para el dashboard del usuario
    })->name('user.dashboard');

    Route::get('/validator/dashboard', function () {
        return view('validator.dashboard'); // Vista para el dashboard del usuario
    })->name('validator.dashboard');
});*/

Route::get('login/google', [GoogleController::class, 'redirectToGoogle'])->name('login.google');
Route::get('auth/google-callback', [GoogleController::class, 'handleGoogleCallback']);


/*
Route::middleware(['auth', 'verified','user.role'])->group(function () {
    // Dashboard para el centro educativo
    Route::get('/educationalcenter/dashboard', function () {
        return view('educational_center.dashboard'); // Vista para el dashboard del admin
    })->name('educationalcenter.dashboard');

    // Dashboard para el estudiante
    Route::get('/student/dashboard', function () {
        return view('student.dashboard'); // Vista para el dashboard del usuario
    })->name('student.dashboard')->middleware('user.role');

    // Dashboard para el tutor
    Route::get('/tutor/dashboard', function () {
        return view('tutor.dashboard'); // Vista para el dashboard del usuario
    })->name('tutor.dashboard');

    // Dashboard para el usuario normal
    Route::get('/admin/dashboard', function () {
        return view('dashboard'); // Vista para el dashboard del usuario
    })->name('admin.dashboard');

    // Dashboard para el      // Dashboard para el validator
    Route::get('/user/dashboard', function () {
        return view('user.dashboard'); // Vista para el dashboard del usuario
    })->name('user.dashboard');

    Route::get('/validator/dashboard', function () {
        return view('validator.dashboard'); // Vista para el dashboard del usuario
    })->name('validator.dashboard');
});
*/


require __DIR__ . '/auth.php';

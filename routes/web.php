<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\MembershipFeatureController;
use App\Http\Controllers\MembershipFeaturesMembershipController;
use App\Http\Controllers\MembershipHistoryController;
use App\Http\Controllers\MembershipPaymentStatusController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\RegisterStudyCenterController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudyCenterController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidatorController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\MembershipHistory;
use Illuminate\Support\Facades\Route;
use App\Exports\StudentsExport;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\NotificationsQuestionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\TutorValidatorRegisterController;
use App\Models\Validator;
use Maatwebsite\Excel\Facades\Excel;


Route::get('/', function () {
    return view('home');
});

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth');
Route::get('/error404', function () {
    return view('error404'); // Asegúrate de tener este view creado
});
Route::get('/not-access', function () {
    return view('not-access')->name('access.denied'); // Asegúrate de tener este view creado
});
//Registro (register):
Route::get('register', function () {
    return view('register');
})->name('register');

//Recuperación de contraseña (forgot-password):
Route::get('forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

//Restablecimiento de contraseña (reset-password):
Route::get('reset-password/{token}', function () {
    return view('auth.reset-password');
})->name('password.reset');


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
Route::get('/verify/{token}', [RegisteredUserController::class, 'verify'])->name('verify');
Route::get('/verify/code/{token}', [RegisteredUserController::class, 'verifyTokenToCode'])->name('verifyTokenToCode');
Route::post('/verify-code', [RegisteredUserController::class, 'verifyToCode'])->name('verify.code');
Route::get('/user/register', [RegisteredUserController::class, 'thankYou'])->name('thankYou');
Route::post('/tutor/request/register', [TutorController::class, 'registerTutor'])->name('tutor_register');
Route::get('/verify/{token}', [TutorController::class, 'verify'])->name('verify_tutor');
 Route::post('/verify-tutor', [TutorController::class, 'verifyCodeTutor'])->name('verifyCode_tutor');
 Route::post('/verify-validator', [ValidatorController::class, 'verifyCodeValidator'])->name('verifyCode_Validator');

 Route::post('/validator/request/register', [ValidatorController::class, 'registerValidator'])->name('validator_register');


// Ruta para procesar el código de verificación
Route::post('/verify-email', [RegisteredUserController::class, 'verifyEmail'])->name('verifyEmail');
Route::middleware('auth')->group(function () {

    //Carga inicial con excel
    Route::get('/import', [ExcelController::class, 'importView'])->name('import.view')->middleware('role:Administrador');
    Route::post('/import', [ExcelController::class, 'import'])->name('import')->middleware('role:Administrador');
    Route::get('/import-students', [ExcelController::class, 'importViewStudents'])->name('import.viewStudents')->middleware('role:Administrador,Centro Educativo');
    Route::post('/import-students', [ExcelController::class, 'importStudents'])->name('importStudents')->middleware('role:Administrador,Centro Educativo');

    //memberships
    Route::patch('memberships/{membershipId}', [MembershipController::class, 'update'])->middleware('role:Administrador');
    //Route::resource('memberships', MembershipController::class)->middleware('role:Administrador');


    Route::post('/study-centers/{id}/renew-membership', [MembershipController::class, 'renew_studyCenter'])->name('study_centers.renew_membership')->middleware('role:Centro Educativo');
    Route::get('/study-centers/{studyCenterId}/renew-membership', [MembershipController::class, 'remembership_studyCenter'])->name('study_centers.remembership')->middleware('role:Administrador,Centro Educativo');

    Route::post('/memberships/{id}//user/renew-membership', [MembershipController::class, 'renew_user'])->name('user.renew_membership')->middleware('role:Usuario');
    Route::get('/memberships/{user_id}/user/renew-membership', [MembershipController::class, 'remembership_user'])->name('user.remembership')->middleware('role:Usuario');

    Route::get('/pricing', [MembershipController::class, 'pricing'])->name('membership.pricing');

    Route::get('/memberships', [MembershipController::class, 'index'])->name('memberships.index')->middleware('role:Administrador');
    Route::get('/memberships/create', [MembershipController::class, 'create'])->name('memberships.create')->middleware('role:Administrador');
    Route::post('/memberships', [MembershipController::class, 'store'])->name('memberships.store')->middleware('role:Administrador');
    Route::get('/memberships/{id}', [MembershipController::class, 'show'])->name('memberships.show')->middleware('role:Administrador,Usuario,Centro Educativo,Estudiante');
    Route::get('/memberships/{id}/edit', [MembershipController::class, 'edit'])->name('memberships.edit')->middleware('role:Administrador');
    Route::patch('memberships/{id}', [MembershipController::class, 'update'])->name('memberships.update')->middleware('role:Administrador');
    Route::delete('/memberships/{id}', [MembershipController::class, 'destroy'])->name('memberships.destroy')->middleware('role:Administrador');


    //memberships History
    Route::get('membership-histories', [MembershipHistoryController::class, 'index'])->name('memberships_histories.index')->middleware('role:Administrador,Centro Educativo');
    Route::get('membership-histories/{iduser}/show-membership-user', [MembershipHistoryController::class, 'showToUser'])->name('membership_histories_user')->middleware('role:Administrador,Centro Educativo');


    //Tutors
    Route::resource('tutors', TutorController::class)->middleware('role:Administrador,Centro Educativo');





    Route::get('tutors/studyCenter/{idstudyCenter}', [TutorController::class, 'indexToStudyCenter'])->name('tutors.indexToStudyCenter')->middleware('role:Administrador,Centro Educativo'); // Para listar todos los estudiantes

    //Students
    Route::resource('students', StudentController::class)->middleware('role:Administrador');
    //Route::resource('students', StudentController::class);
    // Rutas individuales para el recurso students

    Route::get('students/studyCenter/{idstudyCenter}', [StudentController::class, 'indexToStudyCenter'])->name('students.indexToStudyCenter')->middleware('role:Administrador,Centro Educativo'); // Para listar todos los estudiantes
    Route::get('students/create/{idStudyCenter}', [StudentController::class, 'createStudentToStudyCenter'])->name('students.createStudentToStudyCenter')->middleware('role:Centro Educativo');
    Route::delete('students/{student}/{idStudyCenter}', [StudentController::class, 'destroyStutendToStudyCenter'])->name('students.destroyStutendToStudyCenter')->middleware('role:Centro Educativo');  // Para eliminar un estudiante
    Route::get('students/{student}/{idStudyCenter}', [StudentController::class, 'showStutendToStudyCenter'])->name('students.showStutendToStudyCenter')->middleware('role:Centro Educativo');  // Para mostrar un estudiante específico
    Route::get('students/{student}/{idStudyCenter}/edit', [StudentController::class, 'editStutendToStudyCenter'])->name('students.editStutendToStudyCenter')->middleware('role:Centro Educativo');  // Para mostrar el formulario de edición
    Route::patch('students/{student}', [StudentController::class, 'update'])->name('students.update')->middleware('role:Administrador,Centro Educativo');  // Para actualizar el estudiante
    Route::post('students', [StudentController::class, 'store'])->name('students.store')->middleware('role:Administrador,Centro Educativo'); // Para almacenar el nuevo estudiante



    /* Route::get('students/create', [StudentController::class, 'create'])->name('students.create')->middleware('role:Administrador'); // Para mostrar el formulario de crear estudiante
    Route::get('students', [StudentController::class, 'index'])->name('students.index')->middleware('role:Administrador,Centro Educativo');






*/
    Route::get('/students/activate/{tracking_code}', [StudentController::class, 'activate'])->name('students.activate');
    Route::post('/students/updatePassword', [StudentController::class, 'updatePassword'])->name('students.update_password');


    //Sopecialties
    Route::resource('specialties', SpecialtyController::class)->middleware('role:Administrador');

    //Study Center
    Route::resource('study-centers', StudyCenterController::class)->middleware('role:Administrador');

    /* Route::middleware('role:Administrador')->group(function () {
        Route::get('/study-centers', [StudyCenterController::class, 'index'])->name('study-centers.index');
        Route::get('/study-centers/create', [StudyCenterController::class, 'create'])->name('study-centers.create');
        Route::post('/study-centers', [StudyCenterController::class, 'store'])->name('study-centers.store');
        Route::get('/study-centers/{study_center}', [StudyCenterController::class, 'show'])->name('study-centers.show');
        Route::get('/study-centers/{study_center}/edit', [StudyCenterController::class, 'edit'])->name('study-centers.edit');
        Route::patch( 'study-centers/{study_center}', [StudyCenterController::class, 'update'])->name('study-centers.update');
        Route::delete('/study-centers/{study_center}', [StudyCenterController::class, 'destroy'])->name('study-centers.destroy');
    });*/

    //users
    Route::resource('users', UserController::class)->middleware('role:Administrador');



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //---------nuevas rutas
    Route::resource('people', PersonController::class);

    Route::resource('levels', LevelController::class)->middleware('role:Administrador');



    Route::resource('membership-features', MembershipFeatureController::class);
    Route::resource('membership-features-memberships', MembershipFeaturesMembershipController::class);



    Route::resource('membership-payment-statuses', MembershipPaymentStatusController::class);



    Route::get('/study-center/dashboard', [StudyCenterController::class, 'dashboard'])->name('study-center.dashboard');

    Route::get('/distritos/{regional_id}', [StudyCenterController::class, 'getDistritos']);

    Route::get('/user/dashboard', function () {
        return view('user.dashboard'); // Vista para el dashboard del usuario
    })->name('user.dashboard');

    //Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/admin/dashboard', [DashboardController::class, 'dashboardAmdin'])->name('admin.dashboard');
    Route::get('/validator/dashboard', [DashboardController::class, 'dashboardValidator'])->name('validator.dashboard');
    Route::get('/tutor/dashboard', [DashboardController::class, 'dashboardTutor'])->name('tutor.dashboard');
    Route::get('/user/dashboard', [DashboardController::class, 'dashboardUser'])->name('user.dashboard');
    Route::get('/student/dashboard', [DashboardController::class, 'dashboardStudent'])->name('student.dashboard');
    Route::resource('countries', CountryController::class);
    Route::resource('regionals', RegionalController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('validators', ValidatorController::class);

    /*
    Route::get('/validator/dashboard', function () {
        return view('validator.dashboard'); // Vista para el dashboard del usuario
    })->name('validator.dashboard');*/

    Route::get('/validator/items', function () {
        return view('validator.items'); // Vista para el dashboard del usuario
    })->name('validator.items');
    //Para centros de estudios que solicitan el registro en la plataforma
    Route::resource('register-study-centers', RegisterStudyCenterController::class);

    Route::resource('questions', QuestionController::class);
    Route::resource('answers', AnswerController::class);

    //-----Esto es para las paginas que estan en construccion
    Route::get('/under/construction', function () {
        return view('under_construction'); // Vista para el dashboard del usuario (en construcción)
    })->name('under.construction');
    Route::get('/items/general/study-center', function () {
        return view('study-center.items_general');
    })->name('study-center.items_general');

    Route::get('/items/diagnostic/study-center', function () {
        return view('study-center.items_examens_diagnostic');
    })->name('study-center.items_diagnostic');

    Route::get('/items/nacional/study-center', function () {
        return view('study-center.items_test_nacional');
    })->name('study-center.items_nacional');

    Route::get('/items/pisa/study-center', function () {
        return view('study-center.items_test_pisa');
    })->name('study-center.items_pisa');

    Route::get('/study-center/reports', function () {
        return view('study-center.reports');
    })->name('study-center.reports');
    Route::get('/study-center/certificates', function () {
        return view('study-center.certificate');
    })->name('study-center.certificates');

    Route::get('/study-center/test-pisa', function () {
        return view('study-center.test_pisa');
    })->name('study-center.test_pisa');

    Route::get('/study-center/test-nacional', function () {
        return view('study-center.test_nacional_diagnostic');
    })->name('study-center.test_nacional_diagnostic');

    Route::get('/study-center/test-diagnostic', function () {
        return view('study-center.test_diagnostic');
    })->name('study-center.test_diagnostic');


    Route::get('/test/items-pisa/time', function () {
        return view('test.items_time'); // Vista para el dashboard del usuario (en construcción)
    })->name('test.items_time');
    Route::get('/test/pisa', function () {
        return view('pisa_test.test'); // Vista para el dashboard del usuario (en construcción)
    })->name('pisa_test.test');
    Route::get('/items/pisa', function () {
        return view('items.items_pisa'); // Vista para el dashboard del usuario (en construcción)
    })->name('items.items_pisa');

    Route::get('/examen/diagnostic', function () {
        return view('examens.examen_practic_diagnostic');
    })->name('examens.examen_practic_diagnostic');

    Route::get('/examen/diagnostic/time', function () {
        return view('examens.examen_time_diagnostic');
    })->name('examens.examen_time_diagnostic');

    Route::get('/user/examen', function () {
        return view('user.examen_diagnostic');
    })->name('user.examen_diagnostic');



    Route::post('/actualizar-tiempo', function (Illuminate\Http\Request $request) {
        $tiempo = $request->input('tiempo');
        session(['tiempo_en_plataforma' => $tiempo]);
        return response()->json(['status' => 'ok']);
    });

    Route::get('/tutor/request', function () {
        $especialidades = [
            [
                'nombre' => 'Matemática',
                'estado_asignacion' => 'No asignado',
                'estado_solicitud' => 'Solicitado'
            ],
            [
                'nombre' => 'Español',
                'estado_asignacion' => 'Asignado',
                'estado_solicitud' => 'Confirmado'
            ],
            [
                'nombre' => 'Ciencias Sociales',
                'estado_asignacion' => 'Asignado',
                'estado_solicitud' => 'Confirmado'
            ],
            [
                'nombre' => 'Ciencias Naturales',
                'estado_asignacion' => 'No asignado',
                'estado_solicitud' => 'Pendiente'
            ],
        ];

        return view('tutor.request_tutoring', compact('especialidades'));
    })->name('tutor.request_tutoring');

    Route::get('/tutor/assigned/student', function () {
        return view('tutor.assigned_students');
    })->name('tutor.assigned_students');

    Route::get('/study_center/items/pisa', function () {
        return view('study-center.items_pisa');
    })->name('study_center.items_pisa');

    Route::get('/tutor/assigned', function () {
        return view('tutor.assigned_tutors');
    })->name('tutor.assigned');
    Route::get('/items/unresolved', function () {
        return view('items.unresolved_items');
    })->name('items.unresolved');

    Route::get('/items/resolved', function () {
        return view('items.resolved_items');
    })->name('items.resolved');

    // Route::get('/', [AuthenticatedSessionController::class, 'create']);

    Route::resource('courses', CourseController::class);
    Route::resource('notifications-questions', NotificationsQuestionController::class);

    ///-------End nuevas rutass
});

//Route::post('/tutor-validator-registers', [TutorValidatorRegisterController::class, 'store'])->name('tutor-validator-registers.store');
Route::resource('tutor-validator-registers', TutorValidatorRegisterController::class);
Route::get('/tutor/register', function () {
    return view('tutor.register');
})->name('tutor.form_register');
Route::get('/validator/register', function () {
    return view('validator.register');
})->name('validator.form_register');
Route::get('/thank-you-tutor', [TutorController::class, 'thankYou'])->name('thankYouTutorRegister');
Route::get('/thank-you-tutor', [ValidatorController::class, 'thankYou'])->name('thankYouTutorRegisterValidator');
Route::post('register-study-centers/store', [RegisterStudyCenterController::class, 'processStore'])->name('register-study-centers.processStore');
Route::get('/thank-you-studycenter', [RegisterStudyCenterController::class, 'thankYou'])->name('thankYouStudyCenter');
Route::get('/user/register-study-centers/', [RegisterStudyCenterController::class, 'create'])->name('user-study-centers.create');
Route::get('/verification-email/studcenter', function () {
    return view('register-study-center.okVerificationStudyCenter'); // Vista para el dashboard del usuario
})->name('register-study-center.okVerificationStudyCenter');
Route::post('/person/send-code', [PersonController::class, 'sendEmailWhithCode'])->name('person.sendEmailWhithCode');
Route::get('/person-code', function () {
    return view('auth.forgot-code'); // Vista para el dashboard del usuario
})->name('person.code');
// Ruta para descargar el archivo Excel
Route::get('/download-students', function () {
    return Excel::download(new StudentsExport, 'estudiantes.xlsx');
})->name('download.students');
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

//----Paginas  de chequeo para ala membresia


Route::get('/membership-inactive', function () {
    return view('membership.inactive');
})->name('membership.inactive');

Route::get('/access-limit-reached', function () {
    return view('access.limit_reached');
})->name('access.limit_reached');



///-----Para los items de prueba
Route::get('items/{name}', function ($name) {
    return view('items.index', compact('name')); // Pasamos el valor de $name a la vista
})->name('items.index');

Route::get('examens/{name}', function ($name) {
    return view('examens.index', compact('name')); // Pasamos el valor de $name a la vista
})->name('examens.index');

Route::get('user/time', function () {
    return view('user.time'); // Pasamos el valor de $name a la vista
})->name('user.time');



require __DIR__ . '/auth.php';

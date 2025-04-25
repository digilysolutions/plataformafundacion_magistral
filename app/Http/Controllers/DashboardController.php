<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\NotificationsQuestion;
use App\Models\Question;
use App\Models\Regional;
use App\Models\Specialty;
use App\Models\Student;
use App\Models\StudyCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $activeUsersCount = DB::table('sessions')
            ->where('last_activity', '>=', now()->subMinutes(5)->timestamp)
            ->count();

        return view('dashboard', ['activeUsersCount' => $activeUsersCount]);
    }
    public function dashboardAmdin()
    {
        if (!Auth::check() || Auth::user()->role != "Administrador") {

            return redirect('/'); // Redirigir a la página de inicio u otra página si no tiene acceso
        }

        $studyCenter = StudyCenter::allActivated();
        $students = Student::allActivated();
        $regionals = Regional::allActivated();
        $districts = District::allActivated();
        $specialties = Specialty::allActivated();

        return view('dashboard', compact('studyCenter', 'students', 'regionals', 'districts', 'specialties'));
    }
    public function dashboardValidator()
    {
        $user = Auth::user();
        if (!Auth::check() || $user->role != "Validador") {

            return redirect('/'); // Redirigir a la página de inicio u otra página si no tiene acceso
        }

        // Obtener notificaciones no leídas
        $notifications = NotificationsQuestion::where('is_read', false)
            ->where('validator_id', $user->person->validator->id)
            ->get();

        // Cambiar el estado de las preguntas asociadas a las notificaciones a 'Pendiente'
        $questionIds = $notifications->pluck('question_id'); // Obtener todos los IDs de las preguntas
        if ($questionIds->isNotEmpty()) {
            // Actualizar el estado de las preguntas a 'Pendiente'
            Question::whereIn('id', $questionIds)->update(['state' => 'Pendiente']);
        }
        // Marcar las notificaciones como leídas
        NotificationsQuestion::where('is_read', false)->update(['is_read' => true]);

        return view('validator.dashboard', compact('notifications'));
    }

    public function dashboardTutor()
    {
        // Datos de notificaciones
        $notifications = [
            [
                'student_name' => 'Juan Pérez',
                'exam_title' => 'Matemáticas - Prueba 1',
                'score' => 85,
                'correct_answers' => 17,
                'incorrect_answers' => 3,
                'time_taken' => 30, // minutos
            ],
            [
                'student_name' => 'María Gómez',
                'exam_title' => 'Historia - Prueba 2',
                'score' => 90,
                'correct_answers' => 18,
                'incorrect_answers' => 2,
                'time_taken' => 28,
            ],
            [
                'student_name' => 'Carlos Reyes',
                'exam_title' => 'Ciencias - Prueba 1',
                'score' => 78,
                'correct_answers' => 13,
                'incorrect_answers' => 7,
                'time_taken' => 35,
            ],
            [
                'student_name' => 'Lucía Fernández',
                'exam_title' => 'Inglés - Examen 1',
                'score' => 92,
                'correct_answers' => 23,
                'incorrect_answers' => 2,
                'time_taken' => 25,
            ],
            [
                'student_name' => 'Diego Torres',
                'exam_title' => 'Matemáticas - Examen 3',
                'score' => 76,
                'correct_answers' => 15,
                'incorrect_answers' => 5,
                'time_taken' => 40,
            ],
            [
                'student_name' => 'Sofía López',
                'exam_title' => 'Historia - Prueba final',
                'score' => 88,
                'correct_answers' => 22,
                'incorrect_answers' => 3,
                'time_taken' => 32,
            ],
            [
                'student_name' => 'Andrés Castillo',
                'exam_title' => 'Ciencias - Prueba final',
                'score' => 95,
                'correct_answers' => 19,
                'incorrect_answers' => 1,
                'time_taken' => 29,
            ],
            [
                'student_name' => 'María Correa',
                'exam_title' => 'Inglés - Prueba 2',
                'score' => 87,
                'correct_answers' => 21,
                'incorrect_answers' => 4,
                'time_taken' => 33,
            ],
            [
                'student_name' => 'Fernando Santacruz',
                'exam_title' => 'Matemáticas - Prueba 2',
                'score' => 82,
                'correct_answers' => 16,
                'incorrect_answers' => 4,
                'time_taken' => 36,
            ],
            [
                'student_name' => 'Patricia Valenzuela',
                'exam_title' => 'Ciencias - Prueba 3',
                'score' => 91,
                'correct_answers' => 23,
                'incorrect_answers' => 1,
                'time_taken' => 27,
            ],
        ];

        // Datos de resultados de exámenes
        $examResults = [
            [
                'student_name' => 'Juan Pérez',
                'exam_title' => 'Matemáticas - Prueba 1',
                'total_questions' => 20,
                'correct_answers' => 17,
                'incorrect_answers' => 3,
                'score' => 85,
            ],
            [
                'student_name' => 'María Gómez',
                'exam_title' => 'Historia - Prueba 2',
                'total_questions' => 20,
                'correct_answers' => 18,
                'incorrect_answers' => 2,
                'score' => 90,
            ],
            [
                'student_name' => 'Carlos Reyes',
                'exam_title' => 'Ciencias - Prueba 1',
                'total_questions' => 20,
                'correct_answers' => 13,
                'incorrect_answers' => 7,
                'score' => 78,
            ],
            // Agrega más resultados si es necesario...
        ];

        return view('tutor.dashboard', compact('notifications', 'examResults'));
    }
}

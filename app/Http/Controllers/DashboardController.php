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
        if (!Auth::check() || Auth::user()->role!="Administrador") {

            return redirect('/'); // Redirigir a la página de inicio u otra página si no tiene acceso
        }

        $studyCenter = StudyCenter::allActivated();
        $students = Student::allActivated();
        $regionals = Regional::allActivated();
        $districts= District::allActivated();
        $specialties= Specialty::allActivated();

        return view('dashboard', compact('studyCenter','students','regionals','districts','specialties'));
    }
    public function dashboardValidator()
    {
        $user=Auth::user();
        if (!Auth::check() || $user->role!="Validador") {

            return redirect('/'); // Redirigir a la página de inicio u otra página si no tiene acceso
        }

          // Obtener notificaciones no leídas
          $notifications = NotificationsQuestion::
            where('is_read', false)
            ->where('validator_id',$user->person->validator->id)
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
}

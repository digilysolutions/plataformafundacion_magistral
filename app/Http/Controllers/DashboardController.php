<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Regional;
use App\Models\Specialty;
use App\Models\Student;
use App\Models\StudyCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\DB;

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
        $studyCenter = StudyCenter::allActivated();
        $students = Student::allActivated();
        $regionals = Regional::allActivated();
        $districts= District::allActivated();
        $specialties= Specialty::allActivated();

        return view('dashboard', compact('studyCenter','students','regionals','districts','specialties'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}

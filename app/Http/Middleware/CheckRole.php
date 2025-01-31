<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        $role = Auth::user()->role; // Obtiene el rol del usuario autenticado

        switch ($role) {
            case 'Centro Educativo':
                return redirect()->route('educationalcenter.dashboard');
            case 'Estudiante':
                return redirect()->route('student.dashboard');
            case "Tutor":
                return redirect()->route('tutor.dashboard');
            case "Validador":
                return redirect()->route('validator.dashboard');
            case 'Administrador':
                return redirect()->route('admin.dashboard');
            case "Usuario":
                return redirect()->route('user.dashboard');
        }

        return $next($request); // Continúa con la solicitud si ningún rol coincide
    }
}

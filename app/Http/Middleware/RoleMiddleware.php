<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{



    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            Log::info('Usuario no autenticado, redirigiendo a /login');
            return redirect('/login')->with('error', 'Debes iniciar sesión para acceder a esta página.');
        }
       // $role = Auth::user()->role;

        if ($request->user()->role != $role) {
            Log::info('Usuario no role, redirigiendo a /login');
            return redirect('/login')->with('error', 'No tienes permiso para acceder a esta página.');
        }
        return $next($request);
    }
}

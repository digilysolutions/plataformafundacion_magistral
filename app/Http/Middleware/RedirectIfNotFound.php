<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfNotFound
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Verificar si la respuesta es 404
        if ($response->status() === 404) {
            return redirect('/pagina-no-encontrada');  // Cambia '/pagina-no-encontrada' por tu ruta deseada
        }

        return $response;
    }
}

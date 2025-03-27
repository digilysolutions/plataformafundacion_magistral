<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckMembership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Obtener la membresía activa del usuario
        $membership = $user->membership;

        // Usar el historial de membresía para verificar su estado
        $latestMembershipHistory = $user->membershipHistory()
            ->with('membershipStatus')
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$latestMembershipHistory || ($latestMembershipHistory->membershipStatus->name !== 'Activo' && $latestMembershipHistory->membershipStatus->name !== 'Prueba')) {
            return redirect()->route('membership.inactive');
        }

        // Verificar las características de acceso
        $requiredFeature = $request->route()->getName();

        if ($requiredFeature) {
            $feature = $membership->features()->where('name', $requiredFeature)->first();

            if ($feature) {
                // Comprobar el acceso
                if (!$feature->pivot->has_access) {
                    return redirect()->route('access.denied');
                }

                // Comprobar si hay un límite de uso
                if ($feature->pivot->usage_limit && $feature->pivot->usage_limit != null)
                    if ($feature->pivot->usage_limit && $feature->pivot->current_usage >= $feature->pivot->usage_limit) {
                        return redirect()->route('access.limit_reached'); // Acceso a pruebas excedido
                    }

                // Incrementar el uso si se trata de una prueba
                /* if ($feature->pivot->type === 'prueba') {
                    $feature->pivot->current_usage++;
                    $feature->pivot->save(); // Guardar el nuevo uso
                }*/
            }
        }

        return $next($request);
    }
}

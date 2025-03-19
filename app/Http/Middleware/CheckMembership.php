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

        // Verificar si el usuario tiene un membership_id
      /*  if (!$user->membership_id) {
            return redirect()->route('membership.basic'); // Redirigir a la membresía básica
        }*/

        // Obtener la membresía y el historial de membresía del usuario
        $membership = $user->membership;

        $latestMembershipHistory = $user->membershipHistory()
            ->with('membershipStatus')
            ->orderBy('created_at', 'desc')
            ->first();

        // Comprobar si la membresía está activa
        if (!$latestMembershipHistory || ($latestMembershipHistory->membershipStatus->name !== 'Activo' && $latestMembershipHistory->membershipStatus->name !== 'Prueba')) {
            return redirect()->route('membership.inactive'); // No puede acceder a los recursos
        }

        // Verificar las características de acceso relacionadas con la solicitud actual
        $requiredFeature = $request->route()->getName(); // Nombre de la ruta puede ser el nombre del feature a comprobar

        if ($requiredFeature) {
            $feature = $membership->features()->where('name', $requiredFeature)->first();
            if ($feature) {
                $value = $feature->pivot->value;

                // Asegúrate de que tus rutas están definidos para comprobar el valor
                if ($value === 'no_access') {
                    return redirect()->route('access.denied'); // Redirigir si no tiene acceso
                }
            }
        }

        return $next($request);
    }

}

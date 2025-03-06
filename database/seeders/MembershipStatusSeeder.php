<?php

namespace Database\Seeders;

use App\Models\MembershipStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'Activo', 'description' => 'La membresía está vigente y el usuario tiene acceso a todos los beneficios.'],
            ['name' => 'Inactivo', 'description' => 'La membresía ha sido suspendida temporalmente.'],
            ['name' => 'Expirado', 'description' => 'La membresía ha llegado a su fecha de finalización y el usuario ya no tiene acceso a los beneficios.'],
            ['name' => 'Pendiente', 'description' => 'La solicitud de la membresía ha sido recibida pero aún no ha sido procesada.'],
            ['name' => 'Cancelado', 'description' => 'La membresía ha sido cancelada por el usuario o la plataforma.'],
            ['name' => 'Prueba', 'description' => 'El usuario está en un período de prueba, acceso temporal y limitado.'],
            ['name' => 'Suspendido', 'description' => 'La membresía ha sido suspendida, pero puede ser reactivada.'],
            ['name' => 'Renovación Pendiente', 'description' => 'La membresía está a punto de expirar y la renovación está en progreso.'],
            ['name' => 'Rechazado', 'description' => 'La solicitud de la membresía ha sido denegada.'],
        ];

        foreach ($statuses as $status) {
            MembershipStatus::create($status);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Membership;
use App\Models\Regional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $memberships = [
            [
                'activated' => true,
                'name' => 'Basica Usuario General',
                'price' => 500,
                'duration_days' => 30,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
                'type' => 'Tipo I',
                'is_studio_center' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'activated' => true,
                'name' => 'Membresía Básica Centro',
                'price' => 1000,
                'duration_days' => 30,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
                'type' => 'Hasta 50 Estudiantes',
                'is_studio_center' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'activated' => true,
                'name' => 'Membresía Premium Centro',
                'price' => 3000,
                'duration_days' => 30, // Ilimitado
                'start_date' => now(),
                'end_date' => now()->addDays(30), // Ilimitado
                'type' => 'Hasta 50 Estudiantes',
                'is_studio_center' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'activated' => true,
                'name' => 'Membresía Premium Centro',
                'price' => 5000,
                'duration_days' => 30, // Ilimitado
                'start_date' => now(),
                'end_date' => now()->addDays(30), // Ilimitado
                'type' => 'Más de 100 Estudiantes',
                'is_studio_center' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'activated' => true,
                'name' => 'Premium Usuario General',
                'price' => 1500,
                'duration_days' => 180, // Ilimitado
                'start_date' => now(),
                'end_date' => now()->addDays(180), // Ilimitado
                'type' => 'Tipo II',
                'is_studio_center' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [

                'activated' => true,
                'name' => 'VIP Usuario General',
                'price' => 5000,
                'duration_days' => 365, // Ilimitado
                'start_date' => now(),
                'end_date' => now()->addDays(365), // Ilimitado
                'type' => 'Tipo III',
                'is_studio_center' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];
        foreach ($memberships as $membership) {
            Membership::create($membership);
        }

    }
}

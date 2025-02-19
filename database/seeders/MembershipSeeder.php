<?php

namespace Database\Seeders;

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
                'id' => (string) Str::uuid(),
                'activated' => true,
                'name' => 'Membresía Básica',
                'price' => 19.99,
                'duration_days' => 30,
                'start_date' => now(),
                'end_date' => now()->addDays(30),
                'type' => 'Tipo I',
                'is_studio_center' => false,
                'student_limit' => null,
                'limite_items' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'activated' => true,
                'name' => 'Membresía Estudio',
                'price' => 49.99,
                'duration_days' => 365,
                'start_date' => now(),
                'end_date' => now()->addDays(365),
                'type' => 'Tipo II',
                'is_studio_center' => true,
                'student_limit' => 20,
                'limite_items' => 50,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => (string) Str::uuid(),
                'activated' => false,
                'name' => 'Membresía Premium',
                'price' => 99.99,
                'duration_days' => null, // Ilimitado
                'start_date' => now(),
                'end_date' => null, // Ilimitado
                'type' => 'Tipo III',
                'is_studio_center' => false,
                'student_limit' => null,
                'limite_items' => 100,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('memberships')->insert($memberships);
    }
}

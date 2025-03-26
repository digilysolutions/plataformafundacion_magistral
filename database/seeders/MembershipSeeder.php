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
                'name' => 'Basica',
                'price' => 0,
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
                'name' => 'Premium',
                'price' => 49.99,
                'duration_days' => 180,
                'start_date' => now(),
                'end_date' => now()->addDays(180),
                'type' => 'Tipo II',
                'is_studio_center' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [

                'activated' => true,
                'name' => 'VIP',
                'price' => 99.99,
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

<?php

namespace Database\Seeders;

use App\Models\Specialty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SpecialtiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            [

                'name' => 'Matemáticas',
                'activated' => true,

            ], [

                'name' => 'Español',
                'activated' => true,

            ],
            [

                'name' => 'Ciencias Sociales',
                'activated' => true,

            ]
            ,
            [

                'name' => 'Ciencias Naturales',
                'activated' => true,

            ]
        ];
        foreach ($specialties as $specialty) {
            Specialty::create($specialty);
        }

    }
}

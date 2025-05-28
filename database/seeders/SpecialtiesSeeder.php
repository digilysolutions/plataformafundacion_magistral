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
                'shortname' => 'MA',
                'activated' => true,

            ],
            [

                'name' => 'Español',
                'shortname' => 'ES',
                'activated' => true,

            ],
            [

                'name' => 'Ciencias Sociales',
                'shortname' => 'CS',
                'activated' => true,

            ],
            [

                'name' => 'Ciencias Naturales',
                'shortname' => 'CN',
                'activated' => true,

            ]
        ];
        foreach ($specialties as $specialty) {
            Specialty::create($specialty);
        }
    }
}

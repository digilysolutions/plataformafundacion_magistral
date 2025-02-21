<?php

namespace Database\Seeders;

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
                'id' => Str::uuid(),
                'name' => 'Matemáticas',
                'activated' => true,

            ], [
                'id' => Str::uuid(),
                'name' => 'Español',
                'activated' => true,

            ],
            [
                'id' => Str::uuid(),
                'name' => 'Ciencias',
                'activated' => true,

            ]
            ,
            [
                'id' => Str::uuid(),
                'name' => 'Historia',
                'activated' => true,

            ]
        ];
            DB::table('specialties')->insert($specialties);
    }
}

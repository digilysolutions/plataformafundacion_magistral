<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SublevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'name' => 'Nivel 6 Prueba PISA',
                'description' => 'Representa el nivel más alto de competencia. Los estudiantes pueden abordar problemas complejos con facilidad, razonar de manera abstracta y aplicar conocimientos en contextos variados.',
                'activated' => true,
            ]
        ];
    }
}

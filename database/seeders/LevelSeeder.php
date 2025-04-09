<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            [
                'activated' => true,
                'name' => 'Nivel 1'
            ],
            [
                'activated' => true,
                'name' => 'Nivel 2'
            ]
            ,
            [
                'activated' => true,
                'name' => 'Nivel 3'
            ]            ,
            [
                'activated' => true,
                'name' => 'Nivel 4'
            ],
            [
                'activated' => true,
                'name' => 'Nivel 5'
            ],
            [
                'activated' => true,
                'name' => 'Nivel 6'
            ],
            [
                'activated' => true,
                'name' => 'Elemental'
            ],
            [
                'activated' => true,
                'name' => 'Aceptable'
            ],
            [
                'activated' => true,
                'name' => 'Satisfactorio'
            ]
        ];
        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            [
                'name' => '1ro Primaria',              
                'activated' => true
            ],
            [
                'name' => '2do Primaria',              
                'activated' => true
            ],
            [
                'name' => '3ro Primaria',              
                'activated' => true
            ],
            [
                'name' => '4to Primaria',              
                'activated' => true
            ],
            [
                'name' => '5to Primaria',              
                'activated' => true
            ],
            [
                'name' => '6to Primaria',              
                'activated' => true
            ],
            [
                'name' => '1ro Secundaria',              
                'activated' => true
            ],
            [
                'name' => '2do Secundaria',              
                'activated' => true
            ],
            [
                'name' => '3ro Secundaria',              
                'activated' => true
            ],
        ];


        // Inserta los niveles en la base de datos
        foreach ($courses as $course) {
            Course::create($course);
        }
    }
}

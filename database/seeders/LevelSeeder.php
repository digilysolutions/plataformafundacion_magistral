<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelSeeder extends Seeder
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
            ],
            [

                'name' => 'Nivel 5 Prueba PISA',
                'description' => 'Los estudiantes pueden manejar situaciones que requieren un alto nivel de pensamiento crítico y resolución de problemas, aunque no al mismo nivel que el Nivel 6.',
                'activated' => true,
            ],
            [

                'name' => 'Nivel 4 Prueba PISA',
                'description' => 'Indica que los estudiantes pueden realizar tareas que requieren un buen nivel de comprensión y aplicación de conceptos, aunque no están preparados para las tareas más complejas.',
                'activated' => true,
            ],
            [

                'name' => 'Nivel 3 Prueba PISA',
                'description' => 'Los estudiantes pueden realizar tareas que están por encima del mínimo necesario para la vida cotidiana, pero no están bien preparados para actividades más complejas.',
                'activated' => true,
            ],
            [

                'name' => 'Nivel 2 Prueba PISA',
                'description' => 'Representa el mínimo necesario para que un estudiante pueda desenvolverse adecuadamente en la sociedad contemporánea. Los estudiantes pueden realizar tareas básicas.',
                'activated' => true,
            ],
            [

                'name' => 'Nivel 1a Prueba PISA',
                'description' => 'Los estudiantes tienen dificultades significativas para realizar tareas básicas.',
                'activated' => true,
            ],
            [

                'name' => 'Nivel 1b Prueba PISA',
                'description' => 'Indica mayores dificultades que el Nivel 1a para realizar tareas elementales.',
                'activated' => true,
            ],
            [

                'name' => 'Nivel 0 Prueba PISA',
                'description' => 'Los estudiantes carecen de las habilidades necesarias para responder correctamente a las preguntas más fáciles de la prueba.',
                'activated' => true,
            ],
            [

                'name' => 'Nivel 1 Pruebas Nacionales',
                'description' => 'Comprensión literal: Los estudiantes identifican información explícita en textos, reconocen datos básicos como fechas, eventos y lugares, y demuestran conocimientos lingüísticos básicos según el currículo.',
                'activated' => false,
            ],
            [

                'name' => 'Nivel 2 Pruebas Nacionales',
                'description' => 'Comprensión inferencial simple: Los estudiantes interpretan información implícita, realizan deducciones sencillas y conectan ideas dentro de un texto o contexto proporcionado.',
                'activated' => false,
            ],
            [

                'name' => 'Nivel 3 Pruebas Nacionales',
                'description' => 'Comprensión crítica y analítica: Los estudiantes evalúan información, establecen juicios fundamentados, realizan inferencias complejas y aplican conocimientos en contextos variados y desafiantes.',
                'activated' => false,
            ],
            [

                'name' => 'Nivel Elemental Exámenes Diagnóstico',
                'description' => 'Evalúa conocimientos básicos y habilidades iniciales.',
                'activated' => false,
            ],
            [

                'name' => 'Nivel Aceptable Exámenes Diagnóstico',
                'description' => 'Mide competencias intermedias que reflejan un dominio adecuado del contenido.',
                'activated' => false,
            ],
            [

                'name' => 'Nivel Satisfactorio Exámenes Diagnóstico',
                'description' => 'Requiere un nivel avanzado de comprensión, análisis y aplicación del conocimiento.',
                'activated' => false,
            ],
        ];

        // Inserta los niveles en la base de datos
        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}

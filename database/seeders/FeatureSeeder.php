<?php

namespace Database\Seeders;

use App\Models\MembershipFeature;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'name' => 'Acceso a ITEMSs',
                'description' => 'Acceso a los items que se encuentra en la plataforma',
                'activated' => true,
            ],
            [
                'name' => 'Acceso a Pruebas',
                'description' => '',
                'activated' => true,
            ],
            [
                'name' => 'Niveles de dificultad de ITEMS',
                'description' => '',
                'activated' => true,
            ],
            [
                'name' => 'Personalización de Exámenes',
                'description' => '',
                'activated' => true,
            ],
            [
                'name' => 'Solicitar Tutor',
                'description' => 'Capacidad para solicitar la revisión manual de pruebas.',
                'activated' => true,
            ],
            [
                'name' => 'Generador de Reportes',
                'description' => 'Posibilidad de generar informes sobre el desempeño de los estudiantes.',
                'activated' => true,
            ],
            [
                'name' => 'Historial de Actividades',
                'description' => 'Acceso a atención al cliente rápida y eficiente.',
                'activated' => true,
            ],
            [
                'name' => 'Solicitar   Certificado',
                'description' => 'Acceso a ofertas y precios reducidos en servicios adicionales.',
                'activated' => true,
            ],
            [
                'name' => 'Acceso a Recursos Educativos',
                'description' => 'Capacidad para adaptar las pruebas a las necesidades de los estudiantes.',
                'activated' => true,
            ],
            [
                'name' => 'Soporte   Técnico Prioritario',
                'description' => 'Posibilidad de diseñar y gestionar cursos personalizados.',
                'activated' => true,
            ],
            [
                'name' => 'Promociones y Descuentos (Renovación',
                'description' => 'Herramientas para interpretar el rendimiento académico.',
                'activated' => true,
            ]

        ];

        foreach ($features as $feature) {
            MembershipFeature::create($feature);
        }
    }
}

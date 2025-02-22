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
                'name' => 'Cantidad de Estudiantes',
                'description' => 'Número máximo de estudiantes que pueden acceder a la plataforma.',
                'activated' => true,
            ],
            [
                'name' => 'Cantidad de Ítems',
                'description' => 'Número máximo de ítems de evaluación que pueden ser creados por la escuela.',
                'activated' => true,
            ],
            [
                'name' => 'Cantidad de Pruebas',
                'description' => 'Número máximo de pruebas que pueden realizarse mensualmente.',
                'activated' => true,
            ],
            [
                'name' => 'Acceso a Recursos Educativos',
                'description' => 'Descarga y uso de materiales adicionales para reforzar el aprendizaje.',
                'activated' => true,
            ],
            [
                'name' => 'Solicitar Corrección de Pruebas',
                'description' => 'Capacidad para solicitar la revisión manual de pruebas.',
                'activated' => true,
            ],
            [
                'name' => 'Generación de Reportes',
                'description' => 'Posibilidad de generar informes sobre el desempeño de los estudiantes.',
                'activated' => true,
            ],
            [
                'name' => 'Soporte Técnico Prioritario',
                'description' => 'Acceso a atención al cliente rápida y eficiente.',
                'activated' => true,
            ],
            [
                'name' => 'Promociones y Descuentos',
                'description' => 'Acceso a ofertas y precios reducidos en servicios adicionales.',
                'activated' => true,
            ],
            [
                'name' => 'Características de Personalización de Pruebas',
                'description' => 'Capacidad para adaptar las pruebas a las necesidades de los estudiantes.',
                'activated' => true,
            ],
            [
                'name' => 'Capacidad de Crear Items Propios',
                'description' => 'Posibilidad de diseñar y gestionar cursos personalizados.',
                'activated' => true,
            ],
            [
                'name' => 'Acceso a Análisis de Datos',
                'description' => 'Herramientas para interpretar el rendimiento académico.',
                'activated' => true,
            ],
            [
                'name' => 'Configuración de Niveles de Dificultad',
                'description' => 'Personalización del nivel de dificultad de las evaluaciones.',
                'activated' => true,
            ],
            [
                'name' => 'Tiempo de Acceso a la Plataforma',
                'description' => 'Restricciones de tiempo en el uso de la plataforma.',
                'activated' => true,
            ],
            [
                'name' => 'Disponibles multiples Idiomas',
                'description' => 'Acceso a la plataforma en diferentes idiomas.',
                'activated' => false,
            ],
            [
                'name' => 'Historial de Actividades',
                'description' => 'Registro de acciones realizadas por estudiantes en la plataforma.',
                'activated' => true,
            ],
            [
                'name' => 'Notificaciones Personalizadas',
                'description' => 'Alertas sobre actividades o fechas límites.',
                'activated' => true,
            ],
            [
                'name' => 'Capacidad de Publicar Noticias y Anuncios',
                'description' => 'Habilitar la comunicación con los estudiantes a través de anuncios.',
                'activated' => false,
            ],

        ];

        foreach ($features as $feature) {
            MembershipFeature::create($feature);
        }
    }
}

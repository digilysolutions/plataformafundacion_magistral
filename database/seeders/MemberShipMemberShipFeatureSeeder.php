<?php

namespace Database\Seeders;

use App\Models\MembershipFeaturesMembership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberShipMemberShipFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $membership_feature = [
            [

                'membership_id' => "BA0001",
                'membership_feature_id' => "AC0001",
                'description' => "Acceso Limitado",

                'has_access' => true,
                'url' => '/items',
                'usage_limit' => 0,
                'current_usage' => 0,
            ],
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "GE0001",
                'description' => "Acceso Limitado (8)", //Generador de Reportes

                'has_access' => true,
                'url' => '/Generar-reporte',
                'usage_limit' => 8, // Limitar a 8 pruebas
                'current_usage' => 0, // Inicialmente sin uso
            ],

            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "AC0002", //Acceso a Pruebas
                'description' => "Acceso Limitado  (16)",
                'has_access' => true,
                'url' => '/pruebas',
                'usage_limit' => 16, // Limitar a 16 pruebas
                'current_usage' => 0, // Inicialmente sin uso
            ],
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "AC0003", // Acceso a Recursos Educativos
                'description' => "Sin Acceso",
                'has_access' => false,
                'url' => '/recursos-educativos',
                'usage_limit' => null,
                'current_usage' => 0,
            ],
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "HI0001", // Historial de Actividades
                'description' => "Con Acceso",
                'has_access' => true,
                'url' => '/membership-histories/1/show-membership-user',
                'usage_limit' => null,
                'current_usage' => 0,
            ],
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "NI0001", // Niveles de dificultad de ITEMS
                'description' => "Con Acceso",
                'has_access' => true,
                'url' => '/levels',
                'usage_limit' => null,
                'current_usage' => 0,
            ],
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "PE0001", // Personalización de Exámenes
                'description' => "Sin Acceso",
                'has_access' => false,
                'url' => '/examen',
                'usage_limit' => null,
                'current_usage' => 0,
            ],
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "PR0001", // Promociones y Descuentos (Renovación
                'description' => "Sin Acceso",
                'has_access' => false,
                'url' => '/promociones',
                'usage_limit' => null,
                'current_usage' => 0,
            ],
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "SO0001", // Solicitar Tutor
                'description' => "Con Acceso",
                'has_access' => true,
                'url' => '/solicitar-tutor',
                'usage_limit' => null,
                'current_usage' => 0,
            ],
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "SO0002", // Solicitar   Certificado
                'description' => "Si ",
                'has_access' => true,
                'url' => '/solicitar-certificadp',
                'usage_limit' => null,
                'current_usage' => 0,
            ],
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "SO0003", // Soporte   Técnico Prioritario
                'description' => "No",
                'has_access' => false,
                'url' => '/soporte-tecnico',
                'usage_limit' => null,
                'current_usage' => 0,
            ]
        ];
        foreach ($membership_feature as $mfeature) {
            MembershipFeaturesMembership::create($mfeature);
        }
    }
}

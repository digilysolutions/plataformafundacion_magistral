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
                'value' => "Acceso Limitado"
            ],
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "GE0001",
                'value' => "Acceso Limitado (8)"
            ],

            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "AC0002", //Acceso a Pruebas
                'value' => "Acceso Limitado  (16)"
            ]

            ,
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "AC0003", // Acceso a Recursos Educativos
                'value' => "Sin Acceso"
            ]
            ,
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "HI0001", // Historial de Actividades
                'value' => "Con Acceso"
            ]
            ,
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "NI0001", // Niveles de dificultad de ITEMS
                'value' => "Con Acceso"
            ]
            ,
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "PE0001", // Personalización de Exámenes
                'value' => "Sin Acceso"
            ]
            ,
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "PR0001", // Promociones y Descuentos (Renovación
                'value' => "Sin Acceso"
            ]
            ,
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "SO0001", // Solicitar Tutor
                'value' => "Con Acceso"
            ]
            ,
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "SO0002", // Solicitar   Certificado
                'value' => "Si "
            ]
            ,
            [
                'membership_id' => "BA0001",
                'membership_feature_id' => "SO0003", // Soporte   Técnico Prioritario
                'value' => "No"
            ]
        ];
        foreach ($membership_feature as $mfeature) {
            MembershipFeaturesMembership::create($mfeature);
        }
    }
}

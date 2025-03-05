<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\StudyCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StyCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $person = Person::create(
            [
                'name' => 'Responsable Center',
                'lastname' => 'ytrpiloto@gmail.com',
                'email' => 'Centro educativo',
                'user_id' => 1


            ]
        );
        $studiesCenter = [
            [

                'name' => 'Centro de Estudioio 1',
                'address' => 'Direccion del centro de estudio ',
                'phone' => '809-555-1234',
                'phone' => 'centrostudio@gmail.com',
                'regional_id' => 'LA0001',
                'district_id' => 'LA0001',
                'people_id' => $person->id,
                'activated' => true,
                'membership_id'=>'BA0001'
            ]
        ];
        foreach ($studiesCenter as $studyCenter) {
            StudyCenter::create($studyCenter);
        }
    }
}

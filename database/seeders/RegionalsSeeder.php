<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Regional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegionalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $countryId = Country::where('name', 'República Dominicana')->pluck('id')->first();
        $regionals = [
            [
                'name' => 'BARAHONA',
                'code'=>'01',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'SAN JUAN DE LA MAGUANA',
                'code'=>'02',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'AZUA',
                'code'=>'03',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'SAN CRISTOBAL',
                'code'=>'04',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'SAN PEDRO DE MACORIS',
                'code'=>'05',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'LA VEGA',
                'code'=>'06',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'SAN FRANCISCO DE MACORIS',
                'code'=>'07',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'SANTIAGO',
                'code'=>'08',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'MAO',
                'code'=>'09',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'SANTO DOMINGO',
                'code'=>'10',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'PUERTO PLATA',
                'code'=>'11',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'HIGUEY',
                'code'=>'12',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'MONTE CRISTI',
                'code'=>'13',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'NAGUA',
                'code'=>'14',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'SANTO DOMINGO',
                'code'=>'15',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'COTUI',
                'code'=>'16',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'MONTE PLATA',
                'code'=>'17',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'name' => 'BAORUCO',
                'code'=>'18',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
        ];

        foreach ($regionals as $regional) {
            Regional::create($regional);
        }
    }
}

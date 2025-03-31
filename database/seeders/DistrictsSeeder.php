<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $districts = [
            //Distritos de  BARAHONA                                                                                                                                                                                   
            [
                'name' => 'PEDERNALES',
                'activated' => true,
                'code' => '0101',
                'regional_id' => 'BA0001',
            ],
            [
                'name' => 'ENRIQUILLO',
                'activated' => true,
                'code' => '0102',
                'regional_id' => 'BA0001',
            ],
            [
                'name' => 'BARAHONA',
                'activated' => true,
                'code' => '0103',
                'regional_id' => 'BA0001',
            ],
            [
                'name' => 'CABRAL',
                'activated' => true,
                'code' => '0104',
                'regional_id' => 'BA0001',
            ],
            [
                'name' => 'VICENTE NOBLE',
                'activated' => true,
                'code' => '0105',
                'regional_id' => 'BA0001',
            ],
             //Distritos de SAN JUAN DE LA MAGUANA 
             [
                'name' => 'COMENDADOR',
                'activated' => true,
                'code' => '0201',
                'regional_id' => 'SA0001',
            ],
            [
                'name' => 'PEDRO SANTANA',
                'activated' => true,
                'code' => '0202',
                'regional_id' => 'SA0001',
            ],
            [
                'name' => 'LAS MATAS DE FARFAN',
                'activated' => true,
                'code' => '0203',
                'regional_id' => 'SA0001',
            ],
            [
                'name' => 'EL CERCADO',
                'activated' => true,
                'code' => '0204',
                'regional_id' => 'SA0001',
            ],
            [
                'name' => 'SAN JUAN ESTE',
                'activated' => true,
                'code' => '0205',
                'regional_id' => 'SA0001',
            ],
            [
                'name' => 'SAN JUAN OESTE',
                'activated' => true,
                'code' => '0206',
                'regional_id' => 'SA0001',
            ],
            [
                'name' => 'HONDO VALLE',
                'activated' => true,
                'code' => '0207',
                'regional_id' => 'SA0001',
            ],

             //Distritos de AZUA 
             [
                'name' => 'AZUA',
                'activated' => true,
                'code' => '0301',
                'regional_id' => 'AZ0001',
            ],
            [
                'name' => 'PADRE DE LAS CASAS',
                'activated' => true,
                'code' => '0302',
                'regional_id' => 'AZ0001',
            ],
            [
                'name' => 'SAN JOSE DE OCOA',
                'activated' => true,
                'code' => '0303',
                'regional_id' => 'AZ0001',
            ],
            [
                'name' => 'BANI',
                'activated' => true,
                'code' => '0304',
                'regional_id' => 'AZ0001',
            ],
            [
                'name' => 'NIZAO',
                'activated' => true,
                'code' => '0305',
                'regional_id' => 'AZ0001',
            ],

            // Agrega más distritos según sea necesario
        ];
        foreach ($districts as $district) {
            District::create($district);
        }

    }
}

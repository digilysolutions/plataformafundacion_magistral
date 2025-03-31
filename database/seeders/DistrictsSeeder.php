<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Regional;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DistrictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $districts = [
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
            // Agrega más distritos según sea necesario
        ];
        foreach ($districts as $district) {
            District::create($district);
        }

    }
}

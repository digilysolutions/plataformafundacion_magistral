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
                'id' => Str::uuid(),
                'name' => 'Santo Domingo',
                'address' => 'Avenida John F. Kennedy',
                'phone' => '809-555-1234',
                'mail' => 'santo.domingo@example.com',
                'activated' => true,
                'country_id' =>  $countryId, // Reemplazar con el UUID real
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Santiago',
                'address' => 'Calle 30 de Marzo',
                'phone' => '809-555-5678',
                'mail' => 'santiago@example.com',
                'activated' => true,
                'country_id' =>  $countryId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'La Altagracia',
                'address' => 'Calle 1, Punta Cana',
                'phone' => '809-555-8765',
                'mail' => 'alta.gracia@example.com',
                'activated' => true,
                'country_id' =>  $countryId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'San Cristóbal',
                'address' => 'Calle Independencia',
                'phone' => '809-555-3210',
                'mail' => 'san.cristobal@example.com',
                'activated' => true,
                'country_id' =>  $countryId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'San Pedro de Macorís',
                'address' => 'Avenida Francisco Alberto Caamaño',
                'phone' => '809-555-9624',
                'mail' => 'san.pedro@example.com',
                'activated' => true,
                'country_id' =>  $countryId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Puerto Plata',
                'address' => 'Calle José Francisco Peña Gómez',
                'phone' => '809-555-6543',
                'mail' => 'puerto.plata@example.com',
                'activated' => true,
                'country_id' =>  $countryId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'La Vega',
                'address' => 'Avenida Pedro A. Rivera',
                'phone' => '809-555-4411',
                'mail' => 'la.vega@example.com',
                'activated' => true,
                'country_id' =>  $countryId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Mahó',
                'address' => 'Calle Maximo Gomez',
                'phone' => '809-555-2345',
                'mail' => 'maho@example.com',
                'activated' => true,
                'country_id' =>  $countryId,
            ],
            // Agrega más regionales según sea necesario
        ];

        DB::table('regionals')->insert($regionals);
    }
}

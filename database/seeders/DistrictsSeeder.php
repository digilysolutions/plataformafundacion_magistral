<?php

namespace Database\Seeders;

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
        $regionals = Regional::all();


        // Primero, obtenemos los IDs de las regionales
        $santoDomingoId = null; // Cambia esto por el UUID real
        $santiagoId = null;; // Cambia esto por el UUID real
        $laAltagraciaId = null;; // Cambia esto por el UUID real
        $sanCristobalId = null;; // Cambia esto por el UUID real
        $sanPedroDeMacorisId = null;; // Cambia esto por el UUID real
        $puertoPlataId = null;; // Cambia esto por el UUID real
        $laVegaId = null;; // Cambia esto por el UUID real
        $mahoId = null;; // Cambia esto por el UUID real

        foreach ($regionals as $regional) {

            switch ($regional['name']) {
                case 'Santo Domingo':
                    $santoDomingoId = $regional['id'];
                    break;
                case 'Santiago':
                    $santiagoId = $regional['id'];
                    break;
                case 'La Altagracia':
                    $laAltagraciaId = $regional['id'];
                    break;
                case 'San Cristóbal':
                    $sanCristobalId = $regional['id'];
                    break;
                case 'San Pedro de Macorís':
                    $sanPedroDeMacorisId = $regional['id'];
                    break;
                case 'Puerto Plata':
                    $puertoPlataId = $regional['id'];
                    break;
                case 'La Vega':
                    $laVegaId = $regional['id'];
                    break;
                case 'Mahó':
                    $mahoId = $regional['id'];
                    break;
            }
        }
        $districts = [
            [
                'id' => Str::uuid(),
                'name' => 'Distrito Nacional',
                'address' => 'Calle El Conde, Santo Domingo',
                'phone' => '809-555-1111',
                'mail' => 'distrito.nacional@example.com',
                'activated' => true,
                'regional_id' => $santoDomingoId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Santo Domingo Este',
                'address' => 'Avenida 27 de Febrero',
                'phone' => '809-555-2222',
                'mail' => 'santo.dgo.este@example.com',
                'activated' => true,
                'regional_id' => $santoDomingoId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Santo Domingo Oeste',
                'address' => 'Calle Juan Pablo Duarte',
                'phone' => '809-555-3333',
                'mail' => 'santo.dgo.oeste@example.com',
                'activated' => true,
                'regional_id' => $santoDomingoId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Santiago de los Caballeros',
                'address' => 'Avenida 27 de Febrero',
                'phone' => '809-555-4444',
                'mail' => 'santiago.caballeros@example.com',
                'activated' => true,
                'regional_id' => $santiagoId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Santiago Rodríguez',
                'address' => 'Calle Duarte',
                'phone' => '809-555-5555',
                'mail' => 'santiago.rodriguez@example.com',
                'activated' => true,
                'regional_id' => $santiagoId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'La Altagracia',
                'address' => 'Punta Cana',
                'phone' => '809-555-6666',
                'mail' => 'alta.gracia@example.com',
                'activated' => true,
                'regional_id' => $laAltagraciaId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Cristóbal',
                'address' => 'San Cristóbal',
                'phone' => '809-555-7777',
                'mail' => 'san.cristobal.distrito@example.com',
                'activated' => true,
                'regional_id' => $sanCristobalId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'San Pedro',
                'address' => 'San Pedro de Macorís',
                'phone' => '809-555-8888',
                'mail' => 'san.pedro.distrito@example.com',
                'activated' => true,
                'regional_id' => $sanPedroDeMacorisId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Puerto Plata',
                'address' => 'Puerto Plata',
                'phone' => '809-555-9999',
                'mail' => 'puerto.plata.distrito@example.com',
                'activated' => true,
                'regional_id' => $puertoPlataId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'La Vega',
                'address' => 'La Vega',
                'phone' => '809-555-0000',
                'mail' => 'la.vega.distrito@example.com',
                'activated' => true,
                'regional_id' => $laVegaId,
            ],
            [
                'id' => Str::uuid(),
                'name' => 'Maho',
                'address' => 'Maho',
                'phone' => '809-555-1212',
                'mail' => 'maho.distrito@example.com',
                'activated' => true,
                'regional_id' => $mahoId,
            ],
            // Agrega más distritos según sea necesario
        ];

        DB::table('districts')->insert($districts);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\User;
use App\Models\Validator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ValidatorSeeder extends Seeder
{public function run()
    {
        // Define los datos de los validadores
        $validatorsData = [
            [
                'name' => 'Validador 1',
                'lastname' => 'Apellido V1',
                'email' => 'validador1@fundacionmagistral.org',
                'phone' => $this->generateRandomPhone(),
                'specialty_id' => 'CI0001'
            ],
            [
                'name' => 'Validador 2',
                'lastname' => 'Apellido V2',
                'email' => 'validador2@fundacionmagistral.org',
                'phone' => $this->generateRandomPhone(),
                'specialty_id' => 'ES0001'
            ],
            [
                'name' => 'Validador 3',
                'lastname' => 'Apellido V3',
                'email' => 'validador3@fundacionmagistral.org',
                'phone' => $this->generateRandomPhone(),
                'specialty_id' => 'MA0001'
            ],
            [
                'name' => 'Validador 4',
                'lastname' => 'Apellido V4',
                'email' => 'validador4@fundacionmagistral.org',
                'phone' => $this->generateRandomPhone(),
                'specialty_id' => 'CI0002'
            ],
        ];

        foreach ($validatorsData as $data) {
            // Crear el usuario
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'activated' => true,
                'password' => Hash::make('Validador2025*'),
                'verification_token' => Str::random(40),
                'verification_code' => random_int(100000, 999999),
                'membership_id' => 'BA0001',
                'role' => 'Validador',
                'roleid' => 4,
            ]);

            // Crear la persona
            $person = Person::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'lastname' => $data['lastname'],
                'phone' => $data['phone'],
                'activated' => true,
                'user_id' => $user->id
            ]);

            // Crear el validador
            Validator::create([
                'name' => $data['name'],
                'activated' => true,
                'people_id' => $person->id,
                'specialty_id' => $data['specialty_id']
            ]);
        }
    }

    // Método para generar un número de teléfono aleatorio específico para República Dominicana
    private function generateRandomPhone()
    {
        // Crea un número de teléfono aleatorio en el formato de República Dominicana
        return '1' . rand(829, 849) . rand(1000000, 9999999);
    }
}

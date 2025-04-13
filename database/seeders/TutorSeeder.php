<?php

namespace Database\Seeders;

use App\Models\Person;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class TutorSeeder extends Seeder
{
    public function run()
    {
        // Definir los datos de los tutores
        $tutorsData = [
            [
                'name' => 'Tutor 1',
                'lastname' => 'Apellido T1',
                'email' => 'tutor1@fundacionmagistral.org',
                'phone' => $this->generateRandomPhone(),
                'studycenters_id' => 'DI0001',
                'specialty_id' => 'CI0001'
            ],
            [
                'name' => 'Tutor 2',
                'lastname' => 'Apellido T2',
                'email' => 'tutor2@fundacionmagistral.org',
                'phone' => $this->generateRandomPhone(),
                'studycenters_id' => 'DI0001',
                'specialty_id' => 'ES0001'
            ],
            [
                'name' => 'Tutor 3',
                'lastname' => 'Apellido T3',
                'email' => 'tutor3@fundacionmagistral.org',
                'phone' => $this->generateRandomPhone(),
                'studycenters_id' => 'DI0001',
                'specialty_id' => 'MA0001'
            ],
            [
                'name' => 'Tutor 4',
                'lastname' => 'Apellido T4',
                'email' => 'tutor4@fundacionmagistral.org',
                'phone' => $this->generateRandomPhone(),
                'studycenters_id' => 'DI0001',
                'specialty_id' => 'CI0002'
            ],
            [
                'name' => 'Tutor 5',
                'lastname' => 'Apellido T5',
                'email' => 'fundationtutor@fundacionmagistral.org',
                'phone' => $this->generateRandomPhone(),
                //'studycenters_id' no se asigna para el tutor de fundación
                'specialty_id' => 'ES0001' // Puedes asignar la especialidad que creas adecuada
            ],
        ];

        foreach ($tutorsData as $data) {
            // Crear el usuario
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'activated' => true,
                'password' => Hash::make('Tutor2025*'),
                'verification_token' => Str::random(40),
                'verification_code' => random_int(100000, 999999),
                'membership_id' => 'BA0001',
                'role' => 'Tutor',
                'roleid' => 3,
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

            // Crear el tutor
            $tutor = Tutor::create([
                'name' => $data['name'],
                'activated' => true,
                'people_id' => $person->id,
                'studycenters_id' => $data['studycenters_id'] ?? null ,
                'specialty_id' => $data['specialty_id']

            ]);

            // Crear la relación con specialty
            $this->attachSpecialty($tutor, $data['specialty_id']);
        }
    }

    private function generateRandomPhone()
    {
        // Genera un número de teléfono aleatorio en el formato de República Dominicana
        return '1' . rand(829, 849) . rand(1000000, 9999999);
    }

    private function attachSpecialty(Tutor $tutor, string $specialtyId)
    {
        // Relacionar el tutor con la especialidad
        $tutor->specialties()->attach($specialtyId);
    }
}

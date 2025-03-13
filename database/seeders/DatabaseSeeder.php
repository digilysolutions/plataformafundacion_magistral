<?php

namespace Database\Seeders;

use App\Models\MembershipFeature;
use App\Models\Person;
use App\Models\Student;
use App\Models\StudyCenter;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(MembershipStatusSeeder::class);
        $this->call(MembershipSeeder::class);
        // User::factory(10)->create();
        $roles = [
            'Centro Educativo',
            'Estudiante',
            'Tutor',
            'Validador',
            'Administrador',
            'Usuario'
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }


        User::factory()->create([
            'name' => 'Centro educativo',
            'email' => 'centroeducativo@gmail.com',
            'password' => '1234',
            'role' => 'Centro Educativo',
            'roleid' => 1
        ]);
        $person_studyCenter = [
            [
                'name' => 'Responsable Center',
                'lastname' => 'Centro educativo',
                'email' => 'ytrpiloto@gmail.com',
                'user_id' => 1,
                'activated' => true,
            ]
        ];

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'estudiante@gmail.com',
            'password' => '1234',
            'role' => 'Estudiante',
            'roleid' => 2
        ]);

        User::factory()->create([
            'name' => 'Tutor',
            'email' => 'tutor@gmail.com',
            'password' => '1234',
            'role' => 'Tutor',
            'roleid' => 3
        ]);

        User::factory()->create([
            'name' => 'Validador',
            'email' => 'validador@gmail.com',
            'password' => '1234',
            'role' => 'Validador',
            'roleid' => 4
        ]);

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'role' => 'Administrador',
            'password' => '1234',
            'roleid' => 5
        ]);

        $user = User::factory()->create([
            'name' => 'Usuario',
            'email' => 'usuario@gmail.com',
            'role' => 'Usuario',
            'password' => '1234',
            'roleid' => 6
        ]);
        $person = Person::create(
            [
                'name' => 'Usuario ',
                'lastname' => 'Normal',
                'email' => 'usuario@gmail.com',
                'phone' => '58205454',
                'user_id' =>  $user->id,
            ]
        );
        $student = Student::create(
            [
                'name' =>  $person->name,
                'people_id'=>$person->id,
                'course'=>'Curso 1',
                'membership_id'=>'BA0001'

            ]
        );

        $this->call(CountrySeeder::class);
        //$this->call(RegionalsSeeder::class);
        //$this->call(DistrictsSeeder::class);
        $this->call(SpecialtiesSeeder::class);

        $this->call(FeatureSeeder::class);
        //$this->call(StyCenterSeeder::class);
    }
}

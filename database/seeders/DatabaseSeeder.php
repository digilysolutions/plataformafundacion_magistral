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
            'Usuario',
            'SuperAdmin'
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



        $user = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'role' => 'Administrador',
            'password' => '1234',
            'roleid' => 5
        ]);
        $person = Person::create(
            [
                'name' => 'Administrador',
                'email' => 'admin@gmail.com',
                'phone' => '58205454',
                'user_id' =>  $user->id,
            ]
        );
        $user = User::factory()->create([
            'name' => 'Yasniel',
            'email' => 'yrpiloto@nauta.cu',
            'role' => 'Administrador',
            'password' => '1234',
            'roleid' => 5
        ]);
        $person = Person::create(
            [
                'name' => 'Yasniel',
                'email' => 'yrpiloto@nauta.cu',
                'phone' => '58205454',
                'user_id' =>  $user->id,
            ]
        );
        $user = User::factory()->create([
            'name' => 'Jorge',
            'email' => 'jbarramedac@gmail.com',
            'role' => 'Administrador',
            'password' => 'Plataforma2025*',
            'roleid' => 5
        ]);
        $person = Person::create(
            [
                'name' => 'Jorge',
                'email' => 'jbarramedac@gmail.com',
                'lastname' => 'Barrameda',
                'phone' => '58205454',
                'user_id' =>  $user->id,
            ]
        );

        $user = User::factory()->create([
            'name' => 'Usuario',
            'email' => 'usuario@gmail.com',
            'role' => 'Usuario',
            'password' => '1234',
            'membership_id' => 'BA0001',
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


        $this->call(CountrySeeder::class);
        $this->call(RegionalsSeeder::class);
        $this->call(DistrictsSeeder::class);
        $this->call(SpecialtiesSeeder::class);

        $this->call(FeatureSeeder::class);
        $this->call(StyCenterSeeder::class);
        $this->call(MemberShipMemberShipFeatureSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(ValidatorSeeder::class);
        $this->call(TutorSeeder::class);
    }
}

<?php

namespace Database\Seeders;

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
            'password'=>'1234',
            'role'=>'Centro Educativo',
            'roleid'=>1
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'estudiante@gmail.com',
            'password'=>'1234',
            'role'=>'Estudiante',
            'roleid'=>2
        ]);

        User::factory()->create([
            'name' => 'Tutor',
            'email' => 'tutor@gmail.com',
            'password'=>'1234',
            'role'=>'Tutor',
            'roleid'=>3
        ]);

        User::factory()->create([
            'name' => 'Validador',
            'email' => 'validador@gmail.com',
            'password'=>'1234',
            'role'=>'Validador',
            'roleid'=>4
        ]);

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@gmail.com',
            'role'=>'Administrador',
            'password'=>'1234',
            'roleid'=>5
        ]);

        User::factory()->create([
            'name' => 'Usuario',
            'email' => 'usuario@gmail.com',
            'role'=>'Usuario',
            'password'=>'1234',
            'roleid'=>6
        ]);
        $this->call(CountrySeeder::class);
        $this->call(RegionalsSeeder::class);
        $this->call(DistrictsSeeder::class);
        $this->call(SpecialtiesSeeder::class);
        $this->call(MembershipSeeder::class);
    }
}

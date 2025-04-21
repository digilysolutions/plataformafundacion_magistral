<?php

namespace Database\Seeders;

use App\Models\MembershipHistory;
use App\Models\MembershipStatus;
use App\Models\Person;
use App\Models\StudyCenter;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;
class StyCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user= User::create([
            'name' => 'Divina',
            'email' => 'divina.pastora@fundacionmagistral.org',
            'password' => '1234',
            'role' => 'Centro Educativo',
            'roleid' => 1
        ]);
        $user1= User::create([
            'name' => 'Fundacion',
            'email' => 'fundacion@fundacionmagistral.org',
            'password' => '1234',
            'role' => 'Centro Educativo',
            'roleid' => 1
        ]);

        $person = Person::create(
            [
                'name' => 'RESPONSABLE',
                'lastname' => 'Centro DIVINA PASTORA',
                'email' => '',
                'user_id' => $user->id
            ]
        );

        $person1 = Person::create(   [
                'name' => 'Fundacion',
                'lastname' => 'Magistral',
                'email' => 'fundacion@fundacionmagistral.org',
                'user_id' => $user1->id
        ]);
        $studiesCenter = [
            [
                'name' => 'DIVINA PASTORA',
                'code' => '06466',
                'regional_id' => 'BA0001',
                'district_id' => 'BA0001',
                'mail'=>'divina.pastora@fundacionmagistral.org',
                'people_id' => $person->id,
                'activated' => true,
                'membership_id'=>'BA0001'
            ],
            [
                'name' => 'Fundación',
                'code' => '10001',
                'regional_id' => 'BA0001',
                'district_id' => 'BA0001',
                'mail'=>'fundacion@fundacionmagistral.org',
                'people_id' => $person1->id,
                'activated' => true,
                'membership_id'=>'BA0001'
            ],
        ];

        $membershipStatusId = MembershipStatus::where('name', 'Activo')->value('id');

        foreach ($studiesCenter as $studyCenter) {
            StudyCenter::create($studyCenter);
            MembershipHistory::create(
                [
                    'id' => Str::uuid(),
                    'user_id'=>1,
                    'membership_id'=>'BA0001',
                    'start_date' => Carbon::now(),
                    'membership_statuses_id'=>  $membershipStatusId,
                ]
            );

        }
    }
}

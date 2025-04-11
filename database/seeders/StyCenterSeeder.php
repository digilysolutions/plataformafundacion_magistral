<?php

namespace Database\Seeders;

use App\Models\MembershipHistory;
use App\Models\MembershipStatus;
use App\Models\Person;
use App\Models\StudyCenter;
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
        $person = Person::create(
            [
                'name' => 'Responsable',
                'lastname' => 'Centro DIVINA PASTORA',
                'email' => 'divina.pastora@fundacionmagistral.org',
                'user_id' => 1


            ]
        );
        $studiesCenter = [
            [
                'name' => 'DIVINA PASTORA',
                'code' => '06466',
                'regional_id' => 'BA0001',
                'district_id' => 'BA0001',
                'people_id' => $person->id,
                'activated' => true,
                'membership_id'=>'BA0001'
            ]
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

<?php

namespace App\Imports;

use App\Models\Regional;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class RegionalImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Regional([
                'name' =>  $row['name'],
                'address' =>  $row['address'],
                'phone' =>  $row['phone'],
                'mail' =>  $row['mail'],
                'activated' =>  $row['activated'],
                'country_id' =>  $row['country_id']
        ]);
    }
}

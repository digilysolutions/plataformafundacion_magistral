<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

/**
 * Class Country
 *
 * @property $id
 * @property $activated
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Country extends ModelMain
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['activated', 'name'];
    public function regionals()
    {
        return $this->hasMany(\App\Models\Regional::class, 'id', 'country_id');
    }

}

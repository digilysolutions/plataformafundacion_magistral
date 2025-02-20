<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Level
 *
 * @property $id
 * @property $activated
 * @property $name
 * @property $description
 * @property $specialty_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Specialty $specialty
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Level extends ModelMain
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['activated', 'name', 'description'];



}

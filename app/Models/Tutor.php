<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

/**
 * Class Tutor
 *
 * @property $id
 * @property $activated
 * @property $name
 * @property $people_id
 * @property $specialty_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Person $person
 * @property Specialty $specialty
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Tutor extends ModelMain
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['activated','studycenters_id', 'people_id', 'specialty_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'people_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specialty()
    {
        return $this->belongsTo(\App\Models\Specialty::class, 'specialty_id', 'id');
    }
    public function studyCenter()
    {
        return $this->belongsTo(\App\Models\StudyCenter::class, 'studycenters_id', 'id');
    }


}

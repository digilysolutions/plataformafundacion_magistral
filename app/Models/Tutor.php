<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

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
    protected $fillable = ['name', 'activated', 'studycenters_id', 'people_id','specialty_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class, 'people_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specialties()
    {
        return $this->belongsToMany(Specialty::class, 'specialty_tutor', 'tutor_id', 'specialty_id');
    }
    public function studyCenter()
    {
        return $this->belongsTo(\App\Models\StudyCenter::class, 'studycenters_id', 'id');
    }
    public function specialty() {
        return $this->belongsTo(Specialty::class);
    }

}

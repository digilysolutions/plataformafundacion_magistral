<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Student
 *
 * @property $id
 * @property $activated
 * @property $people_id
 * @property $course
 * @property $studycenters_id
 * @property $user_id
 * @property $membership_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Membership $membership
 * @property Person $person
 * @property StudyCenter $studyCenter
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Student extends ModelMain
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name','activated', 'people_id', 'course', 'studycenters_id','membership_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function membership()
    {
        return $this->belongsTo(\App\Models\Membership::class, 'membership_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function studyCenter()
    {
        return $this->belongsTo(\App\Models\StudyCenter::class, 'studycenters_id', 'id');
    }
    public function person()
    {
        return $this->belongsTo(\App\Models\Person::class,'people_id', 'id');
    }


}

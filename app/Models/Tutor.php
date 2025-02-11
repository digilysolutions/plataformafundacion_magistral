<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Tutor extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['activated', 'name', 'people_id', 'specialty_id'];


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
    
}

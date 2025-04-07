<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Validator
 *
 * @property $id
 * @property $name
 * @property $activated
 * @property $people_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Person $person
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Validator extends ModelMain
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'activated', 'people_id','specialty_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person() { // Cambia "people" a "person"
        return $this->belongsTo(Person::class, 'people_id');
    }
    public function specialty() {
        return $this->belongsTo(Specialty::class);
    }

}

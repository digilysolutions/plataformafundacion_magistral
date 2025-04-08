<?php

namespace App\Models;

use App\Models\Validator;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
/**
 * Class Person
 *
 * @property $id
 * @property $activated
 * @property $name
 * @property $lastname
 * @property $email
 * @property $phone
 * @property $tracking_code
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Person extends ModelMain
{

    protected $perPage = 20;
    use HasUuids;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['activated', 'name', 'lastname', 'email', 'phone', 'tracking_code','user_id'];

    public function student(): HasOne
    {
        return $this->hasOne(Student::class,'people_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    public function user() { // Cambia "people" a "person"
        return $this->belongsTo(User::class, 'user_id');
    }
    public function validator() { // Solo un validador por persona
        return $this->hasOne(Validator::class, 'people_id');
    }
    public function tutor() { // Solo un validador por persona
        return $this->hasOne(Tutor::class, 'people_id');
    }
    public function studyCenter(): HasOne
    {
        return $this->hasOne(StudyCenter::class, 'people_id');
    }


}

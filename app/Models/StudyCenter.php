<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
/**
 * Class StudyCenter
 *
 * @property $id
 * @property $activated
 * @property $name
 * @property $address
 * @property $phone
 * @property $mail
 * @property $tracking_code
 * @property $regional_id
 * @property $district_id
 * @property $people_id
 * @property $membership_id
 * @property $created_at
 * @property $updated_at
 *
 * @property District $district
 * @property Membership $membership
 * @property Person $person
 * @property Regional $regional
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class StudyCenter extends ModelMain
{
    use  HasUuids;
    protected $perPage = 20;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['activated', 'name', 'address', 'phone', 'mail', 'tracking_code', 'regional_id', 'district_id', 'people_id', 'membership_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function district()
    {
        return $this->belongsTo(\App\Models\District::class, 'district_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'people_id');
    }

    public function membership(): BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regional()
    {
        return $this->belongsTo(\App\Models\Regional::class, 'regional_id', 'id');
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }

}

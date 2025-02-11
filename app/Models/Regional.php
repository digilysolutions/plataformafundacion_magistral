<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Regional
 *
 * @property $id
 * @property $name
 * @property $address
 * @property $phone
 * @property $mail
 * @property $tracking_code
 * @property $created_at
 * @property $updated_at
 *
 * @property District[] $districts
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Regional extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'address', 'phone', 'mail', 'tracking_code'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function districts()
    {
        return $this->hasMany(\App\Models\District::class, 'id', 'regional_id');
    }
    
}

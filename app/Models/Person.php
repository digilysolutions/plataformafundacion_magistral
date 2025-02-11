<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
class Person extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['activated', 'name', 'lastname', 'email', 'phone', 'tracking_code'];


}

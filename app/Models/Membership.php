<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

/**
 * Class Membership
 *
 * @property $id
 * @property $activated
 * @property $name
 * @property $price
 * @property $duration_days
 * @property $is_studio_center
 * @property $student_limit
 * @property $limite_items
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Membership extends Model
{

    protected $perPage = 20;
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Uuid::uuid4();
        });
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['activated', 'name', 'price', 'duration_days', 'is_studio_center', 'student_limit', 'limite_items'];


}

<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;

/**
 * Class District
 *
 * @property $id
 * @property $activated
 * @property $name
 * @property $tracking_code
 * @property $address
 * @property $phone
 * @property $mail
 * @property $regional_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Regional $regional
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class District extends Model
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
    protected $fillable = ['activated', 'name', 'tracking_code', 'address', 'phone', 'mail', 'regional_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regional()
    {
        return $this->belongsTo(\App\Models\Regional::class, 'regional_id', 'id');
    }

}

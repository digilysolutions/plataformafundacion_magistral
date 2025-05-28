<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sublevel
 *
 * @property $id
 * @property $activated
 * @property $name
 * @property $shortname
 * @property $description
 * @property $level_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Level $level
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sublevel extends ModelMain
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['activated', 'name', 'shortname', 'description', 'level_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level()
    {
        return $this->belongsTo(\App\Models\Level::class, 'level_id', 'id');
    }
    
}

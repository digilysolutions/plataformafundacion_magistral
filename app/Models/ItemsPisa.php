<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemsPisa
 *
 * @property $id
 * @property $name
 * @property $code
 * @property $year
 * @property $question
 * @property $activated
 * @property $state
 * @property $resource
 * @property $ai_help
 * @property $specialty_id
 * @property $level_id
 * @property $sublevel_id
 * @property $content_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Content $content
 * @property Level $level
 * @property Specialty $specialty
 * @property Sublevel $sublevel
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ItemsPisa extends ModelMain
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'code', 'year', 'question', 'activated', 'state', 'resource', 'ai_help', 'specialty_id', 'level_id', 'sublevel_id', 'content_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function content()
    {
        return $this->belongsTo(\App\Models\Content::class, 'content_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function level()
    {
        return $this->belongsTo(\App\Models\Level::class, 'level_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specialty()
    {
        return $this->belongsTo(\App\Models\Specialty::class, 'specialty_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sublevel()
    {
        return $this->belongsTo(\App\Models\Sublevel::class, 'sublevel_id', 'id');
    }
    
}

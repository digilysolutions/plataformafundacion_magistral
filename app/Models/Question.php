<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 *
 * @property $id
 * @property $specialty_id
 * @property $level_id
 * @property $question
 * @property $created_at
 * @property $updated_at
 *
 * @property Level $level
 * @property Specialty $specialty
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Question extends ModelMain
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['specialty_id', 'level_id', 'question','activated','name','activated'];


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
    public function answers()
    {
        return $this->hasMany(\App\Models\Answer::class, 'id', 'question_id');
    }


}

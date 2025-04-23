<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Answer
 *
 * @property $id
 * @property $question_id
 * @property $answer
 * @property $is_correct
 * @property $created_at
 * @property $updated_at
 *
 * @property Question $question
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Answer extends ModelMain
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['question_id', 'answer', 'is_correct','activated'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(\App\Models\Question::class, 'question_id', 'id');
    }

}

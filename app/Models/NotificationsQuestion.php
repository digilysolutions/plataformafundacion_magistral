<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NotificationsQuestion
 *
 * @property $question_id
 * @property $id
 * @property $validator_id
 * @property $tutor_id
 * @property $student_id
 * @property $study_center_id
 * @property $action
 * @property $is_read
 * @property $created_at
 * @property $updated_at
 *
 * @property Question $question
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class NotificationsQuestion extends ModelMain
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['question_id', 'validator_id', 'tutor_id', 'student_id', 'study_center_id', 'action', 'is_read'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function question()
    {
        return $this->belongsTo(\App\Models\Question::class, 'question_id', 'id');
    }
    
}

<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AnswersPisa
 *
 * @property $id
 * @property $name
 * @property $answer
 * @property $is_correct
 * @property $activated
 * @property $itempisa_id
 * @property $created_at
 * @property $updated_at
 *
 * @property ItemsPisa $itemsPisa
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AnswersPisa extends ModelMain
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'answer', 'is_correct', 'activated', 'itempisa_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function itemsPisa()
    {
        return $this->belongsTo(\App\Models\ItemsPisa::class, 'itempisa_id', 'id');
    }
    
}

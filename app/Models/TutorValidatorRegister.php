<?php

namespace App\Models;

use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TutorValidatorRegister
 *
 * @property $id
 * @property $name
 * @property $lastname
 * @property $mail
 * @property $phone
 * @property $type
 * @property $state
 * @property $verification_token
 * @property $verification_code
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TutorValidatorRegister extends ModelMain
{

    protected $perPage = 20;
    protected $table = 'tutor_validator_register';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'lastname', 'mail', 'phone', 'type', 'state', 'verification_token', 'verification_code'];
}

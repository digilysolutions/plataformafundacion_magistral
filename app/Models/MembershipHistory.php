<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MembershipHistory
 *
 * @property $id
 * @property $user_id
 * @property $membership_id
 * @property $start_date
 * @property $end_date
 * @property $status
 * @property $message
 * @property $created_at
 * @property $updated_at
 *
 * @property Membership $membership
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MembershipHistory extends ModelMain
{
    use HasUuids;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['user_id', 'membership_id', 'start_date', 'end_date',  'membership_statuses_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function membership()
    {
        return $this->belongsTo(\App\Models\Membership::class, 'membership_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
    public function membershipStatus()
    {
        return $this->belongsTo(\App\Models\MembershipStatus::class, 'membership_statuses_id', 'id');
    }


}

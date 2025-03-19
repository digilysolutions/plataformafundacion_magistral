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



    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function membershipStatus()
    {
        return $this->belongsTo(MembershipStatus::class);
    }


}

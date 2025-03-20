<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MembershipFeaturesMembership
 *
 * @property $id
 * @property $membership_id
 * @property $membership_feature_id
 * @property $value
 * @property $created_at
 * @property $updated_at
 *
 * @property MembershipFeature $membershipFeature
 * @property Membership $membership
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MembershipFeaturesMembership extends ModelMain
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['membership_id', 'membership_feature_id', 'value','description','has_access','current_usage','url','usage_limit'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function membershipFeature()
    {
        return $this->belongsTo(\App\Models\MembershipFeature::class, 'membership_feature_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function membership()
    {
        return $this->belongsTo(\App\Models\Membership::class, 'membership_id', 'id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
/**
 * Class Membership
 *
 * @property $id
 * @property $activated
 * @property $name
 * @property $price
 * @property $duration_days
 * @property $is_studio_center
 * @property $student_limit
 * @property $limite_items
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Membership extends ModelMain
{
    use  HasUuids;

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['activated', 'name','type','start_date','end_date', 'price', 'duration_days', 'is_studio_center'];
    public function studyCenters()
    {
        return $this->hasMany(StudyCenter::class);
    }
    public function features()
    {
        return $this->belongsToMany(MembershipFeature::class, 'membership_features_memberships')
            ->withPivot('value');
    }
    public function membershipFeatures()
    {
        return $this->belongsToMany(MembershipFeature::class, 'membership_features_memberships')
            ->withPivot('value', 'description', 'usage_limit', 'current_usage', 'has_access', 'url')
            ->withTimestamps();
    }

    public function membershipHistories()
    {
        return $this->hasMany(MembershipHistory::class);
    }

}

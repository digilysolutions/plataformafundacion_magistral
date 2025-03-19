<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MembershipFeature
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $activated
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class MembershipFeature extends ModelMain
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name', 'description', 'activated'];

    public function memberships()
    {
        return $this->belongsToMany(Membership::class, 'membership_features_memberships')
            ->withPivot('value');
    }
}

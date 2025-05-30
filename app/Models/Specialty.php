<?php
namespace App\Models;

/**
 * Class Specialty
 *
 * @property $id
 * @property $activated
 * @property $name
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Specialty extends ModelMain
{

    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['activated', 'name','shortname'];



    public function validators()
    {
        return $this->hasMany(Validator::class, 'specialty_id', 'id');
    }
}

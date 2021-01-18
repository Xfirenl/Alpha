<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'actions';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'location_id',
    ];


    public function locations()
    {
        return $this->hasMany(ActionDrops::class);
    }

    public function skills()
    {
        return $this->belongsTo(skills::class, 'skill_requirement');
    }

    public static function Show($locationId)
    {
        return Action::with('skills')->where('location_id', $locationId);
    }
}

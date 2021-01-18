<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'skills';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
    ];

    public function playerSkills()
    {
        return $this->hasMany(PlayerSkills::class);
    }

    public function actions()
    {
        return $this->hasMany(Action::class);
    }

    public static function listAllSkills()
    {
        return Skills::all();
    }
}

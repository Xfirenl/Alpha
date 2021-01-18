<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Territory extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'territories';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];


    public function locations()
    {
        return $this->hasMany(Location::class);
    }

    public static function listAllTerritories()
    {
        return Territory::all();
    }
}

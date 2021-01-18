<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
    ];


    public function territory()
    {
        return $this->belongsTo(Territory::class);
    }

    public static function listCurrentLocation()
    {
        $currentLocation = app('App\Http\Controllers\PlayerController')->player()['location'];
        return Location::with('territory')->find($currentLocation);
    }

    public static function listAllLocations()
    {
        return Territory::with('locations')->get();
    }
}

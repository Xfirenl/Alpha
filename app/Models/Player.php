<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Player extends Model
{

    //disables created_at and updated_at in the model
    public $timestamps = false;

    protected $primaryKey = 'user_id';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'players';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name',
    ];

    protected $hidden = [
        'user_id',
    ];

    public static function CreatePlayer($userData)
    {
        $player =  Player::create([
            'user_id' => $userData['user_id'],
            'name' => $userData['name'],
            'hp' => 10,
            'level' => 1,
            'experience' => 0
        ]);
        return $player;
    }

    public function playerSkills()
    {
        return $this->hasMany(PlayerSkills::class);
    }

    public function getLevelOfSkill($skillId)
    {
        return PlayerSkills::where(['user_id', Auth::id()]);
    }
}

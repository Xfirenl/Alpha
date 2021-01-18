<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PlayerSkills extends Model
{
    //disables created_at and updated_at in the model
    public $timestamps = false;

    protected $primaryKey = 'user_id';


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'player_skills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'skill_id', 'exp', 'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
        'skill_id'
    ];

    public function player()
    {
        return $this->belongsTo(Player::class, 'user_id');
    }

    public function skills()
    {
        return $this->belongsTo(Skills::class, 'skill_id');
    }

    //create player skills upon registration
    public static function CreateSkillSet($playerId)
    {
        foreach (Skills::listAllSkills() as $skill) {
            PlayerSkills::create([
                'user_id' => $playerId,
                'skill_id' => $skill['id'],
                'exp' => 0,
                'level' => 1,
            ]);
        }
    }
}

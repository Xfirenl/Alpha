<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\PlayerSkills;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the user's profile.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
        $request->user();
    }

    public function skills()
    {
        return DB::table('player_skills')
            ->select('exp', 'level', 'name')
            ->join('skills', 'player_skills.skill_id', '=', 'skills.id')
            ->where('user_id', Auth::id())
            ->get();
    }
}

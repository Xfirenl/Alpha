<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Action;
use App\Models\ActionDrops;
use App\Models\PlayerSkills;
use App\Models\Location;
use App\Models\PlayerInventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function __construct(
        Player $player,
        Location $location,
        PlayerSkills $skills,
        Action $action,
        PlayerInventory $inventory
    ) {
        $this->player = $player;
        $this->skills = $skills;
        $this->playerSkills = $skills;
        $this->location = $location;
        $this->action = $action;
        $this->inventory = $inventory;
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
        // return $this->playerSkills
        //     ->with('skills')
        //     ->where('user_id', Auth::id())
        //     ->get();

        return $this->playerSkills
            ->join('skills', 'player_skills.skill_id', '=', 'skills.id')
            ->where('user_id', Auth::id())
            ->orderBy('name')
            ->get();
    }

    public function player()
    {
        return $this->player->find(Auth::id());
    }

    public function location()
    {
        return $this->location->with('territory')->where('id', $this->player()->location)->first();
    }

    public function listActions()
    {
        return $this->action->Show($this->player()->location)->get();
    }

    public function items()
    {
        return $this->inventory->with('items')->where('user_id', Auth::id())->get();
    }

    public function doAction($id)
    {
        $dropAmount = 1;
        $action = $this->action->find($id);

        $skillId = $action->skill_requirement;
        $levelRequirement = $action->level_requirement;

        $playerData = $this->playerSkills->where([['user_id', Auth::id()], ['skill_id', $skillId]])->first();

        $pExperience = $playerData->exp;
        $pLevel = $playerData->level;

        if ($pLevel >= $levelRequirement) {
            $newExp = $pExperience + $action->exp_gain;
            $drops = ActionDrops::where('action_id', $id)->get();
            $reward = [];

            foreach ($drops as $drop) {
                if (rand(0, 99) < $drop->chance) {
                    $reward["items"][] = ['item_id' => $drop->item_id, 'amount' => $dropAmount]; //for now a fixed amount of one, this need to be dynamic in the future
                    $test = PlayerInventory::where([['user_id', Auth::id()], ['item_id', $drop->item_id]])->first();
                    if ($test) {
                        $newAmount = $test->amount + $dropAmount;
                        PlayerInventory::where([['user_id', Auth::id()], ['item_id', $drop->item_id]])->update(['amount' => $newAmount]);
                    } else {
                        PlayerInventory::create([
                            'user_id' => Auth::id(),
                            'item_id' => $drop->item_id,
                            'amount' => $dropAmount,
                        ]);
                    }
                }
            }

            PlayerSkills::where([['user_id', Auth::id()], ['skill_id', $skillId]])->update(['exp' => $newExp]);
            $reward['exp'] = $action->exp_gain;
            return $reward;
        }
    }
}

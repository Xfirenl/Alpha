<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->insert([
            [
                'id' => 1,
                'location_id' => 1,
                'name' => "Gather fallen branches",
                'success_chance' => 100,
                'skill_requirement' => 1,
                'level_requirement' => 1,
                'exp_gain' => 10,
                'base_timer' => 20,
            ],
            [
                'id' => 2,
                'location_id' => 1,
                'name' => "Mine copper ore",
                'success_chance' => 100,
                'skill_requirement' => 2,
                'level_requirement' => 1,
                'exp_gain' => 10,
                'base_timer' => 30,
            ],
            [
                'id' => 3,
                'location_id' => 1,
                'name' => "Make copper sword",
                'success_chance' => 100,
                'skill_requirement' => 4,
                'level_requirement' => 1,
                'exp_gain' => 10,
                'base_timer' => 20,
            ],
        ]);

        DB::table('action_drops')->insert([
            [
                'action_id' => 1,
                'item_id' => 1,
                'min_amount' => 1,
                'max_amount' => 3,
                'chance' => 100,
            ],
            [
                'action_id' => 2,
                'item_id' => 2,
                'min_amount' => 1,
                'max_amount' => 3,
                'chance' => 100,
            ],
            [
                'action_id' => 3,
                'item_id' => 4,
                'min_amount' => 1,
                'max_amount' => 3,
                'chance' => 100,
            ],
            [
                'action_id' => 1,
                'item_id' => 3,
                'min_amount' => 1,
                'max_amount' => 1,
                'chance' => 20,
            ],
        ]);
        DB::table('items')->insert([
            [
                'id' => 1,
                'name' => 'Branch',
                'category_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Copper ore',
                'category_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Wooden handle',
                'category_id' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Copper sword',
                'category_id' => 1,
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            [
                'id' => 1,
                'name' => "Woodcutting"
            ],
            [
                'id' => 2,
                'name' => "Mining"
            ],
            [
                'id' => 3,
                'name' => "Crafting"
            ],
            [
                'id' => 4,
                'name' => "Smithing"
            ],
            [
                'id' => 5,
                'name' => "Combat"
            ],
        ];

        DB::table('skills')->insert($skills);
    }
}

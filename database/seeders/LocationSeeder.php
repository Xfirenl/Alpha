<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Territories')->insert([
            [
                'id' => 1,
                'name' => "Shadowfen",
            ],
        ]);

        DB::table('locations')->insert([
            [
                'id' => 1,
                'name' => "Oldham",
                'territory' => "1",
                'description' => "Oldham is a town located in the south of Shadowfen, the town is know for its rich copper mines and lush woods."
            ],
            [
                'id' => 2,
                'name' => "Pinnella Pass",
                'territory' => "1",
                'description' => "Pinella Pass is a dangerous pass which is rich in copper ore. Many have lost their lives in the mines and crossing this pass. <br /> This is also the only way out of the Shadowfen territory, making it easily defendable from enemy armies"

            ],
            [
                'id' => 3,
                'name' => "Shadowfan woods",
                'territory' => "1",
                'description' => "These woods located west of Oldham are teeming wild wolves and various critters, no wonder hunters love these woods."
            ],
        ]);
    }
}

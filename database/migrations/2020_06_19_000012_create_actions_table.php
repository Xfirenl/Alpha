<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'actions';

    /**
     * Run the migrations.
     * @table actions
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('location_id');
            $table->string('name', 45);
            $table->integer('success_chance');
            $table->integer('skill_requirement');
            $table->integer('level_requirement');
            $table->integer('exp_gain');
            $table->integer('base_timer');

            $table->index(["skill_requirement"], 'skill_requirement_idx');

            $table->index(["location_id"], 'location_id_idx');

            $table->unique(["id"], 'id_UNIQUE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionDropsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'action_drops';

    /**
     * Run the migrations.
     * @table action_drops
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('action_id');
            $table->integer('item_id');
            $table->integer('min_amount');
            $table->integer('max_amount');
            $table->integer('chance');

            $table->index(["item_id"], 'item_id_idx');

            $table->index(["action_id"], 'action_id_idx');
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'players';

    /**
     * Run the migrations.
     * @table players
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('user_id');
            $table->timestamp('botcheck')->nullable();
            $table->string('name');
            $table->integer('hp')->default(10);
            $table->integer('level')->default(1);
            $table->integer('experience')->default(0);

            $table->unique(["user_id"], 'user_id_UNIQUE');
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

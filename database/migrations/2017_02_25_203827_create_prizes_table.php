<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('prizes', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->decimal('cost_per_item');
          $table->decimal('total_per_team');
          $table->tinyInteger('purchased');
          $table->tinyInteger('delivered');
          $table->string('link');
          $table->integer('hackathon_id')->unsigned();

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::disableForeignKeyConstraints();
      Schema::drop('prizes');
    }
}

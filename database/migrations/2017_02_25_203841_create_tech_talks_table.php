<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechTalksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('tech_talks', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->string('presenter');
          $table->datetime('start_time');
          $table->datetime('end_time');
          $table->tinyInteger('confirmed');
          $table->integer('hackathon_id')->unsigned();
          $table->timestamps();
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
      Schema::drop('tech_talks');
    }
}

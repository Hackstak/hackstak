<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sponsors', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->decimal('contribution');
          $table->tinyInteger('confirmed');
          $table->tinyInteger('contacted');
          $table->integer('phone')->unsigned();
          $table->string('email');
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
      Schema::drop('sponsors');
    }
}

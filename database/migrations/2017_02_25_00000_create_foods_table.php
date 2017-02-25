<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('foods', function (Blueprint $table) {
          $table->increments('id');
          $table->string('company');
          $table->decimal('cost_per_person');
          $table->decimal('total_estimate');
          $table->integer('phone')->unsigned();
          $table->tinyInteger('contacted');
          $table->tinyInteger('will_deliver');
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
      Schema::drop('foods');
    }
}

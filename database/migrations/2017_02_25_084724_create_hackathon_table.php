<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHackathonTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('hackathons', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->date('start_date');
      $table->date('end_date');
      $table->string('address');
      $table->string('website')->nullable();
      $table->string('facebook')->nullable();
      $table->string('twitter')->nullable();
      $table->string('instagram')->nullable();
      $table->string('state');
      $table->unsignedInteger('zip');
      $table->string('city');
      $table->dateTime('registration_begin');
      $table->dateTime('registration_end');
      $table->dateTime('checkin_begin');
      $table->dateTime('checkin_end');
      $table->integer('current_balance')->default(0);
      $table->integer('created_by')->unsigned();
      $table->integer('updated_by')->unsigned()->nullable();
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
    Schema::drop('hackathons');
  }
}

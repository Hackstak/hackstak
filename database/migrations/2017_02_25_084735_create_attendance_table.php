<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendanceTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('attendance', function (Blueprint $table) {
      $table->increments('id');
      $table->tinyInteger('organizer');
      $table->tinyInteger('registered');
      $table->tinyInteger('accepted');
      $table->tinyInteger('rsvp');
      $table->tinyInteger('checked_in');
      $table->integer('user')->unsigned();
      $table->integer('hackathon')->unsigned();
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
    Schema::drop('attendance');
  }
}

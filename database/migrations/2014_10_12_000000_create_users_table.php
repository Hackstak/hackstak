<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('user', function (Blueprint $table) {
      $table->increments('id');
      $table->string('email');
      $table->string('first');
      $table->string('last');
      $table->string('username');
      $table->tinyInteger('user');
      $table->tinyInteger('admin');
      $table->integer('phone');
      $table->date('birthday');
      $table->tinyInteger('college');
      $table->integer('school_year');
      $table->string('team_name');
      $table->string('shirt_size');
      $table->string('major');
      $table->string('dietary_restrictions');
      $table->string('special_needs');
      $table->string('gender');
      $table->integer('school_id')->unsigned();
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
    Schema::drop('user');
  }
}

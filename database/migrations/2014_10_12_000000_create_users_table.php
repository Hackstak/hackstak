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
      Schema::create('users', function (Blueprint $table) {
      $table->increments('id');
      $table->string('first');
      $table->string('last');
      $table->string('email');
      $table->string('phone');
      $table->string('username');
      $table->tinyInteger('user')->default(1);
      $table->tinyInteger('admin')->default(0);
      $table->string('password');
      $table->date('birthday');
      $table->string('school_year');
      $table->string('team_name');
      $table->string('shirt_size');
      $table->string('major');
      $table->string('dietary_restrictions');
      $table->string('special_needs');
      $table->string('gender');
      $table->string('school');
      $table->rememberToken();
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
    Schema::drop('users');
  }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
  public function up()
  {
      //hackathon table
      Schema::table('hackathons', function($table) {
        $table->foreign('created_by')->references('id')->on('users');
        $table->foreign('updated_by')->references('id')->on('users');
      });

      //attendance table
      Schema::table('attendance', function($table) {
        $table->foreign('user_id')->references('id')->on('users');
        $table->foreign('hackathon_id')->references('id')->on('hackathons');
      });

      //finance table
      Schema::table('finances', function($table) {
        $table->foreign('hackathon_id')->references('id')->on('hackathons');
        $table->foreign('updated_by')->references('id')->on('users');
        $table->foreign('created_by')->references('id')->on('users');

      });

      //foods table
      Schema::table('foods', function($table) {
        $table->foreign('hackathon_id')->references('id')->on('hackathons');
      });

  }

  public function down()
  {

  }

}

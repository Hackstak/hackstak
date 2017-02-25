<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeys extends Migration
{
  public function up()
  {
      //user table
      Schema::table('user', function($table) {
        $table->foreign('school_id')->references('id')->on('school');

      });

      //hackathon table
      Schema::table('hackathon', function($table) {
        $table->foreign('created_by')->references('id')->on('user');
        $table->foreign('updated_by')->references('id')->on('user');
      });

      //attendance table
      Schema::table('attendance', function($table) {
        $table->foreign('user')->references('id')->on('user');
        $table->foreign('hackathon')->references('id')->on('hackathon');
      });

      //finance table
      Schema::table('finance', function($table) {
        $table->foreign('hackathon')->references('id')->on('hackathon');
        $table->foreign('updated_by')->references('id')->on('user');
        $table->foreign('created_by')->references('id')->on('user');

      });
  }

  public function down()
  {

  }

}

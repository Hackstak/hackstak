<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanceTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('finances', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('amount');
        $table->integer('hackathon_id')->unsigned();
        $table->integer('updated_by')->unsigned();
        $table->integer('created_by')->unsigned();
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
    Schema::drop('finances');
  }

}

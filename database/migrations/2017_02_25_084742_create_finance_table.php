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
    Schema::create('finance', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->integer('amount');
        $table->integer('hackathon')->unsigned();
        $table->integer('updated_by')->unsigned();
        $table->integer('created_by')->unsigned();

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
    Schema::drop('finance');
  }

}

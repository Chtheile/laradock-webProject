<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserKurseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_kurse', function(Blueprint $table){

          $table->integer('user_id')->unsigned()->nullable();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

          $table->integer('kurse_id')->unsigned()->nullable();
          $table->foreign('kurse_id')->references('id')->on('kurses')->onDelete('cascade');

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
        //
    }
}

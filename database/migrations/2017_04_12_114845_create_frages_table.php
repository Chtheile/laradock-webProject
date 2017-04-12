<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->text('body');
            $table->string('author');
            $table->string('type');
            $table->string('media');
            $table->string('filepath');
            $table->string('antwort1');
            $table->string('antwort2');
            $table->string('antwort3');
            $table->string('antwort4');
            $table->integer('antwortLink1');
            $table->integer('antwortLink2');
            $table->integer('antwortLink3');
            $table->integer('antwortLink4');
            $table->integer('antwortLink1type');
            $table->integer('antwortLink2type');
            $table->integer('antwortLink3type');
            $table->integer('antwortLink4type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frages');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 200);
            $table->string('duration', 10)->nullable();
            $table->longText('synopsis')->nullable();
            $table->integer('price')->unsigned()->nullable();
            $table->integer('grade')->unsigned()->nullable()->default(0);
            $table->date('release_date')->nullable();
            $table->longText('link_trailer')->nullable();
            $table->longText('link_movie')->nullable();
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
        Schema::dropIfExists('movies');
    }
}

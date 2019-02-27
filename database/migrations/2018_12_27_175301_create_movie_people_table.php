<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_person', function (Blueprint $table) {
            $table->integer('movie_id')  
                ->unsigned()  
                ->index();  
            $table->foreign('movie_id')  
                ->references('id')  
                ->on('movies')  
                ->onDelete('cascade')
                ->onUpdate('cascade');  
  
            $table->integer('person_id')  
                ->unsigned()  
                ->index();  
            $table->foreign('person_id')  
                ->references('id')  
                ->on('people')  
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary(['movie_id', 'person_id']);

            $table->string('job', 100)
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('movie_person');
    }
}

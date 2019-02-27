<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_picture', function (Blueprint $table) {
            $table->integer('picture_id')  
                  ->unsigned()  
                  ->index();  
            $table->foreign('picture_id')  
                  ->references('id')  
                  ->on('pictures')  
                  ->onDelete('cascade')
                  ->onUpdate('cascade');  
  
            $table->integer('page_id')  
                  ->unsigned()  
                  ->index();  
            $table->foreign('page_id')  
                  ->references('id')  
                  ->on('pages')  
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->primary(['picture_id', 'page_id']);
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
        Schema::dropIfExists('picture_page');
    }
}

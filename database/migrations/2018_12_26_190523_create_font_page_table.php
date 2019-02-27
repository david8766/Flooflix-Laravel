<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFontPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('font_page', function (Blueprint $table) {
            $table->integer('font_id')  
                  ->unsigned()  
                  ->index();  
            $table->foreign('font_id')  
                  ->references('id')  
                  ->on('fonts')  
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
            $table->primary(['font_id', 'page_id']);
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
        Schema::dropIfExists('font_page');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColorPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_page', function (Blueprint $table) {
            $table->integer('color_id')  
                  ->unsigned()  
                  ->index();  
            $table->foreign('color_id')  
                  ->references('id')  
                  ->on('colors')  
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
            $table->primary(['color_id', 'page_id']);
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
        Schema::dropIfExists('color_page');
    }
}

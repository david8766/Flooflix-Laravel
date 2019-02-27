<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWebsiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_website', function (Blueprint $table) {
            $table->integer('user_id')  
                  ->unsigned()  
                  ->index();  
            $table->foreign('user_id')  
                  ->references('id')  
                  ->on('users')  
                  ->onDelete('cascade')
                  ->onUpdate('cascade');  
  
            $table->integer('website_id')  
                  ->unsigned()  
                  ->index();  
            $table->foreign('website_id')  
                  ->references('id')  
                  ->on('websites')  
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->primary(['user_id', 'website_id']);
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
        Schema::dropIfExists('user_website');
    }
}

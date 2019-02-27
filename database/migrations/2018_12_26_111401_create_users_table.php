<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('last_name', 50);
            $table->string('first_name', 50);
            $table->string('email', 200)->nullable()->unique;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('login', 50)->unique;
            $table->string('password');
            $table->date('birth_date')->nullable();
            $table->integer('credits')->unsigned()->nullable()->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

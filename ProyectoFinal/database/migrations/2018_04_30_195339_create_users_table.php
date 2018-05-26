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
            $table->increments('id-user')->unsigned();
            $table->string('first-name-user');
            $table->string('last-name-user');
            $table->string('email-user',100)->unique();
            $table->string('password-user');
            $table->string('image-user',300);
            $table->date('birthdate-user');
            $table->boolean('gender-user');
            $table->softDeletes();

            $table->integer('id-country')->unsigned();
            $table->foreign('id-country')->references('id-country')->on('countries');

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

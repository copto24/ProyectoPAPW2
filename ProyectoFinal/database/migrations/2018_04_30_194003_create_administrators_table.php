<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdministratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('administrators', function (Blueprint $table) {
            $table->increments('id-administrator')->unsigned();
            $table->string('first-name-administrator');
            $table->string('last-name-administrator');
            $table->string('email-administrator',100)->unique();
            $table->string('password-administrator');
            $table->string('image-administrator',300);
            $table->boolean('gender-administrator');
            
            $table->softDeletes();
            
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
        Schema::dropIfExists('administrators');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBloquedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bloqueds', function (Blueprint $table) {
            $table->increments('id-bloqued');
            $table->softDeletes();

            $table->integer('id-administrator')->unsigned();
            $table->foreign('id-administrator')->references('id-administrator')->on('administrators');

            $table->integer('id-user')->unsigned();
            $table->foreign('id-user')->references('id-user')->on('users');

            $table->integer('id-reason')->unsigned();
            $table->foreign('id-reason')->references('id-reason')->on('reasons');
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
        Schema::dropIfExists('bloqueds');
    }
}

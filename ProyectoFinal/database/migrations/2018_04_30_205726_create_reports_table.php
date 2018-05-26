<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id-report');
            $table->softDeletes();

            $table->integer('id-user')->unsigned();
            $table->foreign('id-user')->references('id-user')->on('users');

            $table->integer('id-product')->unsigned();
            $table->foreign('id-product')->references('id-product')->on('products');

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
        Schema::dropIfExists('reports');
    }
}

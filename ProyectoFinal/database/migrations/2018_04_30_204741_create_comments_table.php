<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id-comment')->unsigned();
            $table->string('description-comment',200);
            $table->datetime('date-comment');

            $table->softDeletes();

            $table->integer('id-user')->unsigned();
            $table->foreign('id-user')->references('id-user')->on('users');

            $table->integer('id-product')->unsigned();
            $table->foreign('id-product')->references('id-product')->on('products');
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
        Schema::dropIfExists('comments');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id-purchase')->unsigned();

            $table->integer('amount-purchase');
            $table->float('price-purchase');

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
        Schema::dropIfExists('purchases');
    }
}

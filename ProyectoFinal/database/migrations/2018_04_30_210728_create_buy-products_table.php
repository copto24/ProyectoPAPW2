<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy-products', function (Blueprint $table) {
            $table->increments('id-buy-product')->unsigned();
            $table->integer('amount-buy-product');
            $table->float('subtotal-buy-product');
            $table->boolean('bought-buy-product');

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
        Schema::dropIfExists('buy-products');
    }
}

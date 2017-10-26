<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shoppingCarts', function (Blueprint $table) {
            $table->increments('cartID');
            $table->integer('userID')->unsigned();
            $table->string('modelNumber', 20);
            $table->string('serialNumber', 11);
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('serialNumber')->references('serialNumber')->on('serialNumbers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shoppingCarts');
    }
}

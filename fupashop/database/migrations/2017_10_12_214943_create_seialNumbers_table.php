<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeialNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seialNumbers', function (Blueprint $table) {
            $table->integer('modelNumber')->unsigned();
            $table->foreign('modelNumber')->references('modelNumber')->on('tablets')->onDelete('cascade');
            $table->foreign('modelNumber')->references('modelNumber')->on('desktops')->onDelete('cascade');
            $table->foreign('modelNumber')->references('modelNumber')->on('monitors')->onDelete('cascade');
            $table->foreign('modelNumber')->references('modelNumber')->on('laptops')->onDelete('cascade');
            $table->bigInteger('serialNumber', 11);
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
        Schema::dropIfExists('seialNumbers');
    }
}

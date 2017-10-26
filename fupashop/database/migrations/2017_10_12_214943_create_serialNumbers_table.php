<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSerialNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serialNumbers', function (Blueprint $table) {
            $table->string('modelNumber', 20);
            $table->string('serialNumber', 11);
            $table->string('type', 10);
            $table->boolean('purchasable', true);
            $table->timestamps();
             $table->primary('serialNumber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serialNumbers');
    }
}

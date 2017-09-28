<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLaptopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->string('modelNumber', 20);
            $table->string('processor', 20);
            $table->double('displaySize', 3, 1);
            $table->string('ramSize', 20);
            $table->double('weight', 3, 2);
            $table->string('cpuCores', 20);
            $table->string('hddSize', 20);
            $table->string('batteryType', 20);
            $table->string('batteryInformation', 20);
            $table->string('brandName', 30);
            $table->string('operatingSystem', 20);
            $table->boolean('touchFeature');
            $table->string('cameraInformation', 40);
            $table->decimal('price', 5, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laptops');
    }
}

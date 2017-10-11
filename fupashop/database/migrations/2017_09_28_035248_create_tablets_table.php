<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablets', function (Blueprint $table) {
            $table->string('modelNumber', 20);
            $table->string('processor', 20);
            $table->decimal('screenSize', 3, 1);
            $table->string('dimensions', 40);
            $table->string('ramSize', 20);
            $table->decimal('weight', 10, 2);
            $table->string('cpucores', 20);
            $table->string('hddSize', 20);
            $table->string('batteryInformation', 20);
            $table->string('brandName', 30);
            $table->string('operatingSystem', 20);
            $table->string('cameraInformation', 40);
            $table->decimal('price', 10, 2);
             $table->primary('modelNumber');
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
        Schema::dropIfExists('tablets');
    }
}

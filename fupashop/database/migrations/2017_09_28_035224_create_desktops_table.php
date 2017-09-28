<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDesktopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desktops', function (Blueprint $table) {
            $table->string('modelNumber', 20);
            $table->string('processor', 20);
            $table->string('dimensions', 21);
            $table->string('ramSize', 20);
            $table->double('weight', 3, 2);
            $table->string('cpuCores', 20);
            $table->string('hddSize', 5);
            $table->string('brandName', 20);
            $table->double('price', 5, 2);
             $table->primary('modelNumber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desktops');
    }
}

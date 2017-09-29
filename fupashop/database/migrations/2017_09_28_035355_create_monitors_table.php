<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monitors', function (Blueprint $table) {
            $table->integer('size');
            $table->decimal('weight', 10, 1);
            $table->string('brand', 7);
            $table->string('model_number', 10);
            $table->decimal('price',10,2);
             $table->primary('model_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monitors');
    }
}

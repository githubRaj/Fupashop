<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tvs', function (Blueprint $table) {
            $table->string('brand');
            $table->string('dimensions', 50);
            $table->double('weight', 3, 2);
            $table->string('tvType', 20);
            $table->string('modelNumber', 20);
            $table->double('price', 5, 2);
            $table->string('resolution', 20);
            $table->integer('screenSize');
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
        Schema::dropIfExists('tvs');
    }
}

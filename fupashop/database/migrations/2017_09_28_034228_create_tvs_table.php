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
            $table->string('brandName');
            $table->string('dimensions', 50);
            $table->decimal('weight', 10, 2);
            $table->string('tvType', 20);
            $table->string('modelNumber', 20);
            $table->decimal('price', 10, 2);
            $table->string('resolution', 20);
            $table->integer('screenSize');
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
        Schema::dropIfExists('tvs');
    }
}

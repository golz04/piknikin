<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalGaleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_galeries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rental_id', false, true);
            $table->string('caption');
            $table->string('image');
            $table->timestamps();

            $table->foreign('rental_id')->references('id')->on('rentals')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_galeries');
    }
}

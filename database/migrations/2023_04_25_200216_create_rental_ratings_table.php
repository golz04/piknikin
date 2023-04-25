<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rental_id', false, true);
            $table->string('name');
            $table->string('email');
            $table->integer('accomodation');
            $table->integer('meal');
            $table->integer('destination');
            $table->integer('transport');
            $table->integer('value_for_money');
            $table->integer('overall');
            $table->text('message');
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
        Schema::dropIfExists('rental_ratings');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacketRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packet_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('packet_id', false, true);
            $table->string('name');
            $table->string('email');
            $table->integer('accomodation');
            $table->integer('meal');
            $table->integer('destination');
            $table->integer('transport');
            $table->integer('value_for_money');
            $table->integer('overall');
            $table->text('message');
            $table->enum('status', ['sudah dibaca', 'belum dibaca']);
            $table->timestamps();

            $table->foreign('packet_id')->references('id')->on('packets')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packet_ratings');
    }
}

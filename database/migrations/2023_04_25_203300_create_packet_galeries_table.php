<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacketGaleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packet_galeries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('packet_id', false, true);
            $table->string('caption');
            $table->string('image');
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
        Schema::dropIfExists('packet_galeries');
    }
}

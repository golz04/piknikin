<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestToursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_tours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->date('date_departure');
            $table->string('phone_number');
            $table->string('destination');
            $table->string('long_vacation');
            $table->string('lodge');
            $table->string('qty_participant');
            $table->string('from');
            $table->text('message');
            $table->enum('status', ['selesai', 'diterima', 'ditolak', 'menunggu']);
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
        Schema::dropIfExists('request_tours');
    }
}

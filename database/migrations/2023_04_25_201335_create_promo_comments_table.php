<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromoCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('promo_id', false, true);
            $table->string('name');
            $table->string('email');
            $table->text('message');
            $table->enum('status', ['sudah dibaca', 'belum dibaca']);
            $table->timestamps();

            $table->foreign('promo_id')->references('id')->on('promos')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promo_comments');
    }
}

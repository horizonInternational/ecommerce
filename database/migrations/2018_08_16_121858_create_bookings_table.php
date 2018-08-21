<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('bookings_id');
            $table->integer('travellers_id')->unsigned();
            $table->foreign('travellers_id')->references('travellers_id')->on('travellers')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('guests_id')->unsigned();
            $table->foreign('guests_id')->references('guests_id')->on('guests')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('buses_id')->unsigned();
            $table->foreign('buses_id')->references('buses_id')->on('buses')->onDelete('cascade')->onUpdate('cascade');

            $table->string('seat','255')->nullable();
            $table->integer('price')->nullable();
            $table->enum('profile',['confirmed','cancelled','pending'])->nullable();
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
        Schema::dropIfExists('bookings');
    }
}

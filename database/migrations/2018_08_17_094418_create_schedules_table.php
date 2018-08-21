<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{



    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('schedules_id');
            $table->integer('buses_id')->unsigned();
            $table->foreign('buses_id')->references('buses_id')->on('buses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('departure_date',255)->nullable();
            $table->string('departure_time',255)->nullable();
            $table->string('arrival_date',255)->nullable();
            $table->string('arrival_time',255)->nullable();
            $table->string('ticket_price',255)->nullable();
            $table->enum('shift',['day','night','none']);
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
        Schema::dropIfExists('schedules');
    }
}


<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateBusesTable extends Migration
{

    public function up()
{
    Schema::create('buses', function (Blueprint $table) {
        $table->increments('buses_id');
        $table->string('title',255)->nullable();
        $table->string('billbook_no',255)->nullable();
        $table->string('vehicle_no',255)->nullable();
        $table->integer('vendors_id')->unsigned();
        $table->foreign('vendors_id')->references('vendors_id')->on('vendors')->onDelete('cascade')->onUpdate('cascade');
        $table->integer('routes_id')->unsigned();
        $table->foreign('routes_id')->references('routes_id')->on('routes')->onDelete('cascade')->onUpdate('cascade');
        $table->integer('bustypes_id')->unsigned();
        $table->foreign('bustypes_id')->references('bustypes_id')->on('bustypes')->onDelete('cascade')->onUpdate('cascade');
        $table->string('image',255)->nullable();
        $table->string('driver1',255)->nullable();
        $table->string('driver2',255)->nullable();
        $table->string('contact1',255)->nullable();
        $table->string('contact2',255)->nullable();
        $table->string('staff1',255)->nullable();
        $table->string('staff2',255)->nullable();
        $table->string('contact3',255)->nullable();
        $table->string('contact4',255)->nullable();
        $table->enum('profile',['active','hold'])->nullable()->default('hold');
        $table->string('registered_date',255)->nullable();
        $table->timestamps();
    });
}


    public function down()
{
    Schema::dropIfExists('buses');
}
}
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('vendors_id');
            $table->string('name',100)->nullable();
            $table->string('email',100)->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('contact')->nullable();
            $table->enum('profile',['online','offline']);
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
        Schema::dropIfExists('vendors');
    }
}

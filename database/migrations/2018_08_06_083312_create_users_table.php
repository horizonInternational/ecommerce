<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
       public function up()
{
    Schema::create('users', function (Blueprint $table) {
        $table->increments('users_id');
       // $table->string('name',100)->nullable();
       // $table->string('username',100)->unique()->nullable();
        $table->string('email',100)->unique()->nullable();
        $table->string('password')->nullable();
       // $table->string('image')->nullable();
        $table->enum('user_type',['admin','traveller','vendor'])->default('traveller');
        $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

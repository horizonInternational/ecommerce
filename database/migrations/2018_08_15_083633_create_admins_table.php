<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('admins_id');
            $table->string('email', 100)->unique()->nullable();
            $table->string('contact', 255)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->enum('user_type', ['admin', 'superadmin'])->default('admin');
            $table->enum('profile', ['active', 'offline'])->default('offline');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('admins');
    }
}


?>


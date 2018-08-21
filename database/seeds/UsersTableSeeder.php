<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
    {
        DB::table('users')->insert([
            [ 'email'=>'admin00@gmail.com','password'=>bcrypt('admin00'),'user_type'=>'admin'],
            [ 'email'=>'admin@gmail.com','password'=>bcrypt('admin'),'user_type'=>'admin'],
            [ 'email'=>'vendor@gmail.com','password'=>bcrypt('vendor'),'user_type'=>'vendor'],
            [ 'email'=>'traveller@gmail.com','password'=>bcrypt('traveller'),'user_type'=>'traveller']
        ]);
    }

}

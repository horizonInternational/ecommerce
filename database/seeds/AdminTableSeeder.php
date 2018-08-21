<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            [ 'email'=>'admin@gmail.com','password'=>bcrypt('admin'),'user_type'=>'admin'],
            [ 'email'=>'admin00@gmail.com','password'=>bcrypt('admin00'),'user_type'=>'superadmin']
        ]);
    }
}

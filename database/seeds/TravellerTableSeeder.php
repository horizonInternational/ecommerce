<?php

use Illuminate\Database\Seeder;

class TravellerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('travellers')->insert([
            [ 'email'=>'none','password'=>bcrypt('none')],
            [ 'email'=>'traveller@gmail.com','password'=>bcrypt('traveller'),]
        ]);
    }
}

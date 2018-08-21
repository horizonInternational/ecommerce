<?php

use Illuminate\Database\Seeder;

class GuestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guests')->insert([
            [ 'name'=>'None','contact'=>'None'],
            [ 'name'=>'Guests','contact'=>'9848126204'],
        ]);
    }
}

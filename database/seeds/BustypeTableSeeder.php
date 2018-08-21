<?php

use Illuminate\Database\Seeder;

class BustypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bustypes')->insert([
            [ 'title'=>'AC'],
            [ 'title'=>'Hice'],
            [ 'title'=>'Delauxe'],
            [ 'title'=>'Metro']
        ]);
    }
}

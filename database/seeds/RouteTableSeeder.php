<?php

use Illuminate\Database\Seeder;

class RouteTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('routes')->insert([
            [ 'title'=>'Kathmandu-Kanchanpur','from'=>'Kathmandu','to'=>'Kanchanpur'],
            [ 'title'=>'Kathmandu-Dadeldhura','from'=>'Kathmandu','to'=>'Dadeldhura'],
            [ 'title'=>'Kathmandu-Jhapa','from'=>'Kathmandu','to'=>'Jhapa'],
            [ 'title'=>'Kathmandu-Saptari','from'=>'Kathmandu','to'=>'Saptari']
        ]);
    }
}

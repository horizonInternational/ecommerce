<?php

use Illuminate\Database\Seeder;

class BusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('buses')->insert([
            [ 'title'=>'Mahakali Yatayat','vendors_id'=>1,'vehicle_no'=>'Bha.2.Kha 1212','billbook_no'=>121221,'routes_id'=>3,'bustypes_id'=>1],
            [ 'title'=>'Bagmati Yatayat','vendors_id'=>1,'vehicle_no'=>'Bha.2.Kha 1212','billbook_no'=>121221,'routes_id'=>2,'bustypes_id'=>2],
            [ 'title'=>'Kaligandaki Yatayat','vendors_id'=>1,'vehicle_no'=>'Bha.2.Kha 1212','billbook_no'=>121221,'routes_id'=>4,'bustypes_id'=>1],
            [ 'title'=>'Sutra Yatayat','vendors_id'=>1,'vehicle_no'=>'Bha.2.Kha 1212','billbook_no'=>121221,'routes_id'=>4,'bustypes_id'=>2],
            [ 'title'=>'Amrit Yatayat','vendors_id'=>1,'vehicle_no'=>'Bha.2.Kha 1212','billbook_no'=>121221,'routes_id'=>3,'bustypes_id'=>3],
            [ 'title'=>'Kulekhani Yatayat','vendors_id'=>1,'vehicle_no'=>'Bha.2.Kha 1212','billbook_no'=>121221,'routes_id'=>1,'bustypes_id'=>4],
        ]);
    }
}

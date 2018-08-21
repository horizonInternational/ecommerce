<?php

use Illuminate\Database\Seeder;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([
            [ 'email'=>'vendor@gmail.com','password'=>bcrypt('vendor'),]
        ]);
    }
}

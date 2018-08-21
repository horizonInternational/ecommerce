<?php

use Illuminate\Database\Seeder;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('feedbacks')->insert([
            [ 'fname'=>'admin','lname'=>'admin','message'=>'This is all of it ','email'=>'bhattasuraj76@gmail.com','phone'=>'131313133']
        ]);
    }
}

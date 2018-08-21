<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(VendorTableSeeder::class);
        $this->call(TravellerTableSeeder::class);
        $this->call(GuestTableSeeder::class);
        $this->call(BustypeTableSeeder::class);
        $this->call(RouteTableSeeder::class);
        $this->call(BusTableSeeder::class);
        $this->call(FeedbacksTableSeeder::class);
    }
}

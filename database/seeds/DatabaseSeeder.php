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
        // $this->call(UsersTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call(UserTableSeeder::class);        // One
        $this->call(PlanesTableSeeder::class);      // One
        $this->call(AirportsTableSeeder::class);    // One
        $this->call(FlightsTableSeeder::class);     // Many
        $this->call(TicketsTableSeeder::class);     // Many
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

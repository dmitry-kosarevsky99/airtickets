<?php

use App\Flight;
use Illuminate\Database\Seeder;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Flight::truncate();
        Flight::create(array('depart_date_time'=>'2019/07/12 09:00:00','arrival_date_time'=>'2019/07/12 14:00:00','flight_plane_id'=> 1, 'source_airport_id'=> 1,'destination_airport_id'=> 2));
        Flight::create(array('depart_date_time'=>'2019/08/23 10:00:00','arrival_date_time'=>'2019/08/23 17:00:00','flight_plane_id'=> 2, 'source_airport_id'=> 2,'destination_airport_id'=> 3));
        
    }
}

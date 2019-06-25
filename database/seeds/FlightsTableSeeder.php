<?php

use Airtickets\Flight;
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
        Flight::create(array('depart_date_time'=>'2019/09/13 11:10:00','arrival_date_time'=>'2019/09/13 16:23:00','flight_plane_id'=> 3, 'source_airport_id'=> 3,'destination_airport_id'=> 2));
        Flight::create(array('depart_date_time'=>'2019/09/17 10:00:00','arrival_date_time'=>'2019/09/17 17:00:00','flight_plane_id'=> 4, 'source_airport_id'=> 4,'destination_airport_id'=> 6));
        Flight::create(array('depart_date_time'=>'2019/09/19 04:40:00','arrival_date_time'=>'2019/09/19 10:40:00','flight_plane_id'=> 5, 'source_airport_id'=> 6,'destination_airport_id'=> 4));
        Flight::create(array('depart_date_time'=>'2019/09/21 22:30:00','arrival_date_time'=>'2019/09/22 02:00:00','flight_plane_id'=> 6, 'source_airport_id'=> 11,'destination_airport_id'=> 3));
        Flight::create(array('depart_date_time'=>'2019/09/23 12:45:00','arrival_date_time'=>'2019/09/23 17:00:00','flight_plane_id'=> 7, 'source_airport_id'=> 3,'destination_airport_id'=> 11));
        Flight::create(array('depart_date_time'=>'2019/10/01 05:00:00','arrival_date_time'=>'2019/10/01 11:45:00','flight_plane_id'=> 8, 'source_airport_id'=> 5,'destination_airport_id'=> 9));
        Flight::create(array('depart_date_time'=>'2019/10/05 08:05:00','arrival_date_time'=>'2019/10/05 13:05:00','flight_plane_id'=> 9, 'source_airport_id'=> 9,'destination_airport_id'=> 5));
        Flight::create(array('depart_date_time'=>'2019/10/13 19:00:00','arrival_date_time'=>'2019/10/14 00:05:00','flight_plane_id'=> 10, 'source_airport_id'=> 4,'destination_airport_id'=> 8));
        
    }
}

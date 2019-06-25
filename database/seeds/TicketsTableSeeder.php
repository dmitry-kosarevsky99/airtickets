<?php

use Airtickets\Ticket;
use Illuminate\Database\Seeder;

class TicketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ticket::truncate();
        Ticket::create(array('ticket_class'=>1,'flight_id'=>1,'price'=>345.23,'description'=>'Have a nice flight!'));
        Ticket::create(array('ticket_class'=>2,'flight_id'=>2,'price'=>1003.34,'description'=>'Have a nice flight!'));
        Ticket::create(array('ticket_class'=>1,'flight_id'=>3,'price'=>593.65,'description'=>'Have a nice flight!'));
        Ticket::create(array('ticket_class'=>2,'flight_id'=>4,'price'=>1948.24,'description'=>'Have a nice flight!'));
        Ticket::create(array('ticket_class'=>2,'flight_id'=>5,'price'=>1387.65,'description'=>'Have a nice flight!'));
        Ticket::create(array('ticket_class'=>1,'flight_id'=>6,'price'=>334.27,'description'=>'Have a nice flight!'));
        Ticket::create(array('ticket_class'=>1,'flight_id'=>7,'price'=>385.53,'description'=>'Have a nice flight!'));
        Ticket::create(array('ticket_class'=>1,'flight_id'=>8,'price'=>301.22,'description'=>'Have a nice flight!'));
        Ticket::create(array('ticket_class'=>2,'flight_id'=>9,'price'=>1350.83,'description'=>'Have a nice flight!'));
        Ticket::create(array('ticket_class'=>1,'flight_id'=>10,'price'=>486.92,'description'=>'Have a nice flight!'));
        
    }
}

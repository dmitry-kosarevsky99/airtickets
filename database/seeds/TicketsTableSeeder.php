<?php

use App\Ticket;
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
        Ticket::create(array('ticket_class'=>1,'ticket_cell'=>23,'flight_id'=>1,'price'=>345.23,'description'=>'Have a nice flight!'));
    }
}

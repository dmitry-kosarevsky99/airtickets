<?php

use Airtickets\Airport;
use Illuminate\Database\Seeder;

class AirportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Airport::truncate();
        Airport::create(array('airport_name' => 'Paris-Charles de Gaulle Airport',
        'city' => 'Paris',
        'address' => '95700 Roissy-en-France, France'));
        Airport::create(array('airport_name' => 'Domodedovo International Airport',
        'city' => 'Moskow',
        'address' => '95700 Roissy-en-France, France'));
        Airport::create(array('airport_name' => 'Paris-Charles de Gaulle Airport',
        'city' => 'Paris',
        'address' => 'Moscow Oblast, Russia'));
        Airport::create(array('airport_name' => 'Riga International Airport',
        'city' => 'Riga',
        'address' => 'Mārupe, LV-1053'));
        Airport::create(array('airport_name'=>'Hartsfield–Jackson Atlanta International Airport','city'=>'Atlanta','address' => 'Unincorporated areas of Fulton and Clayton counties; also Atlanta, College Park, and Hapeville, Georgia'));
        Airport::create(array('airport_name'=>'Beijing Capital International Airport','city'=>'Beijing','address'=>'Chaoyang–Shunyi'));
        Airport::create(array('airport_name'=>' London Heathrow Airport','city'=>'London','address'=>'Hillingdon, London'));
        Airport::create(array('airport_name'=>'Los Angeles International Airport','city'=>'Los Angeles','address'=>'Los Angeles, California'));
        Airport::create(array('airport_name'=>'Dallas/Fort Worth International Airport','city'=>'Dallas','address'=>'Dallas/Tarrant county line'));
        Airport::create(array('airport_name'=>'Frankfurt Airport','city'=>'Frankfurt','address'=>'Frankfurt, Hesse'));
        Airport::create(array('airport_name'=>'Istanbul Atatürk Airport','city'=>'Istambul','address'=>'Istambul'));
        Airport::create(array('airport_name'=>'Singapore Changi Airport','city'=>'Singapore','address'=>'Changi'));
        Airport::create(array('airport_name'=>'Amsterdam Schiphol Airport','city'=>'Amsterdam','address'=>'Haarlemmermeer, North Holland'));
        Airport::create(array('airport_name'=>'Madrid Barajas Airport','city'=>'Madrid','address'=>'Barajas, Madrid'));
        Airport::create(array('airport_name'=>'Rome–Fiumicino International Airport','city'=>'Rome','address'=>'Rome-Fiumicino, Lazio'));
        Airport::create(array('airport_name'=>'Chhatrapati Shivaji International Airport','city'=>'Mumbai','address'=>'Mumbai, Maharashtra'));
    }
}

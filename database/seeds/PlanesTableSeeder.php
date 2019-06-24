<?php

use App\Plane;
use Illuminate\Database\Seeder;

class PlanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plane::truncate();
        Plane::create(array('plane_name' => 'Boeing 747',
        'cell_amount' => 524));
        Plane::create(array('plane_name' => 'Boeing 777',
        'cell_amount' => 664));
        Plane::create(array('plane_name' => 'Airbus A380',
        'cell_amount' => 868));
        Plane::create(array('plane_name' => 'Sukhoi Superjet 100',
        'cell_amount' => 98));
        Plane::create(array('plane_name'=>'Boeing 737','cell_amount'=>215));
        Plane::create(array('plane_name'=>'Antonov An-148','cell_amount'=>85));
        Plane::create(array('plane_name'=>'Boeing 777','cell_amount'=>396));
        Plane::create(array('plane_name'=>'Comac C919','cell_amount'=>168));
        Plane::create(array('plane_name'=>'Irkut MC-21','cell_amount'=>163));
        Plane::create(array('plane_name'=>'Tupolev Tu-204','cell_amount'=>210));
        Plane::create(array('plane_name'=>'Bombardier CRJ700','cell_amount'=>342));
    }
}

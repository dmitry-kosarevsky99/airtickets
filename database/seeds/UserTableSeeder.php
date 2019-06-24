<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create(array('first_name' => 'Administrator',
        'last_name'  => 'TheGreat',
        'email' => 'dk15005@lu.lv',
        'password' => bcrypt('Admin123'),
        'role'  => 2));
        User::create(array('first_name' => 'Dmitrijs',
        'last_name'  => 'Kosarevskis',
        'email' => 'dk@lu.lv',
        'password' => bcrypt('dmitry4345_3'),
        'role'  => 1));
    }
}

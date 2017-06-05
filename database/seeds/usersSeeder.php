<?php

use Illuminate\Database\Seeder;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$users = new users();
        $users->name = "laith";
        $users->email = "laith";
        $users->password = bcrypt('laith');
        $users->save();

        // $users = new user();
        // $users->name = "mazen";
        // $users->email = "m.shanti@windowslive.com";
        // $users->password = bcrypt('mazen');
        // $users->save();

        // $users = new user();
        // $users->name = "dia";
        // $users->email = "dia";
        // $users->password = bcrypt('dia');
        // $users->save();
    }
}

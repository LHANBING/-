<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 66; $i++) { 
    		DB::table('users')->insert([
            'username' => str_random(10),
            'password' => Hash::make('1234567'),
            'tel' => '13'.rand(111111111,999999999) 
        ]);
    	}
    }
}

<?php

use Illuminate\Database\Seeder;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <5 ; $i++) {

	    	 DB::table('manager')->insert([
	            'm_name' => str_random(10),
	            'm_password' => Hash::make('123456'),
	            'm_photo' => '/Uploads/20721510925929.jpg',
	            'auth' => '1'
	        ]);
    	 }
    }
}

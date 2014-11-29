<?php

class SalonServiceTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Delete any content in the salon_service table
		DB::table('salon_service')->delete();
		
		$salon_service_data = array(
        	array(
        		'name' => "Batman's Salon", 
        		'city' => "Gotham",
        		'address' => "Batman st. 1",
        		'open' => "09.00",
        		'close' => "22.00",
        		'phone' => "123456789"),
        	array(
        		'name' => "Superman's Salon", 
        		'city' => "Metropolis",
        		'address' => "Superman st. 1",
        		'open' => "10.00",
        		'close' => "21.00",
        		'phone' => "5123412345"),
        	array(
        		'name' => "Spiderman's Salon", 
        		'city' => "New York",
        		'address' => "Spiderman st. 1",
        		'open' => "08.00",
        		'close' => "20.00",
        		'phone' => "2233456789"),
        );
       
        foreach ($salon_service_data AS $salon_service) {
           Salon::create($salon_service);
        }
	}

}

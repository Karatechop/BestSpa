<?php

class ServiceTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Delete any content in the services table
		DB::table('services')->delete();
		
		$service_data = array(
        	array(
        		'sort_id' => "1", 
        		'type' => "swedish",
        		'duration_id' => "2",
        		'price' => "10.50",
        		'part' => "0",
        		'description' => "Lorem"),
        	array(
        		'sort_id' => "2", 
        		'type' => "finnish",
        		'duration_id' => "2",
        		'price' => "40.50",
        		'part' => "3",
        		'description' => "Ipsum"),
        	array(
        		'sort_id' => "1", 
        		'type' => "sport",
        		'duration_id' => "1",
        		'price' => "10.50",
        		'part' => "1",
        		'description' => "Dolor"),
        );
        
        foreach ($service_data AS $service) {
           Salon::create($service);
        }
	}

}

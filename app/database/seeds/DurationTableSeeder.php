<?php

class DurationTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Delete any content in the durations table
		DB::table('durations')->delete();
		
		$duration_data = array(
        	array(
        		'duration' => "15"),
        	array(
        		'duration' => "30"),
        	array(
        		'duration' => "45"),
        );
        
        foreach ($duration_data AS $duration) {
           Salon::create($duration);
        }
	}

}

<?php

class ServiceTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Delete any content in the salons table
		DB::table('services')->delete();
		
		$services = array(
        	array(
			'salon_id' => "1", 
        		'kind_id' => "1",
        		'type_id' => "1",
        		'duration' => "30",
        		'price' => "50",
        		'part' => "0",
        		'description' => "Lorem")
        );
        
         DB::table('services')->insert($services);
        }

} //end

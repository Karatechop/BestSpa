<?php

class SortTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Delete any content in the sorts table
		DB::table('sorts')->delete();
		
		$sort_data = array(
        	array(
        		'name' => "massage"),
        	array(
        		'name' => "sauna"),
        );
        
        foreach ($sort_data AS $sort) {
           Salon::create($sort);
        }
	}

}

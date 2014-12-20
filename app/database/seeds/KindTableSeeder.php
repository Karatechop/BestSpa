<?php

class KindTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Delete any content in the durations table
		DB::table('kinds')->delete();
		
		$kinds = array(
        	array(
        		'name' => "massage"),
        	array(
        		'name' => "sauna"),
        	array(
        		'name' => "banya"),
        	array(
        		'name' => "hammam"),
        	array(
        		'name' => "therapy"),
        	array(
        		'name' => "EditTestKind"),
        );
        
      DB::table('kinds')->insert($kinds);

        }
} //end

<?php

class TypeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Delete any content in the sorts table
		DB::table('types')->delete();
		
		$types = array(
        	array(
        		'name' => "aqua"),
        	array(
        		'name' => "biodynamic"),
        	array(
        		'name' => "chinese"),
        	array(
        		'name' => "finnish"),
        	array(
        		'name' => "infrafed"),
        	array(
        		'name' => "reflexology"),
        	array(
        		'name' => "russian"),
        	array(
        		'name' => "pediatric"),
        	array(
        		'name' => "sport"),
        	array(
        		'name' => "swedish"),
        	array(
        		'name' => "trigger point"),
        	array(
        		'name' => "thai"),
        	array(
        		'name' => "turkish"),
        	array(
        		'name' => "EditTestType"),
        );
        
       DB::table('types')->insert($types);
        
        }
        
} //end



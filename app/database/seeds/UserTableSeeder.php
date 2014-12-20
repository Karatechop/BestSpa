<?php

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		// Delete any content in the salon_service table
		DB::table('users')->delete();
		
		$users = array(
        	array(
        		'email' => "admin@domain.com", 
        		'password' => Hash::make('password'))
        	);
      

       
       DB::table('users')->insert($users);
        
	}

} //end

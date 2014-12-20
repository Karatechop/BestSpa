<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		
		$this->call('SalonTableSeeder');
		$this->call('DurationTableSeeder');
		$this->call('SortTableSeeder');
		$this->call('ServiceTableSeeder');
		$this->call('SalonServiceTableSeeder');
	}

}

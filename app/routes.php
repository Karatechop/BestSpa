<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/all-queries', function()
{
	$salons = Salon::all();
	
	$salon_gotham = $salons->filter(function($salon)
		{
			if ($salon->city == 'Gotham') {
				return true;
		}
		});

	$salon_close = Salon::where('close', '<=', '21:00:00')->get();
	
	
	$durations = Duration::all();
	
	$sorts = Sort::all();
	
	$services = Service::with('salon','duration','sort')->get(); 
	//$service_salon = $service->salon->name;
	//$service_duration = $service->duration;
	$service_massage = "massage";
	$service_sauna = "sauna";
	$service_city = "Metropolis";
	
	return View::make('queries')->with('salons', $salons)
					->with('salon_gotham', $salon_gotham)
					->with('salon_close', $salon_close)
					->with('durations', $durations)
					->with('sorts', $sorts)
					->with('services', $services)
				//	->with('service_salon', $service_salon)
				//	->with('service_duration', $service_duration)
					->with('service_massage', $service_massage)
					->with('service_sauna', $service_sauna)
					->with('service_city', $service_city);
});

// Environment

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});

// Debuging

Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    print_r ($results);

});

// Seeding

Route::get('/seed-all-tables', function() {
		
		
		Eloquent::unguard();
		
		$clean = new Clean();
		
		#Salons
		
		DB::table('salons')->delete();
		
		$batman  = Salon::create(array(
			'name' => "Batman's Salon", 
        		'city' => "Gotham",
        		'address' => "Batman st. 1",
        		'open' => "09:00:00",
        		'close' => "22:00:00",
        		'phone' => "123456789",
        		'url' => "www.batman.com")
        		);
        	
        	$superman = Salon::create(array(
        		'name' => "Superman's Salon", 
        		'city' => "Metropolis",
        		'address' => "Superman st. 1",
        		'open' => "10:00:00",
        		'close' => "21:00:00",
        		'phone' => "5123412345",
        		'url' => "www.superman.com")
        		);
        	
        	$spiderman = Salon::create(array(
        		'name' => "Spiderman's Salon", 
        		'city' => "New York",
        		'address' => "Spiderman st. 1",
        		'open' => "11:00:00",
        		'close' => "20:00:00",
        		'phone' => "2233456789",
        		'url' => "www.spiderman.com")
        		);
        	
        	
        	#Durations
        
        	DB::table('durations')->delete();
        	
        	$fifteen = new Duration;
        	$fifteen-> duration = "15";
		$fifteen->save();
		
		$thirty = new Duration;
        	$thirty-> duration = "30";
		$thirty->save();
		
		$fourtyfive = new Duration;
        	$fourtyfive-> duration = "45";
		$fourtyfive->save();
        		
        	        	
        	#Sorts
        	
        	DB::table('sorts')->delete();
        	
        	$massage = Sort::create(array(
        		'name' => "massage"));
        		
        	$sauna = Sort::create(array(
        		'name' => "sauna"));
        	
        	#Services
        	
        	DB::table('services')->delete();
		
        	$service1 = new Service;
        	$service1-> sort()->associate($massage);
        	$service1-> type = 'swedish';
        	$service1-> duration()->associate($fifteen);
        	$service1-> price = '40.50';
        	$service1-> part = '0';
        	$service1-> description = 'Lorem';
        	$service1->save();
        	$service1->salon()->attach($batman);
        	
        	$service2 = new Service;
        	$service2-> sort()->associate($massage);
        	$service2-> type = 'swedish';
        	$service2-> duration()->associate($thirty);
        	$service2-> price = '90.50';
        	$service2-> part = '1';
        	$service2-> description = 'Lorem';
        	$service2->save();
        	$service2->salon()->attach($spiderman); 
        	
		$service3 = new Service;
        	$service3-> sort()->associate($sauna);
        	$service3-> type = 'finnish';
        	$service3-> duration()->associate($fourtyfive);
        	$service3-> price = '100.50';
        	$service3-> part = '1';
        	$service3-> description = 'Ipsum';
        	$service3->save();
        	$service3->salon()->attach($superman);
        	
        	
        	return 'Done';

});



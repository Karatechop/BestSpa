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

#Services
Route::get('/', 'ServiceController@index');
Route::get('/services/search', 'ServiceController@indexSearchResults');
Route::get('/adminpanel', 'ServiceController@adminPanelService');
Route::get('/adminpanel/services/search', 'ServiceController@adminPanelSearchServiceResults');
Route::get('/adminpanel/services/create', 'ServiceController@getAdminPanelCreateService');
Route::post('/adminpanel/services/create', 'ServiceController@postAdminPanelCreateService');
Route::get('/adminpanel/services/edit/{id}', 'ServiceController@getAdminPanelEditService');
Route::post('/adminpanel/services/edit/{id}', 'ServiceController@postAdminPanelEditService');
Route::get('/adminpanel/services/delete/{id}', 'ServiceController@getAdminPanelDeleteService');
Route::delete('/adminpanel/services/delete{id}', 'ServiceController@postAdminPanelDeleteService');

#Salons
Route::get('/adminpanel/salons', 'SalonController@adminPanelSalons');
Route::get('/adminpanel/salons/search', 'SalonController@adminPanelSearchSalonResults');
Route::get('/adminpanel/salons/create', 'SalonController@getAdminPanelCreateSalon');
Route::post('/adminpanel/salons/create', 'SalonController@postAdminPanelCreateSalon');
Route::get('/adminpanel/salons/edit/{id}', 'SalonController@getAdminPanelEditSalon');
Route::post('/adminpanel/salons/edit/{id}', 'SalonController@postAdminPanelEditSalon');
Route::get('/adminpanel/salons/delete/{id}', 'SalonController@getAdminPanelDeleteSalon');
Route::delete('/adminpanel/salons/delete{id}', 'SalonController@postAdminPanelDeleteSalon');

#Kinds
Route::get('/adminpanel/kinds', 'KindController@adminPanelKinds');
Route::get('/adminpanel/kinds/search', 'KindController@adminPanelSearchKindResults');
Route::get('/adminpanel/kinds/create', 'KindController@getAdminPanelCreateKind');
Route::post('/adminpanel/kinds/create', 'KindController@postAdminPanelCreateKind');
Route::get('/adminpanel/kinds/edit/{id}', 'KindController@getAdminPanelEditKind');
Route::post('/adminpanel/kinds/edit/{id}', 'KindController@postAdminPanelEditKind');
Route::get('/adminpanel/kinds/delete/{id}', 'KindController@getAdminPanelDeleteKind');
Route::delete('/adminpanel/kinds/delete{id}', 'KindController@postAdminPanelDeleteKind');

#Types
Route::get('/adminpanel/types', 'TypeController@adminPanelTypes');
Route::get('/adminpanel/types/search', 'TypeController@adminPanelSearchTypeResults');
Route::get('/adminpanel/types/create', 'TypeController@getAdminPanelCreateType');
Route::post('/adminpanel/types/create', 'TypeController@postAdminPanelCreateType');
Route::get('/adminpanel/types/edit/{id}', 'TypeController@getAdminPanelEditType');
Route::post('/adminpanel/types/edit/{id}', 'TypeController@postAdminPanelEditType');
Route::get('/adminpanel/types/delete/{id}', 'TypeController@getAdminPanelDeleteType');
Route::delete('/adminpanel/types/delete{id}', 'TypeController@postAdminPanelDeleteType');

#User
Route::get('/login', 'UserController@getLogin' );
Route::post('/login', 'UserController@postLogin');
Route::get('/logout', 'UserController@getLogout');


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
	
	$kinds = Kind::all();
	
	$services = Service::with('salon','duration','kind')->get(); 
	$service_massage = "massage";
	$service_sauna = "sauna";
	$service_city = "Metropolis";
	
	return View::make('queries')->with('salons', $salons)
					->with('salon_gotham', $salon_gotham)
					->with('salon_close', $salon_close)
					->with('durations', $durations)
					->with('kinds', $kinds)
					->with('services', $services)
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
        		'open_h' => "08",
        		'open_m' => "00",
        		'close_h' => "21",
        		'close_m' => "30",
        		'int_code' => "00",
        		'coun_code' => "1",
        		'net_code' => "070",
        		'phone' => "5862542",
        		'url' => "www.batman.com")
        		);
        	
        	$batman_ny  = Salon::create(array(
			'name' => "Batman's Salon NY", 
        		'city' => "New York",
        		'address' => "5th Ave. 120",
        		'open_h' => "08",
        		'open_m' => "30",
        		'close_h' => "21",
        		'close_m' => "00",
        		'int_code' => "00",
        		'coun_code' => "1",
        		'net_code' => "070",
        		'phone' => "5632587",
        		'url' => "www.batman.com/ny")
        		);
        	
        	$superman = Salon::create(array(
        		'name' => "Superman's Salon", 
        		'city' => "Metropolis",
        		'address' => "Superman st. 1",
        		'open_h' => "08",
        		'open_m' => "00",
        		'close_h' => "20",
        		'close_m' => "00",
        		'int_code' => "00",
        		'coun_code' => "1",
        		'net_code' => "070",
        		'phone' => "9615486",
        		'url' => "www.superman.com")
        		);
        	
        	$spiderman = Salon::create(array(
        		'name' => "Spiderman's Salon", 
        		'city' => "New York",
        		'address' => "Spiderman st. 1",
        		'open_h' => "07",
        		'open_m' => "30",
        		'close_h' => "22",
        		'close_m' => "30",
        		'int_code' => "00",
        		'coun_code' => "1",
        		'net_code' => "070",
        		'phone' => "3261485",
        		'url' => "www.spiderman.com")
        		);
        	
        	$joker  = Salon::create(array(
			'name' => "Joker's Salon", 
        		'city' => "Gotham",
        		'address' => "Joker st. 1",
        		'open_h' => "06",
        		'open_m' => "00",
        		'close_h' => "23",
        		'close_m' => "00",
        		'int_code' => "00",
        		'coun_code' => "1",
        		'net_code' => "070",
        		'phone' => "6952145",
        		'url' => "www.joker.com")
        		);
        	
        	
        	#Types
        
        	DB::table('types')->delete();
        	
        	$swedish = Type::create(array(
        		'name' => "swedish"));
		
		$finnish = Type::create(array(
        		'name' => "finnish"));
		
		$turkish = Type::create(array(
        		'name' => "turkish"));
        	
        	$therapeutical = Type::create(array(
        		'name' => "therapeutical"));
        	
        	$russian = Type::create(array(
        		'name' => "russian"));
        	
        	$sport = Type::create(array(
        		'name' => "sport"));
        		
        	        	
        	#Kinds
        	
        	DB::table('kinds')->delete();
        	
        	$massage = Kind::create(array(
        		'name' => "massage"));
        		
        	$sauna = Kind::create(array(
        		'name' => "sauna"));
        	
        	#Services
        	
        	DB::table('services')->delete();
		
        	$service1 = new Service;
        	$service1-> salon()->associate($batman);
        	$service1-> kind()->associate($massage);
        	$service1-> type()->associate($sport);
        	$service1-> duration = '45';
        	$service1-> price = '40.50';
        	$service1-> part = '0';
        	$service1-> description = 'Lorem';
        	$service1->save();
        	
        	
        	$service2 = new Service;
        	$service2-> salon()->associate($superman);
        	$service2-> kind()->associate($massage);
        	$service2-> type()->associate($swedish);
        	$service2-> duration = '45';
        	$service2-> price = '90.50';
        	$service2-> part = '1';
        	$service2-> description = 'Lorem ipsum';
        	$service2->save();
        	
        	
		$service3 = new Service;
		$service3-> salon()->associate($spiderman);
        	$service3-> kind()->associate($sauna);
        	$service3-> type()->associate($russian);
        	$service3-> duration = '90';
        	$service3-> price = '100.50';
        	$service3-> part = '1';
        	$service3-> description = 'Ipsum';
        	$service3->save();
        	
        	
        	$service4 = new Service;
        	$service4-> salon()->associate($batman);
        	$service4-> kind()->associate($sauna);
        	$service4-> type()->associate($finnish);
        	$service4-> duration = '60';
        	$service4-> price = '100.50';
        	$service4-> part = '1';
        	$service4-> description = 'Dolor';
        	$service4->save();
        	
        	
        	$service5 = new Service;
        	$service5-> salon()->associate($joker);
        	$service5-> kind()->associate($sauna);
        	$service5-> type()->associate($turkish);
        	$service5-> duration = '90';
        	$service5-> price = '60.50';
        	$service5-> part = '0';
        	$service5-> description = 'Amet';
        	$service5->save();
        	
        	
        	$service6 = new Service;
        	$service6-> salon()->associate($batman_ny);
        	$service6-> kind()->associate($massage);
        	$service6-> type()->associate($sport);
        	$service6-> duration = '90';
        	$service6-> price = '55.50';
        	$service6-> part = '0';
        	$service6-> description = 'Amet';
        	$service6->save();
        	
        	#Admin user
        	
        	DB::table('users')->delete();
        	
        	$admin = new User;
		$admin -> email    = 'admin@domain.com';
		$admin -> password = Hash::make('password');
		$admin -> save();
        	
        	return 'Done';

});



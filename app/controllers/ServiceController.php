<?php


class ServiceController extends BaseController
{
    public function index()
    {
        # Show services search form and list of services to anons.
        $salons = Salon::showAllsalons();
        $services = Service::showAllservices();
        return View::make('/index')->with('salons', $salons)
				    ->with('services', $services);
    }

    public function indexSearchResults()
    {
        # Show services search results to anons.
        $query  = Input::get('query');
        $service_results = Service::searchServiceResults($query);

        return View::make('/index_services_search_results')->with('service_results', $service_results)
   						->with('query', $query);
    }
    
    public function adminPanelService()
    {
        # Show search form and all services by relevant salons to admin.
        $salons = Salon::showAllsalons();
        $services = Service::showAllservices();
        $salon_cities = Salon::citiesSalons();
        $salon_names = Salon::namesSalons();
        
        return View::make('adminpanel_services')->with('salons', $salons)
				    ->with('services', $services)
				    ->with('salon_cities', $salon_cities)
				    ->with('salon_names', $salon_names);
    }

    public function adminPanelSearchServiceResults()
    {
        # Show services search results to admin.
        $query  = Input::get('query');
        $service_results = Service::searchServiceResults($query);
        
        return View::make('/adminpanel_services_search_results')
        ->with('service_results', $service_results)
        ->with('query', $query);
    }
     
    public function getAdminPanelCreateService()
    {
    	   # Show the create new service form.
    	   	$salons = Salon::getIdNamePair();
		$kinds = Kind::getIdNamePair();
		$durations = Duration::getIdNamePair();
    	return View::make('adminpanel_create_service')
    		->with('salons',$salons)
    		->with('kinds',$kinds)
    		->with('durations',$durations);
    }
    
    
    
    public function postAdminPanelCreateService()
    {
        # Handle create new service form submission.
        # Validation
        
        $rules = array(
        	'price' => 'between:0,1000',
        	'description' => 'required|max:300'   
        	);          

	$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
		
		Session::put('alert_class', 'alert-danger');
		
		return Redirect::to('/adminpanel/services/create')
		->with('flash_message', 'Could not add - please fix the errors listed below.')
		->withInput()
		->withErrors($validator);
		};
		
	# Instantiate the service model
		$all = Input::all();
		$service = new Service;
		
		$service->fill(Input::except('salons'));
		$service->save();
		
		$salons = Input::get('salons');
		
		if (!empty($salons)) {
		
		# This enters a new row in the salon_service table
		foreach(Input::get('salons') as $salon) {
			
			$service->salon()->save(Salon::find($salon));
			}
			
		Session::put('alert_class', 'alert-success');
		
		return Redirect::to('/adminpanel/services/create')
    		->with('flash_message','New service has been added.');
    } else {
    	    Session::put('alert_class', 'alert-danger');
    	 return Redirect::to('/adminpanel/services/create')
		->with('flash_message', 'Could not add - please check at least one salon.');  
    };
    }

    
    
     public function getAdminPanelEditService($id)  
    {
    	     # Show the edit service form.
    	                
    	     try {
			$service = Service::with('salon')->findOrFail($id);
			
			$salons = Salon::getIdNamePair();
			$kinds = Kind::getIdNamePair();
			$durations = Duration::getIdNamePair();
		}
		catch(Exception $e) {
			Session::put('alert_class', 'alert-danger');
			return Redirect::to('/adminpanel')->with('flash_message', 'Service not found');
    	     }
    	  
    	  
    	     
    	     return View::make('adminpanel_edit_service')
    	     ->with('service', $service)
    	     ->with('kinds', $kinds)
    	     ->with('durations',$durations)
    	     ->with('salons', $salons);            
     
    }
    
    
    
   public function postAdminPanelEditService()  
  {
   
  	  	#Check if service exists
    		                           
    		try {
			$service = Service::with('salons')->findOrFail(Input::get('id'));
		} 
		catch(exception $e) {   
			Session::put('alert_class', 'alert-danger');
			$id = Service::find(Input::get('id'));
			$sal = Input::get('salons');
			$service = Service::with('salons')->find(Input::get('id'));
			 return View::make('test')
			  ->with('service', $service)
			  ->with('sal', $sal)
			->with('id', $id);   
			
			
		}; 
    	                 
		try {

			# Save updates data to DB
    	     
			 $service->fill(Input::except('salons'));
			 $service->save();
			 
			 # Update salons associated with this service
			 
		  if(!isset($_POST['salons'])) $_POST['salons'] = array();
		    $salon->updateSalon($_POST['salons']);
			
			
		   	Session::put('alert_class', 'alert-success');
			return Redirect::to('/adminpanel')
			->with('flash_message', 'Your edit has been successfully saved'); 
   
		}
		catch(exception $e) {
			Session::put('alert_class', 'alert-danger');
			return Redirect::to('/adminpanel')
				->with('flash_message', 'Error saving your edit. Please try again.');
	    }
    }

    public function delete()
    {
        // Show delete confirmation page.
        return View::make('delete');
    }

    public function handleDelete()
    {
        // Handle the delete confirmation.
    }
}
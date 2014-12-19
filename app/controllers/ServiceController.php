<?php


class ServiceController extends BaseController
{


public function __construct() {
		
		parent::__construct();
		$this->beforeFilter('auth', array('except' => ['index','indexSearchResults']));
	}




    public function index()
    {
        # Show services search form and list of services to anons.
        $salons = Salon::showAllsalons();
        $services = Service::showAllservices();
        
        return View::make('index')
		->with('salons', $salons)
		->with('services', $services);
    }

    
    public function indexSearchResults()
    {
        # Show services search results to anons.
        $query  = Input::get('query');
        $service_results = Service::searchServiceResults($query);

        return View::make('index_services_search_results')
        	->with('service_results', $service_results)
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
        
        return View::make('adminpanel_services_search_results')
        ->with('service_results', $service_results)
        ->with('query', $query);
    }
     
    
    public function getAdminPanelCreateService()
    {
    	   # Show the create new service form.
    	   	$salons = Salon::getIdNamePair();
		$kinds = Kind::getIdNamePair();
		$types = Type::getIdNamePair();
    	return View::make('adminpanel_create_service')
    		->with('salons',$salons)
    		->with('kinds',$kinds)
    		->with('types',$types);
    }
    
    
    
    public function postAdminPanelCreateService()
    {
        # Handle create new service form submission.
        
        # Validation
        
        $rules = array(
        	'price' => 'required|between:0,1000',
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
		
		$service = new Service;
		
		$service->fill(Input::all());
		$service->save();
			
		Session::put('alert_class', 'alert-success');
		
		return Redirect::to('/adminpanel/services/create')
    		->with('flash_message','New service has been added.');

    }
    
    
     public function getAdminPanelEditService($id)  
    {
    	     # Show the edit service form.
    	                
    	     try {
			$service = Service::with('salon')->findOrFail($id);
			
			$salons = Salon::getIdNamePair();
			$kinds = Kind::getIdNamePair();
			$types = Type::getIdNamePair();
			$price = $service->price;
		}
		catch(Exception $e) {
			Session::put('alert_class', 'alert-danger');
			return Redirect::to('/adminpanel')->with('flash_message', 'Service not found');
    	     }
    	  
    	  
    	     
    	     return View::make('adminpanel_edit_service')
    	     ->with('service', $service)
    	     ->with('kinds', $kinds)
    	     ->with('types',$types)
    	     ->with('price',$price)
    	     ->with('salons', $salons);            
     
    }
    
    
    
   public function postAdminPanelEditService($id)  
  {
   
  	  	#Check if service exists
    		                           
    		try {
			$service = Service::findOrFail($id);
		} 
		catch(exception $e) {   
			Session::put('alert_class', 'alert-danger');
			
			return Redirect::to('/adminpanel')->with('flash_message', 'Service not found');
		}
			
		 # Validation
        
		 $rules = array(
		 'price' => 'required|between:0,1000',
		 'description' => 'required|max:300'   
				);          

        	 $validator = Validator::make(Input::all(), $rules);

		 if($validator->fails()) {
		
		 Session::put('alert_class', 'alert-danger');
		
		 return Redirect::to('/adminpanel/services/edit/'.$service->id)
		 ->with('flash_message', 'An error occured while editing this service. Please try again.')
		 ->withInput()
		 ->withErrors($validator);
		 };	
		
    	                 
		# Save updates data to DB
    	     
			$service->fill(Input::all());
			$service->save();
			 
			Session::put('alert_class', 'alert-success');
				
			return Redirect::to('/adminpanel')
			->with('flash_message', 'Your edit has been successfully saved'); 
	   
  }
	
  
    public function getAdminPanelDeleteService($id)  
    {
    	     # Show the delete service confirmation form.
    	                
    	     try {
			$service = Service::with('salon')->findOrFail($id);
		}
		catch(Exception $e) {
			
			Session::put('alert_class', 'alert-danger');
			return Redirect::to('/adminpanel')->with('flash_message', 'Service not found');
    	     }

    	     
    	     return View::make('adminpanel_delete_service')
    	     ->with('service', $service);
   }
   
   
   public function postAdminPanelDeleteService($id) {
		try {
	        
			$service = Service::findOrFail($id);
		}
		catch(Exception $e) {
			
			Session::put('alert_class', 'alert-danger');
			return Redirect::to('/adminpanel')->with('flash_message', 'Service not found');
    	     }
	   
	    Service::destroy($id);
	    
	    Session::put('alert_class', 'alert-info');
	    return Redirect::to('/adminpanel')->with('flash_message', 'Service successfully deleted.');
	}
   
} //end
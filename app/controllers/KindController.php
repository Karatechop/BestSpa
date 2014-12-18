<?php


class KindController extends BaseController
{
	
    public function adminPanelKinds()
    {
    	   # Show service kinds search form and list of all service kinds to admin.
    	   $kinds = Kind::KindsAscending()->get();
    	   
    	   return View::make('adminpanel_kinds')->with('kinds', $kinds);
    } 
    	
    	
    public function adminPanelSearchKindResults()
    {
    	   {
        # Show service kinds search results to admin.
        $query  = Input::get('query');
        $kind_results = Kind::searchKindResults($query);
        
        return View::make('/adminpanel_kinds_search_results')->with('kind_results', $kind_results)
        						->with('query', $query);
	    }
    }
	
	
    public function getAdminPanelCreateKind()
    {
    	   # Show the create new service kind form.  	   	
    	return View::make('adminpanel_create_kind');
    }

    
    public function postAdminPanelCreateKind()
    {
        # Handle create new service kind form submission.
       
        # Validation
        
        $rules = array(
        	'name' => 'required|unique:kinds,name|max:20',
        	);          

	$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
		
		Session::put('alert_class', 'alert-danger');
		
		return Redirect::to('/adminpanel/kinds/create')
		->with('flash_message', 'Could not add - please fix the errors listed below.')
		->withInput()
		->withErrors($validator);
		};
		
	# Instantiate the kind model
		
		$kind = new Kind;
		
		$kind->fill(Input::all());
		$kind->save();
				
		Session::put('alert_class', 'alert-success');
		
		return Redirect::to('/adminpanel/kinds/create')
    		->with('flash_message','New service kind has been added.');
    }
    
    
    public function getAdminPanelEditKind($id)  
    {
    	     # Show the edit service kind form.
    	                
    	     try {
			$kind = Kind::findOrFail($id);
			
		}
		catch(Exception $e) {
			
			Session::put('alert_class', 'alert-danger');
			return Redirect::to('/adminpanel')->with('flash_message', 'Service kind not found');
    	        }
    	  
    	  
    	     	return View::make('adminpanel_edit_kind')
    	     	->with('kind', $kind);            
     
    }
    
  public function postAdminPanelEditKind($id)  
  {
   
  	  	#Check if service kind exists
    		                           
    		try {
			$kind = Kind::findOrFail($id);
		} 
		catch(exception $e) {   
			Session::put('alert_class', 'alert-danger');
			
			return Redirect::to('/adminpanel/kinds')->with('flash_message', 'Service kind not found');
		}
			
		 # Validation
        
		 $rules = array(
		'name' => 'required|unique:kinds,name|max:20'
				);          

        	 $validator = Validator::make(Input::all(), $rules);

		 if($validator->fails()) {
		
		 Session::put('alert_class', 'alert-danger');
		
		 return Redirect::to('/adminpanel/kinds/edit/'.$kind->id)
		 ->with('flash_message', 'An error occured while editing this service kind. Please try again.')
		 ->withInput()
		 ->withErrors($validator);
		 };	
		
    	                 
		# Save updates data to DB
    	     
			$kind->fill(Input::all());
			$kind->save();
			 
			Session::put('alert_class', 'alert-success');
				
			return Redirect::to('/adminpanel/kinds')
			->with('flash_message', 'Your edit has been successfully saved'); 
	   
  }

  
  public function getAdminPanelDeleteKind($id)  
  {
    	     # Show the delete service kind confirmation form.
    	                
    	     try {
			$kind = Kind::findOrFail($id);
		}
		catch(Exception $e) {
			
			Session::put('alert_class', 'alert-danger');
			return Redirect::to('/adminpanel/kinds')->with('flash_message', 'Service kind not found');
    	     }

    	     
    	     return View::make('adminpanel_delete_kind')
    	     ->with('kind', $kind);
   }
   
   
   public function postAdminPanelDeleteKind($id) 
   {
		try {
	        
			$kind = Kind::findOrFail($id);
		}
		catch(Exception $e) {
			
			Session::put('alert_class', 'alert-danger');
			return Redirect::to('/adminpanel/kinds')->with('flash_message', 'Service kind not found');
    	     }
	   
    	     	try {
    	     
	    Kind::destroy($id);
	    
	    Session::put('alert_class', 'alert-info');
	    return Redirect::to('/adminpanel/kinds')->with('flash_message', 'Service kind successfully deleted.');
		}
		     	
		catch(Exception $e) {
			
			# In case of constraint violation display all related services that block deletion.
			
			Session::put('alert_class', 'alert-danger');
			Session::flash('flash_message', 'Could not delete - integrity constraint violation. 
				This service kind is related to at least one service in database. 
				In order to delete this salon first delete all services listed below.'); 
			$query  = $kind->name;
			$service_results = Service::searchServiceResults($query); 
			
			return View::make('adminpanel_services_search_results')	
			 ->with('service_results', $service_results)
			 ->with('query', $query);
			
		}

   }
   

} //end

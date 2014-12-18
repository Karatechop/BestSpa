<?php


class TypeController extends BaseController
{
	
	public function adminPanelTypes()
    {
    	# Show types search form and all types to admin.
    	$types = Type::TypesDescending()->get();
    	   
    	   return View::make('adminpanel_types')->with('types', $types);
    	}   					
	
	
    	public function adminPanelSearchTypeResults()
    {
    	   {
        # Show service types search results to admin.
        $query  = Input::get('query');
        $type_results = Type::searchTypeResults($query);
        
        return View::make('/adminpanel_types_search_results')->with('type_results', $type_results)
        						->with('query', $query);
	    }
	}

	
	public function getAdminPanelCreateType()
    {
    	# Show the create new service type form.  	   	
    	return View::make('adminpanel_create_type');
    }

    
    	public function postAdminPanelCreateType()
    {
        # Handle create new service type form submission.
       
        # Validation
        
        $rules = array(
        	'name' => 'required|unique:types,name|max:20'
        	);          

	$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
		
		Session::put('alert_class', 'alert-danger');
		
		return Redirect::to('/adminpanel/types/create')
		->with('flash_message', 'Could not add - please fix the errors listed below.')
		->withInput()
		->withErrors($validator);
		};
		
	# Instantiate the type model
		
		$type = new Type;
		
		$type->fill(Input::all());
		$type->save();
				
		Session::put('alert_class', 'alert-success');
		
		return Redirect::to('/adminpanel/types/create')
    		->with('flash_message','New service type has been added.');
    	}
    
    	
    	  public function getAdminPanelEditType($id)  
    {
    	  # Show the edit service type form.
    	                
    	     try {
			$type = Type::findOrFail($id);
			
		}
		catch(Exception $e) {
			
			Session::put('alert_class', 'alert-danger');
			return Redirect::to('/adminpanel')->with('flash_message', 'Service type not found');
    	        }
    	  
    	  
    	     	return View::make('adminpanel_edit_type')
    	     	->with('type', $type);            
     
    }
    
    
    public function postAdminPanelEditType($id)  
  {
   
  	  	#Check if service type exists
    		                           
    		try {
			$type = Type::findOrFail($id);
		} 
		catch(exception $e) {   
			Session::put('alert_class', 'alert-danger');
			
			return Redirect::to('/adminpanel/types')->with('flash_message', 'Service not found');
		}
			
		 # Validation
        
		 $rules = array(
		'name' => 'required|unique:types,name|max:20'
				);          

        	 $validator = Validator::make(Input::all(), $rules);

		 if($validator->fails()) {
		
		 Session::put('alert_class', 'alert-danger');
		
		 return Redirect::to('/adminpanel/types/edit/'.$type->id)
		 ->with('flash_message', 'An error occured while editing this service type. Please try again.')
		 ->withInput()
		 ->withErrors($validator);
		 };	
		
    	                 
		# Save updates data to DB
    	     
			$type->fill(Input::all());
			$type->save();
			 
			Session::put('alert_class', 'alert-success');
				
			return Redirect::to('/adminpanel/types')
			->with('flash_message', 'Your edit has been successfully saved'); 
	   
  }
    

  
  public function getAdminPanelDeleteType($id)  
    {
    	     # Show the delete service type confirmation form.
    	                
    	     try {
			$type = Type::findOrFail($id);
		}
		catch(Exception $e) {
			
			Session::put('alert_class', 'alert-danger');
			return Redirect::to('/adminpanel/types')->with('flash_message', 'Service type not found');
    	     }

    	     
    	     return View::make('adminpanel_delete_type')
    	     ->with('type', $type);
   }
   
   
   public function postAdminPanelDeleteType($id) {
		try {
	        
			$type = Type::findOrFail($id);
		}
		
		catch(Exception $e) {
			
			Session::put('alert_class', 'alert-danger');
			return Redirect::to('/adminpanel/types')->with('flash_message', 'Service type not found');
    	     }
    	     
    	     	try {
    	     
	    Type::destroy($id);
	    
	    Session::put('alert_class', 'alert-info');
	    return Redirect::to('/adminpanel/types')->with('flash_message', 'Service type successfully deleted.');
	     }
	     
	     	catch(Exception $e) {
			
			# In case of constraint violation display all related services that block deletion.
			
			Session::put('alert_class', 'alert-danger');
			Session::flash('flash_message', 'Could not delete - integrity constraint violation. 
				This service type is related to at least one service in database. 
				In order to delete this salon first delete all services listed below.'); 
			$query  = $type->name;
			$service_results = Service::searchServiceResults($query); 
			
			return View::make('adminpanel_services_search_results')	
			 ->with('service_results', $service_results)
			 ->with('query', $query);
			
	     }

   }
   
} //end

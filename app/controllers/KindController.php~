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
        	'name' => 'unique:kinds|alpha|max:20',
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
}

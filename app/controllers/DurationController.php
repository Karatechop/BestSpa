<?php


class DurationController extends BaseController
{
	
	public function adminPanelDurations()
    {
    	   # Show durations search form and all durations to admin.
    	   $durations = Duration::DurationsDescending()->get();
    	   
    	   return View::make('adminpanel_durations')->with('durations', $durations);
    	}   					
	
	
    	public function adminPanelSearchDurationResults()
    {
    	   {
        # Show service durations search results to admin.
        $query  = Input::get('query');
        $duration_results = Duration::searchDurationResults($query);
        
        return View::make('/adminpanel_durations_search_results')->with('duration_results', $duration_results)
        						->with('query', $query);
	    }
	}

	
	public function getAdminPanelCreateDuration()
    {
    	   # Show the create new service duration form.  	   	
    	return View::make('adminpanel_create_duration');
    }

    
    public function postAdminPanelCreateDuration()
    {
        # Handle create new service kind form submission.
       
        # Validation
        
        $rules = array(
        	'duration' => 'required|numeric|between:0,9999',
        	);          

	$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
		
		Session::put('alert_class', 'alert-danger');
		
		return Redirect::to('/adminpanel/durations/create')
		->with('flash_message', 'Could not add - please fix the errors listed below.')
		->withInput()
		->withErrors($validator);
		};
		
	# Instantiate the duration model
		
		$duration = new Duration;
		
		$duration->fill(Input::all());
		$duration->save();
				
		Session::put('alert_class', 'alert-success');
		
		return Redirect::to('/adminpanel/durations/create')
    		->with('flash_message','New service duration has been added.');
    }
}

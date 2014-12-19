<?php
class UserController extends BaseController {
	/**
	*
	*/
	public function __construct() {
		
		parent::__construct();
        $this->beforeFilter('guest',
        	array(
        		'only' => array('getLogin')
        	));
    }
	
	public function getLogin() 
	{
		return View::make('login');
	}
	
	
	
	
	public function postLogin() 
	{
		
		$credentials = Input::only('email', 'password');
		
		if (Auth::attempt($credentials, $remember = false))
		{
			Session::put('alert_class', 'alert-success');
		
			return Redirect::intended('/adminpanel')->with('flash_message', 'Welcome Back!');
		}
		else {
			Session::put('alert_class', 'alert-warning');
			
			return Redirect::to('/login')
				->with('flash_message', 'Log in failed; please try again.')
				->withInput();
		}
		
		}
	
		
	public function getLogout() 
	{
		# Log out
		Auth::logout();
		
		Session::put('alert_class', 'alert-warning');
			
			return Redirect::to('/')
				->with('flash_message', 'You have successfully logged out.')
				->withInput();
	}

	
} //end

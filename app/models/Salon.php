<?php

class Salon extends Eloquent {
	
	protected $fillable = array('name', 'city', 'address', 'open_h', 'open_m','close_ h', 'close_m', 'coun_code', 'int_code', 'net_code', 'phone', 'url');
	
	
	/**
	* Identify relation between Salon and Service
	*/
	public function service() {
        # Salon belongd to many Service
        # Define a many-to-many relationship.
        return $this->hasMany('Service');
    }
    
        public static function showAllsalons() {
        # show all Salons to admin.
        $salons = Salon::all();
        return $salons;
				
}
    	public static function gothamSalons() {
        # show all Salons from Gotham
        $salons = Salon::all();
        $salon_gotham = $salons->filter(function($salon)
		{
			if ($salon->city == 'Gotham') {
				return true;
		}
		});
        return $salon_gotham;
				
}

	public static function citiesSalons() {
        # show all cities that have Salons 
        $salons = Salon::all();
        $salon_cities = array();
        foreach ($salons as $salon) {
         $salon_cities[] = ucwords($salon->city);
        }
        
        sort($salon_cities);
        # get rid of duplicates
        $salon_cities = array_keys(array_flip($salon_cities));
        return  $salon_cities;
				
}

	public static function namesSalons() {
        # show all Salons' names 
        $salons = Salon::all();
        $salon_names = array();
        foreach ($salons as $salon) {
         $salon_names[] = ucwords($salon->name);
      
        }
        sort($salon_names);
        # get rid of duplicates
        $salon_names = array_keys(array_flip($salon_names));
        return  $salon_names;
				
}

	public static function searchSalonResults($query) {
	
		# In case of query, search for salons with that query
        if($query) {
            
            $salons = Salon::where('name', 'LIKE', "%$query%")
            ->OrWhere('city', 'LIKE', "%$query%")
            ->OrWhere('address', 'LIKE', "%$query%")
            ->OrWhere('open_h', 'LIKE', "%$query%")
            ->OrWhere('close_h', 'LIKE', "%$query%")
            ->OrWhere('phone', 'LIKE', "%$query%")
            ->OrWhere('url', 'LIKE', "%$query%")
            ->get();
        }
        
        # Else show all salons
        else {
            
           $salons = Salon::all();
        }
        return $salons;
		
	}

	     public static function getIdNamePair() {
     	     # Generate a key=>value pair of salon id => salon name (for dropdowns)
		$salons = array();
		$all_salons = Salon::all();
		foreach($all_salons as $salon) {
			$salons[$salon->id] = $salon->name;
		}
		return $salons;
	}
	
	public function updateSalons($new = array()) {
        # Go through new tags to see which ones need to be added
        foreach($new as $salon) {
            if(!$this->salons->contains($salon)) {
                $this->salon()->save(Salon::find($salon));
            }
        }
        # Go through existing tags and see which ones need to be deleted
        foreach($this->salons as $salon) {
            if(!in_array($salon->pivot->salon_id,$new)) {
                $this->salon()->detach($salon->id);
            }
        }
    }

  }
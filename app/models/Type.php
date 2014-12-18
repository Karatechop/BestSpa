<?php

class Type extends Eloquent {
	
	protected $fillable = array('name');
	
	
	/**
	* Identify relation between Type and Service
	*/
	public function service() 
	{
        # Type has many Service
        # Define a one-to-many relationship.
        return $this->hasMany('Service');
        }
        
        
       	public function scopeTypesDescending($query)
	{
	# show desc list of all service types to admin. 
        return $query->orderBy('name','DESC');
        }

          
        public static function searchTypeResults($query) 
        {
	
		# In case of query, search for service types with that query
        if($query) {
            
            $types = Type::where('name', 'LIKE', "%$query%")->get();
        	}
        
        # Else show all types
        else {
            
           $types = Type::all();
        	}
        return $types;
        
         }

         public static function getIdNamePair() 
         {
     	     # Generate a key=>value pair of type id => type type for dropdowns
		$types = Array();
		$all_types = Type::all();
		foreach($all_types as $type) {
			$types[$type->id] = $type->name;
		}
		return $types;
	}
} //end
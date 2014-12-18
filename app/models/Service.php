<?php

class Service extends Eloquent { 

	protected $fillable = array('salon_id', 'kind_id', 'type_id', 'duration', 'description','price' ,'part');
	
	
	public function salon() {
        # Service belongs to many Salon
        # Define a many-to-many relationship.
        return $this->belongsTo('Salon');
    }
    
   	public function kind() {
    	# Service belongs to Kind
    	# Define inverse one-to-many relationship.
    	return $this->belongsTo('Kind');
    }
    
    	public function type() {
        # Service belongs to Duration
        # Define inverse one-to-many relationship.
        return $this->belongsTo('Type');
}

    	public static function showAllservices() {
        # show all Services
        $services = Service::with('salon','type','kind')->get();
        return $services;
				
}
	 public static function searchServiceResults($query) {
        # In case of query, search for services with that query
        if($query) {
            # Eager load services with salons, kinds and durations
            $services = Service::with('salon','type','kind')
            ->whereHas('salon', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
                })
            ->orWhereHas('salon', function($q) use($query) {
                $q->where('city', 'LIKE', "%$query%");
                })
            ->orWhereHas('salon', function($q) use($query) {
                $q->where('address', 'LIKE', "%$query%");
                })
            ->orWhereHas('salon', function($q) use($query) {
                $q->where('open_h', 'LIKE', "%$query%");
                })
            ->orWhereHas('salon', function($q) use($query) {
                $q->where('close_h', 'LIKE', "%$query%");
                })
            ->orWhereHas('salon', function($q) use($query) {
                $q->where('url', 'LIKE', "%$query%");
                })
           
            
            ->orWhereHas('kind', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
            
             ->orWhereHas('type', function($q) use($query) {
                $q->where('name', 'LIKE', "%$query%");
            })
             
           
            ->orWhere('duration', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();
        }
        
        # Else show all services
        else {
            
            $services = Service::with('salon','type','kind')->get();
        }
        return $services;
    }

}
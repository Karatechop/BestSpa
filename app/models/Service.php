<?php

class Service extends Eloquent { 

    public function salon() {
        # Service belongs to many Salon
        # Define a many-to-many relationship.
        return $this->belongsToMany('Salon');
    }
    
    public function sort() {
    	# Service belongs to ServiceSort
    	# Define inverse one-to-many relationship.
    	return $this->belongsTo('Sort');
    }
    
    public function duration() {
        # Service belongs to ServiceType
        # Define inverse one-to-many relationship.
        return $this->belongsTo('Duration');
}

}
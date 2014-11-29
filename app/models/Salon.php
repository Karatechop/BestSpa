<?php

class Salon extends Eloquent {
	/**
	* Identify relation between Salon and Service
	*/
	public function service() {
        # Salon belongd to many Service
        # Define a many-to-many relationship.
        return $this->belongsToMany('Service');
    }
    	
 }
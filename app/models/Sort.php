<?php

class Sort extends Eloquent {
	/**
	* Identify relation between ServiceSort and Service
	*/
	public function service() {
        # ServiceSort has many Service
        # Define a one-to-many relationship.
        return $this->hasMany('Service');
    }
}
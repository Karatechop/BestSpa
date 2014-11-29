<?php

class Duration extends Eloquent {
	/**
	* Identify relation between Duration and Service
	*/
	public function service() {
        # Duration has many Service
        # Define a one-to-many relationship.
        return $this->hasMany('Service');
        }
}
    
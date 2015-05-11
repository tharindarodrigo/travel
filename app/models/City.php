<?php

class City extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'city' => 'required',
        'longitude' => 'numeric',
        'latitude' => 'numeric'
	];

	// Don't forget to fill this array
	protected $fillable = ['city','longitude', 'latitude','val'];

    public function hotel()
    {
        return $this->hasMany('Hotel');
    }

}
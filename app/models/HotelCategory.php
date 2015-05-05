<?php

class HotelCategory extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'hotel_category' => 'required',
	];

	// Don't forget to fill this array
	protected $fillable = ['hotel_category'];

    public function hotels(){
        return $this->hasMany('Hotel');
    }

}
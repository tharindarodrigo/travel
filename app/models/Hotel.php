<?php

class Hotel extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

    public function category()
    {
        return $this->belongsToMany('HotelCategory');
    }

    public function city()
    {
        return $this->belongsTo('City');
    }

    public function stars()
    {
        return $this->has('Star');

    }

}
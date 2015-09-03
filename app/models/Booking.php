<?php

class Booking extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['reference_number','arrival_date','departure_date','name', 'adults', 'children', 'val', 'remarks'];

}
<?php

class Booking extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'booking_name' => 'required',
		 'arrival_date' => 'required',
		 'departure_date' => 'required|after:arrival_date',
		 'adults' => 'required|numeric',
		 'children' => 'required|numeric',
		 'tour' => 'required',
	];

	// Don't forget to fill this array
	protected $fillable = [
        'reference_number','arrival_date','departure_date','booking_name', 'adults', 'children', 'tour' , 'val', 'remarks', 'user_id'];

}
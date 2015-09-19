<?php

class FlightDetail extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'arrival_date' => 'required',
		'arrival_time' => 'required',
        'arrival_flight' => 'required',
		'departure_date' => 'required',
		'departure_time' => 'required',
        'departure_flight' => 'required',
	];

	// Don't forget to fill this array
	protected $fillable = ['flight', 'date', 'time', 'flight_type', 'booking_id'];

}
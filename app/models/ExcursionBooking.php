<?php

class ExcursionBooking extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['booking_id','city_id','excursion_transport_type_id','excursion_id','unit_price','pax','date','reference_number'];

}
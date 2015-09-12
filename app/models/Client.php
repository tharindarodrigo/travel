<?php

class Client extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [ 'name', 'passport_number', 'booking_id', 'dob', 'gender' ];

}
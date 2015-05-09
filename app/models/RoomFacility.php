<?php

class RoomFacility extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'room_facility' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['room_facility', 'val'];



}
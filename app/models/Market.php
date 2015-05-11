<?php

class Market extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		 'market' => 'required'

	];

	// Don't forget to fill this array
	protected $fillable = ['market', 'val'];

}
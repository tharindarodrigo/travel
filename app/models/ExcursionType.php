<?php

class ExcursionType extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

    public function excursion(){
        return $this->hasMany('excursion');
    }

}
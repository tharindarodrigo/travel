<?php

class Rate extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = [];

    public function roomType(){
        return $this->belongsTo('RoomType');
    }
    public function roomSpecification(){
        return $this->belongsTo('RoomSpecification');
    }
    public function mealBasis(){
        return $this->belongsTo('MealBasis');
    }
    public function market(){
        return $this->belongsTo('Market');
    }

}
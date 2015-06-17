<?php

class RoomType extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
        'room_type' => 'required',

	];

	// Don't forget to fill this array
	protected $fillable = ['room_type','description','hotel_id','user_id'];

    public function rate(){
        return $this->hasMany('Rate');
    }

    public function roomSpecification(){
        return $this->belongsToMany('RoomSpecification');
    }


}
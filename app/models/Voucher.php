<?php

class Voucher extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['check_in', 'check_out', 'rooms','room_type_id','hotel_id','meal_basis_id','booking_id','amount','val'];


    public function hotel()
    {
        return $this->belongsTo('Hotel');
    }

    public function mealBasis()
    {
        return $this->belongsTo('MealBasis');
    }

    public function roomType()
    {
        return $this->belongsTo('RoomType');
    }

}
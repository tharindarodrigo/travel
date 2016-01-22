<?php

class RateInquiry extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['hotel_id', 'room_type_id','meal_basis_id','status', 'room_specification_id','from','to'];

    public function hotel()
    {
        return $this->belongsTo('Hotel');
    }

    public function mealBasis()
    {
        return $this->belongsTo('mealBasis');
    }

    public function roomSpecification()
    {
        return $this->belongsTo('roomSpecification');
    }

    public function roomType()
    {
        return $this->belongsTo('roomType');
    }

    public static function rateIsAvailable($rateinquiry)
    {
//        dd($rateinquiry->room_specification_id);

        $rate = Rate::where('hotel_id', $rateinquiry->hotel_id)
            ->where('room_type_id', $rateinquiry->room_type_id)
            ->where('meal_basis_id', $rateinquiry->meal_basis_id)
            ->where('room_specification_id', $rateinquiry->room_specification_id)
            ->where('from','<=',$rateinquiry->from)
            ->where('to','>=',$rateinquiry->to)
            ->first();
//        dd('<pre>',$rate,'</pre>');

        return $rate->count() > 0;
    }

}
<?php

class AllotmentInquiry extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['hotel_id', 'room_type_id', 'status', 'room_specification_id', 'from', 'to'];

    public static function allotmentIsAvailable($allotmentinquiry)
    {
        $rate = Rate::where('hotel_id', $allotmentinquiry->hotel_id)
            ->where('room_type_id', $allotmentinquiry->room_type_id)
            ->where('from', '<=', $allotmentinquiry->from)
            ->where('to', '>=', $allotmentinquiry->to)
            ->get();

        return $rate->count() > 0;
    }

    public function hotel()
    {
        return $this->belongsTo('Hotel');
    }

    public function roomSpecification()
    {
        return $this->belongsTo('RoomSpecification');
    }

    public function market()
    {
        return $this->belongsTo('Market');
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
<?php

class AllotmentInquiry extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['hotel_id', 'room_type_id', 'status', 'room_specification_id', 'from', 'to'];

    public function allotmentIsAvailable(ArrayObject $allotmentinquiry)
    {

    }
}
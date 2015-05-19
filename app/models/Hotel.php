<?php

class Hotel extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'name' => 'required',
        'city_id' => 'required',
        'address' => 'required',
        'star_category_id' => 'required',
//         'hotel_categories' => 'required'
    ];

    public static $updaterules = [

    ];

    // Don't forget to fill this array
    protected $fillable = ['name', 'city_id', 'address', 'star_category_id', 'users_id'];

//    public function category()
//    {
//        return $this->belongsToMany('HotelCategory');
//    }
//


    public function starCategory()
    {
        return $this->belongsTo('StarCategory');
    }

    public function users()
    {
        return $this->belongsTo('User');
    }

    public function city(){
        return $this->belongsTo('City');
    }

    public function hotelCategory(){
        return $this->belongsToMany('hotelCategory');
    }


}
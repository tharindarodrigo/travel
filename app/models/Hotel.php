<?php

class Hotel extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'name' => 'required',
        'city_id' => 'required',
        'address' => 'required',
        'star_category_id' => 'required',
        'longitude' => 'numeric',
        'latitude' => 'numeric'
    ];

    public static $updaterules = [

    ];

    // Don't forget to fill this array
    protected $fillable = ['name', 'city_id', 'address', 'star_category_id', 'users_id','longitude','latitude',
        'search_keywords', 'search_description', 'overview', 'terms_and_conditions', 'infant_age', 'infant_charge',
        'child_age', 'child_charge', 'check_in_time', 'check_out_time', 'val'];


    /**
     * Relationships
     */

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
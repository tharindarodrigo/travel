<?php

class TransportPackage extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [];

    public function vehicle()
    {
        return $this->belongsTo('Vehicle');
    }

    public function city(){
        return $this->belongsTo('city');
    }

}
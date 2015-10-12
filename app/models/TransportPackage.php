<?php

class TransportPackage extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'millage'=>'required|numeric',
        'days'=>'required|integer',
        'nights'=>'required|integer',
        'start_date'=>'required|date',
        'end_date'=>'required|date',
        'rate'=>'required|numeric',
    ];

    // Don't forget to fill this array
    protected $fillable = ['vehicle_id','millage','days','nights','origin','destination','start_date','end_date','rate'];

    public function vehicle()
    {
        return $this->belongsTo('Vehicle');
    }

    public function origin(){
        return $this->belongsTo('city');
    }
    public function destination(){
        return $this->belongsTo('city');
    }

}
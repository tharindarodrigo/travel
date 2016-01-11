<?php

class VehicleType extends \Eloquent {
	protected $fillable = [];


    public function transportPackage()
    {
        return $this->hasMany('TransportPackage');
    }

    public function vehicle()
    {
        return $this->belongsTo('vehicle');
    }


}
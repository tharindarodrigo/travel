<?php

class Agent extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'company' => 'required',
        'address' => 'required',
        'email'=>'required',
        'fax'=>'required',
        'tax'=>'required|numeric',
        'handling_fee'=>'required|numeric'
    ];

    // Don't forget to fill this array
    protected $fillable = ['company', 'address', 'email', 'phone', 'tax', 'tax_type', 'handling_fee', 'handling_fee_type','market_id'];


    public function user()
    {
        return $this->hasMany('User');
    }

    public function market()
    {
        return $this->belongsTo('Market');
    }

}
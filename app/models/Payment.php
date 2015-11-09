<?php

class Payment extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'agent_id' =>'required',
        'amount' => 'required|numeric',
        'payment_date_time' => 'required|date',
    ];

    // Don't forget to fill this array
    protected $fillable = [
        'agent_id', 'reference_number', 'payment_date_time', 'details', 'user_id', 'amount'
    ];


    public function agent()
    {
        return $this->belongsTo('agent');
    }
}
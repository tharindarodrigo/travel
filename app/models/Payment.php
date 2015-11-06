<?php

class Payment extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
         'amount' => 'required|numeric',
        'payment'
    ];

    // Don't forget to fill this array
    protected $fillable = [
        'agent_id', 'reference_number', 'payment_date_time', 'details', 'user_id'
    ];


    public function agent()
    {
        return $this->belongsTo('agent');
    }
}
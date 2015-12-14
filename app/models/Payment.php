<?php

class Payment extends \Eloquent
{

    // Add your validation rules here

    public static $PaymentRules = [
        'agent_id' => 'required',
        'amount' => 'required|numeric',
        'payment_date_time' => 'required|date',
        'reference_number' => 'required',
        'details' => 'required',
        'user_id' => 'required',
        'payment_status' => 'required',
        'my_booking' => 'required',
        'HSBC_payment_id' => 'required',
    ];

    // Don't forget to fill this array

    protected $fillable = [
        'agent_id',
        'reference_number',
        'payment_date_time',
        'details',
        'user_id',
        'amount',
        'payment_status',
        'my_booking',
        'HSBC_payment_id',

    ];


    public function user()
    {
        return $this->belongsTo('User');
    }

    public function agent()
    {
        return $this->belongsTo('Agent');
    }


}
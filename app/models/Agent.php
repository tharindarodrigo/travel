<?php

class Agent extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'company' => 'required',
        'address' => 'required',
        'email' => 'required',
        'fax' => 'required',
        'tax' => 'required|numeric',
        'handling_fee' => 'required|numeric'
    ];

    // Don't forget to fill this array
    protected $fillable = ['company', 'address', 'email', 'phone', 'tax', 'tax_type', 'handling_fee', 'handling_fee_type', 'market_id', 'country_id', 'user_id'];


    public static function getAgents()
    {
        return Agent::with(['user', 'market'])->get();
    }

    public static function getUsersWithAgents()
    {

    }

    public static function getCreditLimit($agent_id)
    {
        if (Entrust::hasRole('Agent')) {

            return Agent::where('user_id', $agent_id)->first()->credit_limit;
        }
        return false;

    }

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function users()
    {
        return $this->belongsToMany('User');
    }

    public function market()
    {
        return $this->belongsTo('Market');
    }

}
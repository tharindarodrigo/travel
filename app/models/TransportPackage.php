<?php

class TransportPackage extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'millage' => 'required|numeric',
        'days' => 'required|integer',
        'nights' => 'required|integer',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'rate' => 'required|numeric',
    ];


    // Don't forget to fill this array
    protected $fillable = ['vehicle_id', 'millage', 'days', 'nights', 'origin', 'destination', 'start_date', 'end_date', 'rate'];

    public static function getTotalTransportationAmount($booking)
    {

        $total = TransportPackage::getCustomTripTotal($booking) + TransportPackage::getPredefinedTripTotal($booking);

        return $total;

    }

    public static function getCustomTripTotal($booking)
    {
        $total = 0;
        if ($booking->customTrip->count()) {
            foreach ($booking->customTrip as $customTrip) {
                if ($customTrip->val == 1)
                    $total += $customTrip->amount;
            }
            return $total;
        }

        return 0;
    }

    public static function getPredefinedTripTotal($booking)
    {
        $total = 0;
        if ($booking->predefinedTrip->count()) {

            foreach ($booking->predefinedTrip as $predefinedTrip) {
                if ($predefinedTrip->val == 1) {
                    $total += ($predefinedTrip->transportPackage->rate * $predefinedTrip->transportPackage->millage);
                }
            }
            return $total;
        }

        return 0;
    }


    /**
     * Relationships
     */

    public function vehicle()
    {
        return $this->belongsTo('Vehicle');
    }

    public function originCity()
    {
        return $this->belongsTo('City', 'origin');
    }

    public function destinationCity()
    {
        return $this->belongsTo('City', 'destination');
    }


}
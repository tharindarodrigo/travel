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
        $transport = new TransportPackage();
        $total = $transport->getCustomTripTotal($booking) + $transport->getPredefinedTripTotal($booking);

        return $total;

    }

    public function getCustomTripTotal($booking)
    {
        if ($booking->customTrip->count()) {
            return $total = $booking->customTrip->sum('amount');
        }

        return 0;
    }

    public function getPredefinedTripTotal($booking)
    {
        $total = 0;
        if ($booking->predefinedTrip->count()) {

            foreach ($booking->predefinedTrip as $predefinedTrip) {

                $total += ($predefinedTrip->transportPackage->rate*$predefinedTrip->transportPackage->millage);

                return $total;
            }
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
        return $this->belongsTo('City','origin');
    }

    public function destinationCity()
    {
        return $this->belongsTo('City', 'destination');
    }



}
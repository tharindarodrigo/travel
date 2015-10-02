<?php

class Booking extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        'booking_name' => 'required',
        'arrival_date' => 'required',
        'departure_date' => 'required|after:arrival_date',
        'adults' => 'required|numeric',
        'children' => 'required|numeric',
        'tour' => 'required',
    ];

    // Don't forget to fill this array
    protected $fillable = [
        'reference_number', 'arrival_date', 'departure_date', 'booking_name', 'adults', 'children', 'tour', 'val', 'remarks', 'user_id'
    ];

    /**
     * Functions
     */

    public static function emailBookingDetails($bookingId, $view = 'emails.emailMaster', $subject = 'Booking Amendment - Ref No: ')
    {
        $bookingInfo = Booking::with('client')->with('flightDetail')->where('id', $bookingId)->first();

        $user = Auth::user();
        $booking = $bookingInfo->toArray();
//        dd($booking);

        $mail = Mail::send($view, array(
            'booking' => $booking
        ), function ($message) use ($user, $booking, $subject) {
            $message->to('tharindarodrigo@gmail.com', $user->first_name)->subject($subject.$booking['reference_number']);
        });

        if ($mail) {
            return true;
        }

        return false;
    }


    /**
     * Relationships
     */

    public function client()
    {
        return $this->hasMany('client');
    }

    public function flightDetail()
    {
        return $this->hasMany('FlightDetail');
    }
}
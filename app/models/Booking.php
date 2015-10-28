<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Booking extends \Eloquent
{

    // Add your validation rules here
    public static $agentRules = [
        'booking_name' => 'required',
        'arrival_date' => 'required',
        'departure_date' => 'required|after:arrival_date',
        'adults' => 'required|numeric',
        'children' => 'required|numeric',
        'email' => 'email'
    ];

    public static $userRules = [
        'booking_name' => 'required',
        'arrival_date' => 'required',
    ];

    public static $guestRules = [
        'booking_name' => 'required',
        'arrival_date' => 'required',
        'departure_date' => 'required|after:arrival_date',
        'email' => 'required|email',
        'phone' => 'required',
        'passport_number' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = [
        'reference_number', 'arrival_date', 'departure_date', 'booking_name', 'adults', 'children', 'val', 'remarks','email','phone','passport_number'
    ];

    /**
     * Functions
     */

    public static function emailBookingDetails($bookingId, $view = 'emails.emailMaster', $subject = 'Booking Amendment - Ref No: ')
    {
        $hotel_bookings = [];

        if ($bookings = Session::get('rate_box_details')) {
            $rate_keys = array_keys($bookings);

            foreach ($rate_keys as $rate_key) {
                $hotel_id = explode('_', $rate_key)[0];

                $hotel_bookings[$hotel_id][] = $bookings[$rate_key];
                $hotel_bookings[$hotel_id]['hotel_name'] = $bookings[$rate_key]['hotel_name'];
                $hotel_bookings[$hotel_id]['hotel_address'] = $bookings[$rate_key]['hotel_address'];
                $hotel_bookings[$hotel_id]['room_identity'] = $bookings[$rate_key]['room_identity'];
            }
        }

        $bookingInfo = Booking::with('client')->with('flightDetail')->where('id', $bookingId)->first();

        $user = Auth::user();
        $booking = $bookingInfo->toArray();
//        dd($booking);

        $mail = Mail::send($view, array(
            'booking' => $booking
        ), function ($message) use ($user, $booking, $subject, $hotel_bookings) {
            $message->to('tharindarodrigo@gmail.com', $user->first_name)->subject($subject . $booking['reference_number']);
        });

        if ($mail) {
            return true;
        }

        return false;
    }


    public static function getBookingData($booking_id)
    {
        return Booking::where('id', $booking_id)->with('Client')->with('FlightDetail')->with('Voucher')->with('Invoice')->with('CustomTripB')->first();
    }


    public static function getTotalVoucherAmount($booking_id)
    {
        $booking = Booking::with('voucher')->with('roomBooking')->find($booking_id);
        $total = 0.0;
        foreach ($booking->voucher as $voucher) {
            $total += Voucher::getVoucherAmount($voucher);
        }
        return $total;
    }


    /**
     * Relationships
     */

    public function client()
    {
        return $this->hasMany('Client');
    }

    public function flightDetail()
    {
        return $this->hasMany('FlightDetail');
    }

    public function voucher()
    {
        return $this->hasMany('Voucher');
    }

    public function invoice()
    {
        return $this->hasOne('Invoice');
    }

    public function market()
    {
        return $this->belongsTo('Market');
    }

    public function roomBooking()
    {
        return $this->hasManyThrough('RoomBooking', 'Voucher');
    }

    public function user()
    {
        return $this->belongsToMany('user');
    }

    public function customTrip()
    {
        return $this->hasMany('CustomTrip');

    }

}
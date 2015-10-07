<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;

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


    public static function getBookingData($booking_id){
        return Booking::where('id',$booking_id)->with('Client')->with('FlightDetail')->with('Voucher')->with('Invoice')->first();
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



}
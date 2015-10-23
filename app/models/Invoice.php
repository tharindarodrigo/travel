<?php

class Invoice extends \Eloquent
{

    // Add your validation rules here
    public static $rules = [
        // 'title' => 'required'
    ];

    // Don't forget to fill this array
    protected $fillable = ['booking_id', 'amount'];


    public static function getNights($checkindate, $checkoutdate)
    {
        $from = new DateTime($checkindate);
        $to = new DateTime($checkoutdate);

        return $interval = $to->diff($from);

    }

    public static function getInvoiceAmount($booking)
    {
        $total = 0;
        foreach ($booking->voucher as $voucher) {
            $nights= Invoice::getNights($voucher->check_in, $voucher->check_out);
            foreach ($voucher->roomBooking as $roomBooking) {
                $total = $roomBooking->unit_price * $roomBooking->room_count * $nights;
            }
        }

        return $total;


    }
}
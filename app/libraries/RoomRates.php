<?php

/**
 * Created by PhpStorm.
 * User: thilina
 * Date: 2015-07-09
 * Time: 12:54 PM
 */
class RoomRates
{

    public static function lowestHotelRate($hotel_id, $st_date, $ed_date)
    {

        $from_date = date('Y-m-d', strtotime(str_replace('-', '/', $st_date)));
        $to_date = date('Y-m-d', strtotime(str_replace('-', '/', $ed_date)));

        //$date = date_diff($st_date, $ed_date);

        $low_rate = Rate::where('hotel_id', '=', $hotel_id)
            ->where('from', '<=', $from_date)
            ->where('to', '>=', $from_date)
            ->min('rate');

        return $low_rate;

    }

    public static function lowestRoomRate($hotel_id, $room_type_id, $specification_id, $meal_basis_id, $st_date, $ed_date)
    {

        if (Session::has('adult_child')) {
            $adult = Session::get('adult');
            $child = Session::get('child');
        } else {
            $adult = Session::get('adult');
            $child = Session::get('child');
        }

        $x = 0;
        $room_rates = 0;
        $room_rate = 0;

        $from_date = date('Y-m-d', strtotime(str_replace('-', '/', $st_date)));
        $to_date = date('Y-m-d', strtotime(str_replace('-', '/', $ed_date)));

        $dates = (strtotime($ed_date) - strtotime($st_date)) / 86400;

        for ($x = 1; $x <= $dates; $x++) {

            $get_room_rate = Rate::where('hotel_id', '=', $hotel_id)
                ->where('room_type_id', $room_type_id)
                ->where('room_specification_id', $specification_id)
                ->where('meal_basis_id', $meal_basis_id)
                ->where('from', '<=', $from_date)
                ->where('to', '>=', $from_date)
                ->get();

            foreach ($get_room_rate as $low_rates) {
                $room_rate = $low_rates->rate;
            }

            $from_date = date('Y-m-d', strtotime($from_date . ' + 1 days'));
            $room_rates = $room_rates + $room_rate;

        }

        $lowest_room_rate = number_format(($room_rates / $dates), 2);
        return ($lowest_room_rate);

    }

}
<?php

/**
 * Created by PhpStorm.
 * User: thilina
 * Date: 2015-07-09
 * Time: 12:54 PM
 */
class Rate
{

    public static function lowestRate($hotel_id){
        $low_rate = Rate::where('hotel_id', '=', $hotel_id)->get();

        foreach($low_rate as $low_rates){
             $lowest_rate = $low_rates->rate;
        }
    }

}
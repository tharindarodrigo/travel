<?php

/**
 * Created by PhpStorm.
 * User: thilina
 * Date: 2015-07-09
 * Time: 12:54 PM
 */
class Allotments
{

    public static function allotmentsCount($room_id, $st_date, $ed_date)
    {

        $x = 0;
        $allotments = 0;

        $from_date = date('Y-m-d', strtotime(str_replace('-', '/', $st_date)));
        $to_date = date('Y-m-d', strtotime(str_replace('-', '/', $ed_date)));

        $dates = (strtotime($ed_date) - strtotime($st_date)) / 86400;

        for ($x = 1; $x <= $dates; $x++) {

            $get_allotments = Allotment::where('room_type_id', $room_id)
                ->where('from', '<=', $from_date)
                ->where('to', '>=', $from_date)
                ->get();

                foreach($get_allotments as $allotment){
                    $allotments = $allotment->rooms;
                }

            $from_date = date('Y-m-d', strtotime($from_date . ' + 1 days'));

        }

        return ($allotments);

    }


}
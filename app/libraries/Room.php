<?php

/**
 * Created by PhpStorm.
 * User: thilina
 * Date: 2015-07-09
 * Time: 12:54 PM
 */
class Room
{

    public static function roomTypeImage($adult, $child)
    {
        for ($x = 0; $x < $adult; $x++) {
            $img_path = 'images/site/adult.png';

            echo HTML::image($img_path, '');

        }

        for ($x = 0; $x < $child; $x++) {
            $img_path = 'images/site/child.png';

            echo HTML::image($img_path, '');

        }
    }

}
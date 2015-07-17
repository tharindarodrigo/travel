<?php

/**
 * Created by PhpStorm.
 * User: thilina
 * Date: 2015-07-09
 * Time: 12:54 PM
 */
class Star
{

    public static function star_loop($stars)
    {
        for ($x = 0; $x < $stars; $x++) {
            $img_path = 'images/star_list.png';

            echo HTML::image($img_path, '');

        }
    }

}
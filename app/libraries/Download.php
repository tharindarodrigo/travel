<?php

/**
 * Created by PhpStorm.
 * User: thilina
 * Date: 2015-07-09
 * Time: 12:54 PM
 */
class Download
{

    public function getEbroucherDownload(){

        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "ebroucher.pdf";
        $headers = array(
            'Content-Type: application/pdf',
        );
        return Response::download($file, 'ebroucher.pdf', $headers);
    }

}
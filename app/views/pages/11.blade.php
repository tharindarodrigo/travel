<?php


if (Session::has('currency')) {
    if (Session::get('currency') == 'LKR') {
        $from_currency = 'LKR';
    } else {
        $from_currency = Session::get('currency');
    }
} else {
    $from_currency = 'USD';
}


public function createCurrency()
{
    function converCurrency($from, $to, $amount)
    {
        $url = "https://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
        $request = curl_init();
        $timeOut = 0;
        curl_setopt($request, CURLOPT_URL, $url);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($request, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($request, CURLOPT_CONNECTTIMEOUT, $timeOut);
        $response = curl_exec($request);
        curl_close($request);
        return $response;
    }

    if (Input::has('sri_lankan')) {

        Session::put('market', 4);

        $from_currency = 'USD';
        $to_currency = 'LKR';
        $amount = 1;

    } else {

        if (Session::has('market')) {
            if (Session::get('market') == 4) {
                Session::forget('market');
            }
        }

        $from_currency = 'USD';
        $to_currency = $_POST['currency'];
        $amount = 1;
    }

    dd($from_currency.'/'.$to_currency.'/'.$amount);

    $results = converCurrency($from_currency, $to_currency, $amount);

    $regularExpression = '#\<span class=bld\>(.+?)\<\/span\>#s';
    preg_match($regularExpression, $results, $finalData);
    $finalData[1];
    $str = $finalData[1];
    $rr = (explode(" ", $str));

    Session::put('currency', $rr[1]);
    Session::put('currency_rate', $rr[0]);

    return Response::json(true);

}

?>
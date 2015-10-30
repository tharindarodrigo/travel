<?php
if(isset($_POST["to"])){
    $from_currency    = 'USD';
    $to_currency    = $_POST["to"];
    $amount            = 1;
    $results = converCurrency($from_currency,$to_currency,$amount);

    $regularExpression     = '#\<span class=bld\>(.+?)\<\/span\>#s';
    preg_match($regularExpression, $results, $finalData);
    $finalData[1];
    $str = $finalData[1];
    $rr=(explode(" ",$str));

    echo $rr[0];
    echo '<br>';
    echo $rr[1];
}
function converCurrency($from,$to,$amount){
    $url = "http://www.google.com/finance/converter?a=$amount&from=$from&to=$to";
    $request = curl_init();
    $timeOut = 0;
    curl_setopt ($request, CURLOPT_URL, $url);
    curl_setopt ($request, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($request, CURLOPT_USERAGENT,"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
    curl_setopt ($request, CURLOPT_CONNECTTIMEOUT, $timeOut);
    $response = curl_exec($request);
    curl_close($request);
    return $response;
}

?>
<?php

?>
<form method="POST">

    <select onchange="this.form.submit()" name="to" value="USD">
        <li><a class="currency"  value="AED">United Arab Emirates Dirham (AED)</a></li>
        <li><a class="currency"  value="AFN">Afghan Afghani (AFN)</a></li>
        <li><a class="currency"  value="ALL">Albanian Lek (ALL)</a></li>
        <li><a class="currency"  value="AMD">Armenian Dram (AMD)</a></li>
        <li><a class="currency"  value="ANG">Netherlands Antillean Guilder (ANG)</a></li>
        <li><a class="currency"  value="AOA">Angolan Kwanza (AOA)</a></li>
        <li><a class="currency"  value="ARS">Argentine Peso (ARS)</a></li>
        <li><a class="currency"  value="AUD">Australian Dollar (A$)</a></li>
        <li><a class="currency"  value="AWG">Aruban Florin (AWG)</a></li>
        <li><a class="currency"  value="AZN">Azerbaijani Manat (AZN)</a></li>
        <li><a class="currency"  value="BAM">Bosnia-Herzegovina Convertible Mark (BAM)</a></li>
        <li><a class="currency"  value="BBD">Barbadian Dollar (BBD)</a></li>
        <li><a class="currency"  value="BDT">Bangladeshi Taka (BDT)</a></li>
        <li><a class="currency"  value="BGN">Bulgarian Lev (BGN)</a></li>
        <li><a class="currency"  value="BHD">Bahraini Dinar (BHD)</a></li>
        <li><a class="currency"  value="BIF">Burundian Franc (BIF)</a></li>
        <li><a class="currency"  value="BMD">Bermudan Dollar (BMD)</a></li>
        <li><a class="currency"  value="BND">Brunei Dollar (BND)</a></li>
        <li><a class="currency"  value="BOB">Bolivian Boliviano (BOB)</a></li>
        <li><a class="currency"  value="BRL">Brazilian Real (R$)</a></li>
        <li><a class="currency"  value="BSD">Bahamian Dollar (BSD)</a></li>
        <li><a class="currency"  value="BTC">Bitcoin (฿)</a></li>
        <li><a class="currency"  value="BTN">Bhutanese Ngultrum (BTN)</a></li>
        <li><a class="currency"  value="BWP">Botswanan Pula (BWP)</a></li>
        <li><a class="currency"  value="BYR">Belarusian Ruble (BYR)</a></li>
        <li><a class="currency"  value="BZD">Belize Dollar (BZD)</a></li>
        <li><a class="currency"  value="CAD">Canadian Dollar (CA$)</a></li>
        <li><a class="currency"  value="CDF">Congolese Franc (CDF)</a></li>
        <li><a class="currency"  value="CHF">Swiss Franc (CHF)</a></li>
        <li><a class="currency"  value="CLF">Chilean Unit of Account (UF) (CLF)</a></li>
        <li><a class="currency"  value="CLP">Chilean Peso (CLP)</a></li>
        <li><a class="currency"  value="CNH">CNH (CNH)</a></li>
        <li><a class="currency"  value="CNY">Chinese Yuan (CN¥)</a></li>
        <li><a class="currency"  value="COP">Colombian Peso (COP)</a></li>
        <li><a class="currency"  value="CRC">Costa Rican Colón (CRC)</a></li>
        <li><a class="currency"  value="CUP">Cuban Peso (CUP)</a></li>
        <li><a class="currency"  value="CVE">Cape Verdean Escudo (CVE)</a></li>
        <li><a class="currency"  value="CZK">Czech Republic Koruna (CZK)</a></li>
        <li><a class="currency"  value="DEM">German Mark (DEM)</a></li>
        <li><a class="currency"  value="DJF">Djiboutian Franc (DJF)</a></li>
        <li><a class="currency"  value="DKK">Danish Krone (DKK)</a></li>
        <li><a class="currency"  value="DOP">Dominican Peso (DOP)</a></li>
        <li><a class="currency"  value="DZD">Algerian Dinar (DZD)</a></li>
        <li><a class="currency"  value="EGP">Egyptian Pound (EGP)</a></li>
        <li><a class="currency"  value="ERN">Eritrean Nakfa (ERN)</a></li>
        <li><a class="currency"  value="ETB">Ethiopian Birr (ETB)</a></li>
        <li><a class="currency"  value="EUR">Euro (€)</a></li>
        <li><a class="currency"  value="FIM">Finnish Markka (FIM)</a></li>
        <li><a class="currency"  value="FJD">Fijian Dollar (FJD)</a></li>
        <li><a class="currency"  value="FKP">Falkland Islands Pound (FKP)</a></li>
        <li><a class="currency"  value="FRF">French Franc (FRF)</a></li>
        <li><a class="currency"  value="GBP">British Pound (£)</a></li>
        <li><a class="currency"  value="GEL">Georgian Lari (GEL)</a></li>
        <li><a class="currency"  value="GHS">Ghanaian Cedi (GHS)</a></li>
        <li><a class="currency"  value="GIP">Gibraltar Pound (GIP)</a></li>
        <li><a class="currency"  value="GMD">Gambian Dalasi (GMD)</a></li>
        <li><a class="currency"  value="GNF">Guinean Franc (GNF)</a></li>
        <li><a class="currency"  value="GTQ">Guatemalan Quetzal (GTQ)</a></li>
        <li><a class="currency"  value="GYD">Guyanaese Dollar (GYD)</a></li>
        <li><a class="currency"  value="HKD">Hong Kong Dollar (HK$)</a></li>
        <li><a class="currency"  value="HNL">Honduran Lempira (HNL)</a></li>
        <li><a class="currency"  value="HRK">Croatian Kuna (HRK)</a></li>
        <li><a class="currency"  value="HTG">Haitian Gourde (HTG)</a></li>
        <li><a class="currency"  value="HUF">Hungarian Forint (HUF)</a></li>
        <li><a class="currency"  value="IDR">Indonesian Rupiah (IDR)</a></li>
        <li><a class="currency"  value="IEP">Irish Pound (IEP)</a></li>
        <li><a class="currency"  value="ILS">Israeli New Sheqel (₪)</a></li>
        <li><a class="currency"  value="INR">Indian Rupee (Rs.)</a></li>
        <li><a class="currency"  value="IQD">Iraqi Dinar (IQD)</a></li>
        <li><a class="currency"  value="IRR">Iranian Rial (IRR)</a></li>
        <li><a class="currency"  value="ISK">Icelandic Króna (ISK)</a></li>
        <li><a class="currency"  value="ITL">Italian Lira (ITL)</a></li>
        <li><a class="currency"  value="JMD">Jamaican Dollar (JMD)</a></li>
        <li><a class="currency"  value="JOD">Jordanian Dinar (JOD)</a></li>
        <li><a class="currency"  value="JPY">Japanese Yen (¥)</a></li>
        <li><a class="currency"  value="KES">Kenyan Shilling (KES)</a></li>
        <li><a class="currency"  value="KGS">Kyrgystani Som (KGS)</a></li>
        <li><a class="currency"  value="KHR">Cambodian Riel (KHR)</a></li>
        <li><a class="currency"  value="KMF">Comorian Franc (KMF)</a></li>
        <li><a class="currency"  value="KPW">North Korean Won (KPW)</a></li>
        <li><a class="currency"  value="KRW">South Korean Won (₩)</a></li>
        <li><a class="currency"  value="KWD">Kuwaiti Dinar (KWD)</a></li>
        <li><a class="currency"  value="KYD">Cayman Islands Dollar (KYD)</a></li>
        <li><a class="currency"  value="KZT">Kazakhstani Tenge (KZT)</a></li>
        <li><a class="currency"  value="LAK">Laotian Kip (LAK)</a></li>
        <li><a class="currency"  value="LBP">Lebanese Pound (LBP)</a></li>
        <li><a class="currency"  value="LKR">Sri Lankan Rupee (LKR)</a></li>
        <li><a class="currency"  value="LRD">Liberian Dollar (LRD)</a></li>
        <li><a class="currency"  value="LSL">Lesotho Loti (LSL)</a></li>
        <li><a class="currency"  value="LTL">Lithuanian Litas (LTL)</a></li>
        <li><a class="currency"  value="LVL">Latvian Lats (LVL)</a></li>
        <li><a class="currency"  value="LYD">Libyan Dinar (LYD)</a></li>
        <li><a class="currency"  value="MAD">Moroccan Dirham (MAD)</a></li>
        <li><a class="currency"  value="MDL">Moldovan Leu (MDL)</a></li>
        <li><a class="currency"  value="MGA">Malagasy Ariary (MGA)</a></li>
        <li><a class="currency"  value="MKD">Macedonian Denar (MKD)</a></li>
        <li><a class="currency"  value="MMK">Myanmar Kyat (MMK)</a></li>
        <li><a class="currency"  value="MNT">Mongolian Tugrik (MNT)</a></li>
        <li><a class="currency"  value="MOP">Macanese Pataca (MOP)</a></li>
        <li><a class="currency"  value="MRO">Mauritanian Ouguiya (MRO)</a></li>
        <li><a class="currency"  value="MUR">Mauritian Rupee (MUR)</a></li>
        <li><a class="currency"  value="MVR">Maldivian Rufiyaa (MVR)</a></li>
        <li><a class="currency"  value="MWK">Malawian Kwacha (MWK)</a></li>
        <li><a class="currency"  value="MXN">Mexican Peso (MX$)</a></li>
        <li><a class="currency"  value="MYR">Malaysian Ringgit (MYR)</a></li>
        <li><a class="currency"  value="MZN">Mozambican Metical (MZN)</a></li>
        <li><a class="currency"  value="NAD">Namibian Dollar (NAD)</a></li>
        <li><a class="currency"  value="NGN">Nigerian Naira (NGN)</a></li>
        <li><a class="currency"  value="NIO">Nicaraguan Córdoba (NIO)</a></li>
        <li><a class="currency"  value="NOK">Norwegian Krone (NOK)</a></li>
        <li><a class="currency"  value="NPR">Nepalese Rupee (NPR)</a></li>
        <li><a class="currency"  value="NZD">New Zealand Dollar (NZ$)</a></li>
        <li><a class="currency"  value="OMR">Omani Rial (OMR)</a></li>
        <li><a class="currency"  value="PAB">Panamanian Balboa (PAB)</a></li>
        <li><a class="currency"  value="PEN">Peruvian Nuevo Sol (PEN)</a></li>
        <li><a class="currency"  value="PGK">Papua New Guinean Kina (PGK)</a></li>
        <li><a class="currency"  value="PHP">Philippine Peso (Php)</a></li>
        <li><a class="currency"  value="PKG">PKG (PKG)</a></li>
        <li><a class="currency"  value="PKR">Pakistani Rupee (PKR)</a></li>
        <li><a class="currency"  value="PLN">Polish Zloty (PLN)</a></li>
        <li><a class="currency"  value="PYG">Paraguayan Guarani (PYG)</a></li>
        <li><a class="currency"  value="QAR">Qatari Rial (QAR)</a></li>
        <li><a class="currency"  value="RON">Romanian Leu (RON)</a></li>
        <li><a class="currency"  value="RSD">Serbian Dinar (RSD)</a></li>
        <li><a class="currency"  value="RUB">Russian Ruble (RUB)</a></li>
        <li><a class="currency"  value="RWF">Rwandan Franc (RWF)</a></li>
        <li><a class="currency"  value="SAR">Saudi Riyal (SAR)</a></li>
        <li><a class="currency"  value="SBD">Solomon Islands Dollar (SBD)</a></li>
        <li><a class="currency"  value="SCR">Seychellois Rupee (SCR)</a></li>
        <li><a class="currency"  value="SDG">Sudanese Pound (SDG)</a></li>
        <li><a class="currency"  value="SEK">Swedish Krona (SEK)</a></li>
        <li><a class="currency"  value="SGD">Singapore Dollar (SGD)</a></li>
        <li><a class="currency"  value="SHP">St. Helena Pound (SHP)</a></li>
        <li><a class="currency"  value="SKK">Slovak Koruna (SKK)</a></li>
        <li><a class="currency"  value="SLL">Sierra Leonean Leone (SLL)</a></li>
        <li><a class="currency"  value="SOS">Somali Shilling (SOS)</a></li>
        <li><a class="currency"  value="SRD">Surinamese Dollar (SRD)</a></li>
        <li><a class="currency"  value="STD">São Tomé &amp; Príncipe Dobra (STD)</a></li>
        <li><a class="currency"  value="SVC">Salvadoran Colón (SVC)</a></li>
        <li><a class="currency"  value="SYP">Syrian Pound (SYP)</a></li>
        <li><a class="currency"  value="SZL">Swazi Lilangeni (SZL)</a></li>
        <li><a class="currency"  value="THB">Thai Baht (THB)</a></li>
        <li><a class="currency"  value="TJS">Tajikistani Somoni (TJS)</a></li>
        <li><a class="currency"  value="TMT">Turkmenistani Manat (TMT)</a></li>
        <li><a class="currency"  value="TND">Tunisian Dinar (TND)</a></li>
        <li><a class="currency"  value="TOP">Tongan Paʻanga (TOP)</a></li>
        <li><a class="currency"  value="TRY">Turkish Lira (TRY)</a></li>
        <li><a class="currency"  value="TTD">Trinidad &amp; Tobago Dollar (TTD)</a></li>
        <li><a class="currency"  value="TWD">New Taiwan Dollar (NT$)</a></li>
        <li><a class="currency"  value="TZS">Tanzanian Shilling (TZS)</a></li>
        <li><a class="currency"  value="UAH">Ukrainian Hryvnia (UAH)</a></li>
        <li><a class="currency"  value="UGX">Ugandan Shilling (UGX)</a></li>
        <li><a class="currency" SELECTED value="USD">US Dollar ($)</a></li>
        <li><a class="currency"  value="UYU">Uruguayan Peso (UYU)</a></li>
        <li><a class="currency"  value="UZS">Uzbekistani Som (UZS)</a></li>
        <li><a class="currency"  value="VEF">Venezuelan Bolívar (VEF)</a></li>
        <li><a class="currency"  value="VND">Vietnamese Dong (₫)</a></li>
        <li><a class="currency"  value="VUV">Vanuatu Vatu (VUV)</a></li>
        <li><a class="currency"  value="WST">Samoan Tala (WST)</a></li>
        <li><a class="currency"  value="XAF">Central African CFA Franc (FCFA)</a></li>
        <li><a class="currency"  value="XCD">East Caribbean Dollar (EC$)</a></li>
        <li><a class="currency"  value="XDR">Special Drawing Rights (XDR)</a></li>
        <li><a class="currency"  value="XOF">West African CFA Franc (CFA)</a></li>
        <li><a class="currency"  value="XPF">CFP Franc (CFPF)</a></li>
        <li><a class="currency"  value="YER">Yemeni Rial (YER)</a></li>
        <li><a class="currency"  value="ZAR">South African Rand (ZAR)</a></li>
        <li><a class="currency"  value="ZMK">Zambian Kwacha (1968–2012) (ZMK)</a></li>
        <li><a class="currency"  value="ZMW">Zambian Kwacha (ZMW)</a></li>
        <li><a class="currency"  value="ZWL">Zimbabwean Dollar (2009) (ZWL)</a></li>
        <li><a class="currency"  value="LKR">Sri Lankan Rupee (LKR)</a></li>
    </select>






</form>



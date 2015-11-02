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


<ul class="dropdown">

    <li class=active>
        <a class="currency" id="AED" title="Arab Emirates Dirham"><span class="blue">AED</span>Arab Emirates Dirham</a>
    </li>
    <li >
        <a class="currency" id="IDR" title="Indonesian Rupiah"><span class="blue">IDR</span>Indonesian Rupiah</a>
    </li>
    <li >
        <a class="currency" id="PLN" title="Polish Zloty"><span class="blue">PLN</span>Polish Zloty</a>
    </li>
    <li >
        <a class="currency" id="ARS" title="Argentine Peso"><span class="blue">ARS</span>Argentine Peso</a>
    </li>
    <li >
        <a class="currency" id="JPY" title="Japanese Yen"><span class="blue">JPY</span>Japanese Yen</a>
    </li>
    <li >
        <a class="currency" id="QAR" title="Qatari Rial"><span class="blue">QAR</span>Qatari Rial</a>
    </li>
    <li >
        <a class="currency" id="AUD" title="Australian Dollar"><span class="blue">AUD</span>Australian Dollar</a>
    </li>
    <li >
        <a class="currency" id="JOD" title="Jordanian Dinar"><span class="blue">JOD</span>Jordanian Dinar</a>
    </li>
    <li >
        <a class="currency" id="RON" title="Romanian Leu"><span class="blue">RON</span>Romanian Leu</a>
    </li>
    <li >
        <a class="currency" id="BHD" title="Bahrain Dinar"><span class="blue">BHD</span>Bahrain Dinar</a>
    </li>
    <li >
        <a class="currency" id="KZT" title="Kazakh Tenge"><span class="blue">KZT</span>Kazakh Tenge</a>
    </li>
    <li >
        <a class="currency" id="RUB" title="Russian Ruble"><span class="blue">RUB</span>Russian Ruble</a>
    </li>
    <li >
        <a class="currency" id="GBP" title="British Pound"><span class="blue">GBP</span>British Pound</a>
    </li>
    <li >
        <a class="currency" id="KRW" title="Korean Won"><span class="blue">KRW</span>Korean Won</a>
    </li>
    <li >
        <a class="currency" id="SAR" title="Saudi Riyal"><span class="blue">SAR</span>Saudi Riyal</a>
    </li>
    <li >
        <a class="currency" id="BGN" title="Bulgarian Lev"><span class="blue">BGN</span>Bulgarian Lev</a>
    </li>
    <li >
        <a class="currency" id="KWD" title="Kuwaiti Dinar"><span class="blue">KWD</span>Kuwaiti Dinar</a>
    </li>
    <li >
        <a class="currency" id="SGD" title="Singapore Dollar"><span class="blue">SGD</span>Singapore Dollar</a>
    </li>
    <li >
        <a class="currency" id="CAD" title="Canadian Dollar"><span class="blue">CAD</span>Canadian Dollar</a>
    </li>
    <li >
        <a class="currency" id="MYR" title="Malaysian Ringgit"><span class="blue">MYR</span>Malaysian Ringgit</a>
    </li>
    <li >
        <a class="currency" id="ZAR" title="South African Rand"><span class="blue">ZAR</span>South African Rand</a>
    </li>
    <li >
        <a class="currency" id="XPF" title="CFP Franc"><span class="blue">XPF</span>CFP Franc</a>
    </li>
    <li >
        <a class="currency" id="MXN" title="Mexican Peso"><span class="blue">MXN</span>Mexican Peso</a>
    </li>
    <li >
        <a class="currency" id="SEK" title="Swedish Krona"><span class="blue">SEK</span>Swedish Krona</a>
    </li>
    <li >
        <a class="currency" id="CNY" title="Chinese Yuan"><span class="blue">CNY</span>Chinese Yuan</a>
    </li>
    <li >
        <a class="currency" id="ILS" title="New Israeli Sheqel"><span class="blue">ILS</span>New Israeli Sheqel</a>
    </li>
    <li >
        <a class="currency" id="CHF" title="Swiss Franc"><span class="blue">CHF</span>Swiss Franc</a>
    </li>
    <li >
        <a class="currency" id="CZK" title="Czech Koruna"><span class="blue">CZK</span>Czech Koruna</a>
    </li>
    <li >
        <a class="currency" id="NZD" title="New Zealand Dollar"><span class="blue">NZD</span>New Zealand Dollar</a>
    </li>
    <li >
        <a class="currency" id="TWD" title="Taiwan Dollar"><span class="blue">TWD</span>Taiwan Dollar</a>
    </li>
    <li >
        <a class="currency" id="DKK" title="Danish Krone"><span class="blue">DKK</span>Danish Krone</a>
    </li>
    <li >
        <a class="currency" id="NGN" title="Nigerian Naira"><span class="blue">NGN</span>Nigerian Naira</a>
    </li>
    <li >
        <a class="currency" id="THB" title="Thai Baht"><span class="blue">THB</span>Thai Baht</a>
    </li>
    <li >
        <a class="currency" id="EUR" title="Euro"><span class="blue">EUR</span>Euro</a>
    </li>
    <li >
        <a class="currency" id="NOK" title="Norwegian Krone"><span class="blue">NOK</span>Norwegian Krone</a>
    </li>
    <li >
        <a class="currency" id="TRY" title="Turkish Lira"><span class="blue">TRY</span>Turkish Lira</a>
    </li>
    <li >
        <a class="currency" id="FJD" title="Fiji Dollar"><span class="blue">FJD</span>Fiji Dollar</a>
    </li>
    <li >
        <a class="currency" id="OMR" title="Omani Rial"><span class="blue">OMR</span>Omani Rial</a>
    </li>
    <li >
        <a class="currency" id="UAH" title="Ukrainian Grivna"><span class="blue">UAH</span>Ukrainian Grivna</a>
    </li>
    <li >
        <a class="currency" id="HKD" title="Hong Kong Dollar"><span class="blue">HKD</span>Hong Kong Dollar</a>
    </li>
    <li >
        <a class="currency" id="PKR" title="Pakistan Rupee"><span class="blue">PKR</span>Pakistan Rupee</a>
    </li>
    <li >
        <a class="currency" id="USD" title="US Dollar"><span class="blue">USD</span>US Dollar</a>
    </li>
    <li >
        <a class="currency" id="HUF" title="Hungarian Forint"><span class="blue">HUF</span>Hungarian Forint</a>
    </li>
    <li >
        <a class="currency" id="PHP" title="Philippine Peso"><span class="blue">PHP</span>Philippine Peso</a>
    </li>
    <li >
        <a class="currency" id="VND" title="Vietnamese Dong"><span class="blue">VND</span>Vietnamese Dong</a>
    </li>
    <li >
        <a class="currency" id="INR" title="Indian Rupee"><span class="blue">INR</span>Indian Rupee</a>
    </li>

</ul>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <title>Apple.com style suggestion search</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <script type="text/javascript" src="http://www.google.com/jsapi"></script>

    <style type="">
        /*
                                __      _ _                   _
                               / _|    | (_)                 | |
 _ __ ___   __ _ _ __ ___ ___ | |_ ___ | |_  ___   _ __   ___| |_
| '_ ` _ \ / _` | '__/ __/ _ \|  _/ _ \| | |/ _ \ | '_ \ / _ \ __|
| | | | | | (_| | | | (_| (_) | || (_) | | | (_) || | | |  __/ |_
|_| |_| |_|\__,_|_|  \___\___/|_| \___/|_|_|\___(_)_| |_|\___|\__|

*/

        /* BASIC RESET */
        body, div, img, p {
            padding: 0;
            margin: 0;
        }

        a img {
            border: 0
        }

        /* HTML ELEMENTS */
        body {
            font-family: "Lucida Grande", "Lucida Sans Unicode", Arial, Verdana, sans-serif;
            background-color: #efefef;
            background-image: url(../images/bg.jpg);
        }

        /* COMMON CLASSES */
        .break {
            clear: both;
        }

        /* SEARCH FORM */
        #searchform {
            margin: 50px 200px;
            font-size: 18px;
        }

        #searchform div {
            color: #000000;
        }

        #searchform div input {
            font-size: 18px;
            padding: 5px;
            width: 320px;
        }

        #suggestions {
            position: relative;
            left: 235px;
            width: 320px;
            display: none;
        }

        /* SEARCHRESULTS */
        #searchresults {
            border-width: 1px;
            border-color: #919191;
            border-style: solid;
            width: 320px;
            background-color: #a0a0a0;
            font-size: 10px;
            line-height: 14px;
        }

        #searchresults a {
            display: block;
            background-color: #e4e4e4;
            clear: left;
            height: 56px;
            text-decoration: none;
        }

        #searchresults a:hover {
            background-color: #b7b7b7;
            color: #000000;
        }

        #searchresults a img {
            float: left;
            padding: 5px 10px;
        }

        #searchresults a span.searchheading {
            display: block;
            font-weight: bold;
            padding-top: 5px;
            color: #191919;
        }

        #searchresults a:hover span.searchheading {
            color: #000000;
        }

        #searchresults a span {
            color: #555555;
        }

        #searchresults a:hover span {
            color: #f1f1f1;
        }

        #searchresults span.category {
            font-size: 11px;
            margin: 5px;
            display: block;
            color: #000000;
        }

        #searchresults span.seperator {
            float: right;
            padding-right: 15px;
            margin-right: 5px;
            background-image: url(../images/shortcuts_arrow.gif);
            background-repeat: no-repeat;
            background-position: right;
        }

        #searchresults span.seperator a {
            background-color: transparent;
            display: block;
            margin: 5px;
            height: auto;
            color: #000000;
        }
    </style>

</head>
<body>

<div>
    <form id="searchform">
        <div>
            What are you looking for?
            <input type="text" size="30" value="" id="inputString" onkeyup="lookup(this.value);"/>
        </div>
        <div id="suggestions"></div>
    </form>
</div>
<script>
    google.load("jquery", "1.3.1");
    google.setOnLoadCallback(function () {
        // Safely inject CSS3 and give the search results a shadow
        var cssObj = {
            'box-shadow': '#888 5px 10px 10px', // Added when CSS3 is standard
            '-webkit-box-shadow': '#888 5px 10px 10px', // Safari
            '-moz-box-shadow': '#888 5px 10px 10px'
        }; // Firefox 3.5+
        $("#suggestions").css(cssObj);

        // Fade out the suggestions box when not active
        $("input").blur(function () {
            $('#suggestions').fadeOut();
        });
    });

    function lookup(inputString) {
        if (inputString.length == 0) {
            $('#suggestions').fadeOut(); // Hide the suggestions box
        } else {
            $.post("http://localhost/travel/public/auto-complete", {queryString: "" + inputString + ""}, function (data) { // Do an AJAX call
                $('#suggestions').fadeIn(); // Show the suggestions box
                $('#suggestions').html(data); // Fill the suggestions box
            });
        }
    }
</script>
</body>
</html>

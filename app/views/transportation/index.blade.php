
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="description" content="" />
        <meta name="keywords"    content=" " />
        <meta name="author" content="">

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Lobster">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/prettyPhoto/css/prettyPhoto.css">
        <link rel="stylesheet" href="assets/css/flexslider.css">
        <link rel="stylesheet" href="assets/css/font-awesome.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">


        <script type="text/javascript">

        </script>

        <script type="text/javascript">
            var markers = [
                {
                    "title": 'Airport-Sri lanka',
                    "lat": '7.180155',
                    "lng": '79.884252',
                    "description": 'Sri Lanka Airport Katunayaka.'
                }

                ,
                {
                    "title": 'Bentota Beach Hotel',
                    "lat": '6.4238',
                    "lng": '79.99583'
                }
            ];
            window.onload = function() {
                var mapOptions = {
                    center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
                    zoom: 14,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
                var infoWindow = new google.maps.InfoWindow();
                var lat_lng = new Array();
                var latlngbounds = new google.maps.LatLngBounds();
                for (i = 0; i < markers.length; i++) {
                    var data = markers[i]
                    var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                    lat_lng.push(myLatlng);
                    var marker = new google.maps.Marker({
                        position: myLatlng,
                        map: map,
                        title: data.title
                    });
                    latlngbounds.extend(marker.position);
                    (function(marker, data) {
                        google.maps.event.addListener(marker, "click", function(e) {
                            infoWindow.setContent(data.description);
                            infoWindow.open(map, marker);
                        });
                    })(marker, data);
                }
                map.setCenter(latlngbounds.getCenter());
                map.fitBounds(latlngbounds);

                //***********ROUTING****************//

                //Initialize the Path Array
                var path = new google.maps.MVCArray();

                //Initialize the Direction Service
                var service = new google.maps.DirectionsService();

                //Set the Path Stroke Color
                var poly = new google.maps.Polyline({map: map, strokeColor: '#4986E7'});

                //Loop and Draw Path Route between the Points on MAP
                for (var i = 0; i < lat_lng.length; i++) {
                    if ((i + 1) < lat_lng.length) {
                        var src = lat_lng[i];
                        var des = lat_lng[i + 1];
                        path.push(src);
                        poly.setPath(path);
                        service.route({
                            origin: src,
                            destination: des,
                            travelMode: google.maps.DirectionsTravelMode.DRIVING
                        }, function(result, status) {
                            if (status == google.maps.DirectionsStatus.OK) {
                                for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                                    path.push(result.routes[0].overview_path[i]);
                                }
                            }
                        });
                    }
                }
            }
        </script>

        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry"></script>


        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

        <script type="text/javascript">

            var p1 = new google.maps.LatLng(7.180155, 79.884252);
            var p2 = new google.maps.LatLng(6.4238, 79.99583);

            //alert(calcDistance(p1, p2));

            //calculates distance between two points in km's
            function calcDistance(p1, p2) {
                return (google.maps.geometry.spherical.computeDistanceBetween(p1, p2) / 1000).toFixed(2);
            }


            $(function() {

                $(document).ready(function() {
                    getAmount(1, 1, calcDistance(p1, p2));
                });

                $("#transport_type").change(function() {
                    var ttype = $(this).val();
                    var vtype = $("#vehicle_type").val();
                    //alert(ttype + "-" + vtype);
                    var ttext = $("#transport_type option:selected").text();
                    $("#ttype_info").html(ttext);
                    var distance = calcDistance(p1, p2);
                    getAmount(vtype, ttype, distance);
                });

                $("#vehicle_type").change(function() {

                    var vtype = $(this).val();
                    var ttype = $("#transport_type").val();
                    //alert(vtype + "-" + ttype);
                    var vtext = $("#vehicle_type option:selected").text();
                    $("#vtype_info").html(vtext);
                    var distance = calcDistance(p1, p2);
                    getAmount(vtype, ttype, distance);
                });

                function getAmount(vehicle_type, transport_type, distance) {

                    $.post('room_reservation.php', {get_transport_amount: 'get_transport_amount', vehicle_type: vehicle_type, transport_type: transport_type, distance: distance}, function(data, status) {
                        if (status === "success") {
                            $("#content").html("USD " + data['amount']);
                        }
                    },"json");
                }

            });

        </script>

    </head>

    <body>

        <!-- Header -->
        <div class="container">
            <div class="header row">
                <div class="span12">
                    <?php require_once("include/navbar.php"); ?>
                </div>
            </div>
        </div>

        <!-- Page Title -->
        <div class="page-title">
            <div class="container">
                <div class="row">
                    <div class="span12">
                        <i class="icon-credit-card  page-title-icon"></i>
                        <h2><?php echo $hotel_name; ?> - Transportation Summary /</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reservation -->

        <div class="portfolio container">

        </div>

        <div class="contact-us container">
            <div class="row">
                <div class="span4">

                    <form>

                        <label for="transport" class="titleLabel">Transport Type</label>
                        <select class="span3" id="transport_type">
                            <option value="1">Arrival Transport</option>
                            <option value="2">Departure Transport</option>
                            <option value="3">Arrival & Departure Transport</option>
                        </select>

                        <label for="vehicle" class="titleLabel">Vehicle Type</label>
                        <?php
                        $sql = "SELECT * FROM tab_trans";

                        $result = mysql_query($sql);
                        ?>

                        <select class="span3" name="v_type" id="vehicle_type" >
                            <?php
                            while ($resultOption1 = mysql_fetch_assoc($result)) {
                                echo "<option value=\"" . $resultOption1['id'] . "\">" . $resultOption1['v_type'] . "</option>";
                            }
                            ?>
                        </select>
                        <br/>

                        <div style="clear: both;"></div>

                    </form>
                </div>

                <div class="span4">
                    <form method="post" action="step1.php">
                        <br>
                        <div class="" style="background-color: #9D426B; color: #fff; text-align: center; padding: 2%; vertical-align: middle;">
                            <font style="font-size: 16px;"><strong>Transport Summary</strong></font>
                        </div>
                        <br>
                        <div style="padding-left: 5px;">
                            <b>Transportation Type :</b> <object id="ttype_info"><?php echo "Arrival Transport"; ?></object>
                        </div>
                        <div style="padding-left: 5px;">
                            <b>Vehicle Type :</b> <object id="vtype_info"><?php echo 'Car - ( 1-2 Pax)'; ?></object>
                        </div>
                        <br>


                        <div class="" style="padding: 0">
                            <div class="" style="background: rgb(59,184,71); color: aliceblue; text-align: center; font-size: 20px; padding: 2%; " id="content">USD</div>
                        </div>
                        <div style="text-align: center;">
                            <button name="continue" style="background: #9D426B; width: auto; height: 40px; color: #ffffff" class="btn" type="submit" id="continue">Continue</button>

                            <button class="btn" style="width: auto;  height: 40px; color: #ffffff; background: #DB5812; " type="submit" name="continue_without_transport">Continue Without Transportation</button>
                        </div>
                    </form>
                </div>


                <div class="span1"></div>

                <div class="contact-address span4">
                    <h4> View Estimated Route </h4>

                    <div class="container" id="dvMap" style="width: 350px; height: 350px;">
                    </div>

                    <!--<div id="googleMap" style="width:300px; height:380px;"></div>-->
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php require_once("include/footer.php"); ?>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.8.2.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.flexslider.js"></script>
        <script src="assets/js/jquery.tweet.js"></script>
        <script src="assets/js/jflickrfeed.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="assets/js/jquery.ui.map.min.js"></script>
        <script src="assets/js/jquery.quicksand.js"></script>
        <script src="assets/prettyPhoto/js/jquery.prettyPhoto.js"></script>
        <script src="assets/js/scripts.js"></script>

<!--        <script>
            function initialize() {
                var mapProp = {
                    center: new google.maps.LatLng('$lat', '$lan'),
                    zoom: 5,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>-->

    </body>

</html>


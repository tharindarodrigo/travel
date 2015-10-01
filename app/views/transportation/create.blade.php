@extends('transportation.transportation')

@section('styles')
<style type="text/css">
    th {
        text-align: center;
    }
</style>
@endsection

@section('bread-crumbs')
    <li>/</li>
    <li>{{link_to_route('bookings.index', 'Bookings')}}</li>
    <li>/</li>
    <li>{{link_to_route('bookings.create', 'create')}}</li>
@endsection

@section('body-content')
<div class="container">


    <div class="container mt25 offset-0">

        <!-- CONTENT -->
        <div class="col-md-12 pagecontainer2 offset-0">
            <div class="hpadding50c">
                <p class="lato size30 slim">Transportation</p>

                <p class="aboutarrow"></p>
            </div>
            <div class="line3"></div>

            <div class="hpadding50c">
                <div class="row">
                    {{Form::open()}}

                    <div class="col-md-8" style="width:700px; height: 500px;" id="dvMap"></div>
                    <div class="col-md-4">
                        <div class="form-group" >
                            <label for="from">From</label>
                            {{Form::select('from', $cityList ,null,array('class'=>'form-control', 'id'=>'from'))}}
                        </div>
                        <div class="form-group">
                            <label for="to">Destination</label>
                            {{Form::select('to', $cityList, null,array('class'=>'form-control', 'id'=>'to'))}}
                        </div>
                        <div class="totalDistance"></div>
                    </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('transportation-scripts')
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript">
$(document).ready(function(){

var markers = [{
        "title": '1',
        "lat": '6.9344',
        "lng": '79.8428',
        "description":'1'
   },{
        "title": '2',
        "lat": '7.1500',
        "lng": '80.1',
        "description":'2'
   },{
       "title": '2',
       "lat": '7.2964',
       "lng": '80.6350',
       "description":'2'
   }

];

loadMap(markers);

//    $('#from').change(function(){
//        var from = $(this).val();
//
//        var start = from.split(',');
//
//        markers[0] = {
//             "title": '1',
//             "lat": start[0],
//             "lng": start[1],
//             "description":'1'
//        };
//        //console.log(markers);
//        loadMap();
//    });
//
//    $('#to').change(function(){
//        var to = $(this).val();
//
//        var destination = to.split(',');
//        markers[1] = {
//            "title": '2',
//            "lat": destination[0],
//            "lng": destination[1],
//            "description":'2'
//        };
//        //markers.push(mark);
//        loadMap();
//    });
//
//    $('.destination').change(function(){
//        var destination_id = $(this).attr('id');
//        var destination = to.split(',');
//            markers[destination_id] = {
//                "title": '2',
//                "lat": destination[0],
//                "lng": destination[1],
//                "description":'2'
//            };
//            //markers.push(mark);
//            loadMap();
//    });


});

function loadMap(markers) {

    var mapOptions = {
        center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
        zoom: 5,
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
        (function (marker, data) {
            google.maps.event.addListener(marker, "click", function (e) {
                infoWindow.setContent(data.description);
                infoWindow.open(map, marker);
            });
        })(marker, data);
    }
    map.setCenter(latlngbounds.getCenter());
    map.fitBounds(latlngbounds);

    //***********ROUTING****************//

    //Intialize the Path Array
    var path = new google.maps.MVCArray();

    //Intialize the Direction Service
    var service = new google.maps.DirectionsService();

    //Set the Path Stroke Color
    var poly = new google.maps.Polyline({
        map: map,
        strokeColor: '#4986E7'
    });

    var allDis=0;
    //Loop and Draw Path Route between the Points on MAP
    for (var i = 0; i < lat_lng.length; i++) {
        if ((i + 1) < lat_lng.length) {
            var src = lat_lng[i];
            var des = lat_lng[i + 1];

//            alert('asdas');

            // path.push(src);
            poly.setPath(path);
            service.route({
                origin: src,
                destination: des,
                travelMode: google.maps.DirectionsTravelMode.DRIVING
            }, function (result, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    for (var i = 0, len = result.routes[0].overview_path.length; i < len; i++) {
                        path.push(result.routes[0].overview_path[i]);
                    }
                }
            });


            //distance

            (getDistance(src, des));



        }

    }
//    alert(totalDistance);


}

function getDistance(src, des){
    var distance = 0;

    var distanceService = new google.maps.DistanceMatrixService();

    distanceService.getDistanceMatrix({
        origins: [src],
        destinations: [des],
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
            console.log(response);


            distance = response.rows[0].elements[0].distance.value;
    //                                var duration = response.rows[0].elements[0].duration.text;
    //                                var dvDistance = document.getElementById("dvDistance");
            //totalDistance = totalDistance + distance;
//            alert(distance);


        } else {
            return false
        }

        alert(distance);

    });


}

</script>
@endsection
/**
 * Created by thilina on 2015-09-12.
 */


/********************** For Room Cart **************************/

function sendTransportData(url, formData) {
    $.ajax({
        url: url,
        method: 'post',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        data: formData,
        success: function (data) {

            var table_content = generateTransportTable(data);

            $('#transport_cart_box_table').html(table_content);

            deleteTransport();
        },

        error: function () {
            //alert('There was an error signing In');
        }
    });
}

function generateTransportTable(data) {

    var y = 1;
    var table = '';
    var transport_total_cost = 0;

    if (data != null) {

        $.each(data, function (index, item) {

            if (index != 'total_cost') {

                table += '<tr>';
                table += '<td><span class="dark">' + 'Trip &nbsp;' + y + '</span> &nbsp;&nbsp;' + item.origin + '&nbsp;To&nbsp;' + item.destination_1 + ' <button class="right btn delete_transport btn-xs btn-danger" value="' + index + '">X</button><br>' +
                '<button type="button" class="collapsebtn3 collapsed mt-5" data-toggle="collapse" data-target="#collapse' + y + '"></button>' +
                '<div id="collapse' + y + '" class="collapse">' +
                '<div class="lblue">' +
                '<span class="dark"> Vehicle </span>: ' + item.vehicle_type + '&nbsp; </br>' +
                '<span class="dark">Pick Up </span> : &nbsp;' + item.pick_up_date + ' On ' + item.pick_up_time_hour + ' : ' + item.pick_up_time_minutes + '</br>' +
                '<span class="dark">Drop Off </span> : &nbsp;' + item.drop_off_date + ' On ' + item.drop_off_time_hour + ' : ' + item.drop_off_time_minutes + '</br>' +
                '<br/></div>' +
                '<div class="clearfix"></div>' +
                '</div>' +
                '<div class="clearfix"></div>' +
                'Total cost per trip : <span class="right green bold">USD &nbsp;&nbsp;&nbsp;' + item.cost +
                '</span>' +
                '</td>' +
                '</tr>';

                y = y + 1;

                transport_total_cost = transport_total_cost + item.room_cost;
            }

        });
        //  $('#room_total_cost').html('USD' + '&nbsp;&nbsp;&nbsp;' + room_total_cost);
    }

    return table;

}

function deleteTransport() {

    $('.delete_transport').click(function () {

        var formData = new FormData();
        //alert($(this).val());
        var del_transport_id = $(this).val();

        var url = 'http://' + window.location.host + '/sri-lanka/get_transport_rate_box/delete';

        formData.append('del_transport_id', del_transport_id);

        sendTransportData(url, formData);

    });

}


function sendMapData(url, formData) {
    $.ajax({
        url: url,
        method: 'post',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        data: formData,
        success: function (data) {
            if (data != null) {

                if (data.destination_3_longitude != '') {

                    var markers = [{
                        "title": '1',
                        "lat": data.origin_longitude,
                        "lng": data.origin_latitude,
                        "description": '1'
                    }, {
                        "title": '2',
                        "lat": data.destination_1_longitude,
                        "lng": data.destination_1_latitude,
                        "description": '2'
                    }, {
                        "title": '3',
                        "lat": data.destination_2_longitude,
                        "lng": data.destination_2_latitude,
                        "description": '3'
                    }, {
                        "title": '4',
                        "lat": data.destination_3_longitude,
                        "lng": data.destination_3_latitude,
                        "description": '4'
                    }
                    ];

                } else if (data.destination_2_longitude != '') {

                    var markers = [{
                        "title": '1',
                        "lat": data.origin_longitude,
                        "lng": data.origin_latitude,
                        "description": '1'
                    }, {
                        "title": '2',
                        "lat": data.destination_1_longitude,
                        "lng": data.destination_1_latitude,
                        "description": '2'
                    }, {
                        "title": '3',
                        "lat": data.destination_2_longitude,
                        "lng": data.destination_2_latitude,
                        "description": '3'
                    }
                    ];

                } else if (data.destination_1_longitude != '') {

                    var markers = [{
                        "title": '1',
                        "lat": data.origin_longitude,
                        "lng": data.origin_latitude,
                        "description": '1'
                    }, {
                        "title": '2',
                        "lat": data.destination_1_longitude,
                        "lng": data.destination_1_latitude,
                        "description": '2'
                    }
                    ];
                } else if (data.origin_longitude != '') {

                    var markers = [{
                        "title": '1',
                        "lat": data.origin_longitude,
                        "lng": data.origin_latitude,
                        "description": '1'
                    }, {
                        "title": '2',
                        "lat": data.destination_1_longitude,
                        "lng": data.destination_1_latitude,
                        "description": '2'
                    }
                    ];
                }

                loadMap(markers);

                $('#from').change(function () {
                    var from = $(this).val();

                    var start = from.split(',');

                    markers[0] = {
                        "title": '1',
                        "lat": start[0],
                        "lng": start[1],
                        "description": '1'
                    };
                    //console.log(markers);
                    loadMap();
                });

                $('#to').change(function () {
                    var to = $(this).val();

                    var destination = to.split(',');
                    markers[1] = {
                        "title": '2',
                        "lat": destination[0],
                        "lng": destination[1],
                        "description": '2'
                    };
                    //markers.push(mark);
                    loadMap();
                });

                $('.destination').change(function () {
                    var destination_id = $(this).attr('id');
                    var destination = to.split(',');
                    markers[destination_id] = {
                        "title": '2',
                        "lat": destination[0],
                        "lng": destination[1],
                        "description": '2'
                    };
                    //markers.push(mark);
                    loadMap();
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

                    var allDis = 0;
                    //Loop and Draw Path Route between the Points on MAP
                    for (var i = 0; i < lat_lng.length; i++) {
                        if ((i + 1) < lat_lng.length) {
                            var src = lat_lng[i];
                            var des = lat_lng[i + 1];

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

                function getDistance(src, des) {
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
                            //var duration = response.rows[0].elements[0].duration.text;
                            //var dvDistance = document.getElementById("dvDistance");
                            //totalDistance = totalDistance + distance;
//            alert(distance);

                        } else {

                            return false
                        }
                        //   alert(distance);
                    });
                }
            }
        },

        error: function () {
            //alert('There was an error signing In');
        }
    });
}

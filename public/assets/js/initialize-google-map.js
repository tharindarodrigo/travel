function initialize() {

    "use strict";
    // Create an array of styles.
    var styles = [
        {
            featureType: 'road.highway',
            elementType: 'all',
            stylers: [
                {hue: '#e5e5e5'},
                {saturation: -100},
                {lightness: 72},
                {visibility: 'simplified'}
            ]
        }, {
            featureType: 'water',
            elementType: 'all',
            stylers: [
                {hue: '#30a5dc'},
                {saturation: 47},
                {lightness: -31},
                {visibility: 'simplified'}
            ]
        }, {
            featureType: 'road',
            elementType: 'all',
            stylers: [
                {hue: '#cccccc'},
                {saturation: -100},
                {lightness: 44},
                {visibility: 'on'}
            ]
        }, {
            featureType: 'landscape',
            elementType: 'all',
            stylers: [
                {hue: '#ffffff'},
                {saturation: -100},
                {lightness: 100},
                {visibility: 'on'}
            ]
        }, {
            featureType: 'poi.park',
            elementType: 'all',
            stylers: [
                {hue: '#d2df9f'},
                {saturation: 12},
                {lightness: -4},
                {visibility: 'on'}
            ]
        }, {
            featureType: 'road.arterial',
            elementType: 'all',
            stylers: [
                {hue: '#e5e5e5'},
                {saturation: -100},
                {lightness: 56},
                {visibility: 'on'}
            ]
        }, {
            featureType: 'administrative.locality',
            elementType: 'all',
            stylers: [
                {hue: '#000000'},
                {saturation: 0},
                {lightness: 0},
                {visibility: 'on'}
            ]
        }
    ];

    var lat;
    var lon;
    var hotel_id = $('#get_map').val();

    var url = 'http://'+window.location.host+'/get_map';
    var form_object = new FormData();

    form_object.append('hotel_id', hotel_id);

    $.ajax({
        method: "POST",
        url: url,
        data: form_object,
        processData: false,
        cache: false,
        contentType: false,
        success: function (data) {
            lon = data.longitude;
            lat = data.latitude;

            var myLatlng = new google.maps.LatLng(lat, lon);


            // Create a new StyledMapType object, passing it the array of styles,
            // as well as the name to be displayed on the map type control.
            var styledMap = new google.maps.StyledMapType(styles,
                {name: "Styled Map"});


            // Create a map object, and include the MapTypeId to add
            // to the map type control.
            var mapOptions = {
                zoom: 10,
                center: myLatlng,
                mapTypeControlOptions: {
                    mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']
                }
            };

            var map = new google.maps.Map(document.getElementById('map-canvas'),
                mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: 'Hello World!'
            });


            //Associate the styled map with the MapTypeId and set it to display.
            map.mapTypes.set('map_style', styledMap);
            map.setMapTypeId('map_style');


        },
        error: function () {
            alert('error');
        },
        dataType: 'json'
    });

}


function loadScript() {
    "use strict";
    setTimeout(function () {
        $('#map-canvas').css({'display': 'block'});
        var script = document.createElement('script');
        script.type = 'text/javascript';
        script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&' +
        'callback=initialize';
        document.body.appendChild(script);

        google.maps.event.trigger(map, 'resize');
    }, 500);
}
	
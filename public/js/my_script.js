/**
 * Created by thilina on 2015-08-12.
 */


/**************************************** AUTO COMPLETE  ******************************************************************/

function lookup(inputString) {
    if (inputString.length == 0) {
        $('#suggestions').fadeOut(); // Hide the suggestions box
        $("#inputString").removeClass("ac_loading");
    } else {
        $("#inputString").addClass("ac_loading");
        //$( "#suggestions" ).autocomplete({ delay: 0 });
        $.post("http://" + window.location.host + "/auto-complete", {queryString: "" + inputString + ""}, function (data) { // Do an AJAX call
            $('#suggestions').fadeIn(); // Show the suggestions box
            $('#suggestions').html(data); // Fill the suggestions box

            $('a').click(function () {
                $value = $(this).attr('value');
                $category = $(this).attr('category');
                $('#inputString').val($value);
                $('#inputString').attr('category', $category);
                $('#suggestions').fadeOut();
                $("#inputString").removeClass("ac_loading");
            });
        });
    }
}
/**************************************** END OF AUTO COMPLETE ******************************************************************/


/**************************************** HOTEL LIST ******************************************************************/

// filtering part

$(document).ready(function () {
    $('#facility_full').hide();
    $('#city_full').hide();
});

$('#facility_readmore').click(function () {
    $('#facility_half').hide();
    $('#facility_full').show();
});

$('#facility_readless').click(function () {
    $('#facility_half').show();
    $('#facility_full').hide();
});

$('#city_readmore').click(function () {
    $('#city_half').hide();
    $('#city_full').show();
});

$('#city_readless').click(function () {
    $('#city_half').show();
    $('#city_full').hide();
});

$('.star_category').click(function () {
    var star = $('input[name=star_rating]:checked').map(function () {
        return $(this).val();
    }).get();
    $('#star_rating_form').submit();
});

$('.acc_select').click(function () {
    var accommodation = $('input[name=accommodation]:checked').map(function () {
        return $(this).val();
    }).get();
    $('#accommodation_form').submit();
});

$('.city_select').click(function () {
    var city = $('input[name=city]:checked').map(function () {
        return $(this).val();
    }).get();
    $('#city_form').submit();
});

$('.hot_facility').click(function () {
    var facilities = $('input[name=facility]:checked').map(function () {
        return $(this).val();
    }).get();
    $('#facility_form').submit();
});


$('.price_range_select').slider({
    change: function (event, ui) {
        alert(ui.value);
    }
});


//------------------------------
//Get Hotel List Full Map
//------------------------------

function sendHotelListFullMapData(url, formData) {
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
                var markers = [];

                $.each(data, function (index, item) {
                    //alert(item.longitude)
                    markers.push(
                        {
                            "lat": item.latitude,
                            "lng": item.longitude,
                            "description": item.name
                        }
                    );

                    // alert( index + ": " + item );

                    LoadMap();

                    function LoadMap() {
                        var mapOptions = {
                            center: new google.maps.LatLng(markers[0].lat, markers[0].lng),
                            zoom: 8,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);

                        //Create and open InfoWindow.
                        var infoWindow = new google.maps.InfoWindow();

                        for (var i = 0; i < markers.length; i++) {
                            var data = markers[i];
                            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
                            var marker = new google.maps.Marker({
                                position: myLatlng,
                                map: map,
                                title: data.title
                            });

                            //Attach click event to the marker.
                            (function (marker, data) {
                                google.maps.event.addListener(marker, "click", function (e) {
                                    //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                                    infoWindow.setContent("<div><h4>" + data.description + "</h4></div>");
                                    infoWindow.open(map, marker);
                                });
                            })(marker, data);
                        }
                    }

                });


            }
        },

        error: function () {
            //alert('There was an error signing In');
        }
    });
}

//------------------------------
//Get Hotel List Single Map
//------------------------------

function sendHotelListSingleMapData(url, formData) {
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

                var LatLng = new google.maps.LatLng(data.latitude, data.longitude);
                var mapOptions = {
                    center: LatLng,
                    zoom: 9,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                var map = new google.maps.Map(document.getElementById("dvMap" + data.id), mapOptions);
                var marker = new google.maps.Marker({
                    position: LatLng,
                    map: map,
                    title: "<div><h4>" + data.name + "</h4></div>"
                });
                google.maps.event.addListener(marker, "click", function (e) {
                    var infoWindow = new google.maps.InfoWindow();
                    infoWindow.setContent(marker.title);
                    infoWindow.open(map, marker);
                });

            }
            else{
                alert('No Longitude And Latitude Where Found');
            }
        },

        error: function () {
            //alert('There was an error signing In');
        }
    });
}

/**************************************** END OF HOTEL LIST ******************************************************************/


/**************************************** TOUR LIST ******************************************************************/


$('.tour_select').click(function () {
    var tour_type = $('input[name=tour]:checked').map(function () {
        return $(this).val();
    }).get();
    $('#tour_form').submit();
});

/**************************************** END TOUR LIST ******************************************************************/

/**************************************** EXCURSION LIST ******************************************************************/

$('.excursion_select').click(function () {
    var excursion_type = $('input[name=excursion]:checked').map(function () {
        return $(this).val();
    }).get();
    $('#excursion_form').submit();
});


/**************************************** END EXCURSION LIST ******************************************************************/

/**************************************** TRANSPORT LIST ******************************************************************/

$('.vehicle_select').click(function () {
    var vehicle = $('input[name=city]:checked').map(function () {
        return $(this).val();
    }).get();
    $('#vehicle_select_form').submit();
});


//------------------------------
//Add rooms
//------------------------------

function addroom2() {
    "use strict";
    $('.room2').addClass('block');
    $('.room2').removeClass('none');
    $('.addroom1').removeClass('block');
    $('.addroom1').addClass('none');

}
function removeroom2() {
    "use strict";
    $('.room2').addClass('none');
    $('.room2').removeClass('block');

    $('.addroom1').removeClass('none');
    $('.addroom1').addClass('block');
}
function addroom3() {
    "use strict";
    $('.room3').addClass('block');
    $('.room3').removeClass('none');

    $('.addroom2').removeClass('block');
    $('.addroom2').addClass('none');
}
function removeroom3() {
    "use strict";
    $('.room3').addClass('none');
    $('.room3').removeClass('block');

    $('.addroom2').removeClass('none');
    $('.addroom2').addClass('block');
}

/**************************************** TOSTER ******************************************************************/

$(function () {

    function Toast(type, css, msg) {
        this.type = type;
        this.css = css;
        this.msg = 'This is positioned in the ' + msg + '. You can also style the icon any way you like.';
    }

    var toasts = [
        new Toast('error', 'toast-bottom-full-width', 'This is positioned in the bottom full width. You can also style the icon any way you like.'),
        new Toast('info', 'toast-top-full-width', 'top full width'),
        new Toast('warning', 'toast-top-left', 'This is positioned in the top left. You can also style the icon any way you like.'),
        new Toast('success', 'toast-top-right', 'top right'),
        new Toast('warning', 'toast-bottom-right', 'bottom right'),
        new Toast('error', 'toast-bottom-left', 'bottom left')
    ];


    toastr.options.positionClass = 'toast-top-right';
    toastr.options.extendedTimeOut = 0; //1000;
    toastr.options.timeOut = 1000;
    toastr.options.fadeOut = 250;
    toastr.options.fadeIn = 250;
    toastr.options.closeButton = true;

    var i = 0;

    $('#tryMe').click(function () {
        $('#tryMe').prop('disabled', true);
        delayToasts();
    });

    function delayToasts() {
        if (i === toasts.length) {
            return;
        }
        var delay = i === 0 ? 0 : 2100;
        window.setTimeout(function () {
            showToast();
        }, delay);

        // re-enable the button
        if (i === toasts.length - 1) {
            window.setTimeout(function () {
                $('#tryMe').prop('disabled', false);
                i = 0;
            }, delay + 1000);
        }
    }

    function showToast() {
        var t = toasts[i];
        toastr.options.positionClass = t.css;
        toastr[t.type](t.msg);
        i++;
        delayToasts();
    }
})



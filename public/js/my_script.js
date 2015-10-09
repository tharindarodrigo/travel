/**
 * Created by thilina on 2015-08-12.
 */


/**************************************** AUTO COMPLETE  ******************************************************************/

function lookup(inputString) {
    if (inputString.length == 0) {
        $('#suggestions').fadeOut(); // Hide the suggestions box
    } else {
        $.post("http://" + window.location.host + "/auto-complete", {queryString: "" + inputString + ""}, function (data) { // Do an AJAX call
            $('#suggestions').fadeIn(); // Show the suggestions box
            $('#suggestions').html(data); // Fill the suggestions box

            $('a').click(function () {
                $value = $(this).attr('value');
                $category = $(this).attr('category');
                $('#inputString').val($value);
                $('#inputString').attr('category', $category);
                $('#suggestions').fadeOut();
            });
        });
    }
}
/**************************************** END OF AUTO COMPLETE ******************************************************************/


/**************************************** HOTEL LIST ******************************************************************/


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

function addroom2(){
    "use strict";
    $('.room2').addClass('block');
    $('.room2').removeClass('none');
    $('.addroom1').removeClass('block');
    $('.addroom1').addClass('none');

}
function removeroom2(){
    "use strict";
    $('.room2').addClass('none');
    $('.room2').removeClass('block');

    $('.addroom1').removeClass('none');
    $('.addroom1').addClass('block');
}
function addroom3(){
    "use strict";
    $('.room3').addClass('block');
    $('.room3').removeClass('none');

    $('.addroom2').removeClass('block');
    $('.addroom2').addClass('none');
}
function removeroom3(){
    "use strict";
    $('.room3').addClass('none');
    $('.room3').removeClass('block');

    $('.addroom2').removeClass('none');
    $('.addroom2').addClass('block');
}


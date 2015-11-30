/**
 * Created by thilina on 2015-09-12.
 */


/********************** For Room Cart **************************/

function sendBookingData(url, formData) {
    $.ajax({
        url: url,
        method: 'post',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        data: formData,
        success: function (data) {

            if (data == null) {
                $('#room_rate_tag').hide("blind");
            } else {
                $('#room_rate_tag').show("blind", 500);
                var tablecontent = generateRoomRateTable(data);
                $('#rate_box_table').html(tablecontent);
                deleteRoom();
            }

        },

        error: function () {
            //alert('There was an error signing In');
        }
    });
}

function generateRoomRateTable(data) {

    var y = 1;
    var table = '';


    if (data != null) {
        var room_total_cost = 0;
        var currency = $('#currency_session').val();
        var currency_rate = $('#currency_rate_session').val();

        $.each(data, function (index, item) {
            if (index != 'total_cost') {
                var hotel_id = $('.hidden_hotel_id').val();

                if (item.hotel_id == hotel_id) {

                    table += '<tr>';
                    table += '<td><span class="dark">Room &nbsp;' + y + '</span> &nbsp;:&nbsp;&nbsp;' + item.room_name + ' <button class="right btn delete_room btn-xs btn-danger" value="' + index + '">X</button><br>' +
                    '<button type="button" class="collapsebtn3 collapsed mt-5" data-toggle="collapse" data-target="#collapse' + y + '"></button>' +
                    '<div id="collapse' + y + '" class="collapse">' +
                    '<div class="lblue">' +
                    '<div class="col-md-5"> Check In </div><div class="col-md-7"> : ' + item.check_in + '</div>' +
                    '<div class="col-md-5"> Check Out </div><div class="col-md-7"> : ' + item.check_out + '</div>' +
                    '<div class="col-md-5"> Room Type </div><div class="col-md-7"> : ' + item.room_specification + ' room</div>' +
                    '<div class="col-md-5">Meal Basis</div><div class="col-md-7"> : ' + item.meal_basis + '</div>' +
                    '<div class="col-md-5">Adult / Child </div><div class="col-md-7"> : ' + item.adult + '/' + item.child + ' </div>' +
                    '<div class="col-md-5">Room Count</div><div class="col-md-7"> : ' + item.room_count + '</div>' +
                    '</div>' +
                    '<div class="clearfix"></div>' +
                    '</div> <br>' +
                    '<div class="clearfix"></div>' +
                    'Total cost per room : <span class="right green bold">' + currency + '&nbsp;&nbsp;' + (item.room_cost * currency_rate).toFixed(2) + '</span>';

                    if (item.supplement_rate > 0) {
                        table += 'Supplement Rate : <span class="right green bold">' + currency + '&nbsp;&nbsp;' + (item.supplement_rate * currency_rate).toFixed(2) + '</span>' ;
                    }

                    table += '</td>' +
                    '</tr>';

                    y = y + 1;

                    room_total_cost = room_total_cost + +item.room_cost + + item.supplement_rate;
                }
            }
        });

        $('#room_total_cost').html(currency + '&nbsp;&nbsp;' + (room_total_cost * currency_rate).toFixed(2));
    }

    return table;

}

function deleteRoom() {

    $('.delete_room').click(function () {

        var formData = new FormData();
        //alert($(this).val());
        var del_room_id = $(this).val();

        var url = 'http://' + window.location.host + '/sri-lanka/get_room_rate_box/delete';

        formData.append('del_room_id', del_room_id);

        sendBookingData(url, formData);

    });

}


/********************** For Bookings Cart **************************/

function sendBookingCartData(url, cartData) {
    $.ajax({
        url: url,
        method: 'post',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        data: cartData,
        success: function (data) {
            alert('aaaa');
        },

        error: function () {
            //alert('There was an error signing In');
        }
    });
}




/**
 * Created by thilina on 2015-09-12.
 */


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

            var tablecontent = generateRoomRateTable(data);

            $('#rate_box_table').html(tablecontent);

            deleteRoom();
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

        $.each(data, function (index, item) {

            if (index != 'total_cost') {

                table += '<tr>';
                table += '<td><span class="dark">Room &nbsp;' + y + '</span> &nbsp;:&nbsp;&nbsp;' + item.room_name + ' <button class="right btn delete_room btn-xs btn-danger" value="' + index + '">X</button><br>' +
                '<button type="button" class="collapsebtn3 collapsed mt-5" data-toggle="collapse" data-target="#collapse' + y + '"></button>' +
                '<div id="collapse' + y + '" class="collapse">' +
                '<div class="lblue">' +
                item.room_count + '&nbsp;' +
                item.room_specification + ' Room <br>' +
                item.meal_basis +
                '</div>' +
                '<div class="clearfix"></div>' +
                '</div>' +
                '<div class="clearfix"></div>' +
                'Total cost per room : <span class="right green bold">USD &nbsp;&nbsp;&nbsp;' + item.room_cost +
                '</span>' +
                '</td>' +
                '</tr>';

                y = y + 1;
            }
        });

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




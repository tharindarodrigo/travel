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
                'Total cost per trip : <span class="right green bold">USD &nbsp;&nbsp;&nbsp;' + item.room_cost +
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


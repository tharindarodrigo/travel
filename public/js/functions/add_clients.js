
function sendData(url, formData){
    $.ajax({
        url: url,
        method: 'post',
        processData: false,
        contentType: false,
        cache: false,
        dataType: 'json',
        data: formData,
        success: function (data) {

        },

        error: function () {
            alert('There was an error signing In');
        }
    });

}


function generateClientsTable(data){
    var table = '';
    $.each(data, function(index, item){
        table += '<tr>';
        table += '<td>'+item.name+'</td>';
        table += '<td>'+item.dob+'</td>';
        table += '<td>'+item.passport_number+'</td>';
        table += '<td>'+item.gender+'</td>';
        table += '</tr>';
    });


}

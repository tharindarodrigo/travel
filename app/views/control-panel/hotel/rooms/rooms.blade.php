{{--
    This page allows you to Update the Hotel Profile
    The page
--}}

@extends('control-panel.layout.main')



@section('hotel-nav-bar')
<li class="">{{link_to_route('control-panel.hotel.hotels.edit','Hotel Profile',array($hotelid))}}</li>
<li class="active">{{link_to_route('control-panel.hotel.hotels.room-types.index' ,'Rooms', array($hotelid))}}</li>
<li class="">{{link_to_route('control-panel.hotel.hotels.rates.index' ,'Rates',array($hotelid))}}</li>
<li class="">{{link_to_route('control-panel.hotel.hotels.supplement-rates.index','Supplement Rates' ,array($hotelid))}}</li>
<li class="">{{link_to_route('control-panel.hotel.hotels.edit','Create Rate',array($hotelid))}}</li>

@endsection

{{--Title--}}
@section('control-title')
    {{'Rooms'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Profile'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Hotel</li>
    <li class="active">Profile</li>
    <li class="active">Details</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-hotels')
    {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-hotel-create-hotel')
    {{ 'active' }}
@endsection

@section('content')
<div class="col-md-12">
    <div class="row">
        @yield('room-content')
    </div>
</div>
@endsection

@section('scripts1')
{{ HTML::script('control-panel-assets/ajax/imageUpload.js')}}



@yield('scriptXX')
<script type="text/javascript">
//    $(document).ready(function(){
//        $.get('http://localhost:8000/control-panel/hotel/room_specifications',null,function(data,status){
//            if(status=="success"){
//
//                createTableAndList(data);
//                $('#add_room_spec').click(function(e){
//                    e.preventDefault();
//                    $.post('http://localhost:8000/control-panel/hotel/room_specifications/create',null,function(data, status){
//                        createTableAndList(data);
//                    });
//                });
//
//            }
//
//        }, 'json');
//
//
//    });
//
//    function createTableAndList(data){
//    var table = '';
//                var list = '';
//                var data1 = data[0];
//                var data2 = data[1];
//                    $.each(data1,function(i,item){
//                        table+='<tr>'+
//                        '<td>'+ ++i +'</td>'+
//                        '<td>'+item.room_specification+'</td>'+
//                        '<td>'+item.adults+'</td>'+
//                        '<td>'+item.children+'</td>'+
//                        '<td>'+'<a href="" class="btn btn-xs btn-danger"><b>x</b></button>'+'</td>'+
//                        '</tr>';
//                    });
//                    $.each(data2,function(i,item){
//                        list += '<option value='+item.id+'>'+item.room_specification+'</option>';
//                    });
//
//                    $('tbody').html(table);
//                    $('#room_spec').html(list);
//    }
//    $('#add_room_spec').click(function(){
//        $.ajax({
//            url: ,
//            method: 'post',
//            processData: false,
//            contentType: false,
//            cache: false,
//            dataType: 'json',
//            data: formData,
//            success : function(data){
//
//            }
//        });
//    });

    $('#check_in_time').timepicker({
        minuteStep: 5,
        showInputs: false,
        disableFocus: true
    });

    $('#check_out_time').timepicker({
         minuteStep: 5,
         showInputs: false,
         disableFocus: true
    });


</script>

@endsection

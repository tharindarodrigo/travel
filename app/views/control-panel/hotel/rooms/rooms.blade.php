{{--
    This page allows you to Update the Hotel Profile
    The page
--}}

@extends('control-panel.layout.main')

@section('hotel-nav-bar')
<li class="">{{link_to_route('control-panel.hotel.hotel-profile.edit','Hotel Profile',array($hotelid))}}</li>
<li class="active">{{link_to_route('control-panel.hotel.hotels.room-types.index' ,'Rooms', array($hotelid))}}</li>
<li class=""><a href="#" >Rates</a></li>
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
<script type="text/javascript">

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
@stop
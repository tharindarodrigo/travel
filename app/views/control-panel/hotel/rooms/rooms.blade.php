{{--
    This page allows you to Update the Hotel Profile
    The page
--}}

@extends('control-panel.layout.main')

@section('bread-crumbs')
    @yield('bread-crumbs')
@endsection


@section('hotel-nav-bar')
<li class="">{{link_to_route('control-panel.hotel.hotels.edit','Hotel Profile',array($hotelid))}}</li>
<li class="active">{{link_to_route('control-panel.hotel.hotels.room-types.index' ,'Rooms', array($hotelid))}}</li>
<li class="">{{link_to_route('control-panel.hotel.hotels.rates.index','Rates' ,array($hotelid))}}</li>
<li class="">{{link_to_route('control-panel.hotel.hotels.supplement-rates.index','Supplement Rates' ,array($hotelid))}}</li>
<li class="">{{link_to_route('control-panel.hotel.hotels.allotments.index','Allotments' ,array($hotelid))}}</li>

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
{{--{{ HTML::script('control-panel-assets/ajax/imageUpload.js')}}--}}


<script type="text/javascript">

</script>

@endsection


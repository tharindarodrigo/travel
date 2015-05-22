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
    {{'Hotel'}}
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

<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="{{{ !Session::has('manage') ? 'active':'' }}}"><a aria-expanded="true" href="#tab_1" data-toggle="tab">Details</a></li>
        <li class="{{{ Session::get('manage')=='location'? 'active':'' }}}"><a aria-expanded="false" href="#tab_2" data-toggle="tab" onclick="">Location</a></li>
        <li class="{{{ Session::get('manage')=='facilities'? 'active':'' }}}"><a aria-expanded="false" href="#tab_3" data-toggle="tab">Facilities</a></li>
        <li class="{{{ Session::get('manage')=='policies'? 'active':'' }}}"><a aria-expanded="false" href="#tab_4" data-toggle="tab">Policies</a></li>
        <li class="{{{ Session::get('manage')=='termsAndConditions'? 'active':'' }}}"><a aria-expanded="false" href="#tab_5" data-toggle="tab">Terms & Conditions</a></li>
        <li class="{{{ Session::get('manage')=='images'? 'active':'' }}}"><a aria-expanded="false" href="#tab_6" data-toggle="tab">Hotel Images</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane {{{ !Session::has('manage') ? 'active':'' }}}" id="tab_1">
            {{--Hotel Details Page--}}
        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='location'? 'active':'' }}}" id="tab_2">
            {{--Location Details--}}
        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='facilities'? 'active':'' }}}" id="tab_3">
            {{--Hotel facility list--}}
        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='policies'? 'active':'' }}}" id="tab_4">
                    {{--Hotel Policies--}}
        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='termsAndConditions'? 'active':'' }}}" id="tab_5">
        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='images'? 'active':'' }}}" id="tab_6">
            {{--@include('control-panel.hotel.profile.termsAndConditions')--}}
        </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
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
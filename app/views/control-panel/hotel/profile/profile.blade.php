{{--
    This page allows you to Update the Hotel Profile
    The page
--}}

@extends('control-panel.layout.main')

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
        <li class="active"><a aria-expanded="true" href="#tab_1" data-toggle="tab">Details</a></li>
        <li class=""><a aria-expanded="false" href="#tab_2" data-toggle="tab">Location</a></li>
        <li class=""><a aria-expanded="false" href="#tab_3" data-toggle="tab">Facilities</a></li>
        <li class=""><a aria-expanded="false" href="#tab_4" data-toggle="tab">Policies</a></li>
        <li class=""><a aria-expanded="false" href="#tab_5" data-toggle="tab">Terms & Conditions</a></li>
        <li class=""><a aria-expanded="false" href="#tab_6" data-toggle="tab">Hotel Images</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane {{{ !Session::has('manage') ? 'active':'' }}}" id="tab_1">
            {{--Hotel Details Page--}}
            @include('control-panel.hotel.profile.hotelOverview')
        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='location'? 'active':'' }}}" id="tab_2">
            {{--Location Details--}}
            @include('control-panel.hotel.profile.location')
        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='facilities'? 'active':'' }}}" id="tab_3">
            {{--Hotel facility list--}}
            @include('control-panel.hotel.profile.facilities')
        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='policies'? 'active':'' }}}" id="tab_4">
                    {{--Hotel Policies--}}
            @include('control-panel.hotel.profile.policies')
        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='termsAndConditions'? 'active':'' }}}" id="tab_5">
            @include('control-panel.hotel.profile.termsAndConditions')
        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='images'? 'active':'' }}}" id="tab_6">
            {{--@include('control-panel.hotel.profile.termsAndConditions')--}}
        </div><!-- /.tab-pane -->
    </div><!-- /.tab-content -->
</div>

</div>

@stop
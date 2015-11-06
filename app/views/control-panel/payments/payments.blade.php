{{--
    This page allows you to Update the Hotel Profile
    The page
--}}

@extends('control-panel.layout.main')

@section('head-scripts')
    {{ HTML::style('control-panel-assets/plugins/datepicker/datepicker3.css') }}
@endsection

@section('bread-crumbs')
    @yield('bread-crumbs')
@endsection

{{--Title--}}
@section('control-title')
    {{'Payments'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'All Payments'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Hotel</li>
    <li class="active">Profile</li>
    <li class="active">Details</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-payments')
    {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-hotel-create-hotel')
    {{ 'active' }}
@endsection

@section('content')
    <div class="col-md-12">
        <div class="row">
            @yield('payment-content')
        </div>
    </div>
@endsection

@section('scripts1')
    {{ HTML::script('control-panel-assets/plugins/datepicker/bootstrap-datepicker.js')}}
    @yield('script')
@endsection


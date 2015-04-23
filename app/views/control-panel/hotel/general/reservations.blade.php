@extends('......layout.main')

{{--Title--}}
@section('control-title')
    {{'Hotels'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Reservations'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Hotels</li>
    <li class="active">Reservations</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-hotels')
 {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-reservations')
 {{ 'active' }}
@endsection


@section('content')

<div class="row">
    <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Add Rates</a></li>
                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Add Room Allotment</a></li>
                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Add Supplement Rates</a></li>


                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @include('dashboard.hotel.reservations.rates')

                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="tab_2">
                        @include('dashboard.hotel.reservations.allotments')

                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="tab_3">
                        @include('dashboard.hotel.reservations.supplementRates')

                    </div>
                    <!-- /.tab-pane -->

                </div>
                <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
        </div>
</div>

@endsection
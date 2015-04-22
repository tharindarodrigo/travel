@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'Hotels'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Create Hotel'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Hotels</li>
    <li class="active">Create Hotel</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-hotels')
 {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-create-hotel')
 {{ 'active' }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Hotel Details</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Location</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Rooms</a></li>
                <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Facilities</a></li>
                <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">Policies</a></li>
                <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">Terms & Conditions</a></li>

                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    @include('dashboard.hotel.manageHotel.hotelDetails')

                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="tab_2">
                    @include('dashboard.hotel.manageHotel.location')

                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="tab_3">
                    @include('dashboard.hotel.manageHotel.rooms')

                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="tab_4">
                    @include('dashboard.hotel.manageHotel.facilities')

                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="tab_5">
                    @include('dashboard.hotel.manageHotel.policies')

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_6">
                    @include('dashboard.hotel.manageHotel.termsAndConditions')
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>
</div>
@endsection


@section('scripts')

    <script type="text/javascript">
        $('document').ready(function(){
            //$('.remove_cancellation_policy').hide();
            addRow();
            removeRow();

        });

        function addRow(){
            $('.add_cancellation_policy').click(function(){
                var cancellation = $(this).closest('tr').clone();
                $(this).closest('.remove_cancellation_policy').hide();
                var x = $(this).closest('tbody').append(cancellation);
                $(this).hide();
                addRow();
                removeRow();
            });
        }

        function removeRow(){
            $('.remove_cancellation_policy').click(function(){
                var cancellation = $(this).closest('tr').remove();
            });
        }
    </script>


@endsection
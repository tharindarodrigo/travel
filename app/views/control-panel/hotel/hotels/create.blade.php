@extends('control-panel.hotel.hotels.hotels')

@section('content')
<div class="row">
    <div class="col-md-12">
    {{ Form::open(array('route' => array('control-panel.hotel.hotels.store'), 'files'=>true)) }}
    <div class="col-md-12">
            <div class="nav-tabs-custom">
                <div class="box">
                    <div class="box-header with-border box-primary">
                        <h3 class="box-title">Hotel Overview</h3>
                        <div class="box-tools pull-right">
                            <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                            {{--<button data-original-title="Remove" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>--}}
                        </div>
                    </div>
                    <div style="display: block;" class="box-body">
                        <div class="row">
                            @include('control-panel.hotel.hotels.partials.hotelOverview')
                        </div>

                    </div>
                </div>
            </div>


            <div class="nav-tabs-custom">
                <div class="box">
                    <div class="box-header with-border box-primary">
                        <h3 class="box-title">Hotel Location</h3>
                        <div class="box-tools pull-right">
                            <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                            {{--<button data-original-title="Remove" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>--}}
                        </div>
                    </div>
                    <div style="display: block;" class="box-body">
                        <div class="row">
                            @include('control-panel.hotel.hotels.partials.location')
                        </div>

                    </div>
                </div>
            </div>

            <div class="nav-tabs-custom">
                <div class="box">
                    <div class="box-header with-border box-primary">
                        <h3 class="box-title">Facilities</h3>
                        <div class="box-tools pull-right">
                            <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                            {{--<button data-original-title="Remove" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>--}}
                        </div>
                    </div>
                    <div style="display: block;" class="box-body">
                        <div class="row">

                            @include('control-panel.hotel.hotels.partials.facilities')
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-tabs-custom">
                <div class="box">
                    <div class="box-header with-border box-primary">
                        <h3 class="box-title">Policies</h3>
                        <div class="box-tools pull-right">
                            <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                            {{--<button data-original-title="Remove" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>--}}
                        </div>
                    </div>
                    <div style="display: block;" class="box-body">
                        <div class="row">
                            {{--@include('control-panel.hotel.hotels.partials.policies')--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-tabs-custom">
                <div class="box">
                    <div class="box-header with-border box-primary">
                        <h3 class="box-title">Terms & Conditions</h3>
                        <div class="box-tools pull-right">
                            <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                            {{--<button data-original-title="Remove" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>--}}
                        </div>
                    </div>
                    <div style="display: block;" class="box-body">
                        <div class="row">
                            @include('control-panel.hotel.hotels.partials.termsAndConditions')
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-tabs-custom">
                <div class="box">
                    <div class="box-header with-border box-primary">
                        <h3 class="box-title">Hotel Photos</h3>
                        <div class="box-tools pull-right">
                            <button data-original-title="Collapse" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title=""><i class="fa fa-minus"></i></button>
                            {{--<button data-original-title="Remove" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title=""><i class="fa fa-times"></i></button>--}}
                        </div>
                    </div>
                    <div style="display: block;" class="box-body">
                        <div class="row">
                            @include('control-panel.hotel.hotels.partials.images')
                        </div>
                    </div>
                </div>
            </div>

            <button class="btn btn-primary">Create Hotel</button>

        </div>
    </div>
{{Form::close()}}
</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){

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

            $('#country_id').change(function(){
                var country_id = $(this).val();
                loadCities(country_id);
            });

            $('#country_id').trigger('change');

        });

        function loadCities(country_id){
            var country_id = $('#country_id').val();
            var url = 'http://'+window.location.host+'/control-panel/general/cities/get-cities/'+country_id;
            var cities = '';
            $.ajax({
                url: url,
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json',
                success: function(data){
                    $.each(data,function(i,item){
                        cities += '<option value="'+item.id+'">'+item.city+'</option>';
                    });

                    $('select[name="city_id"]').html(cities);
                }
            });
        }
    </script>
@endsection
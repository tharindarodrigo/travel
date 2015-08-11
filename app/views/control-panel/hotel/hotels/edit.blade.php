{{--
    This page allows you to Update the Hotel Profile
    The page
--}}

@extends('control-panel.layout.main')

@section('hotel-nav-bar')
<li class="active">{{link_to_route('control-panel.hotel.hotel-profile.edit','Hotel Profile',array($hotelprofile->id))}}</li>
<li class="">{{link_to_route('control-panel.hotel.hotels.room-types.index' ,'Rooms', array($hotelprofile->id))}}</li>
<li class="">{{link_to_route('control-panel.hotel.hotels.rates.index','Rates' ,array($hotelprofile->id))}}</li>
<li class="">{{link_to_route('control-panel.hotel.hotels.supplement-rates.index','Supplement Rates' ,array($hotelprofile->id))}}</li>

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

    <div class="callout callout-info">
        <p><b><em>Note : </em></b>Make Sure you save changes before you switch to other tabs! Information may get lost</p>
    </div>

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
            {{ Form::model($hotelprofile, array('route' => array('control-panel.hotel.hotels.update',$hotelprofile->id), 'method'=>'put')) }}
            @include('control-panel.hotel.hotels.partials.hotelOverview')
            <div class="row">
                <div class="col-md-offset-4 col-md-4 ">
                    {{ Form::submit('Update Hotel', array('class' => 'btn btn-primary btn-block', 'name'=> 'update_hotel' ))}}
                </div>
            </div>
            {{Form::close()}}
        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='location'? 'active':'' }}}" id="tab_2">
            {{--Location Details--}}

            {{ Form::model($hotelprofile, array('route' => array('control-panel.hotel.hotels.update',$hotelprofile->id), 'method'=>'put')) }}


                @include('control-panel.hotel.hotels.partials.location')

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md4">
                            {{ Form::submit('Update Location', array('class' => 'btn btn-primary' , 'name' => 'update_location' )) }}

                        </div>
                    </div>
                </div>
            {{Form::close()}}

        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='facilities'? 'active':'' }}}" id="tab_3">
            {{--Hotel facility list--}}
                {{ Form::open(array('route' => array('control-panel.hotel.hotels.update', $hotelprofile->id), 'method'=> 'put')) }}
            <div class="row">

                @include('control-panel.hotel.hotels.partials.facilities')
                &nbsp;
                <br/>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                    {{ Form::submit('Update Hotel Facilities', array('class' => 'btn btn-primary' , 'name' => 'update_hotel_facilities' )) }}
                    </div>
                </div>
            </div>
            {{Form::close()}}

        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='policies'? 'active':'' }}}" id="tab_4">
            {{--Hotel Policies--}}
            @include('control-panel.hotel.hotels.partials.policies')

        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='termsAndConditions'? 'active':'' }}}" id="tab_5">
            {{ Form::model($hotelprofile, array('route' => array('control-panel.hotel.hotels.update', $hotelprofile->id), 'method'=> 'put')) }}
            @include('control-panel.hotel.hotels.partials.termsAndConditions')
            <div class="row">
            <div class="col-md-12">
                <div class="col-md4">
                {{ Form::submit('Update Terms & Conditions', array('class' => 'btn btn-primary' , 'name' => 'update_terms_and_conditions' )) }}
                </div>
            </div>
            </div>
            {{Form::close()}}

        </div><!-- /.tab-pane -->
        <div class="tab-pane {{{ Session::get('manage')=='images'? 'active':'' }}}" id="tab_6">
            {{--@include('control-panel.hotel.profile.termsAndConditions')--}}
            <div class="row">
            <div class="col-md-12">
            {{--{{ Form::model($hotelprofile, array('route' => array('control-panel.hotel.hotels.update', $hotelprofile->id), 'method'=> 'put')) }}--}}
                @include('control-panel.hotel.hotels.partials.photos')

            {{--{{Form::close()}}--}}
            </div>
            </div>
            <!-- /.tab-content -->
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

    $('#country_id').change(function(){
        var country_id = $(this).val();
        loadCities(country_id);
    });

    $('#country_id').trigger('change');

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
                var city_id = 0;
                $.each(data,function(i,item){
                    if(item.id==$('#city_id').attr('city_id')){
                        city_id = item.id;
                    }
                    cities += '<option value="'+item.id+'">'+item.city+'</option>';
                });

                $('select[name="city_id"]').html(cities);
                $('#city_id').val(city_id);



            }
        });
    }

</script>
@stop
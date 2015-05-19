@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'Hotel'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Add Hotel'}}
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
@section('active-hotel-create-hotel')
    {{ 'active' }}
@endsection

@section('content')

<section>

    {{ Form::open(array('route' => array('control-panel.hotel.hotels.store'))) }}
    <div class="col-md-12">

        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Create Hotel
                </h3>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <label for="name">Hotel Name</label>
                            {{ Form::text('name', null , array('class' => 'form-control'))}}
                        </div>
                        {{ $errors->first('name', '<div class="form-group text-red"><em>:message</em></div>') }}

                        <div class="form-group">
                            <label for="address">Address</label>
                            {{ Form::text('address', null , array('class' => 'form-control'))}}
                        </div>
                        {{ $errors->first('address', '<div class="form-group text-red"><em>:message</em></div>') }}

                        <div class="form-group">
                            <label for="star_category_id">Star Category</label>
                            {{ Form::select('star_category_id', StarCategory::lists('stars', 'id'), null, array('class' => 'form-control')) }}
                        </div>

                        {{ $errors->first('star_category_id', '<div class="form-group text-red">:message</div>') }}
                        <div class="form-group">
                            <label for="star_id">City</label>
                            {{ Form::select('city_id', City::lists('city', 'id'), null, array('class' => 'form-control')) }}

                        </div>
                        {{ $errors->first('city_id', '<div class="form-group text-red">:message</div>') }}


                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">

                            <div class="form-group">
                            {{ Form::label('Hotel Categories') }}

                            @foreach($hotelcategories as $HotelCategory)
                                <div class="checkbox">

                                <label for="">
                                    {{ Form::checkbox('category_id[]', $HotelCategory->id) }}
                                    {{ $HotelCategory->hotel_category }}

                                </label>
                                </div>
                            @endforeach
                            </div>
                            <p class="text-bold text-primary"><em>Check the categories to which the hotel belongs to...</em></p>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        {{ Form::submit('Create Hotel', array('class' => 'btn btn-primary btn-block'))}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{ Form::close() }}

</section>


@endsection
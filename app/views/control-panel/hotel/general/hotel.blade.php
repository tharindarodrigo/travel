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
@section('active-hotel-add-Hotel')
    {{ 'active' }}
@endsection

@section('content')

<section>

            <div class="col-md-12">
                <div class="box box-primary ">
                    <div class="box-header">
                        <h3 class="box-title">
                            Create Hotel
                        </h3>
                    </div>
                    @if(!Session::has('edit'))
                        {{ Form::open(array('route' => array('control-panel.hotel.star-categories.store'))) }}
                    @else
                        {{ Form::open(array('route' => array('control-panel.hotel.star-categories.update',$Starcategory->id), 'method' => 'put')) }}
                    @endif

                    <div class="box-body">

                        <div class="form-group">
                            <label for="star-category">Hotel Name</label>
                            {{ Form::text('stars', Session::get('edit')=='edit' ? $Starcategory->stars : '', array('class' => 'form-control')) }}
                        </div>
                        {{ $errors->first('stars', '<div class="form-group text-red">:message</div>') }}

                        <div class="form-group">
                            <label for="star_category">Star Category Name</label>
                            {{ Form::text('star_name', Session::get('edit')=='edit' ? $Starcategory->star_name : '', array('class' => 'form-control')) }}
                        </div>
                        {{ $errors->first('star_name', '<div class="form-group text-red">:message</div>') }}

                        @if(!Session::has('edit'))
                            <div class="form-group">
                                {{ Form::submit('Create Star Category', array('class' => 'btn btn-primary')) }}
                            </div>
                        @else
                            <div class="form-group">
                                {{ Form::submit('Update Star Category', array('class' => 'btn btn-primary')) }}
                                <a href="{{ URL::route('control-panel.hotel.star-categories.index') }}" class="btn btn-group btn-info">Cancel</a>
                            </div>
                        @endif
                    </div>

                    {{ Form::close() }}


                </div>
            </div>

</section>


@endsection
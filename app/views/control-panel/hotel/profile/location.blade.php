{{ Form::model($hotelprofile, array('route' => array('control-panel.hotel.hotels.store'))) }}

    <div class="form-group">
        <label for="location">Address</label>
        {{Form::text('address',null, array('class'=>'form-control'))}}

    </div>

    <div class="form-group">
        {{ Form::label('star_id','City')}}
        {{ Form::select('city_id', City::lists('city', 'id'), null, array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        <label for="">Longitude</label>
        {{Form::text('longitude',null, array('class'=>'form-control'))}}
    </div>

    <div class="form-group">
        {{Form::text('longitude',null, array('class'=>'form-control'))}}
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Update Location</button>
    </div>

{{Form::close()}}

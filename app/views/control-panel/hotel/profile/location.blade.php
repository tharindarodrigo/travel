{{ Form::model($hotelprofile, array('route' => array('control-panel.hotel.hotel-profile.update',$hotelprofile->id), 'method'=>'put')) }}
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="address">Address</label>
            {{Form::text('address',null, array('class'=>'form-control'))}}

        </div>

        <div class="form-group">
            {{ Form::label('city_id','City')}}
            {{ Form::select('city_id', City::lists('city', 'id'), null, array('class' => 'form-control')) }}
        </div>
        {{ $errors->first('city_id', '<div class="form-group text-red"><em>:message</em></div>') }}


        <div class="form-group">
            {{Form::label('longitude', 'Longitude')}}
            {{Form::text('longitude',null, array('class'=>'form-control'))}}
        </div>
        {{ $errors->first('longitude', '<div class="form-group text-red"><em>:message</em></div>') }}

        <div class="form-group">
            {{Form::label('latitude', 'Latitude')}}
            {{Form::text('latitude',null, array('class'=>'form-control'))}}
        </div>
        {{ $errors->first('latitude', '<div class="form-group text-red"><em>:message</em></div>') }}

        <div class="form-group">
            {{ Form::submit('Update Location', array('class' => 'btn btn-primary' , 'name' => 'update_location' )) }}
        </div>
    </div>
</div>



{{Form::close()}}

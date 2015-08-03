<div class="col-md-6">
    <div class="form-group">
        {{ Form::label('country_id','Country')}}
        {{ Form::select('country_id', Country::lists('country', 'id'), null, array('class' => 'form-control', 'id'=>'country_id')) }}
    </div>
    {{ $errors->first('city_id', '<div class="form-group text-red"><em>:message</em></div>') }}

    <div class="form-group">
        {{ Form::label('city_id','City')}}
        <select class="form-control" name="city_id" id="city_id" city_id="{{{!empty($hotelprofile->id) ? $hotelprofile->city_id: ''}}}"></select>
    </div>
    {{ $errors->first('city_id', '<div class="form-group text-red"><em>:message</em></div>') }}

    <div class="form-group">
        <label for="address">Address</label>
        {{Form::text('address',null, array('class'=>'form-control'))}}

    </div>
    {{ $errors->first('address', '<div class="form-group text-red"><em>:message</em></div>') }}


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

</div>



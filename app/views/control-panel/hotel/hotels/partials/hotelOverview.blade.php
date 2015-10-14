    <div class="col-md-6">

        <div class="form-group">
            {{ Form::label('name','Hotel Name')}}
            {{ Form::text('name', null, array('class' => 'form-control'))}}
        </div>
        {{ $errors->first('name', '<div class="form-group text-red"><em>:message</em></div>') }}

        <div class="form-group">
            {{ Form::label('star_category_id','Star Category')}}
            {{ Form::select('star_category_id', StarCategory::lists('stars', 'id'), null, array('class' => 'form-control')) }}
        </div>
        {{ $errors->first('star_category_id', '<div class="form-group text-red">:message</div>') }}

        <div class="form-group">
            {{ Form::label('Overview','overview')}}
            {{--{{ Form::textarea('overview', !empty($hotelprofile) ? $hotelprofile->overview : '', array('class' => 'form-control', 'id'=>'overview', 'rows'=>'4','placeholder'=>'Description about your hotel which will appear on the hotel profile','style'=>'visibility: hidden; display: none;'))}}--}}
            <textarea id="overview" name="overview" rows="10" cols="80" style="visibility: hidden; display: none;">
                {{!empty($hotelprofile) ? $hotelprofile->overview : ''}}
            </textarea>
            <script>
                CKEDITOR.replace( 'overview' );
            </script>

        </div>
        {{ $errors->first('overview', '<div class="form-group text-red">:message</div>') }}

        <div class="form-group">
            {{ Form::label('search_keywords','Search Keywords')}}
            {{ Form::textarea('search_keywords', null, array('class' => 'form-control', 'rows'=>'4', 'placeholder'=>'Keywords by which your hotel needs to be searched on Google'))}}
        </div>
        {{ $errors->first('search_keywords', '<div class="form-group text-red">:message</div>') }}

        <div class="form-group">
            {{ Form::label('search_description','Search Description')}}
            {{ Form::textarea('search_description', null, array('class' => 'form-control', 'rows'=>'4', 'placeholder'=>'Small Description about your hotel for Google search'))}}
        </div>
        {{ $errors->first('search_description', '<div class="form-group text-red">:message</div>') }}

    </div>
    <div class="col-md-6">
        <div class="col-md-12">

            <div class="form-group">
            {{ Form::label('Hotel Categories') }}

            @foreach($hotelcategorieslist as $HotelCategory)
                <div class="checkbox">
                    <label>
                        {{ Form::checkbox('category_id[]', $HotelCategory->id, in_array($HotelCategory->id, $checkedhotelcategories)) }}
                        {{ $HotelCategory->hotel_category }}
                    </label>
                </div>
            @endforeach
            </div>
            {{ $errors->first('category_id', '<div class="form-group text-red">:message</div>') }}

            <p class="text-bold text-primary"><em>Check the categories to which the hotel belongs to...</em></p>
        </div>
    </div>



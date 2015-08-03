<div class="col-md-12">
    <div class="form-group">

        {{ Form::file('images[]', array('multiple'=>true)) }}
        {{--<input type="file" name="images[]" multiple/>--}}
        {{Form::submit}}

    </div>

    <div class="form-group">
        @if(!empty($hotelImages))
            @foreach($hotelImages as $image)
                <div class="col-md-4">
                    <div class="checkbox">
                        {{ Form::checkbox('delete-images[]') }}
                        {{ HTML::image('control-panel-assets/images/hotel-images/'.$image, 'a picture', array('class' => 'thumb', 'width'=>200, 'height'=>150)) }}

                    </div>
                </div>
            @endforeach
        @endif
    </div>

</div>
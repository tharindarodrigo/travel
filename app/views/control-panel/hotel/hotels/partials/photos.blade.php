{{ Form::open(array('route' => array('control-panel.hotel.hotels.update', $hotelprofile->id), 'files' =>true, 'method'=> 'put')) }}
<div class="col-md-12">
    <div class="form-group">


        {{ Form::file('images[]', array('multiple'=>true)) }}

    </div>
    <div class="form-group">
            {{Form::submit('Add more Images', array('class'=>'btn btn-primary', 'name'=> 'add_more_images'))}}

    </div>
</div>
{{Form::close()}}

{{ Form::model($hotelprofile, array('route' => array('control-panel.hotel.hotels.update', $hotelprofile->id), 'method'=> 'put')) }}
<div class="col-md-12">
    <div class="form-group">
        @if(!empty($hotelImages))
            @foreach($hotelImages as $image)
                <div class="col-md-3">
                    <div class="checkbox">
                        {{ Form::checkbox('files_to_delete[]', $image) }}
                        {{ HTML::image('images/hotel_images/'.$image, 'a picture', array('class' => 'thumb', 'width'=>200, 'height'=>150)) }}
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-offset-5">
        {{Form::submit('Delete Selected Images', array('class'=>'btn btn-lg btn-danger', 'name'=>'delete_images'))}}

        </div>
    </div>
</div>
{{Form::close()}}
{{ Form::model($hotelprofile, array('route' => array('control-panel.hotel.hotels.store', $hotelprofile->id), 'method'=> 'put')) }}


        <div class="form-group ">

        @foreach(HotelFacility::get(array('hotel_facility', 'id')) as $HotelFacility)
            <div class="col-md-2">
            <label for="">
                {{ Form::checkbox('hotel_facility_id[]', $HotelFacility->id, in_array($HotelFacility->id,$checkedhotelfacilities)) }}
                {{ $HotelFacility->hotel_facility }}
            </label>
            </div>
        @endforeach
            <div class="col-lg-12">
                <div class="form-group">
                    &nbsp;
                </div>
            </div>
        <div class="form-group">

            <button type="submit" class="btn btn-primary">Update Hotel Facilities</button>

        </div>
        </div>

{{Form::close()}}
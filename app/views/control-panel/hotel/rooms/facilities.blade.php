{{ Form::open(array('route' => array('control-panel.hotel.hotel-profile.update', $hotelprofile->id), 'method'=> 'put')) }}


        <div class="form-group ">

        @foreach($hotelfacilitieslist as $HotelFacility)

            <label for="">
                {{ Form::checkbox('hotel_facility_id[]', $HotelFacility->id, in_array($HotelFacility->id,$checkedhotelfacilities)) }}
                {{ $HotelFacility->hotel_facility }}
            </label>
        @endforeach
            <div class="col-lg-12">
                <div class="form-group">
                    &nbsp;
                </div>
            </div>
        <div class="form-group">

            <button type="submit" class="btn btn-primary" >Update Hotel Facilities</button>

        </div>
        </div>

{{Form::close()}}
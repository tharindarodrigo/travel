@foreach($hotelfacilitieslist as $HotelFacility)
    <div class="form-group ">
        <div class="checkbox">
            <div class="col-md-4">

                <label for="">
                    {{ Form::checkbox('hotel_facility_id[]', $HotelFacility->id, in_array($HotelFacility->id,$checkedhotelfacilities)) }}
                    {{ HTML::image('control-panel-assets/images/hotel-facilities/'.$HotelFacility->id.'.png','icon') }}
                    {{ $HotelFacility->hotel_facility }}
                </label>
            </div>
        </div>
    </div>
@endforeach



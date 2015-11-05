<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>From</th>
                <th>Vehicle</th>
                <th>Locations</th>
                <th>Amount</th>
                <th>Manage</th>
            </tr>
            </thead>
            <tbody>
            @if($booking->customTrip->count())
                @foreach($booking->customTrip as $trip)
                    <tr>
                        <td>{{$trip->id}}</td>
                        <td>{{$trip->from}}</td>
                        <td>{{$trip->vehicle->vehicle_type}}</td>
                        <td>{{str_replace(',', '<br>', $trip->locations)}}</td>
                        <td>{{number_format($trip->amount, 2)}}</td>
                        <td>
                            {{--{{Form::open(array('route'=>array('bookings.clients.destroy',$booking->id,$client->id),'method'=>'delete'))}}--}}
                            {{--<button type="button" class="btn btn-danger btn-sm delete-button" value="{{$client->id.'_client'}}">--}}
                            {{--<span class="glyphicon glyphicon-trash"></span></button>--}}
                            {{--<button type="button" class="btn btn-primary btn-sm edit_client" data-toggle="modal"--}}
                            {{--data-target="#clientModal_{{$client->id}}" value="{{$client->id.'_client'}}"><span--}}
                            {{--class="glyphicon glyphicon-edit"></span></button>--}}
                            {{--{{Form::close()}}--}}
                        </td>


                    </tr>
                @endforeach
            @endif

            @if($booking->predefinedTrip->count())
                @foreach($booking->predefinedTrip as $trip)
                    <tr>
                        <td>{{$trip->id}}</td>
                        <td>{{$trip->pick_up_date_time}}</td>
                        <td>{{$trip->transportPackage->vehicle->vehicle_type}}</td>
                        {{--                <td>{{$trip->vehicle->vehicle_type}}</td>--}}
                        <td>{{$trip->transportPackage->destinationCity->city}}</td>
                        <td>{{number_format($trip->transportPackage->rate * $trip->transportPackage->millage, 2)}}</td>
                        <td>
                            {{--{{Form::open(array('route'=>array('bookings.clients.destroy',$booking->id,$client->id),'method'=>'delete'))}}--}}
                            {{--<button type="button" class="btn btn-danger btn-sm delete-button" value="{{$client->id.'_client'}}">--}}
                            {{--<span class="glyphicon glyphicon-trash"></span></button>--}}
                            {{--<button type="button" class="btn btn-primary btn-sm edit_client" data-toggle="modal"--}}
                            {{--data-target="#clientModal_{{$client->id}}" value="{{$client->id.'_client'}}"><span--}}
                            {{--class="glyphicon glyphicon-edit"></span></button>--}}
                            {{--{{Form::close()}}--}}
                        </td>


                    </tr>
                @endforeach
            @endif


            <tr class="warning">
                {{Form::open(array('route'=>array('bookings.clients.store',$booking->id)))}}
                <td>&nbsp;</td>
                <td>
                    {{Form::text('name',null, array('class'=>'form-control', 'placeholder'=> 'Name'))}}
                    {{$errors->first('name', '<span class="size12" style="color: red;">:message</span>') }}
                </td>
                <td>
                    {{Form::text('passport_number',null, array('class'=>'form-control', 'placeholder'=> 'Passport No.'))}}
                    {{$errors->first('passport_number', '<span class="size12" style="color: red;">:message</span>') }}
                </td>
                <td>
                    {{Form::text('dob',null,array('class'=>'form-control date-control', 'placeholder'=> 'Date of Birth'))}}
                    {{$errors->first('dob', '<span class="size12" style="color: red;">:message</span>') }}
                </td>
                <td>
                    {{Form::select('gender',array(''=>'gender', 1=>'male',0=>'female'),null,array('class'=>'form-control'))}}
                    {{$errors->first('gender', '<span class="size12" style="color: red;">:message</span>') }}
                </td>
                <td>{{Form::submit('add Client', array('class'=>'btn btn-primary'))}}</td>
                {{Form::close()}}
            </tr>

            </tbody>
        </table>

    </div>
</div>

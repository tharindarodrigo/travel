<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th>Id</th>
                <th>Ref. No.</th>
                <th>Excursion</th>
                <th>Date</th>
                <th>Transport Type</th>
                <th>Pax</th>
                <th>Unit Price</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            @foreach($booking->excursionBooking as $excursionBooking)
                <tr>
                    <td>{{$excursionBooking->id}}</td>
                    <td>{{$excursionBooking->reference_number}}</td>
                    <td>{{$excursionBooking->excursion->excursion}}</td>
                    <td>{{$excursionBooking->date}}</td>
                    <td>{{$excursionBooking->excursionTransportType->transport_type}}</td>
                    <td>{{$excursionBooking->pax}}</td>
                    <td style="text-align: right"><?php echo number_format($excursionBooking->unit_price, 2) ?></td>
                    <td style="text-align: right"><?php echo number_format(ExcursionBooking::getTotalExcursionBookingAmount($booking),2) ?></td>
                    <td>
                        @if($excursionBooking->val == 0)
                            <div class="">
                                {{ Form::open(array('route'=> array('bookings.excursion-bookings.update',$booking->id,$excursionBooking->id), 'method' =>'patch')) }}
                                <button class="btn btn-xs btn-flat btn-success activate-item col-md-3"
                                        type="submit" name="val" value="1"><i class="glyphicon glyphicon-ok-circle"></i></button>
                                <button class="btn btn-xs btn-flat btn-default disabled deactivate-item col-md-3"
                                        type="button"><i class="glyphicon glyphicon-remove-circle"></i></button>
                                {{ Form::close() }}
                            </div>
                        @else
                            {{ Form::open(array('route'=> array('bookings.excursion-bookings.update',$booking->id,$excursionBooking->id), 'method' =>'patch')) }}
                            <button class="btn btn-xs btn-flat btn-default disabled activate-item col-md-3"
                                    type="button"><i class="glyphicon glyphicon-ok-circle"></i></button>
                            <button class="btn btn-xs btn-flat btn-warning deactivate-item col-md-3"
                                    type="submit" name="val" value="0"><i class="glyphicon glyphicon-remove-circle"></i></button>
                            {{ Form::close() }}
                        @endif
                    </td>

                </tr>
            @endforeach
            {{--<tr class="warning">--}}
                {{--{{Form::open(array('route'=>array('bookings.clients.store',$booking->id)))}}--}}
                {{--<td>&nbsp;</td>--}}
                {{--<td>--}}
                    {{--{{Form::text('name',null, array('class'=>'form-control', 'placeholder'=> 'Name'))}}--}}
                    {{--{{$errors->first('name', '<span class="size12" style="color: red;">:message</span>') }}--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--{{Form::text('passport_number',null, array('class'=>'form-control', 'placeholder'=> 'Passport No.'))}}--}}
                    {{--{{$errors->first('passport_number', '<span class="size12" style="color: red;">:message</span>') }}--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--{{Form::text('dob',null,array('class'=>'form-control date-control', 'placeholder'=> 'Date of Birth'))}}--}}
                    {{--{{$errors->first('dob', '<span class="size12" style="color: red;">:message</span>') }}--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--{{Form::select('gender',array(''=>'gender', 1=>'male',0=>'female'),null,array('class'=>'form-control'))}}--}}
                    {{--{{$errors->first('gender', '<span class="size12" style="color: red;">:message</span>') }}--}}
                {{--</td>--}}
                {{--<td>{{Form::submit('add Client', array('class'=>'btn btn-primary'))}}</td>--}}
                {{--{{Form::close()}}--}}
            {{--</tr>--}}

            </tbody>
        </table>

    </div>
</div>


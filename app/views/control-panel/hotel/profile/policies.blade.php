<div class="row">
<div class="col-md-12">
<h4>Cancelation Policy</h4>
    <div class="col-md-4">
        @if(!Session::has('edit'))
            {{ Form::open(array('route' => array('control-panel.hotel.hotels.cancellation-policies.store',$hotelprofile->id), 'files' => true)) }}
            {{Form::hidden('hotel_id', $hotelprofile->id)}}
        @else
            {{ Form::model($cancellationpolicy, array('route' => array('control-panel.hotel.cancellation-policies.update',$cancellationpolicy->id), 'method' => 'put')) }}
        @endif
        <div class="form-group">
            {{Form::label('from', 'From')}}
            {{Form::text('from', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('to', 'To')}}
            {{Form::text('to', null, array('class'=>'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('percentage_charged', 'Percentage Charged')}}
            {{Form::text('percentage_charged', null, array('class'=>'form-control'))}}
        </div>

        <div class="form-group">

        @if(!Session::has('edit'))                {{--<button type="submit" class="btn btn-primary">control-panel.hotel.general.hotelCategories</button>--}}
                {{ Form::submit('Add Cancellation Policy', array('class' => 'btn btn-primary')) }}
        @else
                {{ Form::submit('Update Cancellation Policy', array('class' => 'btn btn-primary')) }}
                <a href="{{ URL::route('control-panel.hotel.cancellation-policies.index') }}" class="btn btn-group btn-info">Cancel</a>
        @endif
        </div>
        {{Form::close()}}
    </div>
    <div class="col-md-8">
        <div class="box-body table-responsive">
            <table id="hotel-policies-table" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>From</th>
                        <th>To</th>
                        <th>% Charged</th>
                        <th style="width:60px;">Status</th>
                        <th style="width:120px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotelpolicies as $hotelpolicy)
                        <tr>
                            <td>{{ $hotelpolicy->id }}</td>
                            <td>{{ $hotelpolicy->from}}</td>
                            <td>{{ $hotelpolicy->to}}</td>
                            <td>{{ $hotelpolicy->percentage_charged}}</td>
                            <td style="text-align: center;">{{ $hotelpolicy->val == 0 ? 'Inactive' : 'Active' }}</td>

                            <td>
                            <div class="">
                                {{ Form::open(array('route'=> array('control-panel.hotel.hotel-profile.edit',$hotelprofile->id), 'method' =>'get' )) }}
                                {{ Form::hidden('id', $hotelpolicy->id)}}
                                <button type="submit" class="btn btn-xs btn-flat btn-primary col-md-3"><i
                                            class="glyphicon glyphicon-edit"></i></button>
                                            {{--{{Form::}}--}}
                                {{ Form::close() }}

                                {{ Form::open(array('route'=> array('control-panel.hotel.cancellation-policies.destroy',$hotelprofile->id), 'method' =>'delete')) }}
                                <a type="" class="btn btn-xs btn-flat btn-danger delete-button col-md-3"><i class="glyphicon glyphicon-trash"></i></a>
                                {{ Form::close() }}

                            </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

<div class="col-md-12">
<hr/>
</div>
<div class="col-md-12">


{{ Form::model($hotelprofile,array('route' => array('control-panel.hotel.hotel-profile.update', $hotelprofile->id), 'method'=> 'put')) }}
<h4>Child Policy</h4>

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Max. Age</th>
            <th>% Charged</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Infant</th>
            <td>
                {{Form::text('infant_age',null, array('class'=>'form-control'))}}

            </td>
            <td>{{Form::text('infant_charge',null, array('class'=>'form-control'))}}</td>
        </tr>
        <tr>
            <th>Child</th>
            <td>{{Form::text('child_age',null, array('class'=>'form-control'))}}</td>
            <td>{{Form::text('child_charge',null, array('class'=>'form-control'))}}</td>
        </tr>
    </tbody>
</table>
    <div class="form-group">
        {{Form::submit('Update Child Policy', array('class'=>'btn btn-primary', 'name'=>'update_policies'))}}
    </div>
{{Form::close()}}

</div>
</div>

@section('scripts')

    <script type="text/javascript">
        $(function() {
            $("#hotel-policies-table").dataTable();

            confirmDeleteItem();
        });




    </script>

@endsection
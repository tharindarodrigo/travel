@extends('bookings.bookings')

@section('styles')
    {{--<style type="text/css">--}}
    {{--th {--}}
    {{--text-align: center;--}}
    {{--}--}}
    {{--</style>--}}
@endsection

@section('bread-crumbs')
    <li>/</li>
    <li><a href="#" class="active">Bookings</a></li>
@endsection

@section('body-content')

    <div class="container">

        <div class="container mt25 offset-0">


            <div class="col-md-12 pagecontainer2 offset-0">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="active">
                        <a href="#bookings" aria-controls="bookings" role="tab" data-toggle="tab">Bookings</a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#payments" aria-controls="payments" role="tab" data-toggle="tab">Payments</a>
                    </li>
                </ul>

                <div class="tab-content4">
                    <div role="tabpanel" class="tab-pane active" id="bookings">
                        <div class="col-md-12">

                            <form action="" method="get">
                                <div class="col-md-4"></div>
                                <div class="col-md-3">
                                    <div class="form-group" align="center">
                                        {{Form::text('reference_number',Input::old('reference_number'),array('class'=> 'form-control'))}}
                                    </div>
                                </div>
                                <div class="col-md-3">

                                    {{Form::submit('Search', array('class'=> 'btn btn-primary'))}}
                                </div>

                            </form>

                        </div>
                        @if(!empty($bookings))
                            <div class="hpadding50c">

                                <table class="table table-bordered table-striped" id="agent-bookings">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Ref. No</th>
                                        <th>Arrival</th>
                                        <th>Departure</th>
                                        <th>Name</th>
                                        <th>Adults</th>
                                        <th>Children</th>
                                        <th>Status</th>
                                        <th width="160px">Controls</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td>{{$booking->id}}</td>
                                            <td style="text-align: center">{{$booking->reference_number}}</td>
                                            <td style="text-align: center">{{$booking->arrival_date}}</td>
                                            <td style="text-align: center">{{date('Y-m-d', strtotime($booking->departure_date))}}</td>
                                            <td style="text-align: right">{{$booking->booking_name}}</td>
                                            <td style="text-align: right">{{$booking->adults}}</td>
                                            <td style="text-align: right">{{$booking->children}}</td>
                                            <td>{{$booking->val ==0 ? 'Inactive': 'active' }}</td>
                                            <td>
                                                <div class="">
                                                    {{ Form::open(array('route'=> array('bookings.show',$booking->id), 'method' =>'get')) }}
                                                    <button type="submit"
                                                            class="btn btn-xs btn-flat btn-primary col-md-2"
                                                            style="float: left"><i
                                                                class="glyphicon glyphicon-edit"></i></button>
                                                    {{ Form::close() }}

                                                    {{ Form::open(array('route'=> array('bookings.destroy',$booking->id), 'method' =>'delete', 'style'=>'float-left')) }}
                                                    <button type="button"
                                                            class="btn btn-xs btn-flat btn-danger delete-button col-md-2"
                                                            style="float: left"><i
                                                                class="glyphicon glyphicon-trash"></i>
                                                    </button>
                                                    {{ Form::close() }}

                                                    {{--{{ Form::open(array('route'=> array('bookings.show',$booking->id), 'method' =>'get')) }}--}}
                                                    {{--<button type="submit" class="btn btn-xs btn-flat  col-md-2"--}}
                                                    {{--style="float: left;"><i--}}
                                                    {{--class="glyphicon glyphicon-inverse glyphicon-eye-open"></i>--}}
                                                    {{--</button>--}}
                                                    {{--{{ Form::close() }}--}}
                                                    @if($booking->val == 0)

                                                        {{ Form::open(array('route'=> array('bookings.update',$booking->id), 'method' =>'patch')) }}
                                                        <button class="btn btn-xs btn-flat btn-success activate-item col-md-2"
                                                                type="submit" name="val" value="1"><i
                                                                    class="glyphicon glyphicon-ok-circle"></i></button>
                                                        <button style="float: left"
                                                                class="btn btn-xs btn-flat btn-default float-left disabled deactivate-item col-md-2"
                                                                type="button"><i
                                                                    class="glyphicon glyphicon-remove-circle"></i>
                                                        </button>
                                                        {{ Form::close() }}


                                                    @else
                                                        {{ Form::open(array('route'=> array('bookings.update',$booking->id), 'method' =>'patch')) }}
                                                        <button class="btn btn-xs btn-flat btn-default disabled activate-item col-md-2"
                                                                type="button"><i
                                                                    class="glyphicon glyphicon-ok-circle"></i>
                                                        </button>
                                                        <button style="float: left"
                                                                class="btn btn-xs btn-flat btn-warning deactivate-item col-md-2"
                                                                type="submit" name="val" value="0"><i
                                                                    class="glyphicon glyphicon-remove-circle"></i>
                                                        </button>
                                                        {{ Form::close() }}

                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="line3"></div>
                                <br/>

                            </div>
                        @else
                            <h2>No Bookings Available</h2>
                        @endif

                    </div>

                    <div role="tabpanel" class="tab-pane" id="payments">
                        <div class="col-md-12">
                            <form action="" class="form-horizontal">

                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="from_d" class="form-control" placeholder="from"
                                                   value="{{Input::get('from_d')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="to_d" class="form-control" placeholder="to"
                                                   value="{{Input::get('to_d')}}">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        {{Form::submit('Get payments', array('name'=>'get_payments', 'class'=>'btn btn-primary'))}}
                                    </div>
                                </div>


                            </form>
                        </div>
                        <div class="hpadding50c">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Date</th>
                                    <th>Detail</th>
                                    <th>Credit</th>
                                    <th>Debit</th>
                                    <th>Credit Balance</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(!empty($merged_data))
                                    @for($x= 1; $x< count($merged_data); $x++)
                                        <tr>
                                            <td>{{$x}}</td>
                                            <td>{{$merged_data[$x]['date']}}</td>
                                            <td>{{$merged_data[$x]['details']}}</td>
                                            <td>{{$merged_data[$x]['amount'] or '-'}}</td>
                                            <td>{{$merged_data[$x]['debit'] or '-'}}</td>

                                            <td>
{{--                                                {{ Agent::getCreditLimit(Auth::id()) - ($c = !empty($merged_data[$x]['amount']) ? $merged_data[$x]['amount'] : 0)}}--}}
                                            </td>
                                        </tr>

                                    @endfor
                                @endif

                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--@endif--}}
                </div>
            </div>

            @if(Session::has('sent_emails'))
                <div class="callout callout-success">{{Session::pull('sent_emails')}}</div>
            @endif


        </div>

    </div>

    </div>

    <div class="clearfix"></div>
    <br/><br/>
    <!-- END CONTENT -->




@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#agent-bookings').dataTable();
        });
    </script>
@stop







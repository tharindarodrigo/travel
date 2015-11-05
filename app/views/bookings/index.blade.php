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
            <!-- CONTENT -->
    <div class="container">


        <div class="container mt25 offset-0">

            <!-- CONTENT -->
            <div class="col-md-12 pagecontainer2 offset-0">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li role="presentation" class="{{!Session::has('bookings_show_tabs')? 'active': '' }}">
                        <a href="#bookings" aria-controls="bookings" role="tab"
                           data-toggle="tab">Bookings</a>
                    </li>
                    <li role="presentation" class="">
                        <a href="#payments" aria-controls="payments" role="tab" data-toggle="tab">Payments</a>
                    </li>
                </ul>

                <div class="tab-content4">
                    <div role="tabpanel" class="tab-pane "
                         id="bookings">
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
                                            <td style="text-align: center">{{$booking->departure_date}}</td>
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

                    <div role="tabpanel" class="tab-pane"
                         id="payments">
                        @if(!empty($bookings))
                            <div class="hpadding50c">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Booking</th>
                                        <th>Name</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                        <th>Balance</th>
                                    </tr>
                                    </thead>
                                    <tbody><?php
                                    $x = 1;
                                    $y = 0;
                                    ?>
                                    @foreach($bookings as $booking)

                                        <tr>
                                            @if($x==1)
                                                <td>11</td>
                                                <td>TRS 1212111</td>
                                                <td>Bank transaction</td>
                                                <td>-</td>

                                                <td>100000.00</td>
                                                <td>100000.00</td>



                                            @else
                                                <td>{{$booking->id}}</td>
                                                <td>{{$booking->reference_number}}</td>
                                                <td>{{$booking->booking_name}}</td>
                                                <td>{{number_format(Booking::getTotalBookingAmount($booking),2)}}</td>
                                                <?php $y = $y + Booking::getTotalBookingAmount($booking);?>
                                                <td>-</td>

                                                <td><?php echo number_format(100000.0 -$y,2)?></td>
                                            @endif
                                        </tr>
                                        <?php $x++; ?>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>


                @if(Session::has('sent_emails'))
                    <div class="callout callout-success">{{Session::pull('sent_emails')}}</div>
                @endif

                {{--<br>--}}
                {{--<br>--}}


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







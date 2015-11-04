@extends('control-panel.layout.main')

@section('head-scripts')
    {{ HTML::style('control-panel-assets/plugins/datepicker/datepicker3.css') }}
@endsection

{{--Title--}}
@section('control-title')
    {{'Users'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'All users'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Users</li>
    <li class="active">All Users</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-users')
    {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-users-all')
    {{ 'active' }}
@endsection


@section('content')
    <section>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Assign Hotels for : <b>{{$hotelier->first_name.' '.$hotelier->last_name}}</b></h3>
                </div>
                <div class="box-body">
                    {{--{{$hotelier->first_name.' '. $hotelier->last_name}}--}}

                    {{Form::open(array('url' => array('control-panel/users/hoteliers/'.$hotelier->id.'/assign-permissions'), 'method'=>'post'))}}
                    <div class="box-body table-responsive">
                            <table id="hotel_permissions" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>{{Form::checkbox('select_all_hotels',null,null,array('id' => 'all_hotels'))}}</th>
                                    <th>ID</th>
                                    <th>Hotel</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($hotels as $hotel)
                                    <tr>
                                        <td>{{Form::checkbox('hotel_ids[]', $hotel->id, in_array($hotel->id, $permitted_hotels) ,array('class' => 'select_hotel'))}}</td>
                                        <td>{{ $hotel->id }}</td>
                                        <td>{{ $hotel->name }}</td>
                                    </tr>
                                @endforeach

                                </tbody>

                            </table>
                            {{Form::submit('Submit Hotel Permissions', array('class'=> 'btn btn-primary'))}}
                        </div>
                    {{Form::close()}}
                            <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $('#hotel_permissions').dataTable({
                paginate: false
            });

            $('#all_hotels').change(function(){
                if($('#all_hotels:checked').length>0){
                    $('.select_hotel').prop('checked',true);
                } else {
                    $('.select_hotel').prop('checked',false);
                }
            });
        });

    </script>

@endsection
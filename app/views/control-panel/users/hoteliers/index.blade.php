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
                    <h3 class="box-title"><b>Search / Update / Delete</b> Users</h3>
                </div>
                <div class="box-body">
                    @if(Session::has('successful-action'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                            {{ Session::get('successful-action') }}
                        </div>
                    @endif
                    @if(Session::has('unsuccessful-action'))
                        <div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                            {{ Session::get('unsuccessful-action') }}
                        </div>
                        @endif

                                <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="hotel-categories-table" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>User Type</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($hoteliers as $hotelier)
                                    <tr>
                                        <td>{{ $hotelier->user_id }}</td>
                                        <td>{{ $hotelier->first_name.' '.$hotelier->last_name }}</td>
                                        <td>{{ $hotelier->email }}</td>

                                        <td>
                                            <div class="form-group">
                                                <a href="{{URL::to('control-panel/users/hoteliers/'.$hotelier->user_id.'/permissions' )}}" class="btn btn-success">Assign Hotels</a>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@endsection

@section('scripts')



@endsection
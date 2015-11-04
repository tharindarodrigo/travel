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
                    <h3 class="box-title"><b>Assign user Roles</b></h3>
                </div>
                <div class="box-body">
                    <div class="call-out callout-success">
                        {{Session::get('global')}}
                    </div>

                    <div class="box-body table-responsive">
                        <table id="user_roles_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>User Type</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->first_name.' '.$user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="col-md-12">
                                            @if($user->active ==1)
                                                {{link_to_action('AccountController@deactivateUser','Deactivate',array($user->id),array('class'=>'btn btn-block btn-warning' ))}}
                                            @else
                                                <div class="btn-group btn-block" role="group">
                                                    <button type="button" class="btn btn-block btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Activation
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                    {{link_to_action('AccountController@activateUser','Activate',array($user->id),array('class'=>'btn btn-block btn-success'))}}
                                                    {{link_to_action('AccountController@sendActivationCode','Send Activation Email',array($user->id),array('class'=>'btn btn-block btn-primary'))}}
                                                    </ul>
                                                </div>

                                            @endif
                                        </div>
                                    </td>

                                    <td>
                                        {{Form::model($user->role->first(),array('route'=>array('control-panel.users.update',$user->id)))}}
                                        {{Form::select('id',$roles,null,array('class'=>'form-control role', 'user_id'=>$user->id))}}
                                        {{Form::close()}}
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

    <script type="text/javascript">
        $(document).ready(function () {


            var c = $('.role').change(function () {
                var formData = new FormData();
                formData.append('role_id', $(this).val());
                var url = 'http://' + window.location.host + '/control-panel/users/change-role/' + $(this).attr('user_id');
                $.ajax({
                    url: url,
                    method: 'post',
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: 'json',
                    data: formData,
                    success: function (data) {
                        if (data.success) {
                            alert(data.msg);
                        }
                    }
                });

            });

            $('#user_roles_table').dataTable();
        });
    </script>

@endsection
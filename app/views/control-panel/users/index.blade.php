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

                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->user_id }}</td>
                                <td>{{ $user->first_name.' '.$user->last_name }}</td>
                                <td>{{ $user->email }}</td>

                                <td>
                                {{Form::model($user,array('route'=>array('control-panel.users.update',$user->user_id)))}}
                                    {{Form::select('role_id',Role::orderBy('id','asc')->lists('name','id'),null,array('class'=>'form-control role', 'user_id'=>$user->user_id))}}
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
    $(document).ready(function(){

        $('.role').change(function(){
            var formData = new FormData();
            formData.append('role_id', $(this).val());
            var url = 'http://'+window.location.host+'/control-panel/users/change-role/'+$(this).attr('user_id');
            $.ajax({
                url: url,
                method: 'post',
                processData: false,
                contentType: false,
                cache: false,
                dataType: 'json',
                data: formData,
                success: function(data){
                    if(data.success){
                        alert(data.msg);
                    }
                }
            });

        });

    });
</script>

@endsection
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
    {{'Agents'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Users</li>
    <li class="active">Agents</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-agents')
    {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-agents-all')
    {{ 'active' }}
@endsection


@section('content')
    <section>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><b>Search / Update / Delete</b> Agents</h3>
                </div>
                <div class="box-body">


                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="hotel-categories-table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Market</th>
                                <th>Company</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($agents as $agent)

                                <tr>
                                    <td>{{ $agent->id }}</td>
                                    <td>{{ $agent->user->first_name.' '.$agent->user->last_name }}</td>
                                    <td>{{ $agent->user->email }}</td>

                                    {{Form::model($agent, array('url'=>'control-panel/users/agents/'.$agent->id.'/update', 'method'=>'post'))}}
                                    <td>
                                        {{Form::select('market_id', Market::lists('market', 'id'),null, array('class' => 'form-control'))}}
                                    </td>
                                    <td>
                                        {{Form::select('id',array('0'=>'Not Assigned')+Agent::lists('company', 'id'), null, array('class'=> 'form-control'))}}
                                    </td>
                                    <td>
                                        @if($agent->users->first())
                                            {{Form::submit('Revoke', array('class'=>'btn btn-block btn-danger', 'name'=> 'revoke'))}}
                                        @else
                                            {{Form::submit('Confirm', array('class'=>'btn btn-block btn-success', 'name'=>'confirm'))}}
                                        @endif
                                    </td>
                                    {{Form::close()}}
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

            $('.role').change(function () {
                var formData = new FormData();
                formData.append('role_id', $(this).val());
                var url = 'http://' + window.location.host + '/control-panel/agents/change-market/' + $(this).attr('agent_id');
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

        });
    </script>

@endsection
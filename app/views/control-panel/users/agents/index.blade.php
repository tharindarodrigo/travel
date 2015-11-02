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
    <li class="active">Users </li>
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
                                <th>agent Type</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($agents as $agent)
                                <tr>
                                    <td>{{ $agent->id }}</td>
                                    <td>{{ $agent->first_name.' '.$agent->last_name }}</td>
                                    <td>{{ $agent->email }}</td>

                                    <td>
                                        {{--@foreach($agent->agent as $a)--}}
{{--                                            {{dd($agent->agent)}}--}}
                                        {{--@endforeach--}}
                                        {{Form::select('agent',array('0'=>'Not Assigned')+Agent::lists('company', 'id'), User::getAgentOfUser($agent->id) or 0, array('class'=> 'form-control'))}}
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
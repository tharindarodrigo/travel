@extends('control-panel.layout.main')

@section('head-scripts')
    {{ HTML::style('control-panel-assets/plugins/datepicker/datepicker3.css') }}
@endsection

{{--Title--}}
@section('control-title')
    {{'agents'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'All agents'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">agents</li>
    <li class="active">All agents</li>
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
                    <h3 class="box-title"><b>Search / Update / Delete</b> agents</h3>
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
                            <th>agent Type</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($agents as $agent)
                            <tr>
                                <td>{{ $agent->user_id }}</td>
                                <td>{{ $agent->first_name.' '.$agent->last_name }}</td>
                                <td>{{ $agent->email }}</td>

                                <td>
                                {{Form::model($agent,array('route'=>array('control-panel.agents.update',$agent->user_id)))}}
                                    {{Form::select('market_id',Role::orderBy('id','asc')->lists('name','id'),null,array('class'=>'form-control role', 'user_id'=>$agent->agent_id))}}
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
            var url = 'http://'+window.location.host+'/control-panel/agents/change-market/'+$(this).attr('agent_id');
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
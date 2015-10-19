@extends('control-panel.agents.agents')

@section('bread-crumbs')
    <li class="active">Agent</li>
    <li class="active">{{$agent->company}}</li>
    <li class="active">Edit</li>
@endsection

@section('agent-content')
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Update </b>Agents</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                {{Form::model($agent, array('route'=>array('control-panel.agents.update', $agent->id), 'method'=>'patch'))}}
                    @include('control-panel.agents._partials.form')
                    {{Form::submit('Update Agent',array('class'=>'btn btn-primary'))}}
                {{Form::close()}}
            </div>

        </div>
    </div>

@endsection


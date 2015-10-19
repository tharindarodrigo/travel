@extends('control-panel.agents.agents')

@section('bread-crumbs')
    <li class="active">Agents</li>
    <li class="active">Create</li>
@endsection

@section('agent-content')
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Create </b>Agents</h3>
            </div>
            <div class="box-body">
                {{Form::open(array('route'=>array('control-panel.agents.store'), 'method'=>'post'))}}
                    @include('control-panel.agents._partials.form')
                    {{Form::submit('Create Agent',array('class'=>'btn btn-primary'))}}
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function(){
            confirmDeleteItem();
        });
    </script>
@endsection
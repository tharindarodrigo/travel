@extends('control-panel.agents.agents')

@section('agent-content')

<section>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Search / Update / Delete</b> Agents List</h3>
                {{link_to_route('control-panel.agents.create', 'Create New Agent', null, array('class' =>'btn btn-primary pull-right'))}}
            </div><!-- /.box-header -->
            <div class="box-body table-responsive">
                @if(Session::has('error-msg'))
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fa fa-warning"></i> Alert!</h5>
                        {{Session::pull('error-msg')}}
                     </div>
                @endif
                <table id="hotel-list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Agent</th>
                            <th>Users</th>
                            <th></th>
                            <th>Status</th>
                            <th>Controls</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agents as $agent)
                            <tr>
                                <td>{{$agent->id}}</td>
                                <td>{{$agent->name}}</td>
                                <td>{{$agent->user_id}}</td>
                                <td>{{$agent->user_id}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@section('agent-script')

@endsection
@extends('control-panel.agents.agents')

@section('bread-crumbs')
    <li class="active">agents</li>
@endsection

@section('agent-content')
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Search / Update / Delete </b>Agents</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body table-responsive">
                @if(Session::has('error-msg'))
                    <div class="alert alert-warning alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fa fa-warning"></i> Alert!</h5>
                        {{Session::pull('error-msg')}}
                    </div>
                @endif

                <table class="table table-bordered table-striped" id="rooms-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Company</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Tax</th>
                        <th>H. Fee</th>
                        <th>Controls</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($agents as $agent)
                        <tr>
                            <td>{{$agent->id}}</td>
                            <td>{{$agent->company}}</td>
                            <td>{{$agent->address}}</td>
                            <td align="center">{{$agent->email}}</td>
                            <td align="center">{{$agent->phone}}</td>
                            <td align="right">{{$agent->tax}}{{$agent->tax_type==1 ? '%': '$'}}</td>
                            <td align="right">{{$agent->handling_fee}}{{$agent->handling_fee_type==1 ? '%': '$'}}</td>
                            <td width="150px;">
                                <div class="">
                                    {{ Form::open(array('route'=> array('control-panel.agents.destroy',$agent->id), 'method' =>'delete')) }}
                                    {{ link_to_route('control-panel.agents.edit','',$agent->id, array('class'=>'btn btn-sm btn-primary glyphicon glyphicon-edit')) }}
                                    <button type="button" class="btn btn-sm btn-danger delete-button col-md-3"><i
                                                class="glyphicon glyphicon-trash"></i></button>
                                    {{ Form::close() }}
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            confirmDeleteItem();
        });
    </script>
@endsection
@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'General'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Cities'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">General</li>
    <li class="active">Cities</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-general')
 {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-general-cities')
 {{ 'active' }}
@endsection


@section('content')

<section>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                         Create Hotel Facility
                    </h3>
                </div>

                <form action="" role="form">

                    <div class="box-body">

                        <div class="form-group">
                            <label for="facilities">Cities</label>
                            <input id="facilities" class="form-control" type="text"/>
                        </div>

                        <div class="form-group">
                            <button type="button" class="btn btn-primary">Create Hotel Facility</button>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-group btn-primary">Update Hotel Facility</button>
                            <button type="button" class="btn btn-group btn-info">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><b>Search / Update / Delete</b> Cities</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="qweasd" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th></th>

                            </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section>

@endsection

@section('scripts')

                <script type="text/javascript">
                    $(function() {
                        $("#qweasd").dataTable();

                    });
                </script>

@endsection
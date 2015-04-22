@extends('control-panel.layout.main')


@section('control-title')
    {{'Hotels'}}
@endsection


@section('control-sub-title')
    {{'Hotel List'}}
@endsection


{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Hotels</li>
    <li class="active">Hotel List</li>
@endsection

@section('active-hotels')
 {{ 'active' }}
@endsection


@section('active-hotel-list')
 {{ 'active' }}
@endsection

@section('content')
<section>
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><b>Search / Update / Delete </b>Hotel List</h3>
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
</section>
@endsection

@section('scripts')

    <script type="text/javascript">
        $(function() {
            $("#qweasd").dataTable();
        });
    </script>

@endsection
@extends('control-panel.layout.main')


@section('control-title')
    {{'Hotels'}}
@endsection


@section('control-sub-title')
    {{'Hotel List'}}
@endsection


{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">My Hotels</li>
    <li class="active">Hotel List</li>
@endsection

@section('active-hotels')
 {{ 'active' }}
@endsection


@section('active-hotel-list')
 {{ 'active' }}
@endsection

@section('content')

<div class="col-md-12">
    <div class="row">
        @yield('content')
    </div>
</div>

@endsection


@section('scripts')

    <script type="text/javascript">

        $(function(){

            $("#hotel-list").dataTable();
        });

    </script>

@endsection


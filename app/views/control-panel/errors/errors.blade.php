@extends('control-panel.layout.main')


@section('control-title')
    {{--{{'Hotels'}}--}}
@endsection


@section('control-sub-title')
    {{--{{'Hotel List'}}--}}
@endsection


{{--Breadcrumbs--}}
@section('bread-crumbs')

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


@endsection


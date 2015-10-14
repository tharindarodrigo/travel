@extends('control-panel.layout.main')


@section('head-scripts')
    {{HTML::script("//cdn.ckeditor.com/4.5.2/standard/ckeditor.js")}}
@endsection

@section('control-title')
    {{'Hotels'}}
@endsection


@section('control-sub-title')
    @yield('control-subtitle')
@endsection


{{--Breadcrumbs--}}
@section('bread-crumbs')
    @yield('bread-crumbs')
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
    @yield('script')
@endsection
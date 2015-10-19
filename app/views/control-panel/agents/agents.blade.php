{{--
    This page allows you to Update the Hotel Profile
    The page
--}}

@extends('control-panel.layout.main')



@section('hotel-nav-bar')


@endsection

{{--Title--}}
@section('control-title')
    {{'Agents'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Manage'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">Agents</li>
    <li class="active">Create</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-agents')
    {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('active-agent-create-agent')
    {{ 'active' }}
@endsection

@section('content')
<div class="col-md-12">
    <div class="row">
        @yield('agent-content')
    </div>
</div>
@endsection

@section('scripts')
{{--{{ HTML::script('control-panel-assets/ajax/imageUpload.js')}}--}}


<script type="text/javascript">

</script>

@endsection


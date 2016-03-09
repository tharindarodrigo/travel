http://srilankahotels.travel/payment-get?Title=Exotic+-+Reservation&currency=USD&vpc_3DSXID=bWI0GQ2ANdAybOyB2aJ9VTM8PIw%3D&vpc_3DSenrolled=N&vpc_AVSRequestCode=Z&vpc_AVSResultCode=Unsupported&vpc_AcqAVSRespCode=Unsupported&vpc_AcqCSCRespCode=M&vpc_AcqResponseCode=00&vpc_Amount=10&vpc_AuthorizeId=048334&vpc_BatchNo=20160121&vpc_CSCResultCode=M&vpc_Card=VC&vpc_Command=pay&vpc_Locale=en&vpc_MerchTxnRef=1453364738HSBC96&vpc_Merchant=037000959003&vpc_Message=Approved&vpc_OrderInfo=1453364738B133&vpc_ReceiptNo=602119513912&vpc_SecureHash=4AD62D511B5DBBE3C82EBBCDB5CAD34E&vpc_TransactionNo=59&vpc_TxnResponseCode=0&vpc_VerSecurityLevel=06&vpc_VerStatus=E&vpc_VerType=3DS&vpc_Version=1


http://srilankahotels.travel/payment-get?Title=Exotic+-+Reservation&currency=USD&vpc_3DSXID=xq8CQ1K3ejbze%2B1T3jjEVrUcHI0%3D&vpc_3DSenrolled=N&vpc_AVSRequestCode=Z&vpc_AVSResultCode=Unsupported&vpc_AcqAVSRespCode=Unsupported&vpc_AcqCSCRespCode=M&vpc_AcqResponseCode=00&vpc_Amount=10&vpc_AuthorizeId=043581&vpc_BatchNo=20160126&vpc_CSCResultCode=M&vpc_Card=VC&vpc_Command=pay&vpc_Locale=en&vpc_MerchTxnRef=1453814083HSBC104&vpc_Merchant=037000959003&vpc_Message=Approved&vpc_OrderInfo=1453814083A141&vpc_ReceiptNo=602700420582&vpc_SecureHash=36D77FAF140BFF80945067322EF89816&vpc_TransactionNo=2000000050&vpc_TxnResponseCode=0&vpc_VerSecurityLevel=06&vpc_VerStatus=E&vpc_VerType=3DS&vpc_Version=1



<ul class="sidebar-menu">

    <li class="header">MAIN NAVIGATION</li>

    <li class="treeview @yield('active-dashboard')">
        <a href="{{ URL::to('control-panel'); }}">
            <i class="fa fa-dashboard "></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview @yield('active-hotels')">
        <a href="#">
            <i class="fa fa-cutlery"></i>
            <span> Hotels </span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="@yield('active-hotel-list')"><a
                        href="{{ Url::route('control-panel.hotel.hotels.index') }}"><i
                            class="fa fa-circle-o"></i> Hotel List</a></li>
            @if(Entrust::hasRole('Admin'))
                <li class="@yield('active-hotel-create-hotel')"><a
                            href="{{ Url::route('control-panel.hotel.hotels.create') }}"><i
                                class="fa fa-circle-o"></i> Create Hotel</a></li>
                <li class="@yield('active-hotel-hotel-categories')"><a
                            href="{{ Url::route('control-panel.hotel.hotel-categories.index') }}"><i
                                class="fa fa-circle-o"></i> Hotel Categories</a></li>
                <li class="@yield('active-hotel-hotel-facilities')"><a
                            href="{{ Url::route('control-panel.hotel.hotel-facilities.index') }}"><i
                                class="fa fa-circle-o"></i> Hotel Facilities</a></li>
                <li class="@yield('active-hotel-meal-bases')"><a
                            href="{{ Url::route('control-panel.hotel.meal-bases.index') }}"><i
                                class="fa fa-circle-o"></i> Meal Bases</a></li>
                <li class="@yield('active-hotel-star-categories')"><a
                            href="{{ Url::route('control-panel.hotel.star-categories.index') }}"><i
                                class="fa fa-circle-o"></i> Star Categories</a></li>
                <li class="@yield('active-hotel-room-facilities')"><a
                            href="{{ Url::route('control-panel.hotel.room-facilities.index') }}"><i
                                class="fa fa-circle-o"></i> Room Facilities</a></li>
            @endif
        </ul>
    </li>

    @if(Entrust::hasRole('Admin'))

        <li class="treeview @yield('active-payments')">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Payments</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('active-all-payments')">
                    <a href="{{URL::route('control-panel.payments.index')}}">
                        <i class="fa fa-circle-o"></i> All Payment </a></li>
                <li class="@yield('active-payments-create')">
                    <a href="{{URL::route('control-panel.payments.create')}}">
                        <i class="fa fa-circle-o"></i> New Payment </a></li>
            </ul>
        </li>

        <li class="treeview @yield('active-general')">
            <a href="#">
                <i class="fa fa-arrows-alt"></i>
                <span>General</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('active-general-cities')"><a
                            href="{{ Url::route('control-panel.general.cities.index') }}"><i
                                class="fa fa-circle-o"></i> Cities</a>
                </li>
                <li class="@yield('active-general-countries')"><a
                            href="{{ Url::route('control-panel.general.countries.index') }}"><i
                                class="fa fa-circle-o"></i> Countries</a>
                </li>
                <li class="@yield('active-general-markets')"><a
                            href="{{ Url::route('control-panel.general.markets.index') }}"><i
                                class="fa fa-circle-o"></i> Markets</a>
                </li>
            </ul>
        </li>

        <li class="treeview @yield('active-agents')">
            <a href="#">
                <i class="fa fa-user"></i>
                <span>Agents</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('active-agent-users')"><a href="#"><i class="fa fa-circle-o"></i>
                        Agents</a></li>
                <li class="@yield('active-agent-list')"><a href="#"><i class="fa fa-circle-o"></i> Companies</a>
                </li>
                <li class="@yield('active-agent-create')"><a href="#"><i class="fa fa-circle-o"></i> Create
                        Company</a></li>
            </ul>
        </li>

        <li class="treeview @yield('active-transportation')">
            <a href="#">
                <i class="fa fa-car"></i>
                <span>Transportation</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('active-transportation-vehicles')"><a
                            href="{{URL::route('control-panel.transportation.vehicles.index')}}"><i
                                class="fa fa-circle-o"></i> Vehicles</a></li>
                <li class="@yield('active-transportation-packages')"><a
                            href="{{URL::route('control-panel.transportation.packages.index')}}"><i
                                class="fa fa-circle-o"></i> Packages</a></li>
            </ul>
        </li>

        <li class="treeview @yield('active-users')">
            <a href="#">
                <i class="fa fa-users"></i>
                <span>Users</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li class="@yield('active-users-agents')"><a
                            href="{{URL::to('control-panel/users/agents')}}"><i class="fa fa-circle-o"></i>
                        Agents</a>
                </li>
                <li class="@yield('active-users-hoteliers')"><a
                            href="{{URL::to('control-panel/users/hoteliers')}}"><i
                                class="fa fa-circle-o"></i>
                        Hoteliers</a></li>
                <li class="@yield('active-users-all')"><a href="{{URL::to('control-panel/users')}}"><i
                                class="fa fa-circle-o"></i> Users</a>
                </li>
            </ul>
        </li>
    @endif

    @if(Entrust::hasRole('Agent'))

    @endif

    <li class="treeview @yield('active-reservations')">
        <a href="#">
            <i class="fa fa-users"></i>
            <span>Inquiries</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="@yield('rate-Inquiries')"><a
                        href="{{URL::to('control-panel/inquiries/rate-inquiries')}}"><i class="fa fa-circle-o"></i>
                    Rate Inquiries</a>
            </li>
            <li class="@yield('active-users-hoteliers')"><a
                        href="{{URL::to('control-panel/inquiries/allotment-inquiries')}}"><i
                            class="fa fa-circle-o"></i>
                    Allotment Inquiries</a></li>
        </ul>
    </li>

    <li class="treeview @yield('active-accounts')">
        <a href="#">
            <i class="fa fa-users"></i>
            <span>Invoices</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="@yield('active-accounts-view-payments')"><a
                        href="#"><i class="fa fa-circle-o"></i>
                    View Payment</a>
            </li>
            <li class="@yield('active-accounts-view-payments')"><a
                        href="#"><i class="fa fa-circle-o"></i>
                    View Payment</a>
            </li>
            <li class="@yield('active-accounts-balance-sheet')"><a
                        href="#"><i
                            class="fa fa-circle-o"></i>
                    Balance Sheet
                </a>
            </li>
            <li class="@yield('active-accounts-credit-limit')"><a
                        href="#"><i
                            class="fa fa-circle-o"></i>
                    Credit Limit
                </a>
            </li>
        </ul>
    </li>

</ul>

















@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'Inquiries'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Rate Inquiries'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">General</li>
    <li class="active">Cities</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-reservations')
    {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('rate-Inquiries')
    {{ 'active' }}
@endsection


@section('content')

    <section>
        <div class="col-md-12">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                        Rate Inquiries
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Hotel</th>
                            <th>Room</th>
                            <th>Room Spec</th>
                            <th>Meal</th>
                            <th>Controls</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($rateinquiries as $rateinquiry)
                            <tr>
                                <td>{{$rateinquiry->id}}</td>
                                <td>{{$rateinquiry->from}}</td>
                                <td>{{$rateinquiry->to}}</td>
                                <td>{{$rateinquiry->hotel->name}}</td>
                                <td>{{$rateinquiry->roomtype->room_type}}</td>
                                <td>{{$rateinquiry->roomSpecification->room_specification}}</td>
                                <td>{{$rateinquiry->mealBasis->meal_basis}}</td>
                                <td>
                                    {{Form::open(array('route'=>array('control-panel.inquiries.rate-inquiries.update',$rateinquiry->id), 'method'=>'Patch'))}}
                                    <button class="btn btn-success btn-block" type="submit" value="1" name="status">Confirm</button>
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>


            </div>
        </div>


    </section>

@endsection


@section('scripts')

    <script type="text/javascript">
        $(function () {
            $("#cities-table").dataTable();

            confirmDeleteItem();

        });
    </script>

@endsection

















@extends('control-panel.layout.main')

{{--Title--}}
@section('control-title')
    {{'Inquiries'}}
@endsection

{{--Sub Title--}}
@section('control-sub-title')
    {{'Allotment Inquiries'}}
@endsection

{{--Breadcrumbs--}}
@section('bread-crumbs')
    <li class="active">General</li>
    <li class="active">Cities</li>
@endsection

{{--Active Main Menu Item--}}
@section('active-reservations')
    {{ 'active' }}
@endsection

{{--Active Sub menu Item--}}
@section('allotment-Inquiries')
    {{ 'active' }}
@endsection

<style type="text/css">
    .table th{
        text-align: center !important;
    }
</style>

@section('content')

    <section>
        <div class="col-md-12">
            <div class="box box-primary ">
                <div class="box-header">
                    <h3 class="box-title">
                        Allotment Inquiries
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Hotel</th>
                            <th>Room</th>
                            <th>Controls</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($allotmentinquiries as $allotmentinquiry)
                            <tr>
                                <td>{{$allotmentinquiry->id}}</td>
                                <td>{{$allotmentinquiry->from}}</td>
                                <td>{{$allotmentinquiry->to}}</td>
                                <td>{{$allotmentinquiry->hotel->name}}</td>
                                <td>{{$allotmentinquiry->roomtype->room_type}}</td>
                                <td>
                                    {{Form::open(array('route'=>array('control-panel.inquiries.allotment-inquiries.update',$allotmentinquiry->id), 'method'=>'Patch'))}}
                                    <button class="btn btn-success btn-block" type="submit" value="1" name="confirm">
                                        Confirm
                                    </button>
                                    {{Form::close()}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


    </section>

@endsection


@section('scripts')

    <script type="text/javascript">
        $(function () {
            $("#cities-table").dataTable();

            confirmDeleteItem();

        });
    </script>

@endsection
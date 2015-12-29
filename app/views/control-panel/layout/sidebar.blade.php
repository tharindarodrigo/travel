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
            <span>Reservations</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li class="@yield('room-Inquiries')"><a
                        href="#"><i class="fa fa-circle-o"></i>
                    Room Inquiries</a>
            </li>
            <li class="@yield('active-users-hoteliers')"><a
                        href="#"><i
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
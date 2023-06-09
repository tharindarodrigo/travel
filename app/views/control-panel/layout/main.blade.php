<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SriLankaHotels.Travel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    {{ HTML::style("control-panel-assets/bootstrap/css/bootstrap.min.css" ) }}
            <!-- Font Awesome Icons -->
    {{ HTML::style("//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" ) }}
            <!-- Ionicons -->
    {{ HTML::style("//code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" ) }}
            <!-- Theme style -->
    {{ HTML::style("control-panel-assets/dist/css/AdminLTE.min.css" ) }}
            <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    {{ HTML::style("control-panel-assets/dist/css/skins/_all-skins.min.css" ) }}
    {{ HTML::style("control-panel-assets/plugins/iCheck/all.css" ) }}


            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    {{ HTML::script("//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js")}}
    {{ HTML::script("//oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js")}}
    <![endif]-->
    {{ HTML::script("control-panel-assets/ajax/commonFunctions.js")}}

    {{ HTML::style('//cdn.datatables.net/1.10.6/css/jquery.dataTables.min.css')}}
    <script src="//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js" type="javascript"></script>

    <style type="text/css">
        th {
            text-align: center;
        }

        td {
            vertical-align: middle;
        }


    </style>

    @yield('head-scripts')
</head>
<body class="skin-blue">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <a href="index2.html" class="logo"><b>SriLankaHotels</b>.Travel</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="container-fluid">
                <div class="navbar-header ">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        @yield('hotel-nav-bar')
                    </ul>

                    {{--</nav>--}}

                    <div class="navbar-custom-menu">

                        <ul class="nav navbar-nav">

                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown messages-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="label label-success">4</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 4 messages</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- start message -->
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="dist/img/user2-160x160.jpg" class="img-circle"
                                                             alt="User Image"/>
                                                    </div>
                                                    <h4>
                                                        Support Team
                                                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                    </h4>
                                                    <p>Why not buy a new awesome theme?</p>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">See All Messages</a></li>
                                </ul>
                            </li>
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 10 notifications</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="#">View all</a></li>
                                </ul>
                            </li>
                            <!-- Tasks: style can be found in dropdown.less -->
                            <li class="dropdown tasks-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger">9</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">You have 9 tasks</li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu">
                                            <li><!-- Task item -->
                                                <a href="#">
                                                    <h3>
                                                        Design some buttons
                                                        <small class="pull-right">20%</small>
                                                    </h3>
                                                    <div class="progress xs">
                                                        <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                             role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                             aria-valuemax="100">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end task item -->
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all tasks</a>
                                    </li>
                                    <li class="dropdown user user-menu open">
                                        <a class="dropdown-toggle" aria-expanded="true" href="#" data-toggle="dropdown">
                                            <img class="user-image" alt="User Image" src="../../dist/img/user2-160x160.jpg">
                                            <span class="hidden-xs">Alexander Pierce</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <!-- User image -->
                                            <li class="user-header">
                                                <img class="img-circle" alt="User Image" src="../../dist/img/user2-160x160.jpg">
                                                <p>
                                                    Alexander Pierce - Web Developer
                                                    <small>Member since Nov. 2012</small>
                                                </p>
                                            </li>
                                            <!-- Menu Body -->
                                            <li class="user-body">
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Followers</a>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Sales</a>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Friends</a>
                                                </div>
                                            </li>
                                            <!-- Menu Footer-->
                                            <li class="user-footer">
                                                <div class="pull-left">
                                                    <a class="btn btn-default btn-flat" href="#">Profile</a>
                                                </div>
                                                <div class="pull-right">
                                                    <a class="btn btn-default btn-flat" href="#">Sign out</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>


                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="{{URL::route('account-sign-out')}}">
                                    Sign Out
                                </a>

                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>
    </header>

    <!-- =============================================== -->

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">

                <div class="pull-left info">
                    <p>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
            {{--<input type="text" name="q" class="form-control" placeholder="Search..."/>--}}
            {{--<span class="input-group-btn">--}}
            {{--<button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>--}}
            {{--</span>--}}
            {{--</div>--}}
            {{--</form>--}}
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            @include('control-panel.layout.sidebar')
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                @yield('control-title')
                <small>@yield('control-sub-title') </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i>Control Panel</a></li>
                @yield('bread-crumbs')

            </ol>
        </section>

        <!--=================================================================================
                Main content
        <!--=================================================================================-->
        <section class="content">
            <div class="row">
                @yield('content')
            </div>
        </section>
        <!-- /.content -->
        <!--=================================================================================
               End Main content
        <!--=================================================================================-->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; {{ date('Y') }} Exotic Holidays International Pvt (Ltd) All rights reserved.</strong>
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.3 -->
{{ HTML::script("control-panel-assets/plugins/jQuery/jQuery-2.1.3.min.js")}}
        <!-- Bootstrap 3.3.2 JS -->
{{ HTML::script("control-panel-assets/bootstrap/js/bootstrap.min.js" )}}
        <!-- SlimScroll -->

{{ HTML::script("control-panel-assets/plugins/slimScroll/jquery.slimScroll.min.js" )}}
        <!-- FastClick -->
{{ HTML::script("/control-panel/plugins/fastclick/fastclick.min.js" )}}
        <!-- AdminLTE App -->
{{ HTML::script("control-panel-assets/dist/js/app.min.js" )}}
{{ HTML::script("control-panel-assets/plugins/iCheck/icheck.js" )}}
{{ HTML::script("//cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js")}}
{{ HTML::script('control-panel-assets/plugins/timepicker/bootstrap-timepicker.min.js')}}



@yield('scripts')
@yield('scripts1')


</body>
</html>
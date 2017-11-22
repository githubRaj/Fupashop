<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fupashop</title>
    <!-- Core CSS - Include with every page -->
    <link href="{{ asset('assets/plugins/bootstrap/bootstrap.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/pace/pace-theme-big-counter.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/main-style.css') }}" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="{{ asset('assets/plugins/morris/morris-0.4.3.min.css') }}" rel="stylesheet" />
   </head>
<body>
    <!--  wrapper -->
    <div id="wrapper">
        <!-- navbar top -->
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">
            <!-- navbar-header -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/admin">
                    Fupa Technology
                </a>
            </div>
            <!-- end navbar-header -->


        </nav>
        <!-- end navbar top -->

        <!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="assets/img/user.jpg" alt="">
                            </div>
                            <div class="user-info">
                                <div><strong>{{Auth::user()->firstName}} {{Auth::user()->lastName}}</strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                                <b><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                   	document.getElementById('logout-form').submit();">
                                    Logout
                                </a></b>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li class="selected">
                        <a href="/admin"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>Add Product<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('/admin/add/desktops')}}">Add Desktop</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/add/laptops')}}">Add Laptop</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/add/tablets')}}">Add Tablet</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/add/monitors')}}">Add Monitor</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i>View Products/Serials<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('/admin/desktops') }}">Desktops</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/laptops') }}">Laptops</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/tablets') }}">Tablets</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/monitors') }}">Monitors</a>
                            </li>
                        </ul>
                        <!-- second-level-items -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table fa-fw"></i>Add Serial Number<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('/admin/addSerial/desktops')}}">Add Desktop Serial</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/addSerial/laptops')}}">Add Laptop Serial</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/addSerial/tablets')}}">Add Tablet Serial</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/addSerial/monitors')}}">Add Monitor Serial</a>
                            </li>
                        </ul>
                    </li>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ url('/admin/users')}}">View All Users</a>
                        </li>
                   </ul>
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->

        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!--End Page Header -->
            </div>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome <b>{{Auth::user()->firstName}} {{Auth::user()->lastName}} </b></i>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>

        @yield('content')

        </div>
        <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="{{ asset('assets/plugins/jquery-1.10.2.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('assets/plugins/pace/pace.js') }}"></script>
    <script src="{{ asset('assets/scripts/siminta.js') }}"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="{{ asset('assets/plugins/morris/raphael-2.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morris/morris.js') }}"></script>
    <script src="{{ asset('assets/scripts/dashboard-demo.js') }}"></script>

</body>

</html>

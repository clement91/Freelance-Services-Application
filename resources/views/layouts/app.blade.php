<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>fsa | Freelance Services Application</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="../gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../gentelella/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="../gentelella/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../gentelella/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../gentelella/build/css/custom.min.css" rel="stylesheet">

    <!-- Vendors -->
    <link href="{{ asset('vendors/BootstrapFormHelpers/dist/css/bootstrap-formhelpers.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">

      @if (!Auth::guest())
      <body class="nav-md">
        <div class="container body">
          <div class="main_container">
      @else
        <body class="login">
          <div class="container footer_fixed">
            <div class="">
      @endif

            @if (!Auth::guest())
              <!-- left panel navigation -->
              <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                  <div class="navbar nav_title" style="border: 0;">
                    <a href="/" class="site_title">&nbsp;<i class="fa fa-stack-overflow"></i>&nbsp;<span>fsa</span></a>
                  </div>

                  <div class="clearfix"></div>

                  <!-- menu profile quick info -->
                  <div class="profile clearfix">
                    <div class="profile_pic">
                        <img src="{{ Auth::user()->image_url }}" alt="..." class="img-circle profile_img nav-img"
                          style="height:56px;width:56px;">
                    </div>
                    <div class="profile_info">
                      <span>Welcome,</span>
                      <h2>{{ Auth::user()->name }}</h2>
                    </div>
                  </div>
                  <!-- /menu profile quick info -->

                  <br />

                  <!-- sidebar menu -->
                  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">
                      <h3>General</h3>
                      <ul class="nav side-menu">
                        <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="/dashboard">Dashboard</a></li>
                            <li><a href="/inbox">Inbox</a></li>
                            <li><a href="/profile">Profile</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                                   Log Out
                                 </a>
                            </li>
                          </ul>
                        </li>
                        <li><a><i class="fa fa-edit"></i> Services <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="/add-new-service">Add New Service</a></li>
                            <li><a href="/service">View & Edit Service</a></li>
                            <li><a href="/find-service">Find a Service</a></li>
                            <li><a href="/find-service">Post a Service</a></li>
                          </ul>
                        </li>
                        <li><a><i class="fa fa-gears"></i> Others <span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li><a href="/settings">Settings</a></li>
                            <li><a href="/help">Help</a></li>
                            <li><a href="/contact-feedback">Contact & Feedback</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>

                  </div>
                  <!-- /sidebar menu -->

                  <!-- /menu footer buttons -->
                  <div class="sidebar-footer hidden-small">
                    <!--
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                    -->
                  </div>
                  <!-- /menu footer buttons -->
                </div>
              </div>
              <!-- left panel navigation -->
            @endif

            <!-- top navigation -->
            <div class="top_nav">
              <div class="nav_menu">
                <nav>

                  @if (Auth::guest())
                      <ul class="nav navbar-nav navbar-left">
                        <h3><a href="/">&nbsp;&nbsp;Freelance Services Application</a></h3>
                      </ul>

                      <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('register') }}">Register</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                      </ul>
                  @else
                    <div class="nav toggle">
                      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                      <li class="">
                        <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                          <img src="{{ Auth::user()->image_url }}" class="nav-img" alt="">{{ Auth::user()->name }}
                          <span class=" fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-usermenu pull-right">
                          <li><a href="/profile"> Profile</a></li>
                          <li>
                            <a href="javascript:;">
                              <span class="badge bg-red pull-right">50%</span>
                              <span>Settings</span>
                            </a>
                          </li>
                          <li><a href="javascript:;">Help</a></li>
                          <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                        </ul>
                      </li>

                      <li role="presentation" class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-bell-o"></i>
                          <span class="badge bg-green">6</span>
                        </a>
                        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                          <li>
                            <a>
                              <span class="image"><img src="img/default.jpg" alt="Profile Image" /></span>
                              <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                              </span>
                              <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where...
                              </span>
                            </a>
                          </li>
                          <li>
                            <a>
                              <span class="image"><img src="img/default.jpg" alt="Profile Image" /></span>
                              <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                              </span>
                              <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where...
                              </span>
                            </a>
                          </li>
                          <li>
                            <a>
                              <span class="image"><img src="img/default.jpg" alt="Profile Image" /></span>
                              <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                              </span>
                              <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where...
                              </span>
                            </a>
                          </li>
                          <li>
                            <a>
                              <span class="image"><img src="img/default.jpg" alt="Profile Image" /></span>
                              <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                              </span>
                              <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where...
                              </span>
                            </a>
                          </li>
                          <li>
                            <div class="text-center">
                              <a>
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                              </a>
                            </div>
                          </li>
                        </ul>
                      </li>

                      <li role="presentation" class="dropdown">
                        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-envelope-o"></i>
                          <span class="badge bg-green"></span>
                        </a>
                        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                          <li>
                            <a>
                              <span class="image"><img src="img/default.jpg" alt="Profile Image" /></span>
                              <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                              </span>
                              <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where...
                              </span>
                            </a>
                          </li>
                          <li>
                            <a>
                              <span class="image"><img src="img/default.jpg" alt="Profile Image" /></span>
                              <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                              </span>
                              <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where...
                              </span>
                            </a>
                          </li>
                          <li>
                            <a>
                              <span class="image"><img src="img/default.jpg" alt="Profile Image" /></span>
                              <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                              </span>
                              <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where...
                              </span>
                            </a>
                          </li>
                          <li>
                            <a>
                              <span class="image"><img src="img/default.jpg" alt="Profile Image" /></span>
                              <span>
                                <span>John Smith</span>
                                <span class="time">3 mins ago</span>
                              </span>
                              <span class="message">
                                Film festivals used to be do-or-die moments for movie makers. They were where...
                              </span>
                            </a>
                          </li>
                          <li>
                            <div class="text-center">
                              <a>
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                              </a>
                            </div>
                          </li>
                        </ul>
                      </li>

                    </ul>
                  @endif

                </nav>
              </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            @if (!Auth::guest())
                <div class="right_col" role="main">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                          @yield('content')
                      </div>
                    </div>
                  </div>
                </div>
            @else
              <div class="container">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  @yield('content')
                </div>
                <div class="col-md-3"></div>
              </div>
            @endif
            <!-- /page content -->

            <!-- footer content -->
            <footer>
              <div class="pull-right">
                fsa - Freelance Services App by <a href="https://colorlib.com">Colorlib</a>
              </div>
              <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->

            <!-- logout form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <!-- logout form -->

          </div>
        </div>
      </body>

        {{--
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Freelance Services Application
                        <!--
                        {{ config('app.name', 'Laravel') }}
                        -->
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/home') }}">
                                            Dashboard
                                        </a>
                                        <a href="{{ url('/profile') }}" id="profile" data-user="{{ Auth::user()->id }}">
                                            Profile
                                        </a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        --}}

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- jQuery -->
    <script src="../gentelella/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../gentelella/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../gentelella/vendors/fastclick/lib/fastclick.js"></script>
    <!-- Chart.js -->
    <script src="../gentelella/vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../gentelella/vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../gentelella/vendors/iCheck/icheck.min.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../gentelella/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- FastClick -->
    <script src="../gentelella/vendors/fastclick/lib/fastclick.js"></script>
    <!-- Flot -->
    <script src="../gentelella/vendors/Flot/jquery.flot.js"></script>
    <script src="../gentelella/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../gentelella/vendors/Flot/jquery.flot.time.js"></script>
    <script src="../gentelella/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../gentelella/vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../gentelella/vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../gentelella/vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../gentelella/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../gentelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../gentelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../gentelella/vendors/moment/min/moment.min.js"></script>
    <script src="../gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../gentelella/build/js/custom.js"></script>

    <!-- Vendors -->
    <script src="{{ asset('vendors/Bootstrap-dialog/bootstrap-dialog.js') }}"></script>
    <script src="{{ asset('vendors/BootstrapFormHelpers/dist/js/bootstrap-formhelpers.js') }}"></script>
    <script src="{{ asset('js/profile.js') }}"></script>

</body>
</html>

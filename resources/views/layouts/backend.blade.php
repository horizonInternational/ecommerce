<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Horizonwebhost">
    <meta name="keyword" content="suraj,lekhnath, holiday, horizon, web, host">



    <title>Horizonwebhost- @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ url('public/backend/css/bootstrap.css') }}" rel="stylesheet">
    <!--external css-->
<!-- <link href="{{ url('public/backend/css/font-awesome.css') }}" rel="stylesheet" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ url('public/backend/css/zabuto_calendar.css') }}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ url('public/backend/css/style2.css') }}" rel="stylesheet">
    <link href="{{ url('public/backend/css/style-responsive.css') }}" rel="stylesheet">
    <!-- Jasny CSS -->
    <link rel="stylesheet" href="{{ url('public/jasny/jasny-bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ url('public/jasny/jasny-bootstrap-responsive.min.css') }}" />
    <!-- himg CSS -->
    <link rel="stylesheet" href="{{ url('public/css/animation.css') }}" />

    <!-- CkEditor JS -->
    <link rel="stylesheet" href="{{url('public/ckeditor/content.css')}}">
    <script src="{{ url('public/ckeditor/ckeditor.js') }}"></script>

</head>

<body>


<section id="container">
    <!-- **********************************************************************************************************************************************************
    TOP BAR CONTENT & NOTIFICATIONS
    *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right"
                 data-original-title="Toggle Navigation"></div>
        </div>

        <!--logo start-->
        <a href="" target="_blank" class="logo">
            <img src="{{ url('public/img/coming-soon.png') }}" width="160px" height="45px">
            {{--Pleasant--}}
        </a>
        <!--logo end-->

        <div class="top-menu">
            <ul class="nav pull-right top-menu">
                <li>
                    <a href="{{ route('logout') }}" class="logout" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </header>
    <!--header end-->

    <!-- **********************************************************************************************************************************************************
    MAIN SIDEBAR MENU
    *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
        <div id="sidebar" class="nav-collapse">

            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <p class="centered">
                        <img src="{{ url('public/img/avatar.jpg') }}" class="img-circle" width="60">
                    </p>
                    <h5 class="centered"></h5>
                </li>
                <li class="sub-menu">
                    <a class="@yield('activeDashboard')" href="">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="@yield('activeMenu')" href="">
                        <i class="fa fa-bars"></i> <span>Menu</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="@yield('activePages')" href="">
                        <i class="fa fa-file"></i> <span>Pages</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a class="@yield('activeUser')" href="">
                        <i class="fa fa-user"></i> <span>Users</span>
                    </a>
                </li>
                <!-- <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-desktop"></i> <span>My Profile</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-cogs"></i> <span>Change Password</span>
                    </a>
                </li> -->
            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">

            <div class="row">
            @yield('content')

            <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->
                <div class="col-lg-3 ds">
                    <!--COMPLETED ACTIONS DONUTS CHART-->
                    <h3>OUR CALENDER</h3>
                    <br>

                    <!-- CALENDAR-->
                    <div id="calendar" class="mb">
                        <div class="panel green-panel no-margin">
                            <div class="panel-body">
                                <div id="date-popover" class="popover top"
                                     style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                    <div class="arrow"></div>
                                    <h3 class="popover-title" style="disadding: none;"></h3>
                                    <div id="date-popover-content" class="popover-content"></div>
                                </div>
                                <div id="my-calendar"></div>
                            </div>
                        </div>
                    </div><!-- / calendar -->
                    <br>

                </div><!-- /col-lg-3 -->
            </div>
        </section>
    </section>
    <!--main content end-->

    <!--footer start-->
    <footer class="site-footer">
        <div class="text-center">
            Copyright &copy; 2018, Horizon. All rights reserved | Designed & Developed By <a
                    href="http://www.horizonwebhost.com.np">Horizonwebhost</a>
        </div>
    </footer>
    <!--footer end-->

</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ url('public/backend/js/jquery.js') }}"></script>
<script src="{{ url('public/backend/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/backend/js/zabuto_calendar.js') }}"></script>

<script type="application/javascript">
    $(document).ready(function () {
        $("#date-popover").popover({html: true, trigger: "manual"});
        $("#date-popover").hide();
        $("#date-popover").click(function (e) {
            $(this).hide();
        });

        $("#my-calendar").zabuto_calendar({
            action: function () {
                return myDateFunction(this.id, false);
            },
            action_nav: function () {
                return myNavFunction(this.id);
            },
            ajax: {
                url: "show_data.php?action=1",
                modal: true
            },
            legend: [
                {type: "text", label: "Special event", badge: "00"},
                {type: "block", label: "Regular event",}
            ]
        });
    });
</script>

<script src="{{ url('public/backend/js/form-component.js') }}"></script>
<script>
    window.jQuery || document.write('<script src="{{ url('public/jasny/jquery-1.10.1.min.js') }}"><\/script>')
</script>
<script type="text/javascript" src="{{ url('public/jasny/jasny-bootstrap.min.js') }}"></script>
<script src="{{ url('public/backend/js/common-scripts.js') }}"></script>

<script src="{{ url('public/backend/js/backend-custom.js') }}"></script>

</body>
</html>



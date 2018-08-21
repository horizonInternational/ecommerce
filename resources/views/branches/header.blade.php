<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Horizonwebhost">
    <meta name="keyword" content="suraj,lekhnath, holiday, horizon, web, host">
    <title>Horizonwebhost- @yield('title')</title>
    <link rel="icon" type="image/png" sizes="16x16"
          href="{{url('public/frontend/assets/images/favicon.ico')}}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Amaranth:400,700|Poppins:300,400,600,700" rel="stylesheet">

    <link href="{{ url('public/frontend/css/plugins.min.css') }}" rel="stylesheet">

    <link href="{{ url('public/frontend/css/font-awesome.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ url('public/frontend/css/icons.css') }}">
    <link rel="stylesheet" href="{{url('public/frontend/css/')}}">
    <link rel="stylesheet" href="{{url('public/frontend/css/style.css')}}">
    <link href="{{ url('public/frontend/css/responsive.css') }}" rel="stylesheet">

    <link href="{{ url('public/frontend/css/color-1.css') }}" rel="stylesheet">
    <link href="{{ url('public/frontend/css/bootstrap-datepicker.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{url('public/frontend/css/overrides.css')}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// --><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->

    <script src="{{url('public/frontend/js/jquery.min.js')}}"></script>

    <script>
        window.setTimeout(function () {
            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
            });
        }, 2000);
    </script>

</head>
<body>
<div id="page">

    <!-- Page Loader -->
    <div id="pageloader">
        <div class="loader-item fa fa-spin text-color"></div>
    </div>


    <!-- Top Bar -->
    <div id="top-bar" class="top-bar-section top-bar-bg-color">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Top Contact -->
                    <div class="top-contact link-hover-black">
                        <a href="#">
                            <i class="fa fa-phone"></i>
                            + 123 132 1234
                        </a>
                        <a href="#">
                            <i class="fa fa-envelope"></i>
                            ecosanjal@info.com
                        </a>
                    </div>
                    <!-- Top Social Icon -->
                    <div class="top-social-icon icons-hover-black">
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-youtube"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-dribbble"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-github"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-rss"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top Bar -->

    <!-- Sticky Navbar -->
    <header id="sticker" class="sticky-navigation">
        <!-- Sticky Menu -->
        <div class="sticky-menu relative">
            <!-- navbar -->
            <div class="navbar navbar-default navbar-bg-light" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="navbar-header">
                                <!-- Button For Responsive toggle -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse"
                                        data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span style="color:#40d4e4" class="fa fa-user"
                                          id="navCollapse">Login/Register</span></button>


                                <a class="navbar-brand" href="{{route('home')}}">
                                    <img class="site_logo" alt="Site Logo" width="190" height="86"
                                         src="{{url('public/frontend/assets/images/logo.png')}}"/>
                                </a>
                            </div>
                            <!-- Navbar Collapse -->
                            <div class="navbar-collapse collapse toLogin">
                                <!-- nav -->
                                <ul class="nav navbar-nav" style="margin-top:15px">
                                    @if(Auth::user()&& Auth::user()->user_type=='traveller')
                                    <a class="btn btn-deault"
                                    href="{{route('profile')}}" style="background: #40d4e4;">
                                    My Account
                                    </a>&nbsp;<a class="btn btn-deault"
                                    href="{{route('userLogout')}}" style="background: #40d4e4;">
                                    Logout
                                    </a>
                                    @else
                                    <a href="#">Don't you have an account?</a>&emsp;
                                    <button class="btn btn-deault " data-toggle="collapse" data-target="" id="register">
                                        Register
                                    </button>
                                    <button class="btn btn-deault " data-toggle="collapse" data-target="" id="login">
                                        Login
                                    </button>
                                @endif

                                    <!-- Shortcode Menu Ends -->
                                    <!-- Header Search -->

                                </ul>
                                <!-- Right nav -->
                                <!-- Header Contact Content -->
                                <div class="bg-white hide-show-content no-display header-contact-content">
                                    <p class="vertically-absolute-middle">Call Us <strong>+0 (123) 456 78 90</strong>
                                    </p>
                                    <button class="close">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>

                                <!-- Header Search Content -->
                                <div class="bg-white hide-show-content no-display header-search-content">
                                    <form role="search" class="navbar-form vertically-absolute-middle">
                                        <div class="form-group">
                                            <input type="text" placeholder="Enter your text &amp; Search Here"
                                                   class="form-control" id="s" name="s" value=""/>
                                        </div>
                                    </form>

                                </div>
                                <!-- Header Search Content -->

                            </div>
                            <!-- /.navbar-collapse -->
                        </div>
                        <!-- /.col-md-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- navbar -->
        </div>
        <!-- Sticky Menu -->
    </header>
    <!-- Sticky Navbar -->

    <!--    login and register form-->
    <div class="container row collapse loginx">
        <span id="close"><i class="fa fa-times pull-right"></i></span>
        <div class="content col-sm-12 col-md-6 col-md-offset-2">
            <h3 class="title">Don&#39;t have an Account? </h3>
            <form action="{{route('registerUser')}}" class="contact-form"  method="post">
                {{@csrf_field()}}
                <div id="success"></div>
                <div class="row" role="form">
                    <div class="col-md-10" id="registerUser">
                        <small class="text text-danger">{{$errors->first('email')}}</small>
                        <input type="text" class="form-control" name="email" id="userRegisterEmail"
                               placeholder="Email *"/>
                    </div>
                </div>
                <div class="row" role="form">
                    <div class="col-md-10">
                        <small class="text text-danger">{{$errors->first('password')}}</small>
                        <input type="password" class="form-control" name="password" id="exampleInputEmail2"
                               placeholder="Password *"/>
                    </div>
                </div>
                <div class="row" role="form">
                    <div class="col-md-10">
                        <input type="password" class="form-control" name="password_confirmation"
                               placeholder="Confirm Password *"/>
                    </div>
                </div>
                <div class="clearfix"></div>
                <button id="submit" class="btn btn-default">Register Now</button>
            </form>
        </div>
        <!-- .content -->
        <div class="col-sm-12 col-md-4" style="margin-top: -17px;">
            <h3 class="title">Login Now</h3>


            <div id="success">  </div>
                <form action="{{route('loginUser')}}" id="loginUser" class="contact-form " method="post">
                    {{@csrf_field()}}
                    <input class="form-control" type="text" name="email" id="userLoginEmail" placeholder="Email *"/>
                    <input class="form-control" type="password" name="password" placeholder="Password *"/>
                    <div class="clearfix">
                        <button id="submit" class="btn btn-default">Submit</button>
                        <span class="pull-right">
                            <a href="#" class="text-success forget">Forgot Password?</a>
                        </span>
                    </div>
                </form>
            <div class="orSignUp" style="margin-top: 20px;">
                <a href="#" class="btn btn-md " style="color:#fff ;background: #3b5999;">
                    Sign in with &nbsp;<i class="fa fa-facebook "></i>
                </a>&nbsp;
                <a href="#" class="btn btn-md " style="color:#fff ;background: #dd4b39;">
                    Sign in with &nbsp;<i class="fa fa-google"></i>
                </a>

            </div>
        </div>
        <!--    login and register form-->
    </div>


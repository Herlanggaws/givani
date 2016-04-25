<!DOCTYPE html>
<html lang="en">
<head>
 @include('includes.head')   
</head>
<body class="sticky-header left-side-collapsed"  onload="initMap()">
    @if (Auth::guest())

    @else
   
    <section>
        <!-- left side start-->
        @include('includes.slide')   
        <!-- left side end-->

        <!-- main content start-->
        <div class="main-content main-content2 main-content2copy">
            <!-- header-starts -->
            <div class="header-section">

                <!--toggle button start-->
                <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
                <!--toggle button end-->

                <!--notification menu start -->
                
                @include('includes.notification') 
                
                
                <!--notification menu end -->
            </div>
            <!-- //header-ends -->
            <div id="page-wrapper">
                <div class="graphs">
                    @yield('switch')
                    <div class="xs tabls">
                        <div class="bs-example4" data-example-id="contextual-table">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <!--footer section start-->
            @include('includes.footer')
            <!--footer section end-->
        </div>
    </section>
    <script src="{{ URL::asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ URL::asset('assets/js/scripts.js') }}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- ------------------------------------------------------------------------------------------- -->
    <nav class="navbar navbar-default">
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
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
 @endif
    @yield('content')

    <!-- JavaScripts -->
    
</body>
</html>

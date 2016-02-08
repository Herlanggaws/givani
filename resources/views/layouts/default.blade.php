<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    @include('includes.head')   
</head> 

<body class="sticky-header left-side-collapsed"  onload="initMap()">
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
                    @yield('content')
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
</body>
</html>
<!DOCTYPE html>
<html>
<head>
 @include('includes.head')  
 @yield('custom_css')
 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>G</b>J</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>GIVANI</b> JAYA</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <span class="hidden-xs"> {{ Auth::user()->name }} </span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">

                  <p>
                   {{ Auth::user()->name }}
                   <small>Member since Nov. 2012</small>
                 </p>
               </li>
               <!-- Menu Body -->

               <!-- Menu Footer-->
               <li class="user-footer">
                <div class="pull-left">
                  <!--   <a href="#" class="btn btn-default btn-flat">Profile</a> -->
                </div>
                <div class="pull-right">
                  <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Sign out</a>
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <div>   </div>

          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  @include('includes.slide_menu')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
     @yield('content')
   </section>

 </div>
 <!-- /.content-wrapper -->
 <footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> 2.3.3
  </div>
  <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
  reserved.
</footer>

<!-- Control Sidebar -->

<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->

</div>
<!-- ./wrapper -->
<script src="{{ URL::asset('assets/plugins/jQuery/jQuery-2.2.0.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('assets/dist/js/app.min.js')}}"></script>
@yield('custom_javascript')

</body>
</html>




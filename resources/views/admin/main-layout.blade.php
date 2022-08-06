<!DOCTYPE html>
<html lang="en">
<head>
 @yield('header-links')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">


      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Log out
                </h3>
              </div>
            </div>
            <!-- Message End -->
          </a>

      </li>



    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
@include('admin.partials.left-side-bar')





  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @yield('content-header')

    </div>
    <!-- /.content-header -->





    <!-- Main content -->

    <section class="content">
      <div class="container-fluid">
        @yield('content')

      </div>
    </section>
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->


  <footer class="main-footer">

    {{-- <strong>Copyright &copy; 20 <a href="#">OJO</a>.</strong> --}}
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      {{-- <b>Version</b>1 --}}
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@yield('javascript-links')
</body>
</html>

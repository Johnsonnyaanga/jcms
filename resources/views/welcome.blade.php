<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JCMS</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{ asset('assets/index3.html') }}" class="navbar-brand">
                    <img src="{{ asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                        class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Judiciary Complaints Managament System</span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Submit complaint</a>
                        </li>
                       @guest
                       @if (Route::has('login'))
                       <li class="nav-item">
                        <a href="{{route('login')}}" class="nav-link">Login</a>
                    </li>
                    @endif
                           @else
                           <li class="nav-item dropdown">

                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle" href="#">
                                My Profile

                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                              <div class="dropdown-divider"></div>

                              <div class="dropdown-divider"></div>




                              <a href="{{ route('logout') }}" class="dropdown-item"
                              onclick="event.preventDefault();document.getElementById('logout-form').submit();">
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

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        </li>
                       @endguest

                    </ul>


                </div>


            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper ">
            <!-- Content Header (Page header) -->
            <div class="content-header">

            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content mt-3">
                <div class="container">
                    <div class="row">













                        @if (Route::has('login'))
                            @auth
                            @else
                                @if (Route::has('register'))
                                    <!-- display register card -->
                                    <a href="{{ route('register') }}">
                                        <div class="col-lg-3">


                                            <div class="card card-primary card-outline "
                                                style="width: 15rem; height: 8rem;">
                                                <div class="card-body">
                                                    <div class="col">

                                                        <div class="row mb-3 mx-auto">
                                                            <div class="col d-flex justify-content-center">
                                                                <i class="fa fa-address-card" aria-hidden="true"></i>
                                                            </div>
                                                        </div>

                                                        <div class="row mt-3 ">
                                                            <div class="col d-flex justify-content-center">
                                                                <h5 class="card-title">Register</h5>
                                                            </div>
                                                        </div>


                                                    </div>

                                                </div>
                                            </div><!-- /.card -->
                                        </div>
                                    </a>

                                @endif





                                <!-- display login card -->
                                <div class="col-lg-3">

                                    <a href="{{ route('login') }}">
                                        <div class="card card-primary card-outline " style="width: 15rem; height: 8rem;">
                                            <div class="card-body">
                                                <div class="col">

                                                    <div class="row mb-3 mx-auto">
                                                        <div class="col d-flex justify-content-center">
                                                            <i class="fa fa-address-card" aria-hidden="true"></i>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-3 ">
                                                        <div class="col d-flex justify-content-center">
                                                            <h5 class="card-title">Login</h5>
                                                        </div>
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                    </a>
                                    <!-- /.card -->
                                </div>



                            @endif

                            @endif


                            <div class="col-lg-3">


                                <div class="card card-primary card-outline " style="width: 15rem; height: 8rem;">
                                    <div class="card-body">
                                        <div class="col">

                                            <div class="row mb-3 mx-auto">
                                                <div class="col d-flex justify-content-center">
                                                    <i class="fa fa-address-card" aria-hidden="true"></i>
                                                </div>
                                            </div>

                                            <div class="row mt-3 ">
                                                <div class="col d-flex justify-content-center">
                                                    <h5 class="card-title">Submit a Complaint</h5>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div><!-- /.card -->
                            </div>



                            <div class="col-lg-3">


                                <div class="card card-primary card-outline " style="width: 15rem; height: 8rem;">
                                    <div class="card-body">
                                        <div class="col">

                                            <div class="row mb-3 mx-auto">
                                                <div class="col d-flex justify-content-center">
                                                    <i class="fa fa-address-card" aria-hidden="true"></i>
                                                </div>
                                            </div>

                                            <div class="row mt-3 ">
                                                <div class="col d-flex justify-content-center">
                                                    <h5 class="card-title">My Tickets</h5>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </div><!-- /.card -->
                            </div>



                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer" style="height: 10rem">
                <!-- To the right -->
                <div class="float-center d-none d-sm-inline">
                    All rights reserved
                </div>

            </footer>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('assets/dist/js/demo.js') }}"></script>
    </body>

    </html>

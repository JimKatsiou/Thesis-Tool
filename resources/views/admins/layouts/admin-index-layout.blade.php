
<!DOCTYPE html>
<html lang="en" style="height: auto;">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <base href="{{ \URL::to('/')}}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a type="button" href="/" type="button" class="btn btn-link">Home</a>
    </li>
    {{-- <li class="nav-item d-none d-sm-inline-block">
      <a type="button" href="{{ route('admin.index') }}" type="button" class="btn btn-link">Dashboard</a>
    </li> --}}
    <li class="nav-item d-none d-sm-inline-block">
      <button type="button" class="btn btn-link" href="{{ route('logout') }}"
      onclick="event.preventDefault();
      document.getElementById('logout-form').submit();">
      {{ __('Logout') }}
      </button>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">My site</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ Auth::user()->picture }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block user_name">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
            <a href={{ route('admin.index') }} class="nav-link"><i class="nav-icon fas fa-home"></i><p>Dashboard</p></a>
        </li>
        <li class="nav-item">
            <a href={{ route('admin.profile') }} class="nav-link"><i class="nav-icon fas fa-user"></i><p>Profile</p></a>
        </li>
        <li class="nav-item">
            <a href={{ route('scnario.index') }} class="nav-link"><i class="nav-icon fa fa-bookmark"></i><p>Scenarios</p></a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fa fa-laptop"></i>
                <p>
                  Algorithms
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href={{ route('admin.matlab') }} class="nav-link"><i class="nav-icon fa fa-laptop"></i><p>Greedy</p></a>
                </li>
                <li class="nav-item">
                <a href={{ route('admin.genetic') }} class="nav-link"><i class="nav-icon fa fa-laptop"></i><p>Genetic</p></a>
                </li>
            </ul>
        </li>
        <li class="nav-item menu-is-opening menu-open">
            <a href={{ route("chartView") }} class="nav-link"><i class="nav-icon far fa-chart-bar"></i><p>Bar Charts</p></a>
        </li>
        <li class="nav-item">
            <a href={{ route("chartViewPie") }} class="nav-link"><i class="nav-icon fas fa-chart-pie"></i><p>Pie Charts</p></a>
        </li>
        <li class="nav-item">
            <a href={{ route("chartViewLine")}} class="nav-link"><i class="nav-icon fas fa-chart-line"></i><p>Line Charts</p></a>
        </li>
        <li class="nav-item">
            <a href={{ route('tableView_2') }} class="nav-link"><i class="nav-icon fas fa-table"></i><p>Tables</p></a>
        </li>
        <li class="nav-item">
            <a href={{ route('admin.settings') }} class="nav-link"><i class="nav-icon fas fa-cog"></i><p>Settings</p></a>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      @yield('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            {{-- <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Starter Page</li>
            </ol> --}}
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-success">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title"><b>Chart Graph</b></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <a href="{{ route('chartViewLine') }}" type="button" class="btn btn-primary">Join</a>
                            </div>
                                <!-- /.card-tools -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="visitors-chart" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.card (Chart Graph) -->
                <div class="card card-success">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title"><b>Table Format</b></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <a href="{{ route('insidetableView_1') }}" type="button" class="btn btn-primary">Join</a>
                            </div>
                                <!-- /.card-tools -->
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-striped table-valign-middle">
                            <thead>
                            <tr>
                                <th>Technology Name</th>
                                <th>Number Of Sensors</th>
                                <th>Cost Of Sensors</th>
                                <th>Cost Of Instalation</th>
                                <th>Final Cost</th>
                                <th>Energy</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>5G</td>
                                <td>5</td>
                                <td>100</td>
                                <td>300</td>
                                <td>800</td>
                                <td>40</td>
                            </tr>
                            <tr>
                                <td>LoRa</td>
                                <td>5</td>
                                <td>100</td>
                                <td>1000</td>
                                <td>1500</td>
                                <td>4</td>
                            </tr>
                            <tr>
                                <td>NB-IoT</td>
                                <td>5</td>
                                <td>100</td>
                                <td>1000</td>
                                <td>600</td>
                                <td>4</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card (Table) -->
                <div class="card card-success">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title"><b>Scatter Plots</b></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <a href="{{ route('chartViewLine') }}" type="button" class="btn btn-primary">Join</a>
                            </div>
                                <!-- /.card-tools -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="Scatter_Plots" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.card (Scatter_Plots) -->
                <div class="card card-success">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title"><b>Pie Charts</b></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <a href="{{ route('chartViewPie') }}" type="button" class="btn btn-primary">Join</a>
                            </div>
                                <!-- /.card-tools -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="Pie_Charts" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.card (Other Chart) -->
            </div>
            <!-- /.col-md-6 -->
            <div class="col-lg-6">
                <div class="card card-success">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title"><b>Bar Chart</b></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <a href="{{ route('chartView') }}" type="button" class="btn btn-primary">Join</a>
                            </div>
                                <!-- /.card-tools -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="sales-chart" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.card (Bar Chart) -->
                <div class="card card-success">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title"><b>Line Graphs</b></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <a href="{{ route('chartViewLine') }}" type="button" class="btn btn-primary">Join</a>
                            </div>
                                <!-- /.card-tools -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="Line_Graphs" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.card (Line Graphs) -->
                <div class="card card-success">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title"><b>Multiple Lines</b></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <a href="{{ route('chartViewLine') }}" type="button" class="btn btn-primary">Join</a>
                            </div>
                                <!-- /.card-tools -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="Multiple_Lines" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.card (Multiple_Lines) -->
                <div class="card card-success">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title"><b>Doughnut Charts</b></h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                                <a href="{{ route('chartViewPie') }}" type="button" class="btn btn-primary">Join</a>
                            </div>
                                <!-- /.card-tools -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="position-relative mb-4">
                            <canvas id="Doughnut_Charts" height="200"></canvas>
                        </div>
                    </div>
                </div>
                <!-- /.card (Doughnut Charts) -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /. Main content -->
</div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">

    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2022</strong>
  </footer>

  <a id="back-to-top" href="{{ route('admin.index') }}#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
      <i class="fas fa-chevron-up"></i>
    </a>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

</body>
</html>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{'PeakLoop'}} | {{env('APP_NAME')}}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/lte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/lte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/lte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Flag Icons-->
  <link rel="stylesheet" href="/lte/css/flag-icon.min.css">
  @yield('css')
  <!-- Theme style -->
  <link rel="stylesheet" href="/lte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/lte/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="{{route('admin.index')}}" class="navbar-brand"><b>Connection</b> Tags</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="{{route('admin.index')}}">Ana Sayfa <span class="sr-only">(current)</span></a></li>
              <li><a href="{{route('admin.tag.index')}}">Tag Yönetimi <span class="sr-only">(current)</span></a></li>
              <li><a href="{{route('admin.qrcode.index')}}">QC-Code <span class="sr-only">(current)</span></a></li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle">
                  <img src="/lte/dist/img/avatar5.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">{{ Sentinel::getUser()->first_name . " " . Sentinel::getUser()->last_name }}</span>
                </a>
              </li>
              <li><a href="{{route('admin.logout')}}"><i class="fa fa-sign-out"></i></a></li>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @section('content-header')
      <h1>
        Morris Charts
        <small>Preview sample</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Charts</a></li>
        <li class="active">Morris</li>
      </ol>
      @show
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2018 <a href="{{env('APP_URL')}}">PeakLoop</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/lte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="/lte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
@yield('js')
<!-- FastClick -->
<script src="/lte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/lte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/lte/dist/js/demo.js"></script>
@yield('js_code')
</body>
</html>

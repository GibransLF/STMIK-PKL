<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>STMIK PKL | Home Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="resaurces/plugins/fontawesome-free/css/all.min.css"/>
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="resaurces/plugins/icheck-bootstrap/icheck-bootstrap.min.css"/>
    <!-- Animate.style -->
    <link rel="stylesheet" href="resaurces/plugins/animate/animate.min.css"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="resaurces/dist/css/adminlte.min.css" />
    
    <!-- own  -->
    <link rel="stylesheet" href="resaurces/plugins/index.css"/>
  </head>
  <body class="hold-transition sidebar-mini sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#homePage" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="#infoPage" class="nav-link">info</a>
          </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto ">
          <!-- logout button  -->
          <a href="login.php">
            <button type="button" class="btn btn-block btn-outline-dark">
            Punya akun? <u>log In</u>
            </button>
          </a>
        </ul>
      </nav>
      <!-- /.navbar -->

      <?php require "content_index.php" ?>

      <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="resaurces/dist/img/STMIKBandungLogo.png" alt="STMIK Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">STMIK Bandung</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#homePage" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#infoPage" class="nav-link">
              <i class="nav-icon fas fa-info-circle"></i>
              <p>
                Info
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="resaurces/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="resaurces/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="resaurces/dist/js/adminlte.min.js"></script>

  </body>
</html>

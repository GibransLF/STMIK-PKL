<?php
  require "database.php";
  
  session_start();
  $_SESSION["sesi"] = false;

  //ambil dari input form
  if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $pass     = $_POST["pass"];

    if(empty($username) || empty($pass)){
      $_SESSION["error"] = "Username dan Password harus diisi!";
    }
    else{
      // Pengecekan di tabel admin
      $sqlAdmin = "SELECT * FROM admin WHERE username = '$username'";
      $resultAdmin = mysqli_query($conn, $sqlAdmin);
      if($resultAdmin && mysqli_num_rows($resultAdmin) > 0){
        $rowAdmin = mysqli_fetch_assoc($resultAdmin);
        $hashPassAdmin = $rowAdmin["password"];
      }
      else {
        $hashPassAdmin = null;
      }

      // Pengecekan di tabel pembimbing
      $sqlPembimbing = "SELECT * FROM pembimbing WHERE username = '$username'";
      $resultPembimbing = mysqli_query($conn, $sqlPembimbing);
      if($resultPembimbing && mysqli_num_rows($resultPembimbing) > 0){
        $rowPembimbing = mysqli_fetch_assoc($resultPembimbing);
        $hashPassPembimbing = $rowPembimbing["password"];
      }
      else {
        $hashPassPembimbing = null;
      }

      // Pengecekan di tabel siswa
      $sqlSiswa = "SELECT * FROM siswa WHERE username = '$username'";
      $resultSiswa = mysqli_query($conn, $sqlSiswa);
      if($resultSiswa && mysqli_num_rows($resultSiswa) > 0){
        $rowSiswa = mysqli_fetch_assoc($resultSiswa);
        $hashPassSiswa = $rowSiswa["password"];
      }
      else {
        $hashPassSiswa = null;
      }

      if (password_verify($pass, $hashPassSiswa)) {
        $_SESSION["login_id"] = $rowSiswa["id"];
        header('location: views/dashboard/index_dashboard.php');
        $_SESSION["sesi"] = true;
        $_SESSION["user"] = "siswa";
      } 
      elseif (password_verify($pass, $hashPassPembimbing)) {
        $_SESSION["login_id"] = $rowPembimbing["id"];
        
        //cek jika status diTolak atau Mendaftar
        $statusUser = $rowPembimbing["status"];
        if($statusUser == "tolak" || $statusUser == "mendaftar"){
          header('location: status.php');
          $_SESSION["sesi"] = false;
          $_SESSION["user"] = "pembimbing";
        }
        else{
          header('location: views/dashboard/index_dashboard.php');
          $_SESSION["sesi"] = true;
          $_SESSION["user"] = "pembimbing";
        }
      }
      elseif (password_verify($pass, $hashPassAdmin)) {
        $_SESSION["login_id"] = $rowAdmin["id"];
        header('location: views/dashboard/index_dashboard.php');
        $_SESSION["sesi"] = true;
        $_SESSION["user"] = "admin";
      } 
      else {
        $_SESSION["error"] = "Username atau Password salah!";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>STMIK PKL | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="resaurces/plugins/fontawesome-free/css/all.min.css"/>
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="resaurces/plugins/icheck-bootstrap/icheck-bootstrap.min.css"/>
    <!-- Theme style -->
    <link rel="stylesheet" href="resaurces/dist/css/adminlte.min.css" />
    <!-- Toastr -->
    <link rel="stylesheet" href="resaurces/plugins/toastr/toastr.min.css">
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="index.php">
          <b>STMIK Bandung</b>
          <br>
          <img src="resaurces/dist/img/LogoNormal.png" alt="Logo" style="height: 50px; width: auto; margin-right: 10px;">
        </a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in</p>

          <form action="" method="post">
            <div class="input-group mb-3">
              <input name="username" type="text" class="form-control" placeholder="Username" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input
                name="pass"
                type="password"
                class="form-control"
                placeholder="Password"
              />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
              <!-- /.col -->
              <div class="row justify-content-center">
                <div class="col-6">
                  <button name="submit" type="submit" class="btn btn-primary btn-block">
                    Sign In
                  </button>
                </div>
              </div>
              <!-- /.col -->
              <!-- /.col -->
              <br>
              <div class="row">
                <div class="col-8">
                  <span>Kembali ke <a href="index.php">Home Page</a></span>
                </div>
              </div>
              <!-- /.col -->
            </div>
          </form>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="resaurces/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="resaurces/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="resaurces/dist/js/adminlte.min.js"></script>
    <!-- Toastr -->
    <script src="resaurces/plugins/toastr/toastr.min.js"></script>

    <!-- tampilan error -->
    <?php if(isset($_SESSION["error"]) && !empty($_SESSION["error"])): ?>
    <script>toastr.error('<?= $_SESSION["error"] ?>')</script>
    <?php 
    unset($_SESSION["error"]);
    endif; ?>
  </body>
</html>

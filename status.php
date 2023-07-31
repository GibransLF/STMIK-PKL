<?php
  require "database.php";
  
  session_start();
  if($_SESSION["login_id"] == ""){
    header("location: index.php");
  }
  
  $idLog = $_SESSION["login_id"];

  $queryPem = "SELECT nama, status FROM pembimbing WHERE id = '$idLog';";
  $resultPem = mysqli_query($conn, $queryPem);
  $rowPem = mysqli_fetch_assoc($resultPem);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>STMIK PKL | Status</title>

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
          <h1 class="login-box-msg">Status anda 
            <b class="
              <?php 
              if($rowPem["status"] == "tolak"){
                echo "text-danger";
              } 
              elseif($rowPem["status"] == "mendaftar"){
                echo "text-success";
              }
              ?>">
              "<?= $rowPem["status"]; ?>"
            </b>
          </h1>
          <div class="row">
            <div class="text-center">
              <p>
                <?php 
                  if($rowPem["status"] == "tolak"){
                    echo "Maaf, formulir/berkas yang Anda kirimkan ditolak karena beberapa alasan tertentu.";
                  } 
                  elseif($rowPem["status"] == "mendaftar"){
                    echo "akun anda masih berstatus mendaftar!, tunggu beberapa saat untuk menunggu admin cek formulir anda dan coba kembali di lain waktu.";
                  }
                  ?>
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <span>Kembali ke <a href="logout.php">Home Page</a></span>
            </div>
          </div>
          
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

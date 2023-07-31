<?php
session_start();
  require "database.php";
  
  //ambil dari input form
  if(isset($_POST["submit"])){
    // Validasi File PDF
  if (isset($_FILES["upload"]) && $_FILES["upload"]["error"] === UPLOAD_ERR_OK) {
    $fileType = strtolower(pathinfo($_FILES["upload"]["name"], PATHINFO_EXTENSION));
    $fileSize = $_FILES["upload"]["size"];

    // Validasi tipe file (harus PDF)
    if ($fileType !== "pdf") {
      $_SESSION["error"] = "File yang diupload harus berupa PDF.";
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      exit;
    }

    // Validasi ukuran file (maksimum 1 MB)
    $maxFileSize = 1 * 1024 * 1024; // 1 MB dalam bytes
    if ($fileSize > $maxFileSize) {
      $_SESSION["error"] = "Ukuran file terlalu besar. Maksimum 1 MB.";
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      exit;
    }

    // Mengganti nama file dengan timestamp + uniqid + .pdf
    $newFileName = date("dmY") . uniqid() . ".pdf";
    $targetDir = "upload/";
    $targetFile = $targetDir . $newFileName;

    // Pindahkan file yang diupload ke folder uploads dengan nama yang baru
    if (!move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFile)) {
      $_SESSION["error"] = "Terjadi kesalahan saat mengupload file.";
      exit;
    }
    } else {
      $_SESSION["error"] = "Harap pilih file PDF yang akan diupload.";
      exit;
    }
  
    $ni         = $_POST["ni"];
    $nama       = $_POST["nama"];
    $sekolah    = $_POST["sekolah"];
    $alamat     = $_POST["alamat"];
    $kontak     = $_POST["kontak"];
    $upload     = $newFileName;
    $username   = $_POST["username"];
    $pass       = $_POST["pass"];
    $status     = "mendaftar";

    
    if ( empty($ni) || empty($nama) || empty($sekolah) || empty($alamat) || empty($kontak) || empty($username) || empty($pass)) {
      // Jika ada input yang kosong, tampilkan pesan error
      $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
      // Jika semua input terisi, lanjutkan proses

      require "views/template/cekUser.php";

      if ($cekNiPembimbing > 0 || $cekNiAdmin > 0 || $cekNiSiswa > 0) {
        $_SESSION["error"] = "Nomor Induk telah digunakan!";
      } elseif (mysqli_num_rows($resultUserP) > 0 || mysqli_num_rows($resultUserA) > 0 || mysqli_num_rows($resultUserS) > 0) {
        $_SESSION["error"] = "Username telah digunakan!";
      } else {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $insert = "INSERT INTO pembimbing VALUES (NULL, '$ni', '$nama', '$sekolah', '$alamat', '$kontak', '$upload', '$username', '$pass', '$status', NULL, NULL)";
        mysqli_query($conn, $insert);
        
        $_SESSION["success"] = "Registrasi berhasil!";
      }
    }
  }
    ?>  

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>STMIK PKL | Register</title>

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
          <p class="login-box-msg">Daftar Pembimbing Sekolah</p>

          <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="upload">Kirimkan Surat permohonan PKL</label>
            <input type="file" class="form-control-file" name="upload" id="upload">
            <label for="upload">tipe .pdf max 1MB.</label>
          </div>
            <!-- end upload -->

            <!-- Pembimbing -->
            <!-- nomor induk -->
            <div class="input-group mb-3">
              <input name="ni" type="number" class="form-control" placeholder="Nomor Induk" autocomplete="off"/>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-id-card"></span>
                </div>
              </div>
            </div>
            <!-- nama -->
            <div class="input-group mb-3">
              <input name="nama" type="text" class="form-control" placeholder="nama" autocomplete="off"/>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <!-- alamat -->
            <div class="input-group mb-3">
              <input name="alamat" type="text" class="form-control" placeholder="alamat" autocomplete="off"/>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-map-pin"></span>
                </div>
              </div>
            </div>
            <!-- kontak -->
            <div class="input-group mb-3">
              <input name="kontak" type="number" class="form-control" placeholder="kontak / WA" autocomplete="off"/>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-phone"></span>
                </div>
              </div>
            </div>
            <!-- sekolah -->
            <div class="input-group mb-3">
              <input name="sekolah" type="text" class="form-control" placeholder="Dari sekolah" autocomplete="off"/>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-school"></span>
                </div>
              </div>
            </div>
            <!-- username -->
            <div class="input-group mb-3">
              <input name="username" type="text" class="form-control" placeholder="username" autocomplete="off"/>
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <!-- password -->
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
                    Daftar
                  </button>
                </div>
              </div>
              <!-- /.col -->
              <!-- /.col -->
              <br>
              <div class="row">
                <div class="col-8">
                  <span>pergi ke <a href="login.php"><u>login</u></a></span>
                  <br>
                  <span>Kembali ke <a href="index.php"><u>Home Page</u></a></span>
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

    <!-- tampilan success -->
    <?php if(isset($_SESSION["success"]) && !empty($_SESSION["success"])): ?>
    <script>toastr.success('<?= $_SESSION["success"] ?>')</script>
    <?php 
    unset($_SESSION["success"]);
    endif; ?>
  </body>
</html>

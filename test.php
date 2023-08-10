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
    
} 
else {
    $_SESSION["error"] = "Harap pilih file PDF yang akan diupload.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }
  
    $ni             = $_POST["ni"];
    $nama           = $_POST["nama"];
    $sekolah        = $_POST["sekolah"];
    $alamat         = $_POST["alamat"];
    $kontak         = $_POST["kontak"];
    $upload         = $newFileName;
    $username       = $_POST["username"];
    $pass           = $_POST["pass"];
    $status         = "mendaftar";
    $npsn           = $_POST["npsn"];
    $alamat_sekolah = $_POST["alamat_sekolah"];
    $nomor_sekolah  = $_POST["nomor_sekolah"];
    $email_sekolah  = $_POST["email_sekolah"];

    
    if ( empty($ni) || empty($nama) || empty($sekolah) || empty($alamat) || empty($kontak) || empty($username) || empty($pass) || empty($npsn) || empty($alamat_sekolah) || empty($nomor_sekolah) || empty($email_sekolah) ) {
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
        // Pindahkan file yang diupload ke folder uploads dengan nama yang baru
        if (!move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFile)) {
        $_SESSION["error"] = "Terjadi kesalahan saat mengupload file.";
        exit;
        }

        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $insert = "INSERT INTO pembimbing VALUES (NULL, '$ni', '$nama', '$sekolah', '$alamat', '$kontak', '$upload', '$username', '$pass', '$status', '$npsn', '$alamat_sekolah', '$nomor_sekolah', '$email_sekolah', NULL, NULL)";
        mysqli_query($conn, $insert);
        
        $_SESSION["success"] = "Registrasi berhasil!";
      }
    }
  }
?>  

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>STMIK PKL | Register</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"/>
    <link rel="stylesheet" href="resaurces/plugins/fontawesome-free/css/all.min.css"/>
    <link rel="stylesheet" href="resaurces/plugins/icheck-bootstrap/icheck-bootstrap.min.css"/>
    <link rel="stylesheet" href="resaurces/dist/css/adminlte.min.css" />
    <link rel="stylesheet" href="resaurces/plugins/toastr/toastr.min.css">
    <style>
        .login-box {
            width: 80%;
            margin: 0 auto;
        }
        .login-card-body {
            padding: 40px;
        }
        .line {
            border-left: 6px solid green;
            height: 100px;
            margin: auto;
        }
    </style>
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
        <div class="card">
            <div class="card-body login-card-body">
                <h4 class="login-box-msg">Formulir pendaftaran</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- kiri  -->
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="login-box-msg">Isi data Sekolah</p>
                            <!-- nama sekolah  -->
                            <div class="input-group mb-3">
                                <input name="sekolah" type="text" class="form-control" placeholder="Nama Sekolah" autocomplete="off"/>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-school"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- NPSN  -->
                            <div class="input-group mb-3">
                                <input name="npsn" type="number" class="form-control" placeholder="Nomor Pokok Sekolah Nasiional" autocomplete="off"/>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-passport"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Alamat Sekolah  -->
                            <div class="input-group mb-3">
                                <input name="alamat_sekolah" type="text" class="form-control" placeholder="Alamat Sekolah" autocomplete="off"/>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-marked-alt"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- Nomor telepon sekolah  -->
                            <div class="input-group mb-3">
                                <input name="nomor_sekolah" type="number" class="form-control" placeholder="Nomor Telepon Sekolah" autocomplete="off"/>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-headset"></span>
                                    </div>
                                </div>
                            </div>
                            <!-- email sekolah  -->
                            <div class="input-group mb-3">
                                <input name="email_sekolah" type="email" class="form-control" placeholder="Alamat Email Sekolah" autocomplete="off"/>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-at"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- kanan  -->
                        <div class="col-sm-6">
                            <p class="login-box-msg">Isi data Guru Pembimbing</p>
                            <div class="input-group mb-3">
                                <input name="ni" type="number" class="form-control" placeholder="Nomor Induk" autocomplete="off"/>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input name="nama" type="text" class="form-control" placeholder="Nama" autocomplete="off"/>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input name="alamat" type="text" class="form-control" placeholder="Alamat" autocomplete="off"/>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-map-pin"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input name="kontak" type="number" class="form-control" placeholder="Kontak / WA" autocomplete="off"/>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input name="username" type="text" class="form-control" placeholder="Username" autocomplete="off"/>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input name="pass" type="password" class="form-control" placeholder="Password"/>
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="upload">Kirimkan Surat permohonan PKL</label>
                        <input type="file" class="form-control-file" name="upload" id="upload">
                        <label for="upload">Tipe .pdf maksimal 1MB.</label>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-6">
                            <button name="submit" type="submit" class="btn btn-primary btn-block">
                                Daftar
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <span>Pergi ke <a href="login.php"><u>login</u></a></span>
                            <br>
                            <span>Kembali ke <a href="index.php"><u>Home Page</u></a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="resaurces/plugins/jquery/jquery.min.js"></script>
    <script src="resaurces/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="resaurces/dist/js/adminlte.min.js"></script>
    <script src="resaurces/plugins/toastr/toastr.min.js"></script>

    <!-- tampilan error -->
    <?php if(isset($_SESSION["error"]) && !empty($_SESSION["error"])): ?>
    <script>toastr.error('<?= $_SESSION["error"] ?>')</script>
    <?php 
    unset($_SESSION["error"]);
    endif; ?>

    <!-- tampilan success -->
    <?php if(isset($_SESSION["success"]) && !empty($_SESSION["success"])): ?>
    <script>
        toastr.success('<?= $_SESSION["success"] ?>');
        window.location.href = "login.php";
    </script>
    <?php 
    endif; ?>
</body>
</html>

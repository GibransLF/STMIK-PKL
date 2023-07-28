<?php
// untuk mencari nama user

// untuk tabel 
$query = "SELECT * FROM pembimbing";
$data = mysqli_query($conn, $query);
if(isset($_POST["tambah"])){

    if(tambahPembimbing($_POST)){
        $_SESSION['success'] = "Data berhasil di Tambahkan!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

//edit data
if(isset($_POST["ubah"])){
    if(editPembimbing($_POST)){
        $_SESSION['success'] = "Data berhasil di Ubah!";
    }
    exit(header('Location: ' . $_SERVER['HTTP_REFERER']));
}

//edit data password
if(isset($_POST["ubahPass"])){
    if(editPembimbingPass($_POST)){
        $_SESSION['success'] = "Password berhasil di ubah!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

//previous status
if(isset($_POST["previous"])){
    if(pStatus($_POST)){
        $_SESSION['success'] = "Data berhasil di Proses!";
    }
    else{
        $_SESSION['error'] = "Data gagal di Proses!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

//next status
if(isset($_POST["next"])){
    if(nStatus($_POST)){
        $_SESSION['success'] = "Data berhasil di Proses!";
    }
    else{
        $_SESSION['error'] = "Data gagal di Proses!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// delete data 
if(isset($_POST["hapus"])){
    if(deletePembimbing($_POST)){
        $_SESSION['success'] = "Data berhasil di Hapus!";
    }
    else{
        $_SESSION['error'] = "Data gagal di Hapus!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

function tambahPembimbing($data){
    global $conn;

    //ambil dari input form
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
        $targetDir = "../../upload/";
        $targetFile = $targetDir . $newFileName;

        // Pindahkan file yang diupload ke folder uploads dengan nama yang baru
        if (!move_uploaded_file($_FILES["upload"]["tmp_name"], $targetFile)) {
            $_SESSION["error"] = "Terjadi kesalahan saat mengupload file.";
            exit;
        }
    }
    else {
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
        require "../template/cekUser.php";
        if ($cekNiPembimbing > 0 || $cekNiAdmin > 0 || $cekNiSiswa > 0) {
            $_SESSION["error"] = "Nomor Induk telah digunakan!";
        } 
        elseif (mysqli_num_rows($resultUserP) > 0 || mysqli_num_rows($resultUserA) > 0 || mysqli_num_rows($resultUserS) > 0) {
            $_SESSION["error"] = "Username telah digunakan!";
        } 
        else {
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $insert = "INSERT INTO pembimbing VALUES (NULL, '$ni', '$nama', '$sekolah', '$alamat', '$kontak', '$upload', '$username', '$pass', '$status', NULL, NULL)";
            mysqli_query($conn, $insert);

            $_SESSION["success"] = "Registrasi berhasil!";
        }
    }
}

function editPembimbing($data){
    global $conn;

    $id         = $data["id"];
    $ni         = $data["ni"];
    $nama       = $data["nama"];
    $sekolah    = $data["sekolah"];
    $alamat     = $data["alamat"];
    $kontak     = $data["kontak"];
    $username   = $data["username"];

    if (empty($ni) || empty($nama) || empty($alamat) || empty($kontak) || empty($username) || empty($sekolah)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
        // Jika semua input terisi, lanjutkan proses
        require "../template/cekUserEdit.php";

        if ($cekNiPembimbing > 0 || $cekNiAdmin > 0 || $cekNiSiswa > 0) {
            $_SESSION["error"] = "Nomor Induk telah digunakan!";
        } 
        elseif (mysqli_num_rows($resultUserP) > 0 || mysqli_num_rows($resultUserA) > 0 || mysqli_num_rows($resultUserS) > 0) {
            $_SESSION["error"] = "Username telah digunakan!";
        } 
        else {
            $query = "UPDATE pembimbing SET ni = '$ni', nama = '$nama', sekolah = '$sekolah', alamat = '$alamat', kontak = '$kontak', username = '$username' WHERE id = '$id'";

            $_SESSION["success"] = "Ubah Data berhasil!";
            return mysqli_query($conn, $query);
        }
    }
}

function pStatus($data){
    global $conn;

    $id     = $data["id"];
    $status = $data["status"];

    if($status == "mendaftar"){
        $status = "tolak";
    }
    elseif($status == "proses"){
        $status = "mendaftar";
    }
    elseif($status == "selesai"){
        $status = "proses"; 
    }

    $query = "UPDATE pembimbing SET status = '$status' WHERE id = '$id'";

    return mysqli_query($conn, $query);
}

function nStatus($data){
    global $conn;

    $id     = $data["id"];
    $status = $data["status"];

    if($status == "tolak"){
        $status = "mendaftar";
    }
    elseif($status == "mendaftar"){
        $status = "proses";
    }
    elseif($status == "proses"){
        $status = "selesai"; 
    }

    $query = "UPDATE pembimbing SET status = '$status' WHERE id = '$id'";

    return mysqli_query($conn, $query);
}

function editPembimbingPass($data){
    global $conn;

    $id     = $data["id"];
    $pass   = $data["pass"];

    if (empty($pass)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "isi password jika ingin di ubah!";
    } 
    else {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $query = "UPDATE pembimbing SET password = '$pass' WHERE id = '$id'";

        $_SESSION["success"] = "Ubah password berhasil!";
        return mysqli_query($conn, $query);
    }
}

function deletePembimbing($data){
    global $conn;

    $id = $data["id"];

    $query = "DELETE FROM pembimbing WHERE id='$id'";

    return mysqli_query($conn, $query);
}

?>
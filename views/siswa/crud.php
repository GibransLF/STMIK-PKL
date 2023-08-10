<?php
// untuk tabel 
// $user di ambil dari template cekUser dipanggil di index 
if($user == "admin"){
    //untuk tabel
    $id = $_SESSION["login_id"];

    $query = "SELECT siswa.*, pembimbing.sekolah, pembimbing.nama AS nama_pembimbing FROM siswa LEFT JOIN pembimbing ON siswa.pembimbing_id = pembimbing.id";
    $data = mysqli_query($conn, $query);

    // add siswa 
    $queryPembimbing = "SELECT id, nama, sekolah FROM pembimbing";
    $pembimbing = mysqli_query($conn, $queryPembimbing);

    $getRole = "SELECT role FROM admin WHERE id = '$id'";
    $resultRole = mysqli_query($conn, $getRole);
    $rule = mysqli_fetch_assoc($resultRole);
}
elseif($user == "pembimbing"){
    //untuk tabel
    $idPembimbing = $_SESSION["login_id"];

    $query = "SELECT siswa.*, pembimbing.sekolah
    FROM siswa
    LEFT JOIN pembimbing ON siswa.pembimbing_id = pembimbing.id
    WHERE pembimbing_id = $idPembimbing;";
    $data = mysqli_query($conn, $query);

    $rule["role"] = "2";
}
// insert data
if(isset($_POST["tambah"])){

    if(tambahSiswa($_POST)){
        $_SESSION['success'] = "Data berhasil di Tambahkan!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

//edit data
if(isset($_POST["ubah"])){
    if(editSiswa($_POST)){
        $_SESSION['success'] = "Data berhasil di Ubah!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

//edit data password
if(isset($_POST["ubahPass"])){
    if(editSiswaPass($_POST)){
        $_SESSION['success'] = "Password berhasil di ubah!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

//previous status
if(isset($_POST["previous"])){
    if(pStatusSiswa($_POST)){
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
    if(nStatusSiswa($_POST)){
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
    if(deleteSiswa($_POST)){
        $_SESSION['success'] = "Data berhasil di Hapus!";
    }
    else{
        $_SESSION['error'] = "Data terpakai oleh data lain! tidak bisa di hapus!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

function tambahSiswa($data){
    global $conn, $user;

    if($user == "admin"){
        $pembimbing_id = $data["pembimbing_id"];
    }
    else{
        global $idPembimbing;
        $pembimbing_id = $idPembimbing;
    }

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
        $newFileName = "S" . date("dmY") . uniqid() . ".pdf";
        $targetDir = "../../upload/";
        $targetFile = $targetDir . $newFileName;
        
    } 
    else {
        $_SESSION["error"] = "Harap pilih file PDF yang akan diupload.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $ni         = $data["ni"];
    $nama       = $data["nama"];
    $jurusan    = $data["jurusan"];
    $kelas      = $data["kelas"];
    $alamat     = $data["alamat"];
    $kontak     = $data["kontak"];
    $upload     = $newFileName;
    $username   = $data["username"];
    $pass       = $data["pass"];
    $status     = "mendaftar";

    if (empty($ni) || empty($nama) || empty($jurusan) || empty($kelas) || empty($alamat) || empty($kontak) || empty($username) || empty($pass)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
        // Jika semua input terisi, lanjutkan proses
        require "../template/cekUser.php";

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
            $query = "INSERT INTO siswa (ni, nama, jurusan, kelas, pembimbing_id, alamat, kontak, upload, username, password, status) VALUES ('$ni', '$nama', '$jurusan', '$kelas', '$pembimbing_id', '$alamat', '$kontak', '$upload', '$username', '$pass', '$status')";
            return mysqli_query($conn, $query);
        }
    }
}

function editSiswa($data){
    global $conn;

    $id             = $data["id"];
    $ni             = $data["ni"];
    $nama           = $data["nama"];
    $jurusan    = $data["jurusan"];
    $kelas      = $data["kelas"];
    $pembimbingId   = $data["pembimbing_id"];
    $alamat         = $data["alamat"];
    $kontak         = $data["kontak"];
    $username       = $data["username"];

    if (empty($ni) || empty($nama) || empty($jurusan) || empty($kelas) || empty($alamat) || empty($kontak) || empty($username) || empty($pembimbingId)) {
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
            $query = "UPDATE siswa SET ni = '$ni', nama = '$nama', jurusan ='$jurusan', kelas = '$kelas', pembimbing_id = '$pembimbingId', alamat = '$alamat', kontak = '$kontak', username = '$username' WHERE id = '$id'";

            $_SESSION["success"] = "Ubah Data berhasil!";
            return mysqli_query($conn, $query);
        }
    }
}

function pStatusSiswa($data){
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

    $query = "UPDATE siswa SET status = '$status' WHERE id = '$id'";

    return mysqli_query($conn, $query);
}

function nStatusSiswa($data){
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

    $query = "UPDATE siswa SET status = '$status' WHERE id = '$id'";

    return mysqli_query($conn, $query);
}

function editSiswaPass($data){
    global $conn;

    $id     = $data["id"];
    $pass   = $data["pass"];

    if (empty($pass)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "isi password jika ingin di ubah!";
    } 
    else {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $query = "UPDATE siswa SET password = '$pass' WHERE id = '$id'";

        $_SESSION["success"] = "Ubah password berhasil!";
        return mysqli_query($conn, $query);
    }
}

function deleteSiswa($data){
    global $conn;

    $id = $data["id"];

    $query = "DELETE FROM siswa WHERE id='$id'";

    try {
        return mysqli_query($conn, $query);
    } catch (mysqli_sql_exception $e) {
        $_SESSION["error"] = "Data terpakai oleh data lain! tidak bisa di hapus";
    }
}

?>
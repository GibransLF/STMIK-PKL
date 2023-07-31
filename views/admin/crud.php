<?php
// untuk mencari nama user
$id = $_SESSION["login_id"];
$queryRule = "SELECT role FROM admin WHERE id = '$id';";
$rule = mysqli_query($conn, $queryRule);
$rule = mysqli_fetch_assoc($rule);
// untuk tabel 
$query = "SELECT * FROM admin";
$data = mysqli_query($conn, $query);

// insert data
if(isset($_POST["tambah"])){

    if(tambahAdmin($_POST)){
        $_SESSION['success'] = "Data berhasil di Tambahkan!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

//edit data
if(isset($_POST["ubah"])){
    if(editAdmin($_POST)){
        $_SESSION['success'] = "Data berhasil di Ubah!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

//edit data password
if(isset($_POST["ubahPass"])){
if(editAdminPass($_POST)){
    $_SESSION['success'] = "Password berhasil di ubah!";
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
}

// delete data 
if(isset($_POST["hapus"])){
    if(deleteAdmin($_POST)){
        $_SESSION['success'] = "Data berhasil di Hapus!";
    }
    else{
        $_SESSION['error'] = "Data terpakai oleh data lain! tidak bisa di hapus!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
function tambahAdmin($data){
    global $conn;

    $ni         = $data["ni"];
    $nama       = $data["nama"];
    $alamat     = $data["alamat"];
    $kontak     = $data["kontak"];
    $username   = $data["username"];
    $pass       = $data["pass"];
    $role       = $data["role"];

    if (empty($ni) || empty($nama) || empty($alamat) || empty($kontak) || empty($username) || empty($pass) || empty($role)) {
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
            $pass = password_hash($pass, PASSWORD_DEFAULT);
            $query = "INSERT INTO admin (ni, nama, alamat, kontak, username, password, role) VALUES ('$ni', '$nama', '$alamat', '$kontak', '$username', '$pass', '$role')";
            $_SESSION["success"] = "Registrasi berhasil!";
            return mysqli_query($conn, $query);
        }
    }
}

function editAdmin($data){
    global $conn;

    $id         = $data["id"];
    $ni         = $data["ni"];
    $nama       = $data["nama"];
    $alamat     = $data["alamat"];
    $kontak     = $data["kontak"];
    $username   = $data["username"];
    $role       = $data["role"];

    if (empty($ni) || empty($nama) || empty($alamat) || empty($kontak) || empty($username) || empty($role)) {
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
            $query = "UPDATE admin SET ni = '$ni', nama = '$nama', alamat = '$alamat', kontak = '$kontak', username = '$username', role = '$role' WHERE id = '$id'";

            $_SESSION["success"] = "Ubah Data berhasil!";
            return mysqli_query($conn, $query);
        }
    }
}

function editAdminPass($data){
    global $conn;

    $id     = $data["id"];
    $pass   = $data["pass"];

    if (empty($pass)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "isi password jika ingin di ubah!";
    } 
    else {
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $query = "UPDATE admin SET password = '$pass' WHERE id = '$id'";

        $_SESSION["success"] = "Ubah password berhasil!";
        return mysqli_query($conn, $query);
    }
}

function deleteAdmin($data){
    global $conn;

    $id = $data["id"];

    $query = "DELETE FROM admin WHERE id='$id'";

    try {;
        return mysqli_query($conn, $query);
    } catch (mysqli_sql_exception $e) {
        $_SESSION["error"] = "Data terpakai oleh data lain! tidak bisa di hapus";
    }

}
?>
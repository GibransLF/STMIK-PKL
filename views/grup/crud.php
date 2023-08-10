<?php
// untuk mencari nama user

// untuk tabel 
$queryTabel = "SELECT grup.*,
                admin.id AS id_admin,
                admin.ni AS ni_admin,
                admin.nama AS nama_admin,
                pembimbing.id AS id_pembimbing,
                pembimbing.ni AS ni_pembimbing,
                pembimbing.nama AS nama_pembimbing,
                pembimbing.sekolah
                FROM grup 
                LEFT JOIN admin ON grup.admin_id = admin.id
                LEFT JOIN pembimbing ON grup.pembimbing_id = pembimbing.id
                WHERE grup.status = '1';";
$data       = mysqli_query($conn, $queryTabel);

//pilih admin 
$queryA     = "SELECT id, ni, nama FROM admin";
$admin = mysqli_query($conn, $queryA);

//pilih pembimbing 
$queryP     = "SELECT id, ni, nama, sekolah FROM pembimbing WHERE status = 'proses'";
$pembimbing = mysqli_query($conn, $queryP);

// insert data
if(isset($_POST["tambah"])){

    if(tambahgrup($_POST)){
        $_SESSION['success'] = "Data berhasil di Tambahkan!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

//edit data
if(isset($_POST["ubah"])){
    if(editgrup($_POST)){
        $_SESSION['success'] = "Data berhasil di Ubah!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// delete data 
if(isset($_POST["hapus"])){
    if(deletegrup($_POST)){
        $_SESSION['success'] = "Data berhasil di Hapus!";
    }
    else{
        $_SESSION['error'] = "Data gagal di Hapus!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

function tambahgrup($data){
    global $conn;

    $nama       = $data["namaGrup"];
    $admin_id   = $data["admin_id"];
    $pembimbing_id = $data["pembimbing_id"];
    $status           = "1";
    
    if (empty($nama) || empty($admin_id) || empty($pembimbing_id)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
            $query = "INSERT INTO grup (nama, admin_id, pembimbing_id, status) VALUES ('$nama', '$admin_id', '$pembimbing_id', '$status');";
            return mysqli_query($conn, $query);
    }
}

function editgrup($data){
    global $conn;

    $id             = $data["id"];
    $nama           = $data["namaGrup"];
    $admin_id   = $data["admin_id"];
    $pembimbing_id = $data["pembimbing_id"];

    if (empty($nama)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
            $query = "UPDATE grup SET nama = '$nama', admin_id = '$admin_id', pembimbing_id = '$pembimbing_id' WHERE id = '$id'";
            return mysqli_query($conn, $query);
    }
}

function deletegrup($data){
    global $conn;

    $id = $data["id"];

    
    try {
        $query = "DELETE FROM grup WHERE id='$id'";
        mysqli_query($conn, $query);
    } catch (mysqli_sql_exception $e) {
        $query = "UPDATE grup SET status = 0 WHERE id='$id'";
        mysqli_query($conn, $query);
    }
    $_SESSION["success"] = "Data berhasil dihapus!";

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
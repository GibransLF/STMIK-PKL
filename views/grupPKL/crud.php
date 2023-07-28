<?php
// untuk mencari nama user

// untuk tabel 
if($user == "admin"){
    $query  = "SELECT grouppkl.*,
            admin.ni AS ni_admin,
            admin.nama AS nama_admin,
            pembimbing.ni AS ni_pembimbing,
            pembimbing.nama AS nama_pembimbing,
            pembimbing.sekolah,
            siswa.ni AS ni_siswa,
            siswa.nama AS nama_siswa,
            siswa.status,
            pembimbing_siswa.sekolah AS sekolah_siswa
            FROM grouppkl
            LEFT JOIN admin ON grouppkl.admin_id = admin.id
            LEFT JOIN pembimbing ON grouppkl.pembimbing_id = pembimbing.id
            LEFT JOIN siswa ON grouppkl.siswa_id = siswa.id
            LEFT JOIN pembimbing AS pembimbing_siswa ON siswa.pembimbing_id = pembimbing_siswa.id
            WHERE grouppkl.status = '1';";
}
else{
    if($user == "pembimbing"){
        $queryGetSekolah = "SELECT sekolah FROM pembimbing";
        $getSekolah = mysqli_query($conn, $queryGetSekolah);
        $getSekolahs = mysqli_fetch_assoc($getSekolah);
        $sekolah = $getSekolahs["sekolah"];
    }
    elseif($user == "siswa"){
        $queryGetSekolah = "SELECT pembimbing.sekolah FROM siswa
                            LEFT JOIN pembimbing ON siswa.pembimbing_id = pembimbing.id";
        $getSekolah = mysqli_query($conn, $queryGetSekolah);
        $getSekolahs = mysqli_fetch_assoc($getSekolah);
        $sekolah = $getSekolahs["sekolah"];
    }

    $query  = "SELECT grouppkl.*,
            admin.ni AS ni_admin,
            admin.nama AS nama_admin,
            pembimbing.ni AS ni_pembimbing,
            pembimbing.nama AS nama_pembimbing,
            pembimbing.sekolah,
            siswa.ni AS ni_siswa,
            siswa.nama AS nama_siswa,
            siswa.status,
            pembimbing_siswa.sekolah AS sekolah_siswa
            FROM grouppkl
            LEFT JOIN admin ON grouppkl.admin_id = admin.id
            LEFT JOIN pembimbing ON grouppkl.pembimbing_id = pembimbing.id
            LEFT JOIN siswa ON grouppkl.siswa_id = siswa.id
            LEFT JOIN pembimbing AS pembimbing_siswa ON siswa.pembimbing_id = pembimbing_siswa.id
            WHERE grouppkl.status = '1'
            AND pembimbing.sekolah = '$sekolah';";
}
$data = mysqli_query($conn, $query);

//pilih siswa 
$queryS     = "SELECT siswa.id, siswa.ni, siswa.nama, pembimbing.sekolah
FROM siswa
LEFT JOIN pembimbing ON siswa.pembimbing_id = pembimbing.id
WHERE siswa.status = 'proses'
AND siswa.id NOT IN (SELECT siswa_id FROM grouppkl);";
$siswa = mysqli_query($conn, $queryS);

//pilih admin 
$queryA     = "SELECT id, ni, nama FROM admin";
$admin = mysqli_query($conn, $queryA);

//pilih pembimbing 
$queryP     = "SELECT id, ni, nama, sekolah FROM pembimbing WHERE status = 'proses'";
$pembimbing = mysqli_query($conn, $queryP);

// insert data
if(isset($_POST["tambah"])){

    if(tambahgrupPKL($_POST)){
        $_SESSION['success'] = "Data berhasil di Tambahkan!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

//edit data
if(isset($_POST["ubah"])){
    if(editgrupPKL($_POST)){
        $_SESSION['success'] = "Data berhasil di Ubah!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// delete data 
if(isset($_POST["hapus"])){
    if(deletegrupPKL($_POST)){
        $_SESSION['success'] = "Data berhasil di Hapus!";
    }
    else{
        $_SESSION['error'] = "Data gagal di Hapus!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

function tambahgrupPKL($data){
    global $conn;

    $namaGrup       = $_POST["namaGrup"];
    $siswa_id       = $_POST["siswa_id"];
    $admin_id       = $_POST["admin_id"];
    $pembimbing_id  = $_POST["pembimbing_id"];
    $nama           = $namaGrup . ' ' . date("Y");
    $status           = "1";
    
    if (empty($nama) || empty($siswa_id) || empty($admin_id) || empty($pembimbing_id)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
            $query = "INSERT INTO grouppkl (siswa_id, admin_id, pembimbing_id, nama, status) VALUES ('$siswa_id', '$admin_id', '$pembimbing_id', '$nama' , '$status');";
            return mysqli_query($conn, $query);
    }
}

function editgrupPKL($data){
    global $conn;

    $id             = $_POST["id"];
    $siswa_id       = $_POST["siswa_id"];
    $admin_id       = $_POST["admin_id"];
    $pembimbing_id  = $_POST["pembimbing_id"];
    $nama           = $_POST["namaGrup"];
    

    if (empty($siswa_id) || empty($admin_id) || empty($pembimbing_id) || empty($nama)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
            $query = "UPDATE grouppkl SET siswa_id = '$siswa_id', admin_id = '$admin_id', pembimbing_id = '$pembimbing_id', nama = '$nama' WHERE id = '$id'";
            return mysqli_query($conn, $query);
    }
}

function editTgl($data){
    global $conn;

    $id         = $_POST["id"];
    $jadwal_id  = $_POST["jadwal_id"];

    if ( empty($jadwal_id)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    }
    else {
            $query = "UPDATE grouppkl SET jadwal_id = '$jadwal_id' WHERE id = '$id'";
            return mysqli_query($conn, $query);
    }
}

function deletegrupPKL($data){
    global $conn;

    $id = $data["id"];

    $query = "DELETE FROM grouppkl WHERE id='$id'";

    try {
        mysqli_query($conn, $query);
    } catch (mysqli_sql_exception $e) {
        $query = "UPDATE grouppkl SET status = 0 WHERE id='$id'";
        mysqli_query($conn, $query);
    }
    $_SESSION["success"] = "Data berhasil dihapus!";

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
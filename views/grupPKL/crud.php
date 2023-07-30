<?php
if(isset($_GET["id"])){
    $grup_id = $_GET["id"];
}
else{
    header("location: ../grup/index_grup.php");
}

//untuk tampilan
$queryShow = "SELECT grup.*, 
            admin.nama AS nama_admin,
            pembimbing.nama AS nama_pembimbing 
            FROM grup 
            LEFT JOIN admin ON grup.admin_id = admin.id
            LEFT JOIN pembimbing ON grup.pembimbing_id = pembimbing.id
            WHERE grup.id = '$grup_id';";
$resultShow = mysqli_query($conn, $queryShow);
$grupShow = mysqli_fetch_assoc($resultShow);

// untuk tabel 
$query  = "SELECT grouppkl.*,
        siswa.ni AS ni_siswa,
        siswa.nama AS nama_siswa,
        pembimbing_siswa.sekolah AS sekolah_siswa
        FROM grouppkl
        LEFT JOIN siswa ON grouppkl.siswa_id = siswa.id
        LEFT JOIN pembimbing AS pembimbing_siswa ON siswa.pembimbing_id = pembimbing_siswa.id
        WHERE grouppkl.status = '1'
        AND grouppkl.grup_id = '$grup_id';";
$data = mysqli_query($conn, $query);

//pilih siswa 
$queryS     = "SELECT siswa.id, siswa.ni, siswa.nama, pembimbing.sekolah
FROM siswa
LEFT JOIN pembimbing ON siswa.pembimbing_id = pembimbing.id
WHERE siswa.status = 'proses'
AND siswa.id NOT IN (SELECT siswa_id FROM grouppkl);";
$siswa = mysqli_query($conn, $queryS);

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
    global $conn, $grup_id;

    $siswa_id       = $data["siswa_id"];

    $status           = "1";
    
    if ( empty($siswa_id)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
            $query = "INSERT INTO grouppkl (siswa_id, grup_id, status) VALUES ('$siswa_id', '$grup_id' , '$status');";
            return mysqli_query($conn, $query);
    }
}

function editgrupPKL($data){
    global $conn;

    $id             = $data["id"];
    $siswa_id       = $data["siswa_id"];
    $admin_id       = $data["admin_id"];
    $pembimbing_id  = $data["pembimbing_id"];
    $nama           = $data["namaGrup"];
    

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
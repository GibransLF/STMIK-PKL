<?php
// cari user
$id = $_SESSION["login_id"];
// untuk tabel 
if($user != "siswa"){
    $query = "SELECT laporan.*,
            siswa.id AS id_siswa, 
            siswa.nama AS nama_siswa
            FROM laporan
            LEFT JOIN siswa ON laporan.siswa_id = siswa.id";
    $data = mysqli_query($conn, $query);
}
else{
    //untuk tabel
    $query = "SELECT * FROM laporan WHERE siswa_id = '$id'";
    $data = mysqli_query($conn, $query);
}


// insert data
if(isset($_POST["tambah"])){

    if(tambahLaporan($_POST)){
        $_SESSION['success'] = "Data berhasil di Tambahkan!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

//edit data
if(isset($_POST["ubah"])){
    if(editLaporan($_POST)){
        $_SESSION['success'] = "Data berhasil di Ubah!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// delete data 
if(isset($_POST["hapus"])){
    if(deleteLaporan($_POST)){
        $_SESSION['success'] = "Data berhasil di Hapus!";
    }
    else{
        $_SESSION['error'] = "Data gagal di Hapus!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

function tambahLaporan($data){
    global $conn;

    $tgl        = $data["tgl"];
    $kegiatan   = $data["kegiatan"];

    $siswa_id   = $data["siswa_id"];

    $queryGetGroup  = "SELECT id FROM grouppkl WHERE siswa_id = '$siswa_id';";
    $resultGetGroup = mysqli_query($conn, $queryGetGroup);
    if(mysqli_num_rows($resultGetGroup) > 0){
        $rowGetGroup    = mysqli_fetch_assoc($resultGetGroup);
        $grouppkl_id    = $rowGetGroup["id"];
    }
    else{
        $_SESSION["error"] = "anda belum terdaftar di grup PKL";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }

    
    if (empty($tgl) || empty($kegiatan)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
        $query = "INSERT INTO laporan (tgl, kegiatan, siswa_id, grouppkl_id) VALUES ('$tgl', '$kegiatan', '$siswa_id', '$grouppkl_id');";
        return mysqli_query($conn, $query);
    }
}

function editLaporan($data){
    global $conn;

    $id         = $data["id"];
    $tgl        = $data["tgl"];
    $kegiatan   = $data["kegiatan"];

    if (empty($tgl) || empty($kegiatan)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
        $query = "UPDATE laporan SET tgl = '$tgl', kegiatan = '$kegiatan' WHERE id = '$id'";
        return mysqli_query($conn, $query);
    }
}

function deleteLaporan($data){
    global $conn;

    $id = $data["id"];

    $query = "DELETE FROM laporan WHERE id='$id'";

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
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
    $query = "SELECT * FROM laporan where id = '$id'";
    $data = mysqli_query($conn, $query);

    // pilih tanggal untuk tambah
    $queryTgl = "SELECT * FROM jadwal WHERE siswa_id = '$id'";
    $resultTgl      = mysqli_query($conn, $queryTgl);
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
    $jadwal_id   = $data["jadwal_id"];

    
    if (empty($tgl) || empty($kegiatan) || empty($jadwal_id)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
        $queryGroupId = "SELECT id FROM grouppkl WHERE jadwal_id = '$jadwal_id';";
        $getGroupId = mysqli_query($conn, $queryGroupId);
        $dataGroupId = mysqli_fetch_assoc($getGroupId);
        $grouppkl_id =  $dataGroupId["id"];
        
        $query = "INSERT INTO laporan (tgl, kegiatan, siswa_id, grouppkl_id) VALUES ('$tgl', '$kegiatan', '$siswa_id', '$grouppkl_id');";
        return mysqli_query($conn, $query);
    }
}

function editLaporan($data){
    global $conn;

    $id         = $data["id"];
    $nama       = $data["nama"];
    $alamat     = $data["alamat"];

    if (empty($nama) || empty($alamat)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
        $query = "UPDATE sekolah SET nama = '$nama', alamat = '$alamat' WHERE id = '$id'";
        return mysqli_query($conn, $query);
    }
}

function deleteLaporan($data){
    global $conn;

    $id = $data["id"];

    $query = "DELETE FROM sekolah WHERE id='$id'";

    try {
        mysqli_query($conn, $query);
        $_SESSION["success"] = "Data berhasil dihapus!";
    } catch (mysqli_sql_exception $e) {
        $_SESSION["error"] = "Pembimbing sekolah berada di sekolah ini!";
    }

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
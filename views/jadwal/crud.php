<?php
// untuk mencari nama user

// untuk tabel 
$query      = "SELECT jadwal.*, siswa.ni AS ni_siswa, siswa.nama AS nama_siswa, sekolah_siswa.nama AS 
            sekolah_siswa FROM jadwal 
            LEFT JOIN siswa ON jadwal.siswa_id = siswa.id
            LEFT JOIN sekolah AS sekolah_siswa ON siswa.sekolah_id = sekolah_siswa.id;";
$data = mysqli_query($conn, $query);

//pilih siswa 
$jadwal     = "SELECT siswa.id, siswa.ni, siswa.nama, sekolah.nama AS nama_sekolah FROM siswa
            LEFT JOIN sekolah ON siswa.sekolah_id = sekolah.id WHERE status = 'proses'";
$result = mysqli_query($conn, $jadwal);

// insert data
if(isset($_POST["tambah"])){

    if(tambahJadwal($_POST)){
        $_SESSION['success'] = "Data berhasil di Tambahkan!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

//edit data
if(isset($_POST["ubah"])){
    if(editJadwal($_POST)){
        $_SESSION['success'] = "Data berhasil di Ubah!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

// delete data 
if(isset($_POST["hapus"])){
    if(deleteJadwal($_POST)){
        $_SESSION['success'] = "Data berhasil di Hapus!";
    }
    else{
        $_SESSION['error'] = "Data gagal di Hapus!";
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

function tambahJadwal($data){
    global $conn;

    $siswa_id   = $_POST["siswa_id"];
    $tglMulai   = $_POST["tglMulai"];
    $tglAkhir   = $_POST["tglAkhir"];

    if (empty($siswa_id) || empty($tglMulai) || empty($tglAkhir)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
        if ($tglAkhir <= $tglMulai) {
            $_SESSION["error"] = "Tanggal akhir harus lebih besar dari tanggal mulai.";
        }
        else{
            $query = "INSERT INTO jadwal (siswa_id, tgl_mulai, tgl_akhir) VALUES ('$siswa_id', '$tglMulai', '$tglAkhir')";
            return mysqli_query($conn, $query);
        }
    }
}

function editJadwal($data){
    global $conn;

    $id         = $_POST["id"];
    $siswa_id = $_POST["siswa_id"];
    $tglMulai   = $_POST["tglMulai"];
    $tglAkhir   = $_POST["tglAkhir"];

    if ( empty($siswa_id) || empty($tglMulai) || empty($tglAkhir)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
        if ($tglAkhir <= $tglMulai) {
            $_SESSION["error"] = "Tanggal akhir harus lebih besar dari tanggal mulai.";
        }
        else{
            $query = "UPDATE jadwal SET siswa_id = '$siswa_id', tgl_mulai = '$tglMulai', tgl_akhir = '$tglAkhir' WHERE id = '$id'";
            return mysqli_query($conn, $query);
        }
    }
}

function deleteJadwal($data){
    global $conn;

    $id = $data["id"];

    $query = "DELETE FROM jadwal WHERE id='$id'";

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
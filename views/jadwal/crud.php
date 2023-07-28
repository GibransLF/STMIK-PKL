<?php
// untuk mencari nama user

// untuk tabel 
$query      = "SELECT jadwal.*, grouppkl.nama FROM jadwal
                LEFT JOIN grouppkl ON jadwal.grouppkl_id = grouppkl.id;";
$data = mysqli_query($conn, $query);

//cari group 
$queryGrup = "SELECT nama, id FROM grouppkl
                WHERE nama NOT IN (
                    SELECT grouppkl.nama
                    FROM jadwal
                    LEFT JOIN grouppkl ON jadwal.grouppkl_id = grouppkl.id
                )
                GROUP BY nama;";
$grup = mysqli_query($conn, $queryGrup);

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

    $grouppkl_id    = $_POST["grouppkl_id"];
    $tglMulai       = $_POST["tglMulai"];
    $tglAkhir       = $_POST["tglAkhir"];

    if (empty($grouppkl_id) || empty($tglMulai) || empty($tglAkhir)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
        if ($tglAkhir <= $tglMulai) {
            $_SESSION["error"] = "Tanggal akhir harus lebih besar dari tanggal mulai.";
        }
        else{
            $query = "INSERT INTO jadwal (grouppkl_id, tgl_mulai, tgl_akhir) VALUES ('$grouppkl_id', '$tglMulai', '$tglAkhir')";
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
<?php
// untuk tabel 
$query= "SELECT jadwal.*, grup.nama FROM jadwal
        LEFT JOIN grup ON jadwal.grup_id = grup.id
        WHERE jadwal.status = '1';";
$data = mysqli_query($conn, $query);

//tambah grup
$queryGrup  = "SELECT id, nama
            FROM grup
            WHERE status = '1'
            AND grup.id NOT IN (SELECT grup_id FROM jadwal);";
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

    $grup_id        = $data["grup_id"];
    $tglMulai       = $data["tglMulai"];
    $tglAkhir       = $data["tglAkhir"];
    $status         = "1";

    if (empty($grup_id) || empty($tglMulai) || empty($tglAkhir)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
        if ($tglAkhir <= $tglMulai) {
            $_SESSION["error"] = "Tanggal akhir harus lebih besar dari tanggal mulai.";
        }
        else{
            $query = "INSERT INTO jadwal (grup_id, tgl_mulai, tgl_akhir, status) VALUES ('$grup_id', '$tglMulai', '$tglAkhir', '$status')";
            return mysqli_query($conn, $query);
        }
    }
}

function editJadwal($data){
    global $conn;

    $id         = $data["id"];

    $tglMulai   = $data["tglMulai"];
    $tglAkhir   = $data["tglAkhir"];

    if ( empty($tglMulai) || empty($tglAkhir)) {
        // Jika ada input yang kosong, tampilkan pesan error
        $_SESSION["error"] = "Harap lengkapi semua input!";
    } 
    else {
        if ($tglAkhir <= $tglMulai) {
            $_SESSION["error"] = "Tanggal akhir harus lebih besar dari tanggal mulai.";
        }
        else{
            $query = "UPDATE jadwal SET tgl_mulai = '$tglMulai', tgl_akhir = '$tglAkhir' WHERE id = '$id'";
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
    } catch (mysqli_sql_exception $e) {
        $query = "UPDATE jadwal SET status = 0 WHERE id='$id'";
        mysqli_query($conn, $query);
    }
    $_SESSION["success"] = "Data berhasil dihapus!";

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
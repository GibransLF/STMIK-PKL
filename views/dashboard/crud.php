<?php
// admin
if($user == "admin"){

    $queryAdmin = "SELECT 
    (SELECT COUNT(role) FROM admin WHERE role = 1) AS jumlah_pembimbingSTMIK,
    (SELECT COUNT(role) FROM admin WHERE role = 2) AS jumlah_admin
    FROM admin";
    $resultAdmin = mysqli_query($conn, $queryAdmin);

    if ($rowAdmin = mysqli_fetch_assoc($resultAdmin)) {
        $jumlah_admin = $rowAdmin["jumlah_admin"];
        $jumlah_pembimbingSTMIK = $rowAdmin["jumlah_pembimbingSTMIK"];
    }
    else{
        $jumlah_admin = 0;
        $jumlah_pembimbingSTMIK = 0;
    }   

    // pembimbing
    $queryPembimbing = "SELECT 
    (SELECT COUNT(status) FROM pembimbing) AS jumlahPembimbing,
    (SELECT COUNT(status) FROM pembimbing WHERE status = 'tolak') AS pembimbingTolak,
    (SELECT COUNT(status) FROM pembimbing WHERE status = 'mendaftar') AS pembimbingMendaftar,
    (SELECT COUNT(status) FROM pembimbing WHERE status = 'proses') AS pembimbingProses,
    (SELECT COUNT(status) FROM pembimbing WHERE status = 'selesai') AS pembimbingSelesai
    FROM pembimbing";
    $resultPembimbing = mysqli_query($conn, $queryPembimbing);

    if ($rowPembimbing = mysqli_fetch_assoc($resultPembimbing)) {
        $jumlahPembimbing = $rowPembimbing["jumlahPembimbing"];
        $pembimbingTolak = $rowPembimbing["pembimbingTolak"];
        $pembimbingMendaftar = $rowPembimbing["pembimbingMendaftar"];
        $pembimbingProses = $rowPembimbing["pembimbingProses"];
        $pembimbingSelesai = $rowPembimbing["pembimbingSelesai"];
    }
    else{
        $jumlahPembimbing = 0;
        $pembimbingTolak = 0;
        $pembimbingMendaftar = 0;
        $pembimbingProses = 0;
        $pembimbingSelesai = 0;
    }

    // siswa
    $querySiswa = "SELECT 
    (SELECT COUNT(status) FROM siswa) AS jumlahSiswa,
    (SELECT COUNT(status) FROM siswa WHERE status = 'proses') AS siswaProses,
    (SELECT COUNT(status) FROM siswa WHERE status = 'selesai') AS siswaSelesai
    FROM siswa";
    $resultSiswa = mysqli_query($conn, $querySiswa);

    
    if ($rowSiswa = mysqli_fetch_assoc($resultSiswa)) {
        $jumlahSiswa = $rowSiswa["jumlahSiswa"];
        $siswaProses = $rowSiswa["siswaProses"];
        $siswaSelesai = $rowSiswa["siswaSelesai"];
    }else{
        $jumlahSiswa = 0;
        $siswaProses = 0;
        $siswaSelesai = 0;
    }

    // end section 

    //data group
    //pilih siswa yange belum memiliki group 
    $queryGroup     = "SELECT COUNT(id)  AS jumlahGroup 
                    FROM siswa
                    WHERE status = 'proses'
                    AND id NOT IN (
                        SELECT siswa_id FROM grouppkl
                    );";
    $resultGroup = mysqli_query($conn, $queryGroup);

    if ($rowGroup = mysqli_fetch_assoc($resultGroup)) {
        $jumlahGroup = $rowGroup["jumlahGroup"];
    }

    //jadwal
    //cari group yang belum memiliki jadwal
    $queryJadwal = "SELECT COUNT(id) AS jumlahJadwal
                FROM grup
                WHERE nama NOT IN (
                    SELECT grup.nama
                    FROM jadwal
                    LEFT JOIN grup ON jadwal.grup_id = grup.id
                )
                AND status = '1';";

    $resultjadwal = mysqli_query($conn, $queryJadwal);

    if ($rowJadwal = mysqli_fetch_assoc($resultjadwal)) {
        $jumlahJadwal = $rowJadwal["jumlahJadwal"];
    }
}
elseif($user == "pembimbing"){
    $pembimbing_id = $_SESSION["login_id"];

    // mencari daftar siswa 
    $querySiswa = "SELECT count(id) AS jumlahSiswa FROM siswa WHERE pembimbing_id = '$pembimbing_id';";
    $resultSiswa = mysqli_query($conn, $querySiswa);

    if ($rowSiswa = mysqli_fetch_assoc($resultSiswa)) {
        $jumlahSiswa = $rowSiswa["jumlahSiswa"];
    }
    
    // mencari siswa yang belum mengisi laporan hari ini 
    $now = date("Ymd");
    
    $queryLaporan = "SELECT count(laporan.tgl) AS unNowLaporan
                    FROM laporan 
                    LEFT JOIN siswa ON laporan.siswa_id = siswa.id
                    WHERE siswa.pembimbing_id = '$pembimbing_id'
                    AND laporan.tgl = '$now';";
    $resultLaporan = mysqli_query($conn, $queryLaporan);

    if ($rowLaporan = mysqli_fetch_assoc($resultLaporan)) {
        $jumlahLaporan = $rowLaporan["unNowLaporan"];
    }

    //mencari jadwal grup
    $queryJadwal = 
        "SELECT jadwal.tgl_mulai AS tglM, 
        jadwal.tgl_akhir AS tglA,
        grup.nama AS namaGrup
        FROM jadwal
        JOIN grup ON jadwal.grup_id = grup.id
        WHERE grup.pembimbing_id = '$pembimbing_id';"
    ;
    $resultjadwal = mysqli_query($conn, $queryJadwal);

    if ($rowJadwal = mysqli_fetch_assoc($resultjadwal)) {
        $tglM = $rowJadwal["tglM"];
        $tglA = $rowJadwal["tglA"];
        $namaGrup = $rowJadwal["namaGrup"];
    }
}
elseif($user == "siswa"){
    $siswa_id = $_SESSION["login_id"];

    $now = date("Ymd");
    
    $queryLaporan = "SELECT count(tgl) AS unNowLaporan
                    FROM laporan 
                    WHERE siswa_id = '$siswa_id'
                    AND tgl = '$now';";
    $resultLaporan = mysqli_query($conn, $queryLaporan);

    if ($rowLaporan = mysqli_fetch_assoc($resultLaporan)) {
        $jumlahLaporan = $rowLaporan["unNowLaporan"];
    }

    //mencari grup
    $grupId = 0;
    $queryGrup = 
        "SELECT grup.nama, grup.id FROM grouppkl
        LEFT JOIN grup ON grouppkl.grup_id = grup.id
        WHERE grouppkl.siswa_id = '$siswa_id';";
    ;
    $resultGrup = mysqli_query($conn, $queryGrup);

    if ($rowGrup = mysqli_fetch_assoc($resultGrup)) {
        $grupId = $rowGrup["id"];
        $nama = $rowGrup["nama"];
    }

    //mencari jadwal grup
    $queryJadwal = 
        "SELECT tgl_mulai AS tglM, 
        tgl_akhir AS tglA
        FROM jadwal
        WHERE grup_id = '$grupId';"
    ;
    $resultjadwal = mysqli_query($conn, $queryJadwal);

    if ($rowJadwal = mysqli_fetch_assoc($resultjadwal)) {
        $tglM = $rowJadwal["tglM"];
        $tglA = $rowJadwal["tglA"];
    }
}

?>
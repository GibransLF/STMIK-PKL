<?php
// Cek NI
    //dari pembimbing
    $sqlNiPembimbing = "SELECT * FROM pembimbing WHERE ni = '$ni'";
    $resultNiPembimbing = mysqli_query($conn, $sqlNiPembimbing);
    $cekNiPembimbing = mysqli_num_rows($resultNiPembimbing);

    //dari admin
    $sqlNiAdmin = "SELECT * FROM admin WHERE ni = '$ni'";
    $resultNiAdmin = mysqli_query($conn, $sqlNiAdmin);
    $cekNiAdmin = mysqli_num_rows($resultNiAdmin);

    //dari siswa
    $sqlNiSiswa = "SELECT * FROM siswa WHERE ni = '$ni'";
    $resultNiSiswa = mysqli_query($conn, $sqlNiSiswa);
    $cekNiSiswa = mysqli_num_rows($resultNiSiswa);

    //cek user
    //dari pembimbing
    $sqlP = "SELECT * FROM pembimbing where username = '$username'";
    $resultUserP = mysqli_query($conn, $sqlP);
    
    //dari admin
    $sqlA = "SELECT * FROM admin where username = '$username'";
    $resultUserA = mysqli_query($conn, $sqlA);
    
    //dari siswa
    $sqlS = "SELECT * FROM siswa where username = '$username'";
    $resultUserS = mysqli_query($conn, $sqlS);
?>
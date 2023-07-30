<?php
require "database.php";
//membbuat tabel admin

//cek tabel admin
$query = "SHOW TABLES LIKE 'admin'";
$result = mysqli_query($conn, $query);
$tableExists = mysqli_num_rows($result) > 0;

//membuat tabel admin
if(!$tableExists){
    $sql = "CREATE TABLE admin (
        id INT PRIMARY KEY AUTO_INCREMENT,
        ni VARCHAR(255),
        nama VARCHAR(255),
        alamat VARCHAR(255),
        kontak VARCHAR(255),
        username VARCHAR(255),
        password VARCHAR(255),
        role INT(1),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if (mysqli_query($conn, $sql)) {
    echo "Table admin berhasil di buat <br>";
    } else {
    echo "Error membuat tabel admin <br>" . mysqli_error($conn);
    }
}

$query = "SELECT * FROM admin WHERE username = 'admin'";
$result = mysqli_query($conn, $query);
$userExists = mysqli_num_rows($result) > 0;

if(!$userExists){
    $pass = "admin";
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $admin = "INSERT INTO admin VALUES (NULL, '3222039', 'admin', '-', '0846', 'admin', '$pass', '2', NULL, NULL);";
    if (mysqli_query($conn, $admin)) {
    echo "Akun admin berhasil di buat dengan username: admin, pass: admin <br>";
    } else {
    echo "Error membuat tabel admin <br>" . mysqli_error($conn);
    }
}


//end admin

//membbuat tabel pembimbing

//cek tabel pembimbing
$query = "SHOW TABLES LIKE 'pembimbing'";
$result = mysqli_query($conn, $query);
$tableExists = mysqli_num_rows($result) > 0;

//membuat tabel pembimbing
if(!$tableExists){
    $sql = "CREATE TABLE pembimbing (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        ni VARCHAR(255),
        nama VARCHAR(255),
        sekolah VARCHAR(255),
        alamat VARCHAR(255),
        kontak VARCHAR(255),
        upload VARCHAR(255),
        username VARCHAR(255),
        password VARCHAR(255),
        status VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if (mysqli_query($conn, $sql)) {
    echo "Table pembimbing berhasil di buat <br>";
    } else {
    echo "Error membuat tabel pembimbing <br>" . mysqli_error($conn);
    }
}
//end pembimbing


//membuat tabel siswa

//cek tabel siswa
$query = "SHOW TABLES LIKE 'siswa'";
$result = mysqli_query($conn, $query);
$tableExists = mysqli_num_rows($result) > 0;

//membuat tabel siswa
if(!$tableExists){
    $sql = "CREATE TABLE siswa (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        ni VARCHAR(255),
        nama VARCHAR(255),
        pembimbing_id INT(11),
        alamat VARCHAR(255),
        kontak VARCHAR(255),
        username VARCHAR(255),
        password VARCHAR(255),
        status VARCHAR(255),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        
        FOREIGN KEY (pembimbing_id) REFERENCES pembimbing(id)
    )";

if (mysqli_query($conn, $sql)) {
    echo "Table siswa berhasil di buat <br>";
} else {
    echo "Error membuat tabel siswa <br>" . mysqli_error($conn);
}
}
//end siswa

//membuat tabel group

//cek tabel group
$query = "SHOW TABLES LIKE 'grup'";
$result = mysqli_query($conn, $query);
$tableExists = mysqli_num_rows($result) > 0;

//membuat tabel group
if(!$tableExists){
    $sql = "CREATE TABLE grup (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(255),
    admin_id INT(11),
    pembimbing_id INT(11),
    status VARCHAR(1),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (admin_id) REFERENCES admin(id),
    FOREIGN KEY (pembimbing_id) REFERENCES pembimbing(id)
    )";

if (mysqli_query($conn, $sql)) {
    echo "Table grup berhasil di buat <br>";
} else {
    echo "Error membuat tabel grup <br>" . mysqli_error($conn);
}
}
//end group

//membuat tabel grouppkl

//cek tabel grouppkl
$query = "SHOW TABLES LIKE 'grouppkl'";
$result = mysqli_query($conn, $query);
$tableExists = mysqli_num_rows($result) > 0;

//membuat tabel grouppkl
if(!$tableExists){
    $sql = "CREATE TABLE grouppkl (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    siswa_id INT(11),
    grup_id INT(11),
    status VARCHAR(1),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (siswa_id) REFERENCES siswa(id),
    FOREIGN KEY (grup_id) REFERENCES grup(id)
    )";

if (mysqli_query($conn, $sql)) {
    echo "Table grouppkl berhasil di buat <br>";
} else {
    echo "Error membuat tabel grouppkl <br>" . mysqli_error($conn);
}
}
// end grouppkl

//membuat tabel jadwal

//cek tabel jadwal
$query = "SHOW TABLES LIKE 'jadwal'";
$result = mysqli_query($conn, $query);
$tableExists = mysqli_num_rows($result) > 0;

//membuat tabel jadwal
if(!$tableExists){
    $sql = "CREATE TABLE jadwal (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    tgl_mulai DATE,
    tgl_akhir DATE,
    grup_id INT(11),
    status VARCHAR(1),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (grup_id) REFERENCES grup(id)
    )";

if (mysqli_query($conn, $sql)) {
    echo "Table jadwal berhasil di buat <br>";
} else {
    echo "Error membuat tabel jadwal <br>" . mysqli_error($conn);
}
}
//end jadwal

//membuat tabel laporan

//cek tabel laporan
$query = "SHOW TABLES LIKE 'laporan'";
$result = mysqli_query($conn, $query);
$tableExists = mysqli_num_rows($result) > 0;

//membuat tabel laporan
if(!$tableExists){
    $sql = "CREATE TABLE laporan (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    tgl DATE,
    kegiatan VARCHAR(255),
    siswa_id INT(11),
    grouppkl_id INT(11),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (siswa_id) REFERENCES siswa(id),
    FOREIGN KEY (grouppkl_id) REFERENCES grouppkl(id)
    )";

    if (mysqli_query($conn, $sql)) {
    echo "Table laporan berhasil di buat <br>";
    } else {
    echo "Error membuat tabel laporan <br>" . mysqli_error($conn);
    }
}
// end laporan
echo "<br> selesai <br>";
mysqli_close($conn);

?>
<a href="index.php">pergi ke hmome page</a>
<?php

$id = $_SESSION["login_id"];
$user = $_SESSION["user"];

if($user == "siswa"){
    $query = "SELECT * FROM siswa where id = '$id'";
    $result = mysqli_query($conn, $query);
    $login = mysqli_fetch_assoc($result);
    $logUser = $login["nama"];
    $statusUser = $login["status"];
}
elseif($user == "pembimbing"){
    $query = "SELECT * FROM pembimbing where id = '$id'";
    $result = mysqli_query($conn, $query);
    $login = mysqli_fetch_assoc($result);
    $logUser = $login["nama"];
    $statusUser = $login["status"];
}
elseif($user == "admin"){
    $query = "SELECT * FROM admin where id = '$id'";
    $result = mysqli_query($conn, $query);
    $login = mysqli_fetch_assoc($result);
    $logUser = $login["nama"];
    $role = $login["role"];

    $statusUser = "proses";
}
else{
    header("location : ../../index.php");
}
?>
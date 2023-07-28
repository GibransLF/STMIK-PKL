<?php
session_start();

// remove all session variables
$_SESSION[""];

session_unset();

// destroy the session
session_destroy();

header("location: index.php");
?>
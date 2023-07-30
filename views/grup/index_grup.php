<?php
require "../../database.php";
session_start();
require "../template/getUser.php";
if($_SESSION["sesi"] == false){
  header("location: ../../index.php");
}

require "crud.php";
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>STMIK PKL | Grup PKL</title>

  <?php require '../template/css.php' ?>
</head>
<body class="hold-transition sidebar-mini">
  <?php require '../template/header.php' ?>
  <?php require 'content.php' ?>
  <?php require '../template/sidebar.php' ?>
  <?php require '../template/footer.php' ?>

  <?php require '../template/js.php' ?>

  <script>
  $(function () {

    $("#example1").DataTable({
      "responsive": true, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>

<!-- tampilan error -->
<?php if(isset($_SESSION["error"]) && !empty($_SESSION["error"])): ?>
    <script>toastr.error('<?= $_SESSION["error"] ?>')</script>
    <?php 
    unset($_SESSION["error"]);
    endif; ?>

    <!-- tampilan berhasil -->
    <?php if(isset($_SESSION["success"]) && !empty($_SESSION["success"])): ?>
    <script>toastr.success('<?= $_SESSION["success"] ?>')</script>
    <?php 
    unset($_SESSION["success"]);
    endif; ?>

</body>
</html>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <?php 
    if($user == "admin"){ 
      include "admin.php";
    }
    elseif( $user == "pembimbing" ){
      include "pembimbing.php";
    }
    elseif( $user == "siswa" ){
      include "siswa.php";
    }
  ?>

</div>
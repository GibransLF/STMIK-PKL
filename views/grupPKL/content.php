<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Grup PKL <b><?= $grupShow["nama"] ?></b></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/index_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="../grup/index_grup.php">grup</a></li>
              <li class="breadcrumb-item active"><?= $grupShow["nama"] ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  Pembimbing STMIK: <b><?= $grupShow["nama_admin"] ?></b>
                  <br>
                  Pembimbing Sekolah: <b><?= $grupShow["nama_pembimbing"] ?></b>
                </h3>
                <?php if($user == "admin") :?>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">Tambah</button>
                <?php
                endif;
                include "addModal.php";
                ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <?php if($user == "admin"): ?>
                    <th>Action</th>
                    <?php endif ?>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i = 1;
                  foreach ($data as $row) :   
                  ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $row["nama_siswa"] ?></td>
                      <?php if($user == "admin"): ?>
                        <td>
                          <!-- Tombol Delete -->
                          <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $row["id"]?>"><i class="fas fa-trash"></i></button>
                          <?php include "deleteModal.php" ?>
                        </td>
                      <?php endif ?>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <?php if($user == "admin"): ?>
                    <th>Action</th>
                    <?php endif ?>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
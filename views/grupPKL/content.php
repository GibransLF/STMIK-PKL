<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Grup PKL</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/index_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Grup PKL</li>
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
                <h3 class="card-title">Daftar Grup PKL untuk pembagian kelompok</h3>
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
                    <th>Nama Grup</th>
                    <th>Siswa</th>
                    <th>Pembimbing STMIK</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i = 1;
                  foreach ($data as $row) :   
                  ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td><?= $row["nama"] ?> </td>
                      <td><?= $row["nama_siswa"] ?></td>
                      <td><?= $row["nama_admin"] ?></td>
                      <td class="
                        <?php 
                          if($row["status"] == "proses"){
                            echo "text-warning";
                          } 
                          elseif($row["status"] == "selesai"){
                            echo "text-primary";
                          }
                          else{
                            echo "text-danger";
                          }
                        ?>
                      ">
                        <?= $row["status"] ?>
                      </td>
                      <td>
                        <!-- Tombol detail -->
                        <button class="btn btn-primary" data-toggle="modal" data-target="#detailModal<?= $row["id"] ?>">
                          <i class="fas fa-file"></i>
                        </button>
                        <?php include "detailModal.php" ?>

                        <?php if($user == "admin"): ?>
                          <!-- Tombol Edit -->
                          <button class="btn btn-warning mx-2" data-toggle="modal" data-target="#editModal<?= $row["id"] ?>">
                            <i class="fas fa-edit"></i>
                          </button>
                          <?php include "editModal.php" ?>

                          <?php if ($_SESSION["user"] == "admin"): ?>
                          <!-- Tombol Delete -->
                          <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $row["id"]?>"><i class="fas fa-trash"></i></button>
                          <?php include "deleteModal.php" ?>
                          <?php endif ?>
                        <?php endif ?>
                        
                      </td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                    <th>No</th>
                    <th>Nama Grup</th>
                    <th>Siswa</th>
                    <th>Pembimbing STMIK</th>
                    <th>Status</th>
                    <th>Action</th>
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
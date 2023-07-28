<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Laporan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/index_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Laporan</li>
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
                <?php 
                if($user == "siswa") :
                  echo '<h3 class="card-title">Laporan ' . $logUser . '</h3>';
                  ?>
                  <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">Tambah</button>
                  <?php 
                  include "addModal.php";
                  else :
                    echo '<h3 class="card-title">Laporan</h3>';
                    endif
                    ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <?php 
                      if($user != "siswa") :
                    ?>
                    <th>dibuat pada</th>
                    <th>Nama</th>
                    <?php endif ?>
                    <th>Tanggal</th>
                    <th>Kegiatan</th>
                    <th class="no-print">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i = 1;
                  foreach ($data as $row) :   
                  ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <?php 
                      if($user != "siswa") :
                      ?>
                        <td><?= $row["created_at"] ?></td>
                        <td><?= $row["nama_siswa"] ?></td>
                      <?php endif ?>
                      <td><?= $row["tgl"] ?></td>
                      <td><?= $row["kegiatan"] ?></td>
                      <td>
                        <!-- Tombol Edit -->
                        <button class="btn btn-warning mx-2" data-toggle="modal" data-target="#editModal<?= $row["id"] ?>">
                          <i class="fas fa-edit"></i>
                        </button>
                        <?php include "editModal.php" ?>

                        <!-- Tombol Delete -->
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $row["id"]?>"><i class="fas fa-trash"></i></button>
                        <?php include "deleteModal.php" ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <?php 
                      if($user != "siswa") :
                      ?>
                        <th>dibuat pada</th>
                        <th>Nama</th>
                      <?php endif ?>
                      <th>Tanggal</th>
                      <th>Kegiatan</th>
                      <th class="no-print">Action</th>
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
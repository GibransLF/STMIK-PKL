<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Jadwal Grup</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/index_dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Jadwal Grup</li>
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
                <h3 class="card-title">Daftar Jadwal Grup</h3>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">Tambah</button>
              </div>
              <?php include "addModal.php"; ?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Grup</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
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
                      <td><?= $row["nama"] ?></td>
                      <td><?= $row["tgl_mulai"] ?></td>
                      <td><?= $row["tgl_akhir"] ?></td>
                      <td>
                        <?php if ($_SESSION["user"] == "admin"): ?>
                        <!-- Tombol Edit -->
                        <button class="btn btn-warning mx-2" data-toggle="modal" data-target="#editModal<?= $row["id"] ?>">
                          <i class="fas fa-edit"></i>
                        </button>
                        <?php include "editModal.php" ?>

                        <!-- Tombol Delete -->
                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?= $row["id"]?>"><i class="fas fa-trash"></i></button>
                        <?php include "deleteModal.php" ?>
                        <?php endif ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Nama Grup</th>
                      <th>Tanggal Mulai</th>
                      <th>Tanggal Akhir</th>
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
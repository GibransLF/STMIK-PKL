<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pengguna Admin</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="../dashboard/index_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Pengguna Admin</li>
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
              <h3 class="card-title">Daftar Akun Admin STMIK</h3>
              <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">Tambah</button>
            </div>
            <?php include "addModal.php"; ?>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Induk</th>
                  <th>Nama</th>
                  <th>Role</th>
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
                    <td><?= $row["ni"] ?></td>
                    <td><?= $row["nama"] ?></td>
                    <td><?= ( $row["role"] == "2") ? "Admin" : "Pembimbing STMIK" ; ?> </td>
                    <td>
                      <!-- Tombol detail -->
                      <button class="btn btn-primary" data-toggle="modal" data-target="#detailModal<?= $row["id"] ?>">
                        <i class="fas fa-file"></i>
                      </button>
                      <?php include "detailModal.php" ?>

                      <?php if ($role == "2"): ?>
                      <!-- Tombol Edit -->
                      <button class="btn btn-warning mx-2" data-toggle="modal" data-target="#editModal<?= $row["id"] ?>">
                        <i class="fas fa-edit"></i>
                      </button>
                      <?php include "editModal.php" ?>

                      <!-- Tombol Delete -->
                      <?= ($row["id"] == $_SESSION["login_id"]) ? "" : '<button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal'.$row["id"].'"><i class="fas fa-trash"></i></button>' ?>
                      <?php include "deleteModal.php" ?>

                      <?php endif ?>
                    </td>
                  </tr>
                <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>No Induk</th>
                    <th>Nama</th>
                    <th>Role</th>
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
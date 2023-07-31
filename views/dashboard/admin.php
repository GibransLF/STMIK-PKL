<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- admin -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                <!-- all admin -->
                <h3><?= $jumlah_admin ?> </h3>
                <p>Jumlah admin</p>
                <!-- pembimbing STMIK -->
                <h3><?= $jumlah_pembimbingSTMIK ?> </h3>
                <p>Jumlah Pembimbing STMIK</p>
                </div>
                <div class="icon">
                <i class="fas fa-chess-rook"></i>
                </div>
                <a href="../admin/index_admin.php" class="small-box-footer">Info selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- end admin -->
        <!-- pembimbing -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <!-- jumlah pembimbing -->
                    <h3><?= $jumlahPembimbing ?> </h3>
                    <p>Jumlah Pembimbing Sekolah</p>
                    <!-- baris pertama -->
                    <div class="row">
                        <!-- pembimbing Tolak -->
                        <div class="col-md-6">
                            <p><b><?= $pembimbingTolak ?></b> Status diTolak</p>
                        </div>
                        <!-- pembimbing Mendaftar -->
                        <div class="col-md-6">
                            <p><b><?= $pembimbingMendaftar ?></b> Status Mendaftar</p>
                        </div>
                    </div>
                    <!-- baris kedua -->
                    <div class="row">
                        <!-- pembimbing proses -->
                        <div class="col-md-6">
                            <p><b><?= $pembimbingProses ?></b> Status Proses</p>
                        </div>
                        <!-- pembimbing selesai -->
                        <div class="col-md-6">
                            <p><b><?= $pembimbingSelesai ?></b> Status Selesai</p>
                        </div>
                    </div>
                </div>
                <div class="icon">
                    <i class="fas fa-chess-bishop"></i>
                </div>
                <a href="../pembimbing/index_pembimbing.php" class="small-box-footer">Info selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- end pembimbing -->

        <!-- siswa -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <!-- jumlah pembimbing -->
                    <h3><?= $jumlahSiswa ?> </h3>
                    <p>Jumlah Siswa</p>
                    <!-- baris pertama -->
                    <div class="row">
                        <!-- pembimbing Tolak -->
                        <div class="col-md-6">
                            <h3><?= $siswaProses ?></h3>
                            <p>Status proses</p>
                        </div>
                        <!-- pembimbing Mendaftar -->
                        <div class="col-md-6">
                            <h3><?= $siswaSelesai ?> </h3>
                            <p>Status selesai</p>
                        </div>
                    </div>
                </div>
                <div class="icon">
                    <i class="fas fa-chess-pawn"></i>
                </div>
                <a href="../siswa/index_siswa.php" class="small-box-footer">Info selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- end pembimbing -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <!-- info group -->
                    <h3><?= $jumlahGroup ?> </h3>
                    <p>Siswa belum mempunyai grup</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="../grup/index_grup.php" class="small-box-footer">Info selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- jadwal -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <!-- info jadwal -->
                    <h3><?= $jumlahJadwal ?> </h3>
                    <p>Grup yang belum memiliki jadwal</p>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <a href="../jadwal/index_jadwal.php" class="small-box-footer">Info selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->
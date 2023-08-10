<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- admin -->
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
                <div class="inner">
                    <!-- all admin -->
                    <h3><?= $jumlahSiswa ?> </h3>
                    <p>Jumlah siswa yang terdaftar</p>
                </div>
                <div class="icon">
                <i class="fas fa-chess-pawn"></i>
                </div>
                <a href="../siswa/index_siswa.php" class="small-box-footer">Info selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- end admin -->
        <!-- laporan siswa -->
        <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
                <div class="inner">
                    <!-- all admin -->
                    <h3><?= $jumlahLaporan ?> </h3>
                    <p>Siswa yang sudah mengisi laporan hari ini</p>
                </div>
                <div class="icon">
                <i class="fas fa-flag"></i>
                </div>
                <a href="../laporan/index_laporan.php" class="small-box-footer">Info selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- laporan siswa -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<?php if(mysqli_num_rows($resultjadwal) > 0) :?>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Anda sudah memiliki grup dan jadwal PKL</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
        <div class="card-body">
            Nama grup anda adalah <a href="../grup/index_grup.php"><b><?= $namaGrup ?></b></a>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <?php if(mysqli_num_rows($resultjadwal) > 0) :?>
            <a href="../jadwal/index_jadwal.php">
                <?= $tglM . " ~ " . $tglA ?>
            </a>
            <?php endif ?>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->
<?php endif; ?>
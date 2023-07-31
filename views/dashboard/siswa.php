<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <!-- admin -->
        <div class="col-lg-12 col-6">
            <!-- small box -->
            
            <div class="small-box bg-<?= ($jumlahLaporan > 0) ? 'success' :'danger' ; ?>">
                <div class="inner">
                    <!-- all admin -->
                    <?php if($jumlahLaporan > 0): ?>
                        <h3>Anda sudah mengisi Laporan</h3>
                        <p>Pastikan keterangan yang anda masukan sudah jelas</p>
                    <?php else: ?>
                        <h3>Isi Laporan Sekarang</h3>
                        <p>Anda belum mengisi Laporan untuk hari sekarang</p>
                    <?php endif; ?>
                </div>
                <div class="icon">
                <i class="fas fa-clipboard<?= ($jumlahLaporan == 1) ? '-check' :'' ; ?>"></i>
                </div>
                <a href="../laporan/index_laporan.php" class="small-box-footer">Info selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- end admin -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

<?php if(mysqli_num_rows($resultGrup) > 0) :?>
<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Anda sudah emiliki grup dan jadwal PKL</h3>

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
            Nama grup anda adalah <a href="../grup/index_grup.php"><b><?= $nama ?></b></a>
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
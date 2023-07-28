<div class="modal fade" id="detailModal<?= $row["id"] ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
          <!-- pilih siswa -->
          <div class="form-group row">
            <label for="siswa_id" class="col-sm-2 col-form-label">Nama Siswa:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <select name="siswa_id" id="siswa_id" class="form-control" disabled>
                  <option> <?= $row["ni_siswa"] . ' - ' . $row["nama_siswa"] . ' - ' . $row["sekolah_siswa"] ?> </option>
                </select>
              </div>
            </div>
          </div>
          <!-- pilih admin -->
          <div class="form-group row">
            <label for="admin_id" class="col-sm-2 col-form-label">Nama Pembimbing STMIK:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <select name="admin_id" id="admin_id" class="form-control" disabled>
                  <option> <?= $row["ni_admin"] . ' - ' . $row["nama_admin"] ?> </option>
                </select>
              </div>
            </div>
          </div>
          <!-- pilih pembimbing -->
          <div class="form-group row">
            <label for="pembimbing_id" class="col-sm-2 col-form-label">Nama Pembimbing:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <select name="pembimbing_id" id="pembimbing_id" class="form-control" disabled>
                  <option> <?= $row["ni_pembimbing"] . ' - ' . $row["nama_pembimbing"]  . ' - ' . $row["sekolah_pembimbing"] ?> </option>
                </select>
              </div>
            </div>
          </div>
          <!-- pilih tempat -->
          <div class="form-group row">
            <label for="tempat_id" class="col-sm-2 col-form-label">Nama Tempat:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <select name="tempat_id" id="tempat_id" class="form-control" disabled>
                  <option> <?= $row["nama_tempat"] ?> </option>
                </select>
              </div>
            </div>
          </div>
          <!-- tgl -->
          <div class="form-group row">
            <label for="tgl_mulai" class="col-sm-2 col-form-label">Tanggal:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <input name="tgl_mulai" id="tgl_mulai" type="date" class="form-control" value="<?= $row["tgl_mulai"] ?>" disabled/>
                <p>&nbsp; ~ &nbsp;</p>
                <input name="tgl_akhir" id="tgl_akhir" type="date" class="form-control" value="<?= $row["tgl_akhir"] ?>" disabled/>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
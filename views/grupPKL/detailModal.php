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
            <label class="col-sm-2 col-form-label">NI, Nama Siswa:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <select name="siswa_id" class="form-control" disabled>
                  <option> <?= $row["ni_siswa"] . ' - ' . $row["nama_siswa"] . ' - ' . $row["sekolah_siswa"] ?> </option>
                </select>
              </div>
            </div>
          </div>
          <!-- pilih admin -->
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">NI, Nama Pembimbing STMIK:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <select name="admin_id" class="form-control" disabled>
                  <option> <?= $row["ni_admin"] . ' - ' . $row["nama_admin"] ?> </option>
                </select>
              </div>
            </div>
          </div>
          <!-- pilih pembimbing -->
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">NI, Nama Pembimbing:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <select name="pembimbing_id" class="form-control" disabled>
                  <option> <?= $row["ni_pembimbing"] . ' - ' . $row["nama_pembimbing"]  . ' - ' . $row["sekolah"] ?> </option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer justify-content-between">
          <p><?= $row["created_at"] ?></p>
          <p>di ubah pada : <?= $row["updated_at"] ?></p>
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
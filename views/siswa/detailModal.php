<div class="modal fade" id="detailModal<?= $row["id"] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
          <!-- Nomor Induk -->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nomor Induk:</label>
            <div class="col-sm-9">
              <div class="input-group mb-3">
                <input name="ni" type="number" class="form-control" value="<?= $row["ni"] ?>" disabled/>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-id-card"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Nama -->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama:</label>
            <div class="col-sm-9">
              <div class="input-group mb-3">
                <input name="nama" type="text" class="form-control" value="<?= $row["nama"] ?>" disabled/>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- asal sekolah -->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Asal Sekolah:</label>
            <div class="col-sm-9">
              <div class="input-group mb-3">
                <select name="pembimbing_id" class="form-control" disabled>
                  <option value="<?= $row["pembimbing_id"] ?>">
                    <?= $row["sekolah"] ?>
                  </option>
                </select>
              </div>
            </div>
          </div>
          <!-- Alamat -->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Alamat:</label>
            <div class="col-sm-9">
              <textarea name="alamat" class="form-control" rows="3" disabled><?= $row["alamat"] ?></textarea>
            </div>
          </div>
          <!-- Kontak -->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Kontak:</label>
            <div class="col-sm-9">
              <div class="input-group mb-3">
                <input name="kontak" type="number" class="form-control" value="<?= $row["kontak"] ?>" disabled/>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Username -->
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Username:</label>
            <div class="col-sm-9">
              <div class="input-group mb-3">
                <input name="username" type="text" class="form-control" value="<?= $row["username"] ?>" disabled/>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <p><?= $row["created_at"] ?></p>
          <p>di ubah pada : <?= $row["updated_at"] ?></p>
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
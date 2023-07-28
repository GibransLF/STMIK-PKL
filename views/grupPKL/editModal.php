<div class="modal fade" id="editModal<?= $row["id"] ?>">
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
        <input type="hidden" name="id" value="<?= $row["id"] ?>">
          <!-- pilih siswa -->
          <div class="form-group row">
            <label for="siswa_id" class="col-sm-2 col-form-label">Nama Siswa:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <select name="siswa_id" id="siswa_id" class="form-control" required>
                  <option value="<?= $row["siswa_id"] ?>"> <?= $row["ni_siswa"] . ' - ' . $row["nama_siswa"] . ' - ' . $row["sekolah_siswa"] ?> </option>
                  <?php 
                    foreach ($siswa as $siswas) :
                      ?>
                      <option value="<?= $siswas["id"] ?>"> <?= $siswas["ni"] . " - " . $siswas["nama"] . " - " . $siswas["nama_sekolah"] ?> </option>
                    <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
          <!-- pilih admin -->
          <div class="form-group row">
            <label for="admin_id" class="col-sm-2 col-form-label">Nama Pembimbing STMIK:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <select name="admin_id" id="admin_id" class="form-control" required>
                  <option value="<?= $row["admin_id"] ?>"> <?= $row["ni_admin"] . ' - ' . $row["nama_admin"] ?> </option>
                  <?php 
                    foreach ($admin as $admins) :
                      ?>
                      <option value="<?= $admins["id"] ?>"> <?= $admins["ni"] . " - " . $admins["nama"] ?> </option>
                    <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
          <!-- pilih pembimbing -->
          <div class="form-group row">
            <label for="pembimbing_id" class="col-sm-2 col-form-label">Nama Pembimbing:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <select name="pembimbing_id" id="pembimbing_id" class="form-control" required>
                  <option value="<?= $row["pembimbing_id"] ?>"> <?= $row["ni_pembimbing"] . ' - ' . $row["nama_pembimbing"]  . ' - ' . $row["sekolah_pembimbing"] ?> </option>
                  <?php 
                    foreach ($pembimbing as $pembimbings) :
                      ?>
                      <option value="<?= $pembimbings["id"] ?>"> <?= $pembimbings["ni"] . " - " . $pembimbings["nama"] . " - " . $pembimbings["nama_sekolah"] ?> </option>
                    <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
          <!-- pilih tempat -->
          <div class="form-group row">
            <label for="tempat_id" class="col-sm-2 col-form-label">Nama Tempat:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <select name="tempat_id" id="tempat_id" class="form-control" required>
                  <option value="<?= $row["tempat_id"] ?>"> <?= $row["nama_tempat"] ?> </option>
                  <?php 
                    foreach ($tempat as $tempats) :
                      ?>
                      <option value="<?= $tempats["id"] ?>"> <?= $tempats["nama"] ?> </option>
                    <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
          <button type="submit" name="ubah" class="btn btn-warning">Ubah</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
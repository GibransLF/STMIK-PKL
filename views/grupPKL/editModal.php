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
          <!-- nama group -->
          <div class="form-group row">
            <label for="namaGrup" class="col-sm-2 col-form-label">Nama Grup:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
              <input name="namaGrup" id="namaGrup" type="text" class="form-control" placeholder="<?= $row["nama"] ?>" value="<?= $row["nama"] ?>" autocomplete="off" required/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-users-cog"></span>
              </div>
            </div>
              </div>
            </div>
          </div>
          <!-- pilih siswa -->
          <div class="form-group row">
            <label for="siswa_id" class="col-sm-2 col-form-label">NI, Nama Siswa:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <select name="siswa_id" id="siswa_id" class="form-control" required>
                  <option value="<?= $row["siswa_id"] ?>"> <?= $row["ni_siswa"] . ' - ' . $row["nama_siswa"] . ' - ' . $row["sekolah_siswa"] ?> </option>
                  <?php 
                    foreach ($siswa as $siswas) :
                      ?>
                      <option value="<?= $siswas["id"] ?>"> <?= $siswas["ni"] . " - " . $siswas["nama"] . " - " . $siswas["sekolah"] ?> </option>
                    <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
          <!-- pilih admin -->
          <div class="form-group row">
            <label for="admin_id" class="col-sm-2 col-form-label">NI, Nama Pembimbing STMIK:</label>
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
            <label for="pembimbing_id" class="col-sm-2 col-form-label">NI, Nama Pembimbing:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <select name="pembimbing_id" id="pembimbing_id" class="form-control" required>
                  <option value="<?= $row["pembimbing_id"] ?>"> <?= $row["ni_pembimbing"] . ' - ' . $row["nama_pembimbing"]  . ' - ' . $row["sekolah"] ?> </option>
                  <?php 
                    foreach ($pembimbing as $pembimbings) :
                      ?>
                      <option value="<?= $pembimbings["id"] ?>"> <?= $pembimbings["ni"] . " - " . $pembimbings["nama"] . " - " . $pembimbings["sekolah"] ?> </option>
                    <?php endforeach ?>
                </select>
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
          <button type="submit" name="ubah" class="btn btn-warning">Ubah</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
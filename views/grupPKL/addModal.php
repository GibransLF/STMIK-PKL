<div class="modal fade" id="addModal">
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
                <!-- pilih siswa -->
                <div class="input-group mb-3">
                  <select name="siswa_id" id="siswa_id" class="form-control" required>
                    <option> = Pilih Siswa = </option>
                    <?php 
                    foreach ($siswa as $row) :
                      ?>
                      <option value="<?= $row["id"] ?>"> <?= $row["ni"] . " - " . $row["nama"] . " - " . $row["sekolah"] ?> </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <!-- pilih admin -->
                <div class="input-group mb-3">
                  <select name="admin_id" class="form-control" required>
                    <option value=""> = Pilih Admin = </option>
                    <?php 
                    foreach ($admin as $row) :
                      ?>
                      <option value="<?= $row["id"] ?>"> <?= $row["ni"] . " - " . $row["nama"] ?> </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <!-- pilih pembimbing -->
                <div class="input-group mb-3">
                  <select name="pembimbing_id" class="form-control" required>
                    <option value=""> = Pilih Pembimbing = </option>
                    <?php 
                    foreach ($pembimbing as $row) :
                      ?>
                      <option value="<?= $row["id"] ?>"> <?= $row["ni"] . " - " . $row["nama"] . " - " . $row["sekolah"] ?> </option>
                    <?php endforeach ?>
                  </select>
                </div>
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                <button type="submit" name="tambah" class="btn btn-primary">Tanbah</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

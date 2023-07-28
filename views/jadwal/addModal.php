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
                  <select name="siswa_id" class="form-control" required>
                    <option value=""> = Pilih Siswa = </option>
                    <?php 
                    foreach ($result as $row) :
                      ?>
                      <option value="<?= $row["id"] ?>"> <?= $row["ni"] . " - " . $row["nama"] . " - " . $row["nama_sekolah"] ?> </option>
                    <?php endforeach ?>
                  </select>
                </div>
                <!-- tgl mulai -->
                <div class="input-group mb-3">
                  <input name="tglMulai" type="date" class="form-control" placeholder="tanggal mulai" autocomplete="off" required/>
                </div>
                <!-- tgl akhir -->
                <div class="input-group mb-3">
                  <input name="tglAkhir" type="date" class="form-control" placeholder="tanggal akhir" autocomplete="off" required/>
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
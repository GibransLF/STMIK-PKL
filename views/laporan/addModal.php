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
              <input type="hidden" name="siswa_id" value="<?= $id ?>">
                <!-- tgl -->
                <div class="input-group mb-3">
                  <input name="tgl" type="date" class="form-control" placeholder="tanggal mulai" autocomplete="off" required/>
                </div>
                <!-- kegiatan -->
                <div class="input-group mb-3">
                  <input name="kegiatan" type="text" class="form-control" placeholder="Kegiatan" autocomplete="off" required/>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-flag"></span>
                    </div>
                  </div>
                </div>
                <!-- Tanggal -->
                <div class="input-group mb-3">
                <label for="tglMulai" class="col-sm-4 col-form-label">Pilih Jadwal:</label>
                  <div class="col-sm-8">
                    <select name="jadwal_id" id="jadwal_id" class="form-control" required>
                      <?php 
                      //pilih jadwal tglEdit 
                      foreach ($resultTgl as $tgl) :
                        ?>
                        <option value="<?= $tgl["id"] ?>"> <?= $tgl["tgl_mulai"] . " ~ " . $tgl["tgl_akhir"] ?> </option>
                      <?php endforeach ?>
                    </select>
                  </div>
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
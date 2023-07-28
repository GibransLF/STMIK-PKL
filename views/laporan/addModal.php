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
                <!-- Kegiatan -->
                <div class="form-group row">
                <label for="Kegiatan" class="col-sm-3 col-form-label">Kegiatan:</label>
                  <div class="col-sm-9">
                    <textarea name="kegiatan" class="form-control" id="kegiatan" rows="5"></textarea>
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
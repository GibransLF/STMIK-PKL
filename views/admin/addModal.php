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
          <!-- nomor induk -->
          <div class="input-group mb-3">
            <input name="ni" type="number" class="form-control" placeholder="Nomor Induk" autocomplete="off" required/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-id-card"></span>
              </div>
            </div>
          </div>
          <!-- nama -->
          <div class="input-group mb-3">
            <input name="nama" type="text" class="form-control" placeholder="nama" autocomplete="off" required/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <!-- alamat -->
          <div class="input-group mb-3">
            <input name="alamat" type="text" class="form-control" placeholder="alamat" autocomplete="off" required/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-map-pin"></span>
              </div>
            </div>
          </div>
          <!-- kontak -->
          <div class="input-group mb-3">
            <input name="kontak" type="number" class="form-control" placeholder="kontak / WA" autocomplete="off" required/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>
          </div>
          <!-- username -->
          <div class="input-group mb-3">
            <input name="username" type="text" class="form-control" placeholder="username" autocomplete="off" required/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <!-- password -->
          <div class="input-group mb-3">
            <input
              name="pass"
              type="password"
              class="form-control"
              placeholder="Password"
              autocomplete="off"
              required
            />
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <select name="role" class="form-control" required>
              <option value=""> = pilih role = </option>
              <option value="1">Pembimbing STMIK</option>
              <option value="2">Admin</option>
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
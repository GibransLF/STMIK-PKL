<div class="modal fade" id="editModal<?= $row["id"] ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Edit Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?= $row["id"] ?>">
          <!-- Nama -->
          <div class="form-group row">
            <label for="nama" class="col-sm-2 col-form-label">Nama:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <input name="nama" id="nama" type="text" class="form-control" value="<?= $row["nama"] ?>" placeholder="<?= $row["nama"] ?>" required/>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Alamat -->
          <div class="form-group row">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat:</label>
            <div class="col-sm-10">
              <textarea name="alamat" id="alamat" class="form-control" rows="3" required><?= $row["alamat"] ?> </textarea>
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



<!-- modal edit password -->
<div class="modal fade" id="editPassModal<?= $row["id"] ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Ubah Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?= $row["id"] ?>">
          <!-- Password -->
          <div class="input-group mb-3">
            <input name="pass" type="text" class="form-control" placeholder="masukan password baru" autocomplete="off" required/>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
          <button type="submit" name="ubahPass" class="btn btn-danger">Ubah Password</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
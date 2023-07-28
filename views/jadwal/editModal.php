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
          <!-- pilih siswa -->
          <div class="input-group mb-3">
          <label for="tglMulai" class="col-sm-2 col-form-label">Nama Siswa:</label>
            <div class="col-sm-10">
              <select name="siswa_id" id="siswa_id" class="form-control" required>
                <option value="<?= $row["siswa_id"] ?>"> <?= $row["ni_siswa"] . " - " . $row["nama_siswa"] . " - " . $row["sekolah_siswa"] ?> </option>
                <?php 
                foreach ($result as $siswa) :
                  ?>
                  <option value="<?= $siswa["id"] ?>"> <?= $siswa["ni"] . " - " . $siswa["nama"] . " - " . $siswa["nama_sekolah"] ?> </option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <!-- tgl mulai -->
          <div class="form-group row">
            <label for="tglMulai" class="col-sm-2 col-form-label">Tanggal Mulai:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <input name="tglMulai" id="tglMulai" type="date" class="form-control" value="<?= $row["tgl_mulai"] ?>" placeholder="<?= $row["tgl_mulai"] ?>" required/>
              </div>
            </div>
          </div>
          <!-- tgl akhir -->
          <div class="form-group row">
            <label for="tglAkhir" class="col-sm-2 col-form-label">Tanggal Akhir:</label>
            <div class="col-sm-10">
              <div class="input-group mb-3">
                <input name="tglAkhir" id="tglAkhir" type="date" class="form-control" value="<?= $row["tgl_akhir"] ?>" placeholder="<?= $row["tgl_akhir"] ?>" required/>
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
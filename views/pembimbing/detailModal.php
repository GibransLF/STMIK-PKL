<div class="modal fade" id="detailModal<?= $row["id"] ?>">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">
        <!-- kiri  -->
        <input type="hidden" name="id" value="<?= $row["id"] ?>">
        <div class="row p-2">
          <div class="col-sm-6">
              <p class="login-box-msg">Data Sekolah</p>
              <!-- nama sekolah  -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Sekolah:</label>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                    <input name="sekolah" type="text" class="form-control" placeholder="<?= $row["sekolah"] ?>" autocomplete="off" value="<?= $row["sekolah"] ?>" disabled/>
                    <div class="input-group-append">
                        <div class="input-group-text">
                          <span class="fas fa-school"></span>
                        </div>
                    </div>
                  </div>  
                </div>
              </div>
              <!-- NPSN  -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">NPSN:</label>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                      <input name="npsn" type="number" class="form-control" placeholder="<?= $row["npsn"] ?>" autocomplete="off" value="<?= $row["npsn"] ?>" disabled/>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-passport"></span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <!-- Alamat Sekolah  -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Alamat Sekolah:</label>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                      <input name="alamat_sekolah" type="text" class="form-control" placeholder="<?= $row["alamat_sekolah"] ?>" autocomplete="off" value="<?= $row["alamat_sekolah"] ?>" disabled/>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-map-marked-alt"></span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <!-- Nomor telepon sekolah  -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nomor Sekolah:</label>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                      <input name="nomor_sekolah" type="number" class="form-control" placeholder="<?= $row["nomor_sekolah"] ?>" autocomplete="off" value="<?= $row["nomor_sekolah"] ?>" disabled/>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-headset"></span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <!-- email sekolah  -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email Sekolah:</label>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                      <input name="email_sekolah" type="email" class="form-control" placeholder="<?= $row["email_sekolah"] ?>" autocomplete="off" value="<?= $row["email_sekolah"] ?>" disabled/>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-at"></span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
          </div>
          <!-- kanan  -->
          <div class="col-sm-6">
              <p class="login-box-msg">Data Guru Pembimbing</p>
              <!-- nomor induk  -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nomor Induk:</label>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                      <input name="ni" type="number" class="form-control" placeholder="<?= $row["ni"] ?>" autocomplete="off" value="<?= $row["ni"] ?>" disabled/>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-id-card"></span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <!-- nama  -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama:</label>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                      <input name="nama" type="text" class="form-control" placeholder="<?= $row["nama"] ?>" autocomplete="off" value="<?= $row["nama"] ?>" disabled/>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-user"></span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <!-- alamat  -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Alamat:</label>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                      <input name="alamat" type="text" class="form-control" placeholder="<?= $row["alamat"] ?>" autocomplete="off" value="<?= $row["alamat"] ?>" disabled/>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-map-pin"></span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <!-- nomor hp  -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nomor Kontak:</label>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                      <input name="kontak" type="number" class="form-control" placeholder="<?= $row["kontak"] ?>" autocomplete="off" value="<?= $row["kontak"] ?>" disabled/>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-phone"></span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <!-- posisi  -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Posisi Jabatan:</label>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                      <input name="posisi" type="text" class="form-control" placeholder="<?= $row["posisi"] ?>" autocomplete="off" value="<?= $row["posisi"] ?>" disabled/>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-project-diagram"></span>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
              <!-- username -->
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Ussername:</label>
                <div class="col-sm-9">
                  <div class="input-group mb-3">
                      <input name="username" type="text" class="form-control" placeholder="<?= $row["username"] ?>" autocomplete="off" value="<?= $row["username"] ?>" disabled/>
                      <div class="input-group-append">
                          <div class="input-group-text">
                              <span class="fas fa-user"></span>
                          </div>
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
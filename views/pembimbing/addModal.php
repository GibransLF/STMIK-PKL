<div class="modal fade" id="addModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST" enctype="multipart/form-data">
        <!-- kiri  -->
        <div class="row p-2">
          <div class="col-sm-6">
              <p class="login-box-msg">Isi data Sekolah</p>
              <!-- nama sekolah  -->
              <div class="input-group mb-3">
                  <input name="sekolah" type="text" class="form-control" placeholder="Nama Sekolah" autocomplete="off" required/>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-school"></span>
                      </div>
                  </div>
              </div>
              <!-- NPSN  -->
              <div class="input-group mb-3">
                  <input name="npsn" type="number" class="form-control" placeholder="Nomor Pokok Sekolah Nasiional" autocomplete="off" required/>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-passport"></span>
                      </div>
                  </div>
              </div>
              <!-- Alamat Sekolah  -->
              <div class="input-group mb-3">
                  <input name="alamat_sekolah" type="text" class="form-control" placeholder="Alamat Sekolah" autocomplete="off" required/>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-map-marked-alt"></span>
                      </div>
                  </div>
              </div>
              <!-- Nomor telepon sekolah  -->
              <div class="input-group mb-3">
                  <input name="nomor_sekolah" type="number" class="form-control" placeholder="Nomor Telepon Sekolah" autocomplete="off" required/>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-headset"></span>
                      </div>
                  </div>
              </div>
              <!-- email sekolah  -->
              <div class="input-group mb-3">
                  <input name="email_sekolah" type="email" class="form-control" placeholder="Alamat Email Sekolah" autocomplete="off" required/>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-at"></span>
                      </div>
                  </div>
              </div>
          </div>
          <!-- kanan  -->
          <div class="col-sm-6">
              <p class="login-box-msg">Isi data Guru Pembimbing</p>
              <div class="input-group mb-3">
                  <input name="ni" type="number" class="form-control" placeholder="Nomor Induk" autocomplete="off" required/>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-id-card"></span>
                      </div>
                  </div>
              </div>
              <div class="input-group mb-3">
                  <input name="nama" type="text" class="form-control" placeholder="Nama" autocomplete="off" required/>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-user"></span>
                      </div>
                  </div>
              </div>
              <div class="input-group mb-3">
                  <input name="alamat" type="text" class="form-control" placeholder="Alamat" autocomplete="off" required/>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-map-pin"></span>
                      </div>
                  </div>
              </div>
              <div class="input-group mb-3">
                  <input name="kontak" type="number" class="form-control" placeholder="Kontak / WA" autocomplete="off" required/>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-phone"></span>
                      </div>
                  </div>
              </div>
              <div class="input-group mb-3">
                  <input name="posisi" type="text" class="form-control" placeholder="Posisi menjabat sebagai" autocomplete="off" required/>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-project-diagram"></span>
                      </div>
                  </div>
              </div>
              <div class="input-group mb-3">
                  <input name="username" type="text" class="form-control" placeholder="Username" autocomplete="off" required/>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-user"></span>
                      </div>
                  </div>
              </div>
              <div class="input-group mb-3">
                  <input name="pass" type="password" class="form-control" placeholder="Password" autocomplete="off" required/>
                  <div class="input-group-append">
                      <div class="input-group-text">
                          <span class="fas fa-lock"></span>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div class="form-group p-2">
          <label for="upload">Kirimkan Surat permohonan PKL</label>
          <input type="file" class="form-control-file" name="upload" id="upload">
          <label for="upload">Tipe .pdf maksimal 1MB.</label>
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
<div class="modal fade" id="statusModal<?= $row["id"] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ubah Status <?= $row["status"] ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
              <center>
                <span class="text-warning">Proses</span> =&gt;
                <span class="text-primary">Selesai</span>
              </center>
                <input type="hidden" name="id" value="<?= $row["id"] ?>">
                <input type="hidden" name="status" value="<?= $row["status"] ?>">
              </div>
              <div class="modal-footer justify-content-between">
                <?= ( $row["status"] == "proses") ? '' : '
                <button type="submit" name="previous" class="btn btn-danger">tahap Sebelumnya</button>';?>
                
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>

                <?= ( $row["status"] == "selesai") ? '' : '
                <button type="submit" name="next" class="btn btn-success">tahap Selanjutnya</button>' ?>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
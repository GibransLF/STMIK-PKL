<div class="modal fade" id="deleteModal<?= $row["id"] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="" method="POST">
              <div class="modal-body">
                <p>Anda yakin ingin menghapus data ini?</p>
                <input type="hidden" name="id" value="<?= $row["id"] ?>">
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
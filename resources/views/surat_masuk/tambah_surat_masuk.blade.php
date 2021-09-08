<!-- Modal -->
<div class="modal fade" id="tambahSuratModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Surat Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="/tambahSuratMasuk" method="post" role="form" enctype="multipart/form-data">
                    {{csrf_field()}}

      <div class="modal-body">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Asal Surat:</label>
            <input type="text" class="form-control" id="asal_surat_masuk" name="asal_surat_masuk">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nomor Surat:</label>
            <input type="text" class="form-control" id="no_surat_masuk" name="no_surat_masuk">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tanggal Surat:</label>
            <input type="date" class="form-control" id="tgl_surat_masuk" name="tgl_surat_masuk">

          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Perihal</label>
            <textarea class="form-control" id="perihal_surat_masuk" name="perihal_surat_masuk"></textarea>
          </div>
          <div class="form-group">
          <div class="form-group">
            <label for="message-text">Upload File Surat Masuk :</label>
            <input type="file" class="form-control" id="file_surat_masuk" name = "file_surat_masuk" accept="application/pdf, image/png, image/jpg, image/gif">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tanggal Terima Surat:</label>
            <input type="date" class="form-control" id="tgl_terima" name="tgl_terima">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nomor Agenda:</label>
            <input type="number" class="form-control" id="no_agenda" name="no_agenda">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Sifat Surat:</label>
              <select class="form-control select2" id="sifat_surat" name="sifat_surat" style="width: 100%;">
                <option selected="selected">-</option>
                <option>Biasa</option>
                <option>Penting</option>
                <option>Sangat Penting</option>
                <option>Rahasia</option>
                <option>Segera</option>
              </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="ubahSuratModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/ubahSuratMasuk" method="post" role="form" enctype="multipart/form-data">
      <div class="modal-body">
                
                {{csrf_field()}}
          <input type="text" name="id_surat_masuk" id="id_surat_masuk" class="id_surat_masuk">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Asal Surat:</label>
            <input type="text" class="form-control asal_surat_masuk" id="u_asal_surat_masuk" name="u_asal_surat_masuk">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nomor Surat:</label>
            <input type="text" class="form-control no_surat_masuk" id="u_no_surat_masuk" name="u_no_surat_masuk">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tanggal Surat:</label>
            <input type="date" class="form-control tgl_surat_masuk" id="u_tgl_surat_masuk" name="u_tgl_surat_masuk">

          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Perihal</label>
            <textarea class="form-control perihal_surat_masuk" id="u_perihal_surat_masuk" name="u_perihal_surat_masuk"></textarea>
          </div>
          <div class="form-group">
          <div class="form-group">
            <label for="message-text">Upload File Surat Masuk :</label>
            <input type="file" class="form-control file_surat_masuk" id="u_file_surat_masuk" name = "u_file_surat_masuk" accept="application/pdf, image/png, image/jpg, image/gif">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tanggal Terima Surat:</label>
            <input type="date" class="form-control tgl_terima" id="u_tgl_terima" name="u_tgl_terima">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nomor Agenda:</label>
            <input type="number" class="form-control no_agenda" id="u_no_agenda" name="u_no_agenda">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Sifat Surat:</label>
              <select class="form-control select2 sifat_surat" id="u_sifat_surat" name="u_sifat_surat" style="width: 100%;">
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
         <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>
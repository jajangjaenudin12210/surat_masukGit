<div class="modal fade" id="diposisiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Disposisi Surat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/tambahDisposisi" method="post" role="form" enctype="multipart/form-data">
          <div class="modal-body">  
              {{csrf_field()}}
              
              <input type="hidden" name="id_surat_masuk" id="id_surat_masuk" class="id_surat_masuk">
              <div class="form-group">
                <label for="message-text" class="col-form-label">Instruksi</label>
                <textarea class="form-control" id="instruksi" name="instruksi"></textarea>
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Tanggal Instruksi:</label>
                <input type="date" class="form-control" id="tgl_instruksi" name="tgl_instruksi">
              </div>
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Penerima Instruksi:</label>
                  <select class="form-control select2" id="penerima_instruksi" name="penerima_instruksi" style="width: 100%;">
                    <option>-</option>
                    <option>Sekretaris</option>
                    <option>Kepala Bidang PP ASN</option>
                    <option>Kepala Bidang Bangpeg</option>
                    <option>Kepala Bidang Kesdis</option>
                    <option>Kepala Bidang Diklat</option>
                  </select>
              </div>

          </div>
          <div class="modal-footer">
            <a href="/listDisposisi"><button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button></a>
             <button type="submit" class="btn btn-primary">Simpan Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
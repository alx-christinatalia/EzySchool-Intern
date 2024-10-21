<div class="modal fade modal-save-kategori" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">The Title</h4>
            </div>
            <form id="FrmSaveKategori" action="keuangan/ajax-kategori-tagihan.html" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="form[nama]" placeholder="Nama" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Prefix ID<span class="text-danger">*</span></label>
                        <input type="text" class="form-control abb" name="form[prefix_id_tagihan]" placeholder="Prefix ID" required minlength="1" maxlength="3" disabled>
                    </div>
                    <div class="form-group">
                        <label>Keterangan<span class="text-danger">*</span></label>
                        <textarea style="resize: vertical; max-height: 200px;" type="text" class="form-control" placeholder="Keterangan" name="form[default_keterangan]" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="hidden-idupdate" name="form[id_update]" value="">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
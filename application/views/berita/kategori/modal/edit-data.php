 <div class="modal fade bs-modal-md modal-edit-kategori" id="modalEdit" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Kategori Berita</h4>
            </div>
            <form class="form-horizontal form-edit-kategori" action="berita/ajax-berita-kategori.html" role="form">
                <div class="modal-body">
                    <div>
                      <label>Nama Kategori</label>
                      <input required type="text" class="form-control" placeholder="Nama Kategori" name="form[nama]">
                      <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="hidden-idupdate" name="form[id_update]" value="">                    
                    <a hre="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
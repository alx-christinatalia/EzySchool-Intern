 <div class="modal fade bs-modal-md modal-tambah-kategori" id="modalAdd" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Buat Kategori</h4>
            </div>
            <form method="POST" action="kategori/ajax-kategori.html" class="form-horizontal form-kategori-baru">
                <div class="modal-body">
                    <div>
                      <label>Nama Kategori</label>
                      <input required type="text" class="form-control nama_kategori" placeholder="Nama Kategori" name="form[nama]">
                      <br>
                    </div>
                    <div class="can-hidden">
                      <label>Jenis Kategori</label>
                      <input required type="text" class="form-control jns_kat" placeholder="Jenis Kategori" name="form[jns_kat]">
                      <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="hidden-idupdatestatus" name="form[id]" value="">                    
                    <a hre="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
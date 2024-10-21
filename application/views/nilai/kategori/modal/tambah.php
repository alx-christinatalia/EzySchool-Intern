 <div class="modal fade bs-modal-md modal-tambah-kategori" id="modalAdd" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Kategori Berita</h4>
            </div>
            <form method="POST" action="nilai/ajax-nilai-kategori.html" class="form-horizontal form-kategori-baru">
                <div class="modal-body">
                    <div>
                      <label>Nama Kategori</label>
                      <input required type="text" class="form-control" placeholder="Nama Kategori Berita" name="form[nama]">
                      <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <input type="hidden" class="hidden-idupdatestatus" name="form[id]" value=""> -->
                    <a hre="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
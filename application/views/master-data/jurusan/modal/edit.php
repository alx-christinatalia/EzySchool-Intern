 <div class="modal fade bs-modal-md modal-edit-jurusan" id="modalEdit" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Jurusan</h4>
            </div>
            <form class="form-horizontal form-edit-jurusan" action="master-data/ajax-jurusan.html" role="form">
                <div class="modal-body">
                    <div>
                      <label>Nama</label>
                      <input required type="text" class="form-control" placeholder="Nama" name="form[nama]">
                      <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="text" class="hidden-idupdatestatus" name="form[id_jurusan]" value="">                    
                    <a hre="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
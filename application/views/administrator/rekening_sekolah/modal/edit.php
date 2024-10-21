 <div class="modal fade bs-modal-md modal-edit-rekening" id="modalEdit" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit rekening</h4>
            </div>
            <form class="form-horizontal form-edit-rekening" action="administrator/ajax-rekening.html" role="form">
                <div class="modal-body">
                    <div>
                        <label>Nama Bank <span class="text-danger">*</span></label>
                        <select class="dropdown-bank dropdown-bank2nd bank" name="form[kode_bank]" style="width:100%;" required>
                            <option val="">Pilih Bank</option>
                        </select>
                        <input type="hidden" class="nama_bank nama_bank2nd" name="form[nama_bank]">
                        <br>
                    </div>
                    <div>
                        <label>No Rekening <span class="text-danger">*</span></label>
                        <input required type="text" class="form-control" placeholder="No Rekening" name="form[no_rek]">
                        <br>
                    </div>
                    <div>
                        <label>Atas Nama <span class="text-danger">*</span></label>
                        <input required type="text" class="form-control formatasnama" placeholder="Atas Nama" name="form[atas_nama]">
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="hidden-idupdate" name="form[id_rekening]" value="">                    
                    <a hre="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade modal-save-password" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">The Title</h4>
            </div>
            <form id="FrmSavePassword" action="master-data/ajax-wali-kelas.html" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Password Baru<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="pass1" required placeholder="Password Baru" minlength="6" maxlength="8"> 
                    </div>
                    <div class="form-group">
                        <label>Ketik Ulang Password Baru<span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="pass2" required placeholder="Ketik Ulang Password Baru" minlength="6" maxlength="8">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="form[password1]" value="">
                    <input type="hidden" name="form[password2]" value="">
                    <input type="hidden" class="hidden-idupdate" name="form[id_update]" value="">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
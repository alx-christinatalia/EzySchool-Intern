<?php
    $user = $this->session->userdata("user");
?>
<div class="modal fade modal-save-password" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Password</h4>
            </div>
            <form id="FrmSavePasswordProf" action="ajax-profil.html" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Password Baru<span class="text-danger">*</span></label>
                        <input type="password" class="form-control pass1" placeholder="Password Baru" required minlength="6" maxlength="18">
                        <input type="hidden" name="form[password1]" class="hidden-pass1">
                    </div>
                    <div class="form-group">
                        <label>Ketik Ulang Password Baru<span class="text-danger">*</span></label>
                        <input type="password" class="form-control pass2" placeholder="Ketik Ulang Password Baru" required minlength="6" maxlength="18">
                        <input type="hidden" name="form[password2]" class="hidden-pass2">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="hidden-idupdate" name="form[id_update]" value="<?php echo $user->id; ?>">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
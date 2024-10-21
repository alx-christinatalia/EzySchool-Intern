<div class="modal fade modal-update-status" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Status</h4>
            </div>
            <form id="FrmUpdateStatus" action="master-data/ajax-jurusan.html" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Status <span class="text-danger">*</span></label>
                        <select class="select2-nosearch" name="form[is_published]" required style="width: 100%;">
                            <option value="0">Belum Publish</option>
                            <option value="1">Publish</option>
                        </select>
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
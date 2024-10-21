<div class="modal fade modal-save-mesin" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">The Title</h4>
            </div>
            <form id="FrmEditMesin" action="administrator/ajax-mesin-server.html" role="form">
                <div class="modal-body">
                    <!-- <div class="form-group">
                        <label>Sekolah</label>
                        <select class="select2-normal dropdown-sekolah sekolah" name="form[id_sekolah]" style="width: 100%;">
                            <option value="">Pilih Sekolah</option>
                        </select>
                    </div> -->
                    <div class="form-group">
                        <label>Unique ID<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="form[uid_mesin_server]" placeholder="Unique ID" required>
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea class="form-control" name="form[catatan]" placeholder="Contoh: Depan TU, Ruang Lab, Gerbang Depan, dll." style="resize: vertical;"></textarea>
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
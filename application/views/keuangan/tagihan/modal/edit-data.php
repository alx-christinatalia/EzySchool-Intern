<div class="modal fade modal-save-tagihan" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Tagihan</h4>
            </div>
            <form id="FrmSaveTagihan" action="keuangan/ajax-tagihan.html" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Publish <span class="text-danger">*</span></label>
                        <select class="select2-nosearch publish" name="form[is_published]" required style="width: 100%;">
                            <option value="1">Publish</option>
                            <option value="0">Tidak Publish</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tgl Tagihan <span class="text-danger">*</span></label>
                        <div class='input-group date col-sm-1 col-md-3 col-lg-12'>
                            <input type='text' class="form-control tanggal" placeholder="Tanggal Tagihan" id='datetimepicker5' name="form[tgl_tagihan]" required/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tgl Jatuh Tempo <span class="text-danger">*</span></label>
                        <div class='input-group date col-sm-1 col-md-3 col-lg-12'>
                            <input type='text' class="form-control tanggal" placeholder="Tanggal Jatuh Tempo" id='datetimepicker6' name="form[tgl_jatuh_tempo]" required/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="hidden-idupdate" name="form[id_update]" value="">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit btn-edit-simpan disabled" data-style="slide-up">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
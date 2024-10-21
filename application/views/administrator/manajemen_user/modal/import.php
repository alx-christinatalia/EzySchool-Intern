<div class="modal fade bs-modal-md modal-import-pegawai" id="modalImport" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Import User</h4>
            </div>
            <form class="form-horizontal form-import-pegawai" id="form-import-pegawai" action="administrator/ajax-user.html" role="form">
                <div class="modal-body">
                    <div>
                        <label> Upload File </label>
                        <center>
                            <input type="file" class="form-control fileimportpegawai" required>
                            <input type="hidden" class="fileimportpegawai-hidden" name="form[Base64]">
                            <input type="hidden" class="fileimportpegawaiext-hidden" name="form[Ext]">
                        </center>
                        <label class="text text-danger">*Pilih file dengan format xlsm/xlsx</label>
                      </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <a href="<?php echo base_url("download/template/EzySchool-Template-User.xlsm"); ?>" role="button" class="btn btn-danger" download>Download Template</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up">Import</button>
                </div>
            </form>
            <form id="FrmProsesExcel" method="post" action="<?php echo base_url("manajemen_user/import.html") ?>">
                <input type="hidden" class="responfilehidden" name="FileExcel">
            </form>
        </div>
    </div>
</div>
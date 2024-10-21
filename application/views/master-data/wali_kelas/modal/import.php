<?php 
    $db = $this->session->userdata("db");
?>
<div class="modal fade bs-modal-md modal-import-pegawai" id="modalImport" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Import Wali Kelas</h4>
            </div>
            <form class="form-horizontal form-import-pegawai" action="master-data/ajax-wali-kelas.html" role="form">
                <div class="modal-body">
                    <div>
                        <label> Upload File </label>
                        <center>
                            <input type="file" class="form-control fileimportpegawai">
                            <input type="hidden" class="fileimportpegawai-hidden" name="form[Base64]">
                            <input type="hidden" class="fileimportpegawaiext-hidden" name="form[Ext]">
                            <br>
                        </center>
                        <!-- Belum punya template?<br>
                        <a href="<?php //echo base_url("assets/template/pegawai/EzySchool-Template-Pegawai.xlsx") ?>" role="button" class="" download>Download Template</a> -->
                      </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <!-- <a href="<?php //echo base_url("assets/template/pegawai/EzySchool-Template-Pegawai.xlsx") ?>" role="button" class="btn btn-danger" download>Download Template</a> -->
                    <a href="http://api.ezyschool.id/public/cron/template/<?php echo $db;?>/EzySchool-Template-Pegawai.xlsm" role="button" class="btn btn-danger" download>Download Template</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up">Import</button>
                </div>
            </form>
            <form id="FrmProsesExcel" method="post" action="<?php echo base_url("manajemen_user/import.html") ?>">
                <input type="hidden" class="responfilehidden" name="FileExcel">
            </form>
        </div>
    </div>
</div>
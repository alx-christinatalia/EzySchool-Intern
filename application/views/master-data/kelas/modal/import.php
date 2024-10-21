<?php 
    $db = $this->session->userdata("sekolah");
?>
<div class="modal fade bs-modal-md modal-import-kelas" id="modalImport" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Import Kelas</h4>
            </div>
            <form class="form-horizontal form-import-kelas" action="master-data/ajax-kelas.html" role="form" id="form-import-kelas">
                <div class="modal-body">
                    <div>
                        <label> Upload File </label>
                        <center>
                            <input type="file" class="form-control fileimportkelas" required>
                            <input type="hidden" class="fileimportkelas-hidden" name="form[Base64]">
                            <input type="hidden" class="fileimportkelasext-hidden" name="form[Ext]">
                        </center>
                        <label class="text text-danger">*Pilih file dengan format xlsm/xlsx</label>
                        <!-- Belum punya template?<br>
                        <a href="<?php //echo base_url("assets/template/masterdata/kelas/EzySchool-Template-Kelas.xlsx") ?>" role="button" class="" download>Download Template</a> -->
                      </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <!-- <a href="<?php //echo base_url("assets/template/masterdata/kelas/EzySchool-Template-Kelas.xlsx") ?>" role="button" class="btn btn-danger" download>Download Template</a> -->
                    <a href="<?php echo base_url("download/template/EzySchool-Template-Kelas.xlsx"); ?>" role="button" class="btn btn-danger" download>Download Template</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up" title="Import">Import</button>
                </div>
            </form>
            <form id="FrmProsesExcel" method="post" action="<?php echo base_url("kelas/import.html") ?>">
                <input type="hidden" class="responfilehidden" name="FileExcel">
            </form>
        </div>
    </div>
</div>
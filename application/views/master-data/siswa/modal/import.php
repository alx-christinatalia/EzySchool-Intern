<div class="modal fade bs-modal-md modal-import-siswa" id="modalImport" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Import Siswa</h4>
            </div>
            <form class="form-horizontal form-import-siswa" id="form-import-siswa" action="master-data/ajax-siswa.html" role="form">
                <div class="modal-body">
                    <div>
                        <label> Upload File </label>
                        <center>
                            <input type="file" class="form-control fileimportsiswa" required>
                            <input type="hidden" class="fileimportsiswa-hidden" name="form[Base64]">
                            <input type="hidden" class="fileimportsiswaext-hidden" name="form[Ext]">
                        </center>
                        <label class="text text-danger">*Pilih file dengan format xlsm/xlsx</label>
                        <!-- Belum punya template?<br>
                        <a href="<?php //echo base_url("assets/template/datasiswa/EzySchool-Template-DataSiswa(SMA,SMK,MA).xlsx") ?>" role="button" class="" download>Download Template</a> -->
                      </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <!-- <a href="<?php //echo base_url("assets/template/datasiswa/EzySchool-Template-DataSiswa(SMA,SMK,MA).xlsx") ?>" role="button" class="btn btn-danger" download>Download Template</a> -->
                    <a href="<?php echo base_url("download/template/EzySchool-Template-DataSiswa.xlsm"); ?>" role="button" class="btn btn-danger" download>Download Template</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up">Import</button>
                </div>
            </form>
            <form id="FrmProsesExcel" method="post" action="<?php echo base_url("siswa/import.html") ?>">
                <input type="hidden" class="responfilehidden" name="FileExcel">
            </form>
        </div>
    </div>
</div>
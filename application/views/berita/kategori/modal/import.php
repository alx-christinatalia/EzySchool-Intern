<div class="modal fade bs-modal-md modal-import-kategori" id="modalImport" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Import Kategori Berita</h4>
            </div>
            <form class="form-horizontal form-import-kategori" action="berita/ajax-berita-kategori.html" role="form">
                <div class="modal-body">
                    <div>
                        <label> Upload File </label>
                        <center>
                            <input type="file" class="form-control fileimportkategori">
                            <input type="hidden" class="fileimportkategori-hidden" name="form[Base64]">
                            <input type="hidden" class="fileimportkategoriext-hidden" name="form[Ext]">
                            <br>
                        </center>
                        Belum punya template?<br>
                        <a href="<?php echo base_url("assets/template/masterdata/kategori/EzySchool-Template-Kategori.xlsx") ?>" role="button" class="" download>Download Template</a>
                      </div>
                </div>
                <div class="modal-footer">
                    <a hre="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up">Import</button>
                </div>
            </form>
            <form id="FrmProsesExcel" method="post" action="<?php echo base_url("berita/kategori/import.html"); ?>">
                <input type="hidden" class="responfilehidden" name="FileExcel">
            </form>
        </div>
    </div>
</div>
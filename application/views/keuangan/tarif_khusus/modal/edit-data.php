<style type="text/css">
    .ck-button {
        margin:2px;
        overflow:auto;
        float:left;
        background-color:#428BCA;
        border-radius:4px;
        vertical-align: middle;
    }

    .ck-button label {
        padding-top: 5px;
        width:30px;
        height:25px;
        text-align:center;
        vertical-align: middle;
    }

    .ck-button label span {
        margin-top:2px;
        text-align:center;
        color:#fff;
        vertical-align: middle;
    }

    .ck-button label input {
        /*position:absolute;*/
        display: none;
        /*top:-20px;*/
        /*right:515px;*/
    }
</style>
<div class="modal fade modal-save-tarifkhusus" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">The Title</h4>
            </div>
            <form id="FrmSaveTarifKhusus" action="keuangan/ajax-tarif-khusus.html" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kelas <span class="text-danger">*</span></label>
                        <select style="width:100%;" class="form-control select2-normal dropdown-kelas3 kelas" required>
                            <option value="">Pilih Kelas</option>
                            <?php print_r($dropdownkelas->lsdt) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama <span class="text-danger">*</span></label>
                        <select style="width:100%;" class="form-control select2-normal dropdown-siswa2 siswa" required>
                                <option value="">Pilih Siswa</option>
                                <?php print_r($dropdownsiswa->lsdt) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kategori <span class="text-danger">*</span></label>
                        <select class="select2-nosearch dropdown-kattagihan kategori" name="form[id_kategori]" required style="width: 100%;">
                            <option value="">Pilih Kategori</option>
                            <?php print_r($dropdownkategori->lsdt) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nominal Tarif <span class="text-danger">*</span></label><br>
                        <div class="row">
                            <div class="col-md-12">
                                <div style="display: flex;">
                                    <input type="text" class="form-control nom" style="width:100%;" required placeholder="Nominal Tarif" onkeypress='return validate(event)' value="0" autofocus>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea style="resize: vertical; max-height: 200px;" type="text" class="form-control" placeholder="Keterangan" name="form[ket]"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="min">
                    <input type="hidden" name="form[tarif]" value="">
                    <input type="hidden" name="form[nis]" value="">
                    <input type="hidden" class="hidden-idupdate" name="form[id_update]" value="">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
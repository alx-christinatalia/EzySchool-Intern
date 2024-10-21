<div class="modal fade modal-tambah-tarifkhusus" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Tarif Khusus</h4>
            </div>
            <form role="form" id="FrmAddTarifKhusus" action="">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kategori <span class="text-danger">*</span></label>
                        <select style="width:100%;" class="form-control select2-normal dropdown-kattagihan tambah-kategori" required name="input1">
                            <option value="">Pilih Kategori</option>
                            <?php print_r($dropdownkategori->lsdt) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Tarif <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-md-11">
                                <input type="text" class="form-control nama_tarif" placeholder="Klik tombol di sebelah Kanan" required name="input2" readonly>
                                <input type="hidden" class="tambah-id_tarif">
                            </div>
                            <div class="col-md-1">
                                <a role="button" class="btn btn-primary btn_pilihtarif disabled" style="position: absolute;right: 15px;" data-toggle="modal" data-target="#pilihtarif">
                                    <i class="fa fa-list-ul"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Siswa <span class="text-danger">*</span></label>
                        <input type="text" value="" class="object_tagsinput tagsinput_siswa margin-top-10" required name="input3">
                        <a href="#pilihsiswa" role="button" data-toggle="modal" class="btn btn-primary btn_pilihsiswa btn-sm margin-top-10">
                            <i class="fa fa-plus"></i> Tambah Siswa
                        </a>

                        <input type="hidden" class="tambah-tagsinput_siswa_hidden">
                        <input type="hidden" class="tambah-tagsinput_siswa_hidden_nama">
                    </div>
                    <div class="form-group">
                        <label>Nominal <span class="text-danger">*</span></label>
                        <input type="text" class="form-control tambah-nominal nom" name="input4" placeholder="Tarif" onkeypress='return validate(event)' required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea style="resize: vertical; max-height: 200px;" type="text" class="form-control tambah-ket" placeholder="Keterangan"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
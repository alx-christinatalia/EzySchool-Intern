<?php
    $bulan = date("m");
    $tahun = date("Y");
?>
<div class="modal fade modal-save-tarif" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">The Title</h4>
            </div>
            <form id="FrmSaveTarif" action="keuangan/ajax-tarif.html" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Tagihan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" placeholder="Nama" name="form[nama]" required autofocus>
                    </div>
                    <div class="form-group">
                        <label>Periode <span class="text-danger">*</span></label>
                        <div class="row">
                            <div class="col-md-12" style="display: flex;">
                                <select style="width: 50%;" class="select2-nosearch bulan" name="form[bulan]" required>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                <span>&nbsp;</span>
                                <select style="width: 50%;" class="select2-nosearch dropdown-tahun tahun" name="form[tahun]" required>
                                    <option value="">Pilih Tahun</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kategori <span class="text-danger">*</span></label>
                        <select class="select2-nosearch dropdown-kattagihan kategori" name="form[id_kategori]" required style="width: 100%;">
                            <option value="">Pilih Kategori</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nominal Tarif <span class="text-danger">*</span></label>
                                <input type="text" class="form-control nom" style="width:100%;" required placeholder="Nominal Tarif" required onkeypress='return validate(event)' value="0">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select style="width: 100%;" class="form-control select2-nosearch is_active" name="form[is_active]" required>
                                    <option value="1">Aktif</option>
                                    <option value="0">Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Catatan</label>
                        <textarea style="resize: vertical; max-height: 200px;" type="text" class="form-control" placeholder="Catatan" name="form[catatan]"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="form[tarif]" value="">
                    <input type="hidden" class="hidden-idupdate" name="form[id_update]" value="">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
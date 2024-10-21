<div class="modal fade modal-tambah-periode" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">The Title</h4>
            </div>
            <form id="FrmAddPeriode" action="absensi/ajax-absensi-periode.html" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Tahun<span class="text-danger">*</span></label>
                        <select class="select2-nosearch dropdown-tahun tahun" name="form[tahun]" required style="width: 100%;">
                            <option value="">Pilih Tahun</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Bulan<span class="text-danger">*</span></label><br>
                        <div class="row">
                            <div class="col-md-1">
                                &nbsp;
                            </div>
                            <div class="col-md-5 col-sm-6">
                                <label class="mt-checkbox mt-checkbox-outline ">
                                    <input type="checkbox" name="form[bulan]" value="1">Januari<span></span>
                                </label>
                                <br>
                                <label class="mt-checkbox mt-checkbox-outline ">
                                    <input type="checkbox" name="form[bulan]" value="2">Februari<span></span>
                                </label>
                                <br>
                                <label class="mt-checkbox mt-checkbox-outline  ">
                                    <input type="checkbox" name="form[bulan]" value="3">Maret<span></span>
                                </label>
                                <br>
                                <label class="mt-checkbox mt-checkbox-outline ">
                                    <input type="checkbox" name="form[bulan]" value="4">April<span></span>
                                </label>
                                <br>
                                <label class="mt-checkbox mt-checkbox-outline ">
                                    <input type="checkbox" name="form[bulan]" value="5">Mei<span></span>
                                </label>
                                <br>
                                <label class="mt-checkbox mt-checkbox-outline ">
                                    <input type="checkbox" name="form[bulan]" value="6">Juni<span></span>
                                </label>
                                <br>
                            </div>
                            <div class="col-md-5 col-sm-6">
                                <label class="mt-checkbox mt-checkbox-outline ">
                                    <input type="checkbox" name="form[bulan]" value="7">Juli<span></span>
                                </label>
                                <br>
                                <label class="mt-checkbox mt-checkbox-outline ">
                                    <input type="checkbox" name="form[bulan]" value="8">Agustus<span></span>
                                </label>
                                <br>
                                <label class="mt-checkbox mt-checkbox-outline ">
                                    <input type="checkbox" name="form[bulan]" value="9">September<span></span>
                                </label>
                                <br>
                                <label class="mt-checkbox mt-checkbox-outline ">
                                    <input type="checkbox" name="form[bulan]" value="10">Oktober<span></span>
                                </label>
                                <br>
                                <label class="mt-checkbox mt-checkbox-outline ">
                                    <input type="checkbox" name="form[bulan]" value="11">November<span></span>
                                </label>
                                <br>
                                <label class="mt-checkbox mt-checkbox-outline ">
                                    <input type="checkbox" name="form[bulan]" value="12">Desember<span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <!-- <button class="btn btn-danger" onClick="hitung();">Hitung</button> -->
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
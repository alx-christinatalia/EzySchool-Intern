<?php 
    $date = date("d M Y");
    $time = date("H:i");
?>
<div class="modal fade modal-save-nilai" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">The Title</h4>
            </div>
            <form id="FrmSaveNilai" action="nilai/ajax-nilai.html" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kelas <span class="text-danger">*</span></label>
                        <select style="width:100%;" class="form-control select2-normal dropdown-kelas3 kelas" required name="form[id_kelas]">
                            <option value="">Pilih Kelas</option>
                            <?php print_r($dropdownkelas->lsdt) ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama <span class="text-danger">*</span></label>
                        <select style="width:100%;" class="form-control select2-normal dropdown-siswa2 siswa" required>
                                <option value="">Pilih Siswa</option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label>Kategori <span class="text-danger">*</span></label>
                        <select class="select2-nosearch dropdown-kategori3 kategori edit-kategori" name="form[id_kategori]" required style="width: 100%;">
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Keterangan <span class="text-danger">*</span></label>
                        <textarea style="resize: vertical; max-height: 200px;" type="text" class="form-control" placeholder="Keterangan" name="form[keterangan]" required></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tgl Publish <span class="text-danger">*</span></label>
                                <div class='input-group date'>
                                    <input type='text' class="form-control tanggal" placeholder="Tanggal Publish" id='datetimepicker6' required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Waktu Pulblish <span class="text-danger">*</span></label>
                                <div class="input-group" data-placement="top" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control clock" placeholder="Waktu Post" id='clockpicker' required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="md-checkbox">
                                    <input type="checkbox" id="checkbox1_211" class="md-check status-publish">
                                    <label for="checkbox1_211">
                                    <span class="inc"></span>
                                    <span class="check"></span>
                                    <span class="box"></span>Publish</label>
                                </div>
                                <input type="hidden" class="targetpub" name="form[is_published]">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tgl Ujian <span class="text-danger">*</span></label>
                                <div class='input-group date datetimepicker5'>
                                    <input type='text' class="form-control tgl_ujian" placeholder="Tanggal" name="form[tgl_ujian]" required/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="form[nis]" value="">
                    <input type="hidden" name="form[tgl_publish]" value="">
                    <input type="hidden" class='edit-nama_kategori' name="form[nama_kategori]" value="">
                    <input type="hidden" class="hidden-idupdate" name="form[id_update]" value="">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
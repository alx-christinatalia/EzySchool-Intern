 <div class="modal fade bs-modal-md" id="modalCetakSiswa" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cetak Password</h4>
            </div>
            <form class="form-cetak-password" role="form"> 
                <div class="modal-body">
                    <div class="form-group">
                        <label>Opsi Cetak <span class="text-danger">*</span></label>
                        <select required style="width:100%;" class="opsi_cetak select2-nosearch select2-notambah">
                            <option value="1"> Per Kelas</option>
                            <option value="2"> Per Siswa</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group show-kelas collapse in">
                                <label>Kelas <span class="text-danger">*</span></label>
                                <input type="text" class="object_tagsinput tagsinput_kelas" required>

                                <a href="#pilihkelas" role="button" data-toggle="modal" class="btn btn-primary margin-top-10">
                                    <i class="fa fa-plus"></i> Tambah Kelas
                                </a>
                                <input type="hidden" name="id_kelas" class="tagsinput_kelas_hidden">
                            </div>
                            <div class="form-group show-siswa collapse">
                                <label>Siswa <span class="text-danger">*</span></label>
                                <input type="text" class="object_tagsinput tagsinput_siswa" required>

                                <a href="#pilihsiswa" role="button" data-toggle="modal" class="btn btn-primary margin-top-10">
                                    <i class="fa fa-plus"></i> Tambah Siswa
                                </a>
                                <input type="hidden" name="nis" class="tagsinput_siswa_hidden">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jumlah Cetak</label>
                                <input type="number" min="1" class="form-control jumlahcetakdata" value="1" placeholder="Jumlah Cetak" name="duplicate">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">              
                    <a role="button" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit btn-cetak" data-style="slide-up">Cetak</button>
                </div>
            </form>
        </div>
    </div>
</div>
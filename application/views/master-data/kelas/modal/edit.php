 <div class="modal fade bs-modal-md modal-edit-kelas" id="modalEdit" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Kelas</h4>
            </div>
            <form class="form-horizontal form-edit-kelas" action="master-data/ajax-kelas.html" role="form">
                <div class="modal-body">
                    <!-- <div class="form-group">
                      <label>Jurusan</label>
                      <select required style="width: 100%;" class="select2-nosearch dropdown-jurusan" name="form[id_jurusan]">
                          <option value="">Pilih Kelas</option>
                      </select>
                      <br>
                    </div> -->
                    <div>
                      <label>Nama Kelas <span class="text-danger">*</span></label>
                      <input required type="text" class="form-control" placeholder="Nama Kelas" name="form[nama]">
                      <br>
                    </div>
                    <div>
                        <label>Wali Kelas <span class="text-danger">*</span></label>
                        <select class="select2-nosearch dropdown-pegawai2 pegawai" name="form[id_walikelas]" style="width:100%;" required>
                          <option val="">Pilih Wali Kelas</option>
                        </select>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="hidden-idupdate" name="form[id_kelas]" value="">                    
                    <a hre="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
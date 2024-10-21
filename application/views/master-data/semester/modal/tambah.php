<?php 
    if(empty($date) && empty($tomorrow)) {
        $date = date("d M Y");
        $tomorrow = date("d M Y", strtotime("+6 month"));
    }
?>
<div class="modal fade modal-tambah-semester" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">The Title</h4>
            </div>
            <form id="FrmAddSemester" action="master-data/ajax-semester.html" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Keterangan<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="form[nama]" placeholder="Keterangan" required>
                    </div>
                    <div class="form-group">
                        <label>Tgl Mulai<span class="text-danger">*</span></label>
                        <div class='input-group date col-sm-1 col-md-3 col-lg-12' id='datetimepicker6'>
                            <input type='text' class="form-control tanggal" placeholder="Tanggal Mulai"  name="form[dari]" value="<?php echo $date; ?>" required/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Berakhir<span class="text-danger">*</span></label>
                        <div class='input-group date col-sm-1 col-md-3 col-lg-12' id='datetimepicker7'>
                            <input type='text' class="form-control tanggal" placeholder="Tanggal Berakhir" name="form[sampai]" value="<?php echo $tomorrow; ?>" required/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <input type="hidden" class="hidden-idupdate" name="form[id_update]" value=""> -->
                    <a href="#" class="btn btn-default" data-dismiss="modal">Batal</a>
                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
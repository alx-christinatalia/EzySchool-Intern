<div class="modal fade modal-detail" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">The Title</h4>
            </div>
            <div class="modal-body">
                <form id="FrmDetail" action="" role="form">
                    <div class="row" >
                        <div class="col-sm-4" align="center">
                            <img class="img-responsive prof" alt=""  onerror="this.src='<?php echo base_url("assets/img/default-user.png");?>'"><br>
                        </div>
                        <div class="col-sm-8">
                            <ul class="list-group">
                                <li class="list-group-item">    
                                   <div class="profile-desc-link">
                                       <div class="row">
                                            <div class="col-xs-3 bold font-15">
                                                Kelas
                                            </div>
                                            <div class="col-xs-9">
                                                <label name="form[nama]">-</label>
                                            </div>
                                        </div>
                                    </div> 
                                </li>
                                <li class="list-group-item">    
                                   <div class="profile-desc-link">
                                       <div class="row">
                                            <div class="col-xs-3  bold font-15">
                                                Wali Kelas
                                            </div>
                                            <div class="col-xs-9">
                                                <label name="form[pegawai_nama]">-</label>
                                            </div>
                                        </div>
                                    </div> 
                                </li>
                                <li class="list-group-item">    
                                   <div class="profile-desc-link">
                                       <div class="row">
                                            <div class="col-xs-3 bold font-15">
                                                Alamat
                                            </div>
                                            <div class="col-xs-9 text-email">
                                                <label name="form[alamat]">-</label>
                                            </div>
                                        </div>
                                    </div> 
                                </li>
                                <li class="list-group-item">    
                                   <div class="profile-desc-link">
                                       <div class="row">
                                            <div class="col-xs-3 bold font-15">
                                                Email
                                            </div>
                                            <div class="col-xs-9 text-email">
                                                <label name="form[email]">-</label>
                                            </div>
                                        </div>
                                    </div> 
                                </li>
                            </ul>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>
</div>
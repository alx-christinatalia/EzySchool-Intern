<div class="modal fade modal-detail" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">The Title</h4>
            </div>
            <div class="modal-body">
                <form id="FrmDetail" action="" role="form">
                    <div class="row" align="center">
                        <div class="col-md-4">
                            <img class="img-responsive img-circle prof" alt="" style="width: 200px;" onerror="this.src='<?php echo base_url("assets/img/default-user.png");?>'"><br>
                             <center><label class="bold" name="form[nama]"></label></center>
                        </div>
                        <div class="col-md-8">
                            <ul class="list-group">
                                 <li class="list-group-item "> 
                                    <div class="profile-desc-link text-left">
                                        <div class="row">
                                        <div class="col-sm-4 col-xs-5 bold font-15">NIP
                                        </div>
                                        <div class="col-sm-8 col-xs-7" >
                                        <label name="form[nip]"></label>
                                        </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">  
                                    <div class="profile-desc-link text-left">
                                     <div class="row">
                                        <div class="col-sm-4 col-xs-5 bold font-15">
                                        Jabatan
                                        </div>
                                        <div class="col-sm-8 col-xs-7">
                                        <label name="form[jabatan]"></label>
                                        </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">    
                                    <div class=" profile-desc-link text-left">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-5 bold font-15">
                                                Alamat
                                            </div>
                                            <div class="col-sm-8 col-xs-7 " >
                                                <label name="form[alamat]"> </label>
                                            </div>
                                        </div>
                                    </div> 
                                </li>
                                <li class="list-group-item">    
                                    <div class="profile-desc-link text-left">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-5 bold font-15">
                                                Jenis Kelamin
                                            </div>
                                            <div class="col-sm-8 col-xs-7">
                                                <label  name="form[jk]"></label>
                                            </div>
                                        </div>
                                    </div> 
                                </li>
                                <li class="list-group-item text-left">    
                                    <div class="profile-desc-link">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-5 bold font-15">
                                                Username
                                            </div>
                                            <div class="col-sm-8 col-xs-7">
                                                <label  name="form[username]"></label>
                                            </div>
                                        </div>
                                    </div> 
                                </li>
                                <li class="list-group-item text-left">    
                                    <div class="profile-desc-link">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-5 bold font-15">
                                                Email
                                            </div>
                                            <div class="col-sm-8 col-xs-7" >
                                                <label name="form[email]"></label>
                                            </div>
                                        </div>
                                    </div> 
                                </li>
                                <li class="list-group-item text-left">    
                                    <div class="profile-desc-link">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-5 bold font-15">
                                                Tanggal Expired
                                            </div>
                                            <div class="col-sm-8 col-xs-7" >
                                                <label name="form[tgl_expired]"></label>
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
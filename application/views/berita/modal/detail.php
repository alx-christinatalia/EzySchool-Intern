<div class="modal fade modal-detail" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">The Title</h4>
            </div>
            <form id="FrmDetail" action="" role="form">
                <div class="modal-body">
                    <div class="row" align="center">
                        <div class="col-md-4">
                            <img class="img-responsive prof" alt="" style="max-width: 200px;" onerror="this.src='<?php echo base_url("assets/img/default-news.jpg");?>'"><br>
                        </div>
                        <div class="col-md-8">
                            <ul class="list-group">
                                <li class="list-group-item "> 
                                    <div class="profile-desc-link text-left">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-5 bold font-15">
                                                Nama Pegawai
                                            </div>
                                            <div class="col-sm-8 col-xs-7" >
                                                <label name="form[pegawai_nama]"></label>
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
                                                <label name="form[pegawai_jabatan]">-</label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">    
                                    <div class=" profile-desc-link text-left">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-5 bold font-15">
                                                Subyek
                                            </div>
                                            <div class="col-sm-8 col-xs-7 " >
                                                <label name="form[subyek]">-</label>
                                            </div>
                                        </div>
                                    </div> 
                                </li>
                                <li class="list-group-item">    
                                    <div class="profile-desc-link text-left">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-5 bold font-15">
                                            Status
                                            </div>
                                            <div class="col-sm-8 col-xs-7">
                                                <label  name="form[is_published]"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">    
                                    <div class="profile-desc-link text-left">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-5 bold font-15">
                                            Tgl Insert
                                            </div>
                                            <div class="col-sm-8 col-xs-7">
                                            <label  name="form[tgl_insert]"></label>
                                            </div>
                                        </div>
                                    </div> 
                                </li>
                                <li class="list-group-item">    
                                    <div class="profile-desc-link text-left">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-5 bold font-15">
                                                Waktu Post
                                            </div>
                                            <div class="col-sm-8 col-xs-7" >
                                                <label name="form[tgl_publish]"></label>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
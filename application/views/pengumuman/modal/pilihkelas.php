<div class="modal fade bs-modal-md modal-pilih" id="pilihkelas" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <div class="row">
                    <div class="col-md-7">
                        <h4 class="modal-title">Pilih Kelas</h4>
                    </div>
                    <div class="col-md-5">
                        <form id="SetFrmKelas">
                            <div class="input-group input-search">
                                <input type="text" placeholder="Cari (Nama Kelas)" class="form-control kywd" autofocus title="Cari (Nama Kelas)"> 
                                <span class="input-group-btn">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div style="min-height: 50px;" class="content-modal">
                    <div class="base-content">
                        <div class="row">
                            <div style="padding-left: 0px; padding-right: 0px;" class="col-md-12">
                                <div class="list-group list-group-kelas">
                                </div>
                            </div>
                        </div>
                        <div class="set-pagination-layout hidden">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <span class="set-pagination-layout">
                                        <a role="button" class="btn btn-primary disabled kelasprev">
                                            <i class="fa fa-chevron-left"></i>
                                        </a>    
                                        <a role="button" class="btn btn-primary disabled kelasnext">
                                            <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
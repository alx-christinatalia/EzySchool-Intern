<?php 
    $user = $this->session->userdata("user");
    $sekolah = $this->session->userdata("sekolah");
    $sekolah = $sekolah->Data[0];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Kelas | <?php echo $this->config->item("app_title"); ?></title>
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="" name="description">

        <link href="<?php echo base_url("assets/css/font.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
        
        <link href="<?php echo base_url("assets/plugins/simple-line-icons/simple-line-icons.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/bootstrap-switch/bootstrap-switch.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/toastr/toastr.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/select2/select2.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/select2/select2-bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/ladda/ladda-themeless.min.css"); ?>" rel="stylesheet">
    
        <link href="<?php echo base_url("assets/css/components-rounded.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/plugins.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/layout.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/default.min.css"); ?>" id="style_color" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/responsive.css"); ?>" rel="stylesheet">

        <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-32x32.png"); ?>" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-16x16.png"); ?>" sizes="16x16" />
        <style type="text/css">
            .font-15{
                font-size: 15px;
            }
            .list-group-item {
                padding: 6px 5px;
            }
        </style>
    </head><!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <?php $this->load->view("other/header") ?>
        <div class="page-container">
            <?php $this->load->view("other/sidebar") ?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-head">
                        <div class="row">
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="page-title">
                                    <h1><i class="fa fa-database"></i> Kelas</h1>
                                </div>
                                <ul class="page-breadcrumb breadcrumb col-xs-12" style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;">
                                    <li>
                                        <span class="active text-default">Master Data</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Kelas</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12 text-right">
                                <div class="form-inline">
                                    <div class="form-group text-center">
                                        <form id="FrmSearch">
                                            <div class="input-group input-search">
                                                <input type="text" placeholder="Cari (Nama)" class="form-control kywd" autofocus title="Cari (Nama)"> 
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="form-group text-right">
                                        <a data-toggle="modal" data-target="#modalImport" role="button" class="btn btn-primary" title="Import File Excel">
                                            <i class="fa fa-file-excel-o"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary tambah-kelas" title="Tambah Kelas">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" data-toggle="collapse" data-target=".filter" title="Filter Data">
                                            <i class="fa fa-filter"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" onclick="location.reload();" title="Refresh">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                        <span class="pagination-layout">
                                            <a role="button" class="btn btn-primary disabled prev" title="Daftar Sebelumnya">
                                                <i class="fa fa-chevron-left"></i>
                                            </a>    
                                            <a role="button" class="btn btn-primary disabled next" title="Daftar Selanjutnya">
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-bottom: -10px;" class="filter in col-md-12">
                            <?php 
                                if($sekolah->install_step == 1) {
                                    echo $this->foglobal->MakeAlert("<strong>Info!</strong> Tambahkan kelas dengan klik tombol <a role='button' class='btn btn-vs btn-primary tambah-kelas'><i class='fa fa-plus'></i></a> (Minimal tambahkan 1 kelas). Jika anda ingin menambahkan walikelas <a href='".base_url("manajemen_user/tambah.html")."' target='_blank'>klik disini</a>.");
                                }
                            ?>
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <!-- FrmFilter -->
                                    <form id="FrmFilter" role="form">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch is_active">
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Urutkan</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch sort" class="form">
                                                        <option value="id_kelas asc">Default</option>
                                                        <option value="pegawai_nama asc">Nama Wali Kelas [A-Z]</option>
                                                        <option value="pegawai_nama desc">Nama Wali Kelas [Z-A]</option>
                                                        <option value="nama asc">Nama Kelas [A-Z]</option>
                                                        <option value="nama desc">Nama Kelas [Z-A]</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3" style="vertical-align: bottom;">
                                                <div class="form-group">
                                                    <label>&nbsp;</label><br>
                                                    <button class="btn btn-primary">Tampilkan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="portlet custom light bordered">
                                <div class="portlet-body">
                                    <div class="table-container  table-responsive">
                                            <table class="table table-striped table-hover datatable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 75px;" class="text-center"> Action </th>
                                                    <th> Nama Kelas </th>
                                                    <th> Wali Kelas </th>
                                                    <th> Last Update </th>
                                                    <th class="text-center"> Status </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="10" class="text-center loading">
                                                        <img src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="pagination-layout hidden">
                                <div class="row">
                                    <div class="col-sm-4 col-xs-8">
                                        <div class="form-group" style="max-width: 250px;">
                                            <div class="input-group paging">
                                                <span class="input-group-btn">
                                                    <a role="button" class="btn btn-primary input-sm disabled first"><i class="fa fa-step-backward"></i></a>
                                                    <a role="button" class="btn btn-primary input-sm disabled prev"><i class="fa fa-chevron-left"></i></a>
                                                </span>
                                                <form id="FrmGotoPage">
                                                    <input type="text" class="form-control input-sm text-center" value="1">
                                                </form>
                                                <span class="input-group-btn">
                                                    <a role="button" class="btn btn-primary input-sm disabled next"><i class="fa fa-chevron-right"></i></a>
                                                    <a role="button" class="btn btn-primary input-sm disabled last"><i class="fa fa-step-forward"></i></a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7 hidden-sm hidden-xs">
                                        <div class="form-group">
                                            <div class="info text-right">1 - 10 dari 264 Data | 27 Halaman</div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 hidden-sm hidden-xs">
                                        <div class="form-group">
                                            <select class="form-control select2-nosearch input-sm limit" style="width: 100%;">
                                                <option value="10" selected>10</option>
                                                <option value="20">20</option>
                                                <option value="30">30</option>
                                                <option value="40">40</option>
                                                <option value="50">50</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $this->load->view("other/footer") ?>
        </div>

        <?php $this->load->view("master-data/kelas/modal/import") ?>
        <?php $this->load->view("master-data/kelas/modal/edit"); ?>
        <?php $this->load->view("master-data/kelas/modal/tambah"); ?>
        <?php $this->load->view("master-data/kelas/modal/edit-status") ?>
        <?php $this->load->view("master-data/kelas/modal/detail"); ?>

        <!--[if lt IE 9]>
        <script src="../assets/global/plugins/respond.min.js"></script>
        <script src="../assets/global/plugins/excanvas.min.js"></script> 
        <script src="../assets/global/plugins/ie8.fix.min.js"></script> 
        <![endif]-->

        <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script> 
       
        <script src="<?php echo base_url("assets/plugins/moment.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/js.cookie.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/jquery.blockui.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/bootstrap-switch/bootstrap-switch.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/toastr/toastr.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/select2/select2.full.min.js"); ?>"></script>

        <!-- Jquery Validate + Ladda Button -->
        <script src="<?php echo base_url("assets/plugins/validate/jquery.validate.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/ladda/spin.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.jquery.min.js"); ?>"></script> 
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 
        <script>
            pagename = "master-data/ajax-kelas.html";
            $(document).ready(function() {
                GetData(request);
                getdatadropdownpegawai2();

                $(".tambah-kelas").on("click", function() {
                    resetformvalue(".form-kelas-baru");

                    $(".modal-tambah-kelas .modal-title").html("Tambah Kelas");
                    $(".modal-tambah-kelas").modal("show");
                });
                
                if("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }

                document.getElementById("form-import-kelas").reset();
            });

            $("#FrmFilter").submit(function() {
                var status = $(this).find(".is_active").val(), sort = $(this).find(".sort").val();
                request["Sort"] = sort;
                request["filter"]["status"] = status; 
                GetData(request);
                return false;
            });

            $(".datatable tbody").on("click", ".edit-data", function() {
                resetformvalue("#modalEdit");
                var FrmSave = $("#modalEdit");

                var id_update = $(this).data("idupdate");
                $(".hidden-idupdate").val(id_update);

                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    FrmSave.find("input[name='form[nama]']").val(resp.nama);
                    FrmSave.find("select[name='form[id_walikelas]']").val(resp.id_walikelas).trigger("change");
                    FrmSave.find("input[name='form[id_kelas]']").val(resp.id_kelas);

                    $(".modal-edit-kelas .modal-title").html("Edit Kelas " + resp.nama);
                    $(".modal-edit-kelas").modal("show");
                });
            });

            var FrmSaveWebsite = $(".form-edit-kelas").validate({
                submitHandler: function(form) {
                    UpdateData(form, function(resp) {
                        GetData(request);
                    });                    
                },
                errorPlacement: function (error, element) {
                    if (element.parent(".input-group").length) { 
                        error.insertAfter(element.parent());      // radio/checkbox?
                    } else if (element.hasClass("select2-normal") || element.hasClass("select2-nosearch")) {     
                        error.insertAfter(element.next("span"));  // select2
                    } else {                                      
                        error.insertAfter(element);               // default
                    }
                }
            });

            $(".fileimportkelas").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    var filename = this.files[0].name.toString();
                    var tipe = ['application/vnd.ms-excel', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/excel', 'application/download', 'application/vnd.ms-office', 'application/msword','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip', 'application/vnd.ms-excel', 'application/msword', 'application/x-zip', 'application/vnd.ms-excel.sheet.macroEnabled.12'];
                    if(tipe.indexOf(tipefile) == -1) {
                        $(this).val("");
                        toastrshow("warning", "Format salah, pilih file dengan format xls/xlsm/xlsx", "Warning");
                        return;
                    }

                    if((this.files[0].size / 1024) < 2048){
                        var FR = new FileReader();
                        FR.addEventListener("load", function(e) {
                            //var base64 = e.target.result;
                            var base64 = e.target.result.replace("data:"+tipefile+";base64,", '');
                            var ext = filename.split(".").pop();
                            $(".fileimportkelas-hidden").val(base64);
                            $(".fileimportkelasext-hidden").val(ext);
                        }); 
                        FR.readAsDataURL(this.files[0]);
                    } else {
                        $(this).val("");
                        toastrshow("warning", "Ukuran file maksimum adalah 2 MB", "Warning");
                    }
                }
            });

            var FrmSaveWebsite = $(".form-import-kelas").validate({
                submitHandler: function(form) {
                    uploadfile(form, function(resp) {
                        GetData(request);
                    });                   
                }
            });

            var FrmSaveWebsite = $(".form-kelas-baru").validate({
                submitHandler: function(form) {
                    InsertData(form, function(resp) {
                        GetData(request);
                        $(".filter .alert").hide();
                    });                    
                },
                errorPlacement: function (error, element) {
                    if (element.parent(".input-group").length) { 
                        error.insertAfter(element.parent());      // radio/checkbox?
                    } else if (element.hasClass("select2-normal") || element.hasClass("select2-nosearch")) {     
                        error.insertAfter(element.next("span"));  // select2
                    } else {                                      
                        error.insertAfter(element);               // default
                    }
                }
            });

            $(".datatable tbody").on("click", ".status-data", function() {
                resetformvalue("#FrmUpdateStatus");
                
                var FrmSave = $("#FrmUpdateStatus");
                var id_update = $(this).data("idupdate");
                $(".hidden-idupdate").val(id_update);
                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    FrmSave.find("input[name='form[id_kelas]']").val(resp.id_kelas);
                    FrmSave.find("select[name='form[is_active]']").val(resp.is_active).trigger("change");

                    $(".modal-update-status .modal-title").html("Edit Status " + resp.nama);
                    $(".modal-update-status").modal("show");
                });
            });

            var FrmSaveWebsite = $("#FrmUpdateStatus").validate({
                submitHandler: function(form) {
                    UpdateData(form, function(resp) {
                        GetData(request);
                    });                    
                },
                errorPlacement: function (error, element) {
                    if (element.parent(".input-group").length) { 
                        error.insertAfter(element.parent());      // radio/checkbox?
                    } else if (element.hasClass("select2-normal") || element.hasClass("select2-nosearch")) {     
                        error.insertAfter(element.next("span"));  // select2
                    } else {                                      
                        error.insertAfter(element);               // default
                    }
                }
            });

            $(".datatable tbody").on("click", ".detail-data", function() {
                resetformvalue("#FrmDetail");
                var FrmDetail = $("#FrmDetail");
                var id_update = $(this).data("idupdate");
                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    if(resp.pegawai_foto == "default.png" || resp.pegawai_foto == null || resp.pegawai_foto == "") {
                        $(".prof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                    } else {
                        foto = ParseGambar(resp.pegawai_foto);
                        $(".prof").attr("src", foto);
                    }
                    FrmDetail.find("label[name='form[nama]']").html(CheckStrip(resp.nama));
                    FrmDetail.find("label[name='form[pegawai_nama]']").html(CheckStrip(resp.pegawai_nama));
                    FrmDetail.find("label[name='form[email]']").html(CheckStrip(resp.pegawai_email));
                    FrmDetail.find("label[name='form[alamat]']").html(CheckStrip(resp.pegawai_alamat));

                    $(".modal-detail .modal-title").html("Detail Kelas " + resp.nama);
                    $(".modal-detail").modal("show");
                });
            });

            $("#modalAdd, #modalEdit").on("shown.bs.modal", function() {
                $(this).find("input[name='form[nama]']").focus();
            });
        </script>
    </body>
</html>
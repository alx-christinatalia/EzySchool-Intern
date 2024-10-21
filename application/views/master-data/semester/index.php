<?php 
    $user = $this->session->userdata("user");
    date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Semester | <?php echo $this->config->item("app_title"); ?></title>
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

        <link href="<?php echo base_url("assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css"); ?>" rel="stylesheet">

        <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-32x32.png"); ?>" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-16x16.png"); ?>" sizes="16x16" />
    </head><!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <?php $this->load->view("other/header") ?>
        
        <div class="page-container">
            <?php $this->load->view("other/sidebar") ?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-head">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="page-title">
                                    <h1><i class="fa fa-database"></i> Semester</h1>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12 text-right">
                                <div class="pencarian-layout form-inline">
                                    <!-- <div class="form-group text-center">
                                        <form id="FrmSearch">
                                            <div class="input-group input-search">
                                                <input type="text" placeholder="Cari (Nama)" class="form-control kywd" autofocus> 
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div> -->
                                    <div class="form-group text-center">
                                        <!-- <a data-toggle="modal" data-target="#modalImport" role="button" class="btn btn-primary">
                                            <i class="fa fa-file-excel-o"></i>
                                        </a> -->
                                        <a role="button" class="btn btn-primary tambah-semester">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" data-toggle="collapse" data-target=".filter">
                                            <i class="fa fa-filter"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" onclick="location.reload();">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                        <span class="pagination-layout">
                                            <a role="button" class="btn btn-primary disabled prev">
                                                <i class="fa fa-chevron-left"></i>
                                            </a>    
                                            <a role="button" class="btn btn-primary disabled next">
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb">
                        <li>
                            <span class="active text-default">Master Data</span>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active text-default">
                                <a href="#" onclick="location.reload();">Semester</a>
                            </span>
                        </li>
                    </ul>
                    <div class="base-content">
                        <div class="row">
                            <div style="margin-bottom: -10px;" class="filter in col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-body">
                                        <!-- FrmFilter -->
                                        <form id="FrmFilter" role="form">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control select2-nosearch is_active">
                                                            <option value="1">Aktif</option>
                                                            <option value="0">Tidak Aktif</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Urutkan</label>
                                                        <select class="form-control select2-nosearch sort" class="form">
                                                            <option value="id asc">Default</option>
                                                            <option value="dari desc">Tanggal Mulai Terbaru [A-Z]</option>
                                                            <option value="dari asc">Tanggal Mulai Terbaru [Z-A]</option>
                                                            <option value="sampai asc">Tanggal Berakhir Terbaru [A-Z]</option>
                                                            <option value="sampai desc">Tanggal Berakhir Terbaru [Z-A]</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="vertical-align: bottom;">
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
                                        <div class="table-container">
                                            <table class="table table-striped table-hover table-responsive datatable">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 75px;" class="text-center"> Action </th>
                                                        <th> Keterangan </th>
                                                        <th style="width: 150px;"> Tanggal Mulai </th>
                                                        <th style="width: 150px;"> Tanggal Berakhir </th>
                                                        <th style="width: 75px;" class="text-center"> Status </th>
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
                        </div>
                        <div class="pagination-layout hidden">
                            <div class="row">
                                <div class="col-md-3 col-sm-4 col-xs-9">
                                    <div class="form-group">
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
                                <div class="col-md-8 hidden-sm hidden-xs">
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

        <?php $this->load->view("master-data/semester/modal/tambah"); ?>
        <?php $this->load->view("master-data/semester/modal/edit-data"); ?>
        <?php $this->load->view("master-data/semester/modal/edit-status"); ?>
        <?php $this->load->view("master-data/semester/modal/detail"); ?>

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

        <!-- Bootstrap Datepicker -->
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"); ?>"></script>

        <script>
            pagename = "master-data/ajax-semester.html";
            $(document).ready(function() {
                GetData(request);
                // var date = new Date().getFullYear();
                // for(i = date; i > date - 10; i--){
                //     $(".dropdown-tahun").append("<option value=" + i + ">" + i + "</option>");
                // }

                // $(".tahun").val(new Date().getFullYear()).trigger("change");
                // $(".bulan").val(new Date().getMonth() + 1).trigger("change");
                // $("#FrmFilter").submit();

                $(".tambah-semester").on("click", function() {
                    resetformvalue("#FrmAddSemester");
                    $(".modal-tambah-semester .modal-title").html("Tambah Data Semester");
                    $(".modal-tambah-semester").modal("show");
                });
                
                if("<?php echo $user->foto; ?>" == "default.png")
                {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                }
                else
                {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }

                // $('#datetimepicker6').datetimepicker({
                //     format: 'YYYY-MM-DD HH:mm:ss',
                //     showTodayButton: true,
                //     showClear: true,
                //     showClose: true

                // });
                // $('#datetimepicker7').datetimepicker({
                //     format: 'YYYY-MM-DD HH:mm:ss',
                //     showTodayButton: true,
                //     showClear: true,
                //     showClose: true
                // });
                // $("#datetimepicker6").on("dp.change", function (e) {
                //     $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                // });
                // $("#datetimepicker7").on("dp.change", function (e) {
                //     $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                // });

                // $('#datetimepicker8').datetimepicker({
                //     format: 'YYYY-MM-DD HH:mm:ss',
                //     showTodayButton: true,
                //     showClear: true,
                //     showClose: true

                // });
                // $('#datetimepicker9').datetimepicker({
                //     format: 'YYYY-MM-DD HH:mm:ss',
                //     showTodayButton: true,
                //     showClear: true,
                //     showClose: true
                // });
                // $("#datetimepicker8").on("dp.change", function (e) {
                //     $('#datetimepicker9').data("DateTimePicker").minDate(e.date);
                // });
                // $("#datetimepicker9").on("dp.change", function (e) {
                //     $('#datetimepicker8').data("DateTimePicker").maxDate(e.date);
                // });

                $('#datetimepicker6').datepicker({
                    defaultDate: new Date(),
                    autoclose: true,
                    format: 'dd M yyyy',
                    todayHighlight: true,
                    maxViewMode: 2,
                    immediateUpdates: true

                });
                $('#datetimepicker7').datepicker({
                    defaultDate: new Date(),
                    autoclose: true,
                    format: 'dd M yyyy',
                    todayHighlight: true,
                    maxViewMode: 2,
                    immediateUpdates: true
                });
                $("#datetimepicker6").on("dp.change", function (e) {
                    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                });
                $("#datetimepicker7").on("dp.change", function (e) {
                    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                });

                $('#datetimepicker8').datepicker({
                    defaultDate: new Date(),
                    autoclose: true,
                    format: 'dd M yyyy',
                    todayHighlight: true,
                    maxViewMode: 2,
                    immediateUpdates: true

                });
                $('#datetimepicker9').datepicker({
                    defaultDate: new Date(),
                    autoclose: true,
                    format: 'dd M yyyy',
                    todayHighlight: true,
                    maxViewMode: 2,
                    immediateUpdates: true
                });
                $("#datetimepicker8").on("dp.change", function (e) {
                    $('#datetimepicker9').data("DateTimePicker").minDate(e.date);
                });
                $("#datetimepicker9").on("dp.change", function (e) {
                    $('#datetimepicker8').data("DateTimePicker").maxDate(e.date);
                });
            });

            $("#FrmFilter").submit(function() {
                var status = $(this).find(".is_active").val(), sort = $(this).find(".sort").val(), tahun = $(this).find(".tahun").val();
                request["Sort"] = sort;
                request["filter"]["status"] = status;
                // request["filter"]["tahun"] = tahun; 
                GetData(request);
                return false;
            });

            $(".datatable tbody").on("click", ".edit-data", function() {
                resetformvalue("#FrmSaveSemester");
                var FrmSave = $("#FrmSaveSemester");
                var id_update = $(this).data("idupdate");

                $(".hidden-idupdate").val(id_update);

                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    FrmSave.find("input[name='form[nama]']").val(resp.nama);
                    dari = moment(resp.dari, "YYYY-MM-DD HH:mm:ss").format("DD MMM YYYY");
                    FrmSave.find("input[name='form[dari]']").val(dari);
                    sampai = moment(resp.sampai, "YYYY-MM-DD HH:mm:ss").format("DD MMM YYYY");
                    FrmSave.find("input[name='form[sampai]']").val(sampai);
                    // FrmSave.find("input[name='form[is_active]']").val(resp.is_active);
                    $(".modal-save-semester .modal-title").html("Edit Data " + resp.nama);
                    $(".modal-save-semester").modal("show");
                });
            });

            $(".datatable tbody").on("click", ".detail-data", function() {
                resetformvalue("#FrmDetail");
                var FrmDetail = $("#FrmDetail");
                var id_update = $(this).data("idupdate");
                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    FrmDetail.find("label[name='form[nama]']").html(resp.nama);
                    FrmDetail.find("label[name='form[dari]']").html(resp.dari);
                    FrmDetail.find("label[name='form[sampai]']").html(resp.sampai);

                    $(".modal-detail .modal-title").html("Detail " + resp.nama);
                    $(".modal-detail").modal("show");
                });
            });

            $(".datatable tbody").on("click", ".status-data", function() {
                resetformvalue("#FrmUpdateStatus");
                var FrmSave = $("#FrmUpdateStatus");
                var id_update = $(this).data("idupdate");

                $(".hidden-idupdate").val(id_update);

                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    FrmSave.find("select[name='form[is_active]']").val(resp.is_active).trigger("change");

                    $(".modal-update-status .modal-title").html("Edit Status " + resp.nama);
                    $(".modal-update-status").modal("show");
                });
            });

            //Save Semester
            var FrmUpdateStatus = $("#FrmUpdateStatus").validate({
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

            //Add Semester
            var FrmAddSemester = $("#FrmAddSemester").validate({
                submitHandler: function(form) {
                    InsertData(form, function(resp) {
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

            //Save Semester
            var FrmSaveSemester = $("#FrmSaveSemester").validate({
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
        </script>
    </body>
</html>
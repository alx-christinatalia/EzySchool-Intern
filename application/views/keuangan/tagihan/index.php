<?php 
    $user = $this->session->userdata("user");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Daftar Tagihan | <?php echo $this->config->item("app_title"); ?></title>
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
        <link href="<?php echo base_url("assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"); ?>" rel="stylesheet">
        
        <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-32x32.png"); ?>" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-16x16.png"); ?>" sizes="16x16" />
        <style type="text/css">
            .clockpicker-popover {
                z-index: 999999 !important;
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
                            <div class="col-sm-6">
                                <div class="page-title">
                                    <h1><i class="fa fa-money"></i> Daftar Tagihan</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                    <li>
                                        <span class="active text-default">Keuangan</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">Tagihan</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a onclick="location.reload();"> Daftar</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <form id="FrmSearch">
                                            <div class="input-group input-search">
                                                <input type="text" placeholder="Cari (Nama Siswa, Nomor Tagihan, Nama Tagihan, NIS)" title="Cari (Nama Siswa, Nomor Tagihan, Nama Tagihan, NIS)" class="form-control kywd" autofocus> 
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <a role="button" class="btn btn-primary" href="<?php echo base_url("tagihan/tambah.html");?>" title="Tambah Tagihan">
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
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <!-- FrmFilter -->
                                    <form id="FrmFilter" role="form">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-6">
                                                <div class="form-group">
                                                    <label>Kelas</label>
                                                    <select style="width:100%;" class="form-control select2-normal dropdown-kelas kelas"  class="form">
                                                        <option value="">Semua Kelas</option>
                                                            <?php print_r($dropdownkelas->lsdt) ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-6">
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch dropdown-kattagihan2 kategori"  class="form">
                                                        <option value="">Semua Kategori</option>
                                                        <?php print_r($dropdownkategori->lsdt) ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch jenis">
                                                        <option value="1">Akan Datang</option>
                                                        <option value="2" selected>Belum Dibayar</option>
                                                        <option value="3">Sudah Dibayar / Angsur</option>                                                             
                                                        <option value="4">Lunas</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-6">
                                                <div class="form-group">
                                                    <label>Publish</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch is_published">
                                                        <option value="">Semua</option>
                                                        <option value="1">Publish</option>
                                                        <option value="0">Tidak Publish</option>                                                            
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-6">
                                                <div class="form-group">
                                                    <label>Urutkan</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch sort" class="form">
                                                        <option value="tgl_insert desc">Default</option>
                                                        <option value="tgl_tagihan asc">Tgl Tagihan Dibuat [A-Z]</option>
                                                        <option value="tgl_tagihan desc">Tgl Tagihan Dibuat [Z-A]</option>
                                                        <option value="tgl_jatuh_tempo asc">Tgl Jatuh Tempo [A-Z]</option>
                                                        <option value="tgl_jatuh_tempo desc">Tgl Jatuh Tempo [Z-A]</option>
                                                        <option value="tgl_insert asc">Waktu Insert [A-Z]</option>
                                                        <option value="tgl_insert desc">Waktu Insert [Z-A]</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-6">
                                                <div class="form-group" style="vertical-align: bottom;">
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
                                    <div class="table-container table-responsive">
                                        <table class="table table-striped table-hover datatable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 75px;" class="text-center"> Action </th>
                                                    <th style="width: 125px;"> No. Tagihan </th>
                                                    <th> Nama Tagihan </th>
                                                    <th style="width: 105px;"> Sisa Tagihan</th>
                                                    <th style="width: 115px;"> Nama Siswa</th>
                                                    <th style="width: 110;"> Tgl Tagihan </th>
                                                    <th style="width: 120px;"> Jatuh Tempo </th>
                                                    <th style="width: 50px;" class="text-center"> Status </th>
                                                    <th class="text-center"></th>
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
            </div>
             
            <?php $this->load->view("other/footer") ?>
        </div>

        <?php $this->load->view("keuangan/tagihan/modal/edit-data") ?>

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

        <!-- Bootstrap Datetimepicker -->
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"); ?>"></script>

        <script>
            pagename = "keuangan/ajax-tagihan.html";
            $(document).ready(function() {
//                getdatadropdownkattagihan2();
//                getdatadropdownkelas2();
                $("#FrmFilter").submit();

                $('#datetimepicker5').datepicker({
                    defaultDate: new Date(),
                    autoclose: true,
                    format: 'dd M yyyy',
                    todayHighlight: true,
                    maxViewMode: 2,
                    immediateUpdates: true
                }).on('changeDate', function (selected) {
                    var minDate = new Date(selected.date.valueOf());
                    $('#datetimepicker6').datepicker('setStartDate', minDate);
                });

                $('#datetimepicker6').datepicker({
                    startDate: new Date($('#datetimepicker5').val()),
                    defaultDate: new Date(),
                    autoclose: true,
                    format: 'dd M yyyy',
                    todayHighlight: true,
                    maxViewMode: 2,
                    immediateUpdates: true
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
            });

            $("#FrmFilter").submit(function() {
                var kelas           = $(this).find(".kelas").val()
                var kategori        = $(this).find(".kategori").val()
                var jenis           = $(this).find(".jenis").val()
                var is_published    = $(this).find(".is_published").val()
                var sort            = $(this).find(".sort").val();
                request["Sort"] = sort;
                request["filter"]["is_published"] = is_published;
                request["filter"]["id_kelas"] = kelas;
                request["filter"]["jns_kat"] = kategori; 
                request["filter"]["jns_tag"] = jenis; 
                request["Page"] = 1;
                GetData(request);
                
                $("input[name='page']").val("1");
                return false;
            });

            $(".dropdown-kelas3").on("change", function() {
                if($(this).val() == "") {
                    $(".dropdown-siswa2").prop("disabled", true);
                    $("input[name='form[nis]']").val("");
                } else if ($(this).val() != "") {
                    $(".dropdown-siswa2").removeProp("disabled");
                    getdatadropdownsiswa2("",$(this).val());
                    $("input[name='form[nis]']").val($(".dropdown-siswa2").val());
                }
                $(".dropdown-siswa2").val("").trigger("change");
            });

            $(".dropdown-siswa2").on("change", function() {
                if($(this).val() == "") {
                    $("input[name='form[nis]']").val("");
                } else {
                    $("input[name='form[nis]']").val($(this).val());
                }
            });

            $(".publish").change(function(){
                if($(this).val() == 0) {
                    $(".tanggal").prop("disabled", true);
                    $(".tanggal").removeAttr("readonly");
                    $(".tanggal").attr("required", false);  
                    $(".tanggal").attr('style', "background-color: #ebeef3");
                    $(".btn-edit-simpan").addClass("disabled");
                } else {
                    $(".tanggal").removeProp("disabled");
                    $(".tanggal").attr("readonly", "");
                    $(".tanggal").attr("required", true);
                    $(".tanggal").attr('style', "background-color: #ffffff");
                    $(".btn-edit-simpan").removeClass("disabled");
                }
            });

            $(".datatable tbody").on("click", ".edit-data", function() {
                resetformvalue("#FrmSaveTagihan");
                var FrmSave = $("#FrmSaveTagihan");
                var id_update = $(this).data("idupdate");

                $(".hidden-idupdate").val(id_update);                
                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];

                    FrmSave.find("select[name='form[is_published]']").val(resp.is_published).trigger("change");
                    
                    var tgl1 = moment(resp.tgl_tagihan, "YYYY-MM-DD HH:mm:ss").format('DD MMM YYYY');
                    var tgl2 = moment(resp.tgl_jatuh_tempo, "YYYY-MM-DD HH:mm:ss").format('DD MMM YYYY');

                    $("#datetimepicker5").val(tgl1);
                    $("#datetimepicker6").val(tgl2);
                    if(resp.is_published == 0){
                        $(".tanggal").prop("disabled", true);
                    } else {
                        $(".tanggal").removeProp("disabled");
                    }


                    $(".modal-save-tagihan .modal-title").html("Edit Tagihan " + resp.id_tagihan);
                    $(".modal-save-tagihan").modal("show");
                });
            });

            var FrmSaveTagihan = $("#FrmSaveTagihan").validate({
                submitHandler: function(form) {
                    UpdateData(form, function(resp) {
                        getdatadropdownkattagihan2();
                        getdatadropdownkelas2();
                        $("#FrmFilter").submit();
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
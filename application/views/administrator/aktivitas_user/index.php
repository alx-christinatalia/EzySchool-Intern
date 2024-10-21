<?php 
    $user = $this->session->userdata("user");
    $date = date_indo("d M Y");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Aktivitas User | <?php echo $this->config->item("app_title"); ?></title>
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
        <style>
            .row.no-gutters {
              margin-right: 0;
              margin-left: 0;
            }
            .row.no-gutters > [class^="col-"],
            .row.no-gutters > [class*=" col-"] {
              padding-right: 0;
              padding-left: 0;
            }
            .kurang-tanggal {
                position: absolute;
                top: 25px;
                left: 5px;
            }
            .tambah-tanggal {
                position: absolute;
                top: 25px;
                right: 0px;
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
                            <div class="col-sm-5">
                                <div class="page-title">
                                    <h1><i class="fa fa-user"></i> Aktivitas User</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                    <li>
                                        <span class="active text-default">Administrator</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Aktivitas User</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-7 text-right">
                                <div class="form-inline">
                                    <div class="form-group" style="margin-bottom:15px;">
                                        <form id="FrmSearch">
                                            <div class="input-group input-search">
                                                <input type="text" placeholder="Cari (Nama Pegawai, Pesan)" class="form-control kywd" autofocus title="Cari (Nama Pegawai, Pesan)"> 
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="form-group" style="margin-bottom:15px;">
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
                                            <div class="col-md-3 col-sm-3 col-xs-9"style="align-items: center; ">
                                                <div class="form-group">
                                                    <label>Tanggal</label>
                                                    <div class='input-group date' id='datetimepicker5'>
                                                        <input type='text' class="form-control tanggal" placeholder="Tanggal" value="<?php echo $date; ?>"/>
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-3"  style="align-items: center; max-width: 82px;">
                                                <div class="form-group">
                                                    <label>&nbsp;</label><br>
                                                    <span>
                                                        <a role="button" class="btn btn-primary kurang-tanggal">
                                                            <i class="fa fa-chevron-left"></i>
                                                        </a>    
                                                        <a role="button" class="btn btn-primary tambah-tanggal">
                                                            <i class="fa fa-chevron-right"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control select2-nosearch aktivitas" style="width: 100%">
                                                        <option value="">Semua Aktivitas</option>
                                                        <option value="LOGIN">LOGIN</option>
                                                        <option value="INSERT">INSERT</option>
                                                        <option value="UPDATE">UPDATE</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-2 col-sm-2 col-xs-12">
                                                <div class="form-group">
                                                    <label>Urutkan</label>
                                                    <select class="form-control select2-nosearch sort" class="form" style="width: 100%">
                                                        <option value="id asc">Default</option>
                                                        <option value="tgl_insert asc">Tgl Insert [A-Z]</option>
                                                        <option value="tgl_insert desc">Tgl Insert [Z-A]</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-1 col-xs-6" style="vertical-align: bottom;">
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
                                    <div class="table-container table-responsive">
                                        <table class="table table-striped table-hover datatable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 200px;text-align: left;"> Nama Pegawai </th>
                                                    <th> Pesan </th>
                                                    <th style="width: 150px;"> Aktivitas </th>
                                                    <th style="width: 150px;"> Tgl Insert </th>
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

        <!--[if lt IE 9]>
        <script src="../assets/global/plugins/respond.min.js"></script>
        <script src="../assets/global/plugins/excanvas.min.js"></script> 
        <script src="../assets/global/plugins/ie8.fix.min.js"></script> 
        <![endif]-->

        <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script> 
       
        <script src="<?php echo base_url("assets/plugins/moment.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/moment-locale-id.js"); ?>"></script>  
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
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"); ?>" charset="UTF-8"></script>
        <script>
            pagename = "administrator/ajax-aktivitas-user.html";
            $(document).ready(function() {
                $("#FrmFilter").submit();

                $('#datetimepicker5').datepicker({
                    defaultDate: new Date(),
                    autoclose: true,
                    format: 'dd M yyyy',
                    todayHighlight: true,
                    maxViewMode: 2,
                    immediateUpdates: true,
                    language: "id"
                });
                
                if("<?php echo $user->foto; ?>" == "default.png"){
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }
            });

            $("#FrmFilter").submit(function() {
                var aktivitas = $(this).find(".aktivitas").val(), tanggal = $(this).find(".tanggal").val();
                var sort = $(this).find(".sort").val();
                request["Sort"] = sort;
                request["filter"]["aktivitas"] = aktivitas; 
                request["filter"]["tgl"] = tanggal; 
                request["Page"] = 1;
                GetData(request);
                return false;
            });

            $(".tambah-tanggal").on("click", function() {
                var selectedDay = $('#datetimepicker5').datepicker('getDate');

                var tmpSelectedDay= new Date(selectedDay);
                    tmpSelectedDay.setDate(tmpSelectedDay.getDate() + 1);

                $('#datetimepicker5').datepicker('update',tmpSelectedDay);

                $("#FrmFilter").submit();
            });

            $(".kurang-tanggal").on("click", function() {
                var selectedDay = $('#datetimepicker5').datepicker('getDate');

                var tmpSelectedDay= new Date(selectedDay);
                    tmpSelectedDay.setDate(tmpSelectedDay.getDate() - 1);

                $('#datetimepicker5').datepicker('update',tmpSelectedDay);

                $("#FrmFilter").submit();
            });

            $('#datetimepicker5').on("changeDate", function(e) {
                $("#FrmFilter").submit();
            });
        </script>
    </body>
</html>
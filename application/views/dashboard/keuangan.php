<?php
$user = $this->session->userdata("user");
$bulan = array("Januari"=>1, "Februari"=>2, "Maret"=>3, "April"=>4, "Mei"=>5, "Juni"=>6, "Juli"=>7, "Agustus"=>8, "September"=>9, "Oktober"=>10, "November"=>11, "Desember"=>2);
$current_periode = date_indo("F Y");
$current_year = date('Y');
$date_range = range($current_year + 3, $current_year-30);
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Dashboard Keuangan | <?php echo $this->config->item("app_title"); ?></title>
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
        <link href="<?php echo base_url("assets/plugins/morris/morris.css") ?>" rel="stylesheet" type="text/css" />
        
        <link href="<?php echo base_url("assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/clockpicker/bootstrap-clockpicker.css"); ?>" rel="stylesheet">

        <link href="<?php echo base_url("assets/css/components-rounded.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/plugins.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/layout.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/default.min.css"); ?>" id="style_color" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/responsive.css"); ?>" rel="stylesheet">

        <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-32x32.png"); ?>" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-16x16.png"); ?>" sizes="16x16" />
        <style>
            .dashboard-stat2 {
                padding: 15px 15px 5px;
            }
            .dashboard-stat2 .status-title {
                font-size: 13px;
                font-weight: 500;
                color: #2c3e50;
                text-transform: none;
            }
            .dashboard-stat2 .display .number small {
                font-size: 15px;
                text-transform: none;
            }
        </style>
    </head>
    <!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <?php $this->load->view("other/header") ?>

        <div class="page-container">
            <?php $this->load->view("other/sidebar") ?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-head">
                        <div class="row">
                            <div class="col-md-7 col-sm-6">
                                <div class="page-title col-xs-12">
                                    <h1><i class="fa fa-dashboard"></i> Dashboard Keuangan <small class="periode" style="font-size: 14px;"></small></h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 0px; margin-bottom: 0;" class="page-breadcrumb breadcrumb">
                                    <li>
                                        <span class="active text-default">Dashboard</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Keuangan</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-5 col-sm-6 text-right">
                                <form class="form-inline " id="FrmPeriode">
                                        <div class="input-group">
                                            <input type="text" placeholder="Periode Bayar" class="form-control datepicker4" value="<?php echo $current_periode; ?>" readonly="" style="background: white"> 
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                        </div>
                                    <input type="hidden" class="bulan" value="<?php echo date('n'); ?>">
                                    <input type="hidden" class="tahun" value="<?php echo date('Y'); ?>">
                                    <div class="form-group text-center">
                                        <span class="set-pagination-layout">
                                            <a role="button" class="btn btn-primary sebelum">
                                                <i class="fa fa-chevron-left"></i>
                                            </a>  
                                            <a role="button" class="btn btn-primary sesudah">
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </span>
                                        <a role="button" class="btn btn-primary" onclick="location.reload();">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                    </div>
                                </form>
                            </div>
                                    
                        </div>
                    </div>
                    <div class="base-content">
                        <div class="row">                            
                            <div class="col-md-4 col-sm-6">
                                <div class="dashboard-stat2 bordered">
                                    <div class="display margin-bottom-10">
                                        <div class="number">
                                            <h3 class="font-red-haze margin-bottom-10">
                                                Rp <span class="widget-1">0</span>
                                            </h3>
                                            <small>
                                                Tagihan Aktif
                                                <a class="tooltip1" data-placement="right" data-container="body" data-toggle="tooltip" title="">
                                                    <i class="fa fa-question-circle"></i>
                                                </a>
                                            </small>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-warning"></i>
                                        </div>
                                        <div class="progress-info">
                                            <div class="status">
                                                <div class="status-title periode"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="dashboard-stat2 bordered">
                                    <div class="display margin-bottom-10">
                                        <div class="number">
                                            <h3 class="font-green-sharp margin-bottom-10">
                                                Rp <span class="widget-2">0</span>
                                            </h3>
                                            <small>
                                                Pembayaran
                                                <a class="tooltip2" data-placement="right" data-container="body" data-toggle="tooltip" title="">
                                                    <i class="fa fa-question-circle"></i>
                                                </a>
                                            </small>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-money"></i>
                                        </div>
                                        <div class="progress-info">
                                            <div class="status">
                                                <div class="status-title">Pembayaran diterima per periode</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <div class="dashboard-stat2 bordered">
                                    <div class="display margin-bottom-10">
                                        <div class="number">
                                            <h3 class="font-purple-soft margin-bottom-10">
                                                Rp <span class="widget-4">0</span>
                                            </h3>
                                            <small>
                                                Saldo EzyPay
                                                <a class="tooltip4" data-placement="right" data-container="body" data-toggle="tooltip" title="">
                                                    <i class="fa fa-question-circle"></i>
                                                </a>
                                            </small>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-info-circle"></i>
                                        </div>
                                        <div class="progress-info">
                                            <div class="status">
                                                <div class="status-title detil-ezypay">Informasi Total Saldo EzyPay</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption col-xs-11">
                                            <i class="fa fa-pie-chart"></i>
                                            <span class="caption-subject bold font-dark">Statistik Cara Bayar</span>
                                        </div>
                                        <div class="tools col-xs-1 text-right">
                                            <a role="button" class="collapse" data-original-title="Buka/Tutup" title="Buka/Tutup"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div id="chart-1" class="text-center"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption col-xs-11">
                                            <i class="fa fa-line-chart"></i>
                                            <span class="caption-subject bold font-dark">Statistik Pembayaran</span>
                                        </div>
                                        <div class="tools col-xs-1 text-right">
                                            <a role="button" class="collapse" data-original-title="Buka/Tutup" title="Buka/Tutup"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div id="chart-2" class="text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet custom light bordered">
                            <div class="portlet-title">
                                <div class="caption" style="padding-top: 15px;">
                                    <i class="fa fa-money"></i>
                                    <span class="caption-subject bold font-dark">Daftar Pembayaran</span>
                                </div>
                                <div class="inputs">
                                    <div class="portlet-input input-inline input-medium">
                                        <div class="form-group text-center">
                                            <form id="FrmSearchLog">
                                                <div class="input-group input-search">
                                                    <input type="text" placeholder="Cari (No Pembayaran, Nama Siswa, Kelas, Cara Bayar)" title="No Pembayaran, Nama Siswa, Kelas, Cara Bayar" class="form-control kywd" autofocus> 
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-container">
                                    <table class="table table-striped table-hover table-responsive datatable">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="">Action</th>
                                                <th style="text-align:left;width: 140px;">No Pembayaran </th>
                                                <th class="text-left" style="">Kelas</th>
                                                <th class="text-left" style="">Nama Siswa</th>
                                                <th class='text-right' style="">Total Bayar</th>
                                                <th style="">Penerima</th>
                                                <th style="width: 100px;">Cara Bayar </th>
                                                <th style="width: 110px;">Tgl Bayar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="6" class="text-center loading">
                                                    <img src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="pagination-layout hidden">
                            <div class="row">
                                <div class="col-md-3 col-md-3 col-xs-9">
                                    <div class="form-group">
                                        <div class="input-group paging">
                                            <span class="input-group-btn">
                                                <a role="button" class="btn btn-primary input-sm disabled first"><i class="fa fa-step-backward"></i></a>
                                                <a role="button" class="btn btn-primary input-sm disabled prev"><i class="fa fa-chevron-left"></i></a>
                                            </span>
                                            <form id="FrmGotoPage">
                                                <input type="text" name="page" class="form-control input-sm text-center" value="1">
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

                <?php $this->load->view("other/footer") ?>
            </div>
        </div>

        <?php //$this->load->view("kunci/modal/modal")  ?>

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

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url("assets/plugins/morris/morris.min.js") ?>" type="text/javascript"></script>
        <script src="<?php echo base_url("assets/plugins/morris/raphael-min.js") ?>" type="text/javascript"></script>
        <script src="<?php echo base_url("assets/plugins/chartjs/Chart.min.js") ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"); ?>" charset="UTF-8"></script>

        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/chart.js"); ?>"></script> 
        <script>
        pagename = "keuangan/ajax-tagihan.html";
        $(document).ready(function () {
            if ("<?php echo $user->foto; ?>" == "default.png") {
                $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
            } else {
                foto = ParseGambar("<?php echo $user->foto; ?>");
                $(".fotoprof").attr("src", foto.replace("original", "small"));
            }
            $(".fotoprof").error(function (){
                $(".fotoprof").attr("src","<?php echo base_url("assets/img/default-user.png"); ?>");
            });
                          
            $(".datepicker4").datepicker( {
                defaultDate: new Date(),
                format: "MM yyyy",
                viewMode: "months", 
                minViewMode: "months",
                autoclose: true,
                language: "id"
            });
        });
        // Pagination periode prev
        $(".sebelum").on("click", function () {
            var bulan = $(".bulan").val();
            var tahun = $(".tahun").val();

            if (bulan == '1') {
                $(".bulan").val("12").change();
                $(".tahun").val(parseInt(tahun) - 1).change();
            } else {
                $(".bulan").val(parseInt(bulan) - 1).change();
            }
        });
        // Pagination periode next
        $(".sesudah").on("click", function () {
            var bulan = $(".bulan").val();
            var tahun = $(".tahun").val();
            if (bulan == '12') {
                $(".bulan").val("1").change();
                $(".tahun").val(parseInt(tahun) + 1).change();
            } else {
                $(".bulan").val(parseInt(bulan) + 1).change();
            }
        });
        // datepicker berubah
        $(".datepicker4").change(function(){
            var periode = moment($(".datepicker4").val(), "MMMM YYYY").format('YYYY-M-MMMM');
            var res = periode.split("-");
            tahun = res[0];
            bulan = res[1];
            bulantext = res[2];
            $(".bulan").val(bulan);
            $(".tahun").val(tahun).change();
            $(".bulantext").val(bulantext);
        });

        $(".bulan, .tahun").change(function(){
            var bulan = $(".bulan").val();
            var tahun = $(".tahun").val();
            var periode = bulan+" "+tahun;
            var periodetext = moment(periode, "MM YYYY").format('MMMM YYYY');
            $(".periode").text("Periode: " + periodetext);
            $(".datepicker4").val(periodetext);

            LoadChart(bulan, tahun);
            LoadTotal(bulan, tahun);
            LoadLogPembayaran(bulan, tahun);
        });

        function Chart2Click(i, row){
            window.location.href = base_url +"/pembayaran/riwayat.html?tgl="+row.y;
        }
        </script>
    </body>
</html>
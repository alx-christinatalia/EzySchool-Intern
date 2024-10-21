<?php
$user = $this->session->userdata("user");
// print_r($this->session->userdata("user"));
// print_r($this->session->userdata("user_login"));
// print_r($this->session->userdata("db"));
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Dashboard Absensi | <?php echo $this->config->item("app_title"); ?></title>
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
        <style>
            .portlet .dashboard-stat:last-child {
                margin-bottom: 10px; 
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
                            <div class="col-xs-12">
                                <div class="page-title">
                                    <h1><i class="fa fa-dashboard"></i> Dashboard Sekolah</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb">
                        <li>
                            <span class="active text-default">Dashboard</span>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active text-default">
                                <a href="#" onclick="location.reload();">Sekolah</a>
                            </span>
                        </li>
                    </ul>

                    <div class="base-content">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 bordered">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp">
                                                <span class="jumlah-siswa">0</span>
                                            </h3>
                                            <small>Jumlah Siswa</small>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-graduation-cap"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 bordered">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp">
                                                <span class="jumlah-kelas">0</span>
                                            </h3>
                                            <small>Jumlah Kelas</small>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-institution"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="dashboard-stat2 bordered">
                                    <div class="display">
                                        <div class="number">
                                            <h3 class="font-green-sharp">
                                                <span class="jumlah-pegawai">0</span>
                                            </h3>
                                            <small>Jumlah Pegawai</small>
                                        </div>
                                        <div class="icon">
                                            <i class="fa fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--
                                                <div class="portlet custom light bordered">
                                                    <div class="portlet-body">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-6">
                                                                <a class="dashboard-stat dashboard-stat-v2 red-flamingo">
                                                                    <div class="visual">
                                                                        <i class="fa fa-graduation-cap"></i>
                                                                    </div>
                                                                    <div class="details">
                                                                        <div class="number">
                                                                            <span class="jumlah-siswa">0</span>
                                                                        </div>
                                                                        <div class="desc"> Jumlah Siswa </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-3 col-sm-6">
                                                                <a class="dashboard-stat dashboard-stat-v2 purple-wisteria">
                                                                    <div class="visual">
                                                                        <i class="fa fa-institution"></i>
                                                                    </div>
                                                                    <div class="details">
                                                                        <div class="number">
                                                                            <span class="jumlah-kelas">0</span>
                                                                        </div>
                                                                        <div class="desc"> Jumlah Kelas</div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-3 col-sm-6">
                                                                <a class="dashboard-stat dashboard-stat-v2 yellow-saffron">
                                                                    <div class="visual">
                                                                        <i class="fa fa-users"></i>
                                                                    </div>
                                                                    <div class="details">
                                                                        <div class="number">
                                                                            <span class="jumlah-pegawai">0</span>
                                                                        </div>
                                                                        <div class="desc"> Jumlah Pegawai</div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-3 col-sm-6">
                                                                <a class="dashboard-stat dashboard-stat-v2 green-seagreen">
                                                                    <div class="visual">
                                                                        <i class="fa fa-money"></i>
                                                                    </div>
                                                                    <div class="details">
                                                                        <div class="number">
                                                                            <span class="jumlah-alpha">0</span>
                                                                        </div>
                                                                        <div class="desc"> Siswa Alpha </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>-->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="portlet  light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span class="caption-subject bold uppercase font-dark">Statistik</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div id="line-chart" style="height:175px;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span class="caption-subject bold uppercase font-dark">Demografi Siswa</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div id="data-jenis" style="height:175px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--                        <div class="portlet custom light bordered">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <span class="caption-subject bold uppercase font-dark">Status Pembayaran</span>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="table-container">
                                                            <table class="table table-striped table-hover table-responsive datatable">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 75px;"> No. Reff </th>
                                                                        <th style="width: 125px;"> No. Tagihan </th>
                                                                        <th style="width: 120px;"> NIS Siswa </th>
                                                                        <th> Uraian </th>
                                                                        <th style="width: 150px"> Waktu</th>
                                                                        <th style="width: 100px;"> Metode </th>
                                                                        <th style="width: 100px;" class="text-right"> Nilai </th>
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
                                                </div>-->
                    </div>
                </div>
            </div>

            <?php $this->load->view("other/footer") ?>
        </div>

        <?php //$this->load->view("kunci/modal/modal") ?>

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

        <!--Data Counter Up-->
        <script src="<?php echo base_url("assets/plugins/counterup/jquery.waypoints.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/plugins/counterup/jquery.counterup.min.js") ?>"></script>

        <!--Chart morris-->
        <script src="<?php echo base_url("assets/plugins/morris/morris.min.js") ?>" type="text/javascript"></script>
        <script src="<?php echo base_url("assets/plugins/morris/raphael-min.js") ?>" type="text/javascript"></script>

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
                                    $(document).ready(function () {
                                        Morris.Donut({
                                            element: 'data-jenis',
                                            data: [
                                                {label: "laki-laki", value: 30},
                                                {label: "perempuan", value: 12}
                                            ],
                                            colors: [
                                                '#3c8dbc',
                                                '#ffb3ff'
                                            ]
                                        });

                                        pagename = "master-data/ajax-siswa.html";
                                        GetData(request, "", function (resp) {
                                            $('.jumlah-siswa').attr("data-value", resp.paging.Total);
                                            $('.jumlah-siswa').attr("data-counter", "counterup");
                                            $('.jumlah-siswa').counterUp();
                                        });

                                        pagename = "master-data/ajax-kelas.html";
                                        GetData(request, "", function (resp) {
                                            $('.jumlah-kelas').attr("data-value", resp.paging.Total);
                                            $('.jumlah-kelas').attr("data-counter", "counterup");
                                            $('.jumlah-kelas').counterUp();
                                        });
                                        pagename = "administrator/ajax-user.html";
                                        GetData(request, "", function (resp) {
                                            $('.jumlah-pegawai').attr("data-value", resp.paging.Total);
                                            $('.jumlah-pegawai').attr("data-counter", "counterup");
                                            $('.jumlah-pegawai').counterUp();
                                        });
                                        if ("<?php echo $user->foto; ?>" == "default.png") {
                                            $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                                        } else {
                                            foto = ParseGambar("<?php echo $user->foto; ?>");
                                            $(".fotoprof").attr("src", foto.replace("original", "small"));
                                        }
                                    });

                                    function getdataumum(request, successfunc) {
                                        $.ajax({
                                            type: "POST",
                                            url: base_url + "/ajax/" + pagename,
                                            data: {"act": "getdata", req: request},
                                            tryCount: 0,
                                            retryLimit: 3,
                                            success: function (resp) {
                                                if (resp == "nodata") {
                                                    toastrshow("error", "Data tidak tersedia atau tidak ada", "Error");
                                                } else {
                                                    resp = JSON.parse(resp);
                                                    successfunc(resp);
                                                }
                                            },
                                            error: function (xhr, textstatus, errorthrown) {
                                                if (textstatus == "timeout") {
                                                    this.tryCount++;
                                                    if (this.tryCount <= this.retryLimit) {
                                                        $.ajax(this);
                                                    }
                                                }
                                            }
                                        });
                                    }

        </script>
    </body>
</html>
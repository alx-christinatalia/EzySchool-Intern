<?php
$user = $this->session->userdata("user");
date_default_timezone_set('Asia/Jakarta');
if (empty($date) && empty($time)) {
    $date = date("d M Y");
    $time = date("H:i");
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Daftar Pembayaran | <?php echo $this->config->item("app_title"); ?></title>
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
        <link href="<?php echo base_url("assets/plugins/clockpicker/bootstrap-clockpicker.css"); ?>" rel="stylesheet">

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
                            <div class="col-md-6 col-sm-4">
                                <div class="page-title col-xs-12">
                                    <h1><i class="fa fa-tasks"></i> Daftar Pembayaran</h1>
                                </div>
                                <ul class="page-breadcrumb breadcrumb">
                                    <li>
                                        <span class="active text-default">Keuangan</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">Pembayaran</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Daftar</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-8 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <form id="FrmSearch">
                                            <div class="input-group input-search">
                                                <input type="text" placeholder="Cari (No Pembayaran, Nama Siswa, Kelas, Cara Bayar)" title="Cari (No Pembayaran, Nama Siswa, Kelas, Cara Bayar)" class="form-control kywd" autofocus> 
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary" title="Cari"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <a role="button" class="btn btn-primary" href="<?php echo base_url("pembayaran.html"); ?>" title="Bayar Tagihan">
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
                        <div class="filter in col-md-12" style="margin-bottom: -10px">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <!-- FrmFilter -->
                                    <form id="FrmFilter" role="form">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <label>Tgl Bayar</label>
                                                <div class="input-group">
                                                    <input type="text" placeholder="Tgl Bayar" class="form-control datepicker4 tgl" value="<?php echo !empty($this->input->get("tgl")) ? date_indo("d M Y", strtotime($this->input->get("tgl"))): date_indo("d M Y"); ?>" required> 
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Kelas</label>
                                                    <select style="width:100%;" class="form-control select2-normal dropdown-kelas kelas"  class="form">
                                                        <option value="">Semua Kelas</option>
                                                        <?php print_r($dropdownkelas->lsdt) ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Cara Bayar</label>
                                                    <select style="width:100%;" class="form-control select2-normal cara_bayar"  class="form">
                                                        <option value="">Semua Cara Bayar</option>
                                                        <option value="TUNAI">Tunai</option>
                                                        <option value="TRANSFER">Transfer</option>
                                                        <option value="EZYPAY">EzyPay</option>
                                                        <option value="LAINNYA">Lainnya...</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label>Urutkan</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch sort" class="form">
                                                        <option value="">Default</option>
                                                        <option value="kelas_nama asc">Kelas [A-Z]</option>
                                                        <option value="kelas_nama desc">Kelas [Z-A]</option>
                                                        <option value="siswa_nama asc">Siswa [A-Z]</option>
                                                        <option value="siswa_nama desc">Siswa [Z-A]</option>
                                                        <option value="tgl_bayar asc">Tgl Bayar [A-Z]</option>
                                                        <option value="tgl_bayar desc">Tgl Bayar [Z-A]</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-2" style="vertical-align: bottom;">
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
                    </div>
                    <div>
                        <div class="portlet custom light bordered">
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
                                                <td colspan="7" class="text-center loading">
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
        <script src="<?php echo base_url("assets/plugins/serializeJSON/jquery.serializejson.min.js"); ?>"></script> 
        <!-- Bootstrap Datepicker -->
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"); ?>" charset="UTF-8"></script>

        <script src="<?php echo base_url("assets/plugins/moment.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/moment-locale-id.js"); ?>"></script> 

        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 

        <script>
            pagename = "keuangan/ajax-pembayaran.html";
            bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

            $(document).ready(function () {
                if ("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto.replace('original', 'small'));
                }
                $(".fotoprof").error(function () {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                });

                $(".datepicker4").datepicker({
                    defaultDate: new Date(),
                    autoclose: true,
                    format: 'dd M yyyy',
                    todayHighlight: true,
                    maxViewMode: 2,
                    immediateUpdates: true,
                    language: "id"
                });

                var tgl = $(".tgl").val()
                request["filter"]["tgl"] = tgl;
                request["Page"] = 1;
                GetData(request, "listdatalog");
            });
            $("#FrmFilter").submit(function () {
                var kelas = $(this).find(".kelas").val();
                var tgl = $(this).find(".tgl").val();
                var sort = $(this).find(".sort").val();
                var cara_bayar = $(this).find(".cara_bayar").val();

                request["filter"]["kelas"] = kelas;
                request["filter"]["tgl"] = tgl;
                request["filter"]["cara_bayar"] = cara_bayar;
                request["Sort"] = sort;

                request["Page"] = 1;
                GetData(request, "listdatalog");

                $("input[name='page']").val("1");

                var url = "riwayat.html?tgl="+ moment(tgl, "DD MMM YYYY").format("YYYY-MM-DD");
                ChangeUrl("url", url);
                return false;
            });

            function ChangeUrl(page, url) {
                if (typeof (history.pushState) != "undefined") {
                    var obj = { Page: page, Url: url };
                    history.pushState(obj, obj.Page, obj.Url);
                }
            }
        </script>
    </body>
</html>
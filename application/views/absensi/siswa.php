<?php 
    $user = $this->session->userdata("user");
    // $date = date("Y-m-d", strtotime($this->input->get('tgl')));
    // $date = $this->input->get('tgl');
    $date = date_indo("M Y");
    $date2 = date_indo("M Y", strtotime("+1 month"));
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Rekap Absensi Per Siswa | <?php echo $this->config->item("app_title"); ?></title>
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
        <link href="<?php echo base_url("assets/plugins/bootstrap-daterangepicker/daterangepicker.min.css"); ?>" rel="stylesheet">

        <link href="<?php echo base_url("assets/css/components-rounded.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/plugins.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/layout.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/default.min.css"); ?>" id="style_color" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/responsive.css"); ?>" rel="stylesheet">

        <link href="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css"); ?>" rel="stylesheet">
        <style>
            .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
                background-color: #ffffff;
            }
        </style>
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
                            <div class="col-sm-8">
                                <div class="page-title">
                                    <h1><i class="fa fa-address-book"></i> Rekap Absensi Per Siswa</h1>
                                </div>
                                  <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="col-xs-12 page-breadcrumb breadcrumb">
                                    <li>
                                        <span class="active text-default">Absensi</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Rekap Absensi Per Siswa</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <a role="button" class="btn btn-primary" data-toggle="collapse" data-target=".filter" title="Filter Data">
                                            <i class="fa fa-filter"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" onclick="location.reload();" title="Refresh">
                                            <i class="fa fa-refresh"></i>
                                        </a>
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
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Kelas</label>
                                                    <select style="width: 100%;" class="select2-normal dropdown-kelas">
                                                    <option value="">Pilih Kelas</option>
                                                            <?php print_r($dropdownkelas->lsdt) ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label>Periode</label>
                                                    <div>
                                                        <div style="width: 100% !important;" class="input-group input-large date-picker input-daterange" data-date="19 Okt 2017" data-date-format="M yyyy">
                                                            <input type="text" class="form-control view-start" readonly name="from" value="<?php echo $date ?>">
                                                            <span class="input-group-addon"> Sampai </span>
                                                            <input type="text" class="form-control view-end" readonly name="to" value="<?php echo $date2 ?>">
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="start-periode">
                                                    <input type="hidden" class="end-periode">
                                                    <input type="hidden" class="timeValues">
                                                    <input type="hidden" class="rangeDate">
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
                                        <div class="table-container table-responsive ">
                                            <table class="table table-striped table-hover datatable">
                                                <thead>
                                                    <tr>
                                                        <th width="25%"> NIS </th>
                                                        <th width="30%"> Nama </th>
                                                        <th width="10%"> Sakit </th>
                                                        <th width="10%"> Ijin </th>
                                                        <th width="10%"> Alpa </th>
                                                        <th width="15%"> Total SIA </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr><td colspan='10' class='text-center'><span class='label label-warning'>Silahakan Pilih Kelas dan Periode</span></td></tr>
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
                                                    <a role="button" class="btn btn-primary input-sm disabled firstsiswa"><i class="fa fa-step-backward"></i></a>
                                                    <a role="button" class="btn btn-primary input-sm disabled prevsiswa"><i class="fa fa-chevron-left"></i></a>
                                                </span>
                                                <form id="FrmGotoPage">
                                                    <input type="text" class="form-control input-sm text-center" value="1">
                                                </form>
                                                <span class="input-group-btn">
                                                    <a role="button" class="btn btn-primary input-sm disabled nextsiswa"><i class="fa fa-chevron-right"></i></a>
                                                    <a role="button" class="btn btn-primary input-sm disabled lastsiswa"><i class="fa fa-step-forward"></i></a>
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
        
        <?php $this->load->view("absensi/modal/edit-nihil") ?>

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
        <script src="<?php echo base_url("assets/plugins/bootstrap-daterangepicker/daterangepicker.js"); ?>"></script>

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
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker_indo.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"); ?>" charset="UTF-8"></script>
        <script src="<?php echo base_url("assets/scripts/components-date-time-pickers.min.js"); ?>"></script>

        <script>
            pagename = "absensi/ajax-absensi-siswa.html";
            $(document).ready(function() {
                var start = $(".view-start").val();
                start = moment(start, "MMMM YYYY").format("YYYY-M");
                $(".start-periode").val(start);
                var end = $(".view-end").val();
                end = moment(end, "MMMM YYYY").format("YYYY-M");
                $(".end-periode").val(end);
                getRange();

                // request["filter"]["bulan"] = "'2017-10','2017-11'";
                // request["filter"]["id_kelas"] = 1;
                // GetData(request);
            });
            $(".date-picker").datepicker( {
                autoclose: true,
                language: "id",
                format: "M yyyy",
                viewMode: "months", 
                minViewMode: "months"
            });
            $(".view-start").change(function() {
                var start = $(this).val();
                start = moment(start, "MMMM YYYY").format("YYYY-M");
                $(".start-periode").val(start);
                getRange();
            });
            $(".view-end").change(function() {
                var end = $(this).val();
                end = moment(end, "MMMM YYYY").format("YYYY-M");
                $(".end-periode").val(end);
                getRange();
            });

            function getRange(){
                start = $(".start-periode").val();
                end = $(".end-periode").val();
                var dateStart = moment(start);
                var dateEnd = moment(end);
                var timeValues = [];

                while (dateEnd >= dateStart) {
                   timeValues.push(dateStart.format('YYYY-M'));
                   dateStart.add(1,'month');
                }
                $(".timeValues").val(timeValues);
                var rangeDate = "'"+$(".timeValues").val().replace(/\,/g, "','")+"'";
                $(".rangeDate").val(rangeDate);
            }

            $("#FrmFilter").submit(function() {
                var kelas = $(this).find(".dropdown-kelas").val(), bulan = $(this).find(".rangeDate").val();
                request["filter"]["id_kelas"] = kelas;
                request["filter"]["bulan"] = bulan;
                pagename = "absensi/ajax-absensi-siswa.html";
                GetData(request);
                return false;
            });
        </script>
    </body>
</html>
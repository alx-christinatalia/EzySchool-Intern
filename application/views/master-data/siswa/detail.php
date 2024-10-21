<?php 
    $user = $this->session->userdata("user");
    $sekolah = $this->session->userdata("sekolah");
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Detail Siswa | <?php echo $this->config->item("app_title"); ?></title>
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
        <link href="<?php echo base_url("assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/morris/morris.css") ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url("assets/plugins/calendar/zabuto_calendar.min.css") ?>" rel="stylesheet" type="text/css" />
    
        <link href="<?php echo base_url("assets/css/components-rounded.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/plugins.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/layout.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/default.min.css"); ?>" id="style_color" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/responsive.css"); ?>" rel="stylesheet">
        <style>
            .font15{
                font-size: 15px;
            }
            .dashboard-stat2 {
                padding: 15px 15px 5px;
            }
            .dashboard-stat2 .status-title {
                font-size: 13px;
                font-weight: 500;
                color: #2c3e50;
            }
            div.zabuto_calendar .table tr td div.day {
                padding-top: 7px;
                padding-bottom: 7px;
                height: 40px;
            }
            div.zabuto_calendar .table div.day:not([class*=' event-']) .badge {
                color: black;
            }
            div.zabuto_calendar .badge-event {
                width: 27px;
                height: 27px;
                line-height: 2;
                padding: 0px 1px 0px 0px;
                background-color: white; 
                font-size: 13px !important;
            }
            div.zabuto_calendar .calendar-month-header th:nth-child(2) {
                font-size: 20px;
            }
            .content-title {
                border-top: 3px solid #ecf0f1;
                margin-top: 15px;
                padding-top: 12px;
            }
            .absensi-detil .title {
                font-size: 20px;
                font-weight: bold;
            }
            .absensi-detil .DivKetWarna {
                margin: 10px 0px 10px 0px;
                background: #ecf0f1;
                padding: 15px;
                font-size: 13px;
            }
            .absensi-detil .DivKetWarna .badge {
                width: 15px;
                height: 15px;
                border-radius: 30px;
                display: inline-block;
            }
            .absensi-detil .DivKetWarna .col-md-6 {
                padding-top: 5px;
            }
            .event-green > span.badge-event, .bg-custom-green {
                background-color: #4caf50;
            }
            .event-grey > span.badge-event, .bg-custom-grey {
                background-color: #9e9e9e;
            }
            .event-black > span.badge-event, .bg-custom-black {
                background-color: #2c3e50;
            }
            .event-yellow > span.badge-event, .bg-custom-yellow {
                background-color: #ffc107;
            }
            .event-red > span.badge-event, .bg-custom-red {
                background-color: #E74C3C;
            }
            .event-blue > span.badge-event, .bg-custom-blue {
                background-color: #2196f3;
            }
        </style>
        <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-32x32.png"); ?>" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-16x16.png"); ?>" sizes="16x16" />
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
                            <div class="col-sm-10">
                                <div class="page-title">
                                    <h1 class="title-edit"><i class="fa fa-database"></i> Detail Siswa</h1>
                                </div>
                                <ul class="page-breadcrumb breadcrumb col-xs-12" style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;">
                                    <li>
                                        <span class="active text-default">Master Data</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="<?php echo base_url("siswa.html");?>">Siswa</a>
                                        </span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Detail Siswa</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <a role="button" class="btn btn-primary edit-button" title="Edit Siswa">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" onclick="location.reload();" title="Refresh">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="portlet light hasil-error">
                        <div class="portlet-body ket">
                            <center>
                                <img class="loading-datasiswa" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                            </center>
                        </div>
                    </div>
                    
                    <div class="row content-1 hidden">
                        <div class="col-md-8">
                            <div class="portlet light">
                                <div class="portlet-body">
                                    <form class="form-horizontal form-edit-siswa" action="master-data/ajax-siswa.html" role="form">
                                        <div class="row" style="margin-bottom: 5px;">
                                            <div class="text-center col-md-12">
                                                <img class="loading-datasiswa" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                            </div>
                                            <div class="col-sm-4 data-siswa hidden">
                                                <div class="text-center margin-top-10">
                                                    <img class="foto-siswa" style="width: 150px" onerror="this.src='<?php echo base_url("assets/img/default-user.png");?>'">
                                                    <div style="font-size: 20px;" class="bold text-nama margin-top-10"></div>
                                                    <div class="margin-bottom-10">
                                                        <span class="text-nis font-red bold"></span> / <span class="text-kelas font-red bold"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8 data-siswa hidden">
                                                <ul class="list-group" style="margin-bottom: 0px;">
                                                    <li class="list-group-item">  
                                                        <div class="profile-desc-link">
                                                            <div class="row">
                                                                <div class="col-sm-4 bold font-15">NISN</div>
                                                                <div class="col-sm-8 text-nisn"></div>
                                                            </div>
                                                        </div> 
                                                    </li>
                                                    <li class="list-group-item">  
                                                        <div class="profile-desc-link">
                                                            <div class="row">
                                                                <div class="col-sm-4 bold font-15">Jenis Kelamin</div>
                                                                <div class="col-sm-8 text-jk"></div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    
                                                    <li class="list-group-item">    
                                                        <div class="profile-desc-link">
                                                            <div class="row">
                                                                <div class="col-sm-4 bold font-15">Alamat</div>
                                                                <div class="col-sm-8 text-alamat"></div>
                                                            </div>
                                                        </div> 
                                                    </li>
                                                    <li class="list-group-item">    
                                                        <div class="profile-desc-link">
                                                            <div class="row">
                                                                <div class="col-sm-4 bold font-15">No. HP</div>
                                                                <div class="col-sm-8 text-no_hp"></div>
                                                            </div>
                                                        </div> 
                                                    </li>
                                                    <li class="list-group-item">    
                                                        <div class="profile-desc-link">
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-5 bold font-15">Email</div>
                                                                <div class="col-sm-8 col-xs-7 text-email"></div>
                                                            </div>
                                                        </div> 
                                                    </li>
                                                    <li class="list-group-item">    
                                                        <div class="profile-desc-link">
                                                            <div class="row">
                                                                <div class="col-sm-4 col-xs-5 bold font-15">Password</div>
                                                                <div class="col-sm-8 col-xs-7 text-password"></div>
                                                            </div>
                                                        </div> 
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="dashboard-stat2 bordered">
                                <div class="display margin-bottom-10">
                                    <div class="number">
                                        <h3 class="font-red-haze margin-bottom-10">
                                            Rp <span class="widget-1">0</span>
                                        </h3>
                                        <small>
                                            Total Tagihan (Aktif)
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
                                            <div class="status-title periode">Seluruh Tagihan Aktif Sampai Akhir <span class="tahun"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-stat2 bordered">
                                <div class="display margin-bottom-10">
                                    <div class="number">
                                        <h3 class="font-purple-soft margin-bottom-10">
                                            Rp <span class="widget-2">0</span>
                                        </h3>
                                        <small>
                                            Total Pembayaran
                                            <a class="tooltip2" data-placement="right" data-container="body" data-toggle="tooltip" title="">
                                                <i class="fa fa-question-circle"></i>
                                            </a>
                                        </small>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-info-circle"></i>
                                    </div>
                                    <div class="progress-info">
                                        <div class="status">
                                            <div class="status-title detil-ezypay">Seluruh Pembayaran Diterima</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row content-2 hidden">
                        <div class="col-md-7">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption col-xs-11">
                                        <i class="fa fa-line-chart"></i>
                                        <span class="caption-subject bold font-dark">Statistik Pembayaran</span>
                                        <span class="caption-helper bold">Bulanan</span>
                                    </div>
                                    <div class="tools col-xs-1 text-right">
                                        <a role="button" class="collapse" data-original-title="Buka/Tutup" title="Buka/Tutup"> </a>
                                    </div>
                                </div>
                                <div class="portlet-body text-center">
                                    <div id="chart-2" style="height: 240px;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
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
                                <div class="portlet-body text-center">
                                    <div id="chart-1" style="height: 240px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="portlet light bordered content-3 hidden">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="portlet light" style="padding: 0px;">
                                    <div class="portlet-title">
                                        <div class="caption col-xs-11">
                                            <i class="fa fa-address-book"></i>
                                            <span class="caption-subject bold font-dark">Detil Absensi</span>
                                            <span class="caption-helper bold tgl-absensi-selected">Memuat absensi ...</span>
                                        </div>
                                        <div class="tools col-xs-1 text-right">
                                            <a role="button" class="collapse" data-original-title="Buka/Tutup" title="Buka/Tutup"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body" style="padding-top: 0px;">
                                        <div class="absensi-detil">
                                            <span class="title">Belum Absensi</span>
                                            <div class="desc font-blue-oleo">Belum Absensi</div>

                                            <div class="content-title">Keterangan Warna</div>
                                            <div class="DivKetWarna">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <span class="badge bg-custom-green"></span>
                                                        <span class="text">Sudah Datang</span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <span class="badge bg-custom-yellow"></span>
                                                        <span class="text">Sakit</span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <span class="badge bg-custom-gray"></span>
                                                        <span class="text">Izin</span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <span class="badge bg-custom-red"></span>
                                                        <span class="text">Alpa</span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <span class="badge bg-custom-black"></span>
                                                        <span class="text">Hari Libur</span>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                                        <span class="badge bg-custom-blue"></span>
                                                        <span class="text">Tanggal Dipilih</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div id="kalendar-absensi"></div>
                            </div>
                        </div>
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
        <script src="<?php echo base_url("assets/plugins/jquery-repeater/jquery.repeater.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/morris/morris.min.js") ?>" type="text/javascript"></script>
        <script src="<?php echo base_url("assets/plugins/morris/raphael-min.js") ?>" type="text/javascript"></script>
        <script src="<?php echo base_url("assets/plugins/chartjs/Chart.min.js") ?>" type="text/javascript"></script>
        <script src="<?php echo base_url("assets/plugins/calendar/zabuto_calendar.js") ?>" type="text/javascript"></script>
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/chart.js"); ?>"></script> 
        <script>
            pagename = "master-data/ajax-siswa.html";

            var id_update = "<?php echo $this->input->get('nis'); ?>";
            var selector_tcalendar = "", date_now = "", hari_tidakaktif = "<?php echo $sekolah->Data[0]->hari_tidakaktif; ?>";
            
            var bulan = moment().format("MM"), 
                tahun = moment().format("YYYY");

            $(document).ready(function() {
                $(".tahun").html(tahun);
                GetDataSiswaDetail(id_update);   

                if("<?php echo $user->foto; ?>" == "default.png"){
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }  
            });

            function LoadingStatistik() {
                date_now = moment().format("YYYY-MM-DD");

                $("#kalendar-absensi").zabuto_calendar({
                    language: "id",
                    action: function () {
                        var selector = $("#"+ this.id);
                        CalendarSelected(selector);
                    },
                    action_nav: function() {
                        var selector = $("#"+ this.id), to = selector.data("to");
                        bulan = to.month;
                        tahun = to.year;
                        CalendarGetAbsensi(id_update);
                    }
                });
                CalendarSelected("", date_now);
                CalendarGetAbsensi(id_update);

                LoadChart("", tahun, id_update);
                LoadTotal("", tahun, id_update);
            }

            function CalendarSelected(selector = "", tgl_selected = "") {
                if(!empty(tgl_selected)) {
                    selector = $(".zabuto_calendar #zabuto_calendar_custom_"+ tgl_selected);
                }
                if(!empty(selector_tcalendar)) {
                    if(selector_tcalendar.find(".day").is(":not(.event-red):not(.event-yellow):not(.event-grey):not(.event-green):not(.event-black)")) {
                        
                        var value_selected = selector_tcalendar.find(".badge.badge-event").html();
                        selector_tcalendar.find(".day").html(value_selected);
                    }
                    $(".zabuto_calendar .day").removeClass("event-blue");
                }

                value_selected = selector.find("div.day").html();
                if(!selector.find("div.day > span").hasClass("badge")) {
                    selector.find("div.day").html("<span class='badge badge-event'>"+ value_selected +"</span>");
                }
                selector.find("div.day").addClass("event-blue");
                selector_tcalendar = selector;

                var date = selector.data("date"), fulldate = moment(date).format("dddd, DD MMM YYYY");
                $(".tgl-absensi-selected").html("("+ fulldate +")");
                CalendarDetailAbsensi(date, id_update);
            }

            function CalendarSet(tgl, class_name) {
                selector = $(".zabuto_calendar #zabuto_calendar_custom_"+ tgl);
                 value_selected = selector.find("div.day").html();
                if(!selector.find("div.day > span").hasClass("badge")) {
                    selector.find("div.day").html("<span class='badge badge-event'>"+ value_selected +"</span>");
                }
                selector.find("div.day").addClass(class_name);
            }

            function CalendarHoliday() {
                var ListHoliday = GetDateDayInMonth(bulan, tahun, hari_tidakaktif), result = [];
                $.each(ListHoliday, function(index, item) {
                    CalendarSet(item, "event-black");
                });
                return result;
            }

            function CalendarGetAbsensi(nis) {
                $.ajax({
                    type: "POST",
                    url: base_url + "/ajax/dashboard/ajax-absensi.html",
                    data: {act: "listabsensi", req: {"bulan": bulan, "tahun": tahun, "nis": nis}},
                    dataType: "JSON",
                    success: function(resp){
                        CalendarHoliday();
                        if(resp.IsError) {
                            toastrshow("error", "Kesalahan: "+resp.ErrMessage, "Error");
                            return;
                        }
                        if(empty(resp.Data)) return;
                            
                        $.each(resp.Data, function(index, item) {
                            var date = moment(item.tgl_absensi, "YYYY-M-D").format("YYYY-MM-DD");

                            if(item.keterangan == 1)      CalendarSet(date, "event-green");
                            else if(item.keterangan == 2) CalendarSet(date, "event-yellow");
                            else if(item.keterangan == 3) CalendarSet(date, "event-grey");
                            else if(item.keterangan == 4) CalendarSet(date, "event-red");
                        }); 
                    }
                });
            }

            function CalendarDetailAbsensi(tgl, nis) {
                var class_name = [".event-red", ".event-green", ".event-grey", ".event-black", ".event-yellow"], is_class_found = false;
                var selector   = $(".zabuto_calendar #zabuto_calendar_custom_"+tgl+"_day");
                $.each(class_name, function(index, item) {
                    if(!selector.is(item)) {
                        $(".absensi-detil .title").html("Belum Absensi");
                        $(".absensi-detil .desc").html("Belum Absensi");
                    } else {
                        is_class_found = true;
                        return false;
                    }
                });

                if(is_class_found == false) return;                
                $.ajax({
                    type: "POST",
                    url: base_url + "/ajax/dashboard/ajax-absensi.html",
                    data: {act: "detailabsensi", req: {"tgl": tgl, "nis": nis}},
                    dataType: "JSON",
                    success: function(resp){
                        if(resp.IsError) {
                            var ListHoliday = GetDateDayInMonth(bulan, tahun, hari_tidakaktif);
                            if(in_array(tgl, ListHoliday)) {
                                $(".absensi-detil .title").html("Hari Libur");
                                $(".absensi-detil .desc").html("Belum Absensi");
                            } else {
                                $(".absensi-detil .title").html("Belum Absensi");
                                $(".absensi-detil .desc").html("Belum Absensi");
                            }
                            return;
                        }

                        var masuk = resp.Data.masuk;
                        var uraian = "", jam = moment(masuk.jam, "HH:mm:ss").format("HH:mm");
                        if(!empty(masuk.uraian)) {
                            uraian = "("+ masuk.uraian +")";
                        }
                        $(".absensi-detil .title").html(masuk.keterangan);
                        $(".absensi-detil .desc").html('<i class="fa fa-clock-o"></i> '+ jam +' - '+ masuk.jenis +' '+uraian);
                    }
                });
            }
            
            function GetDataSiswaDetail(id_update) {
                if(!empty(id_update)) {
                    getdatabyid(id_update, function(resp) {
                        if(resp.IsError == true) {
                            $(".hasil-error .ket").html("<center><span class='label label-warning'>"+ resp.ErrMessage +"</span></center>");
                            $(".edit-button").addClass("hidden");
                            return;
                        }
                        if(empty(resp.Data)) {
                            $(".hasil-error .ket").html("<center><span class='label label-warning'>Tidak ada data siswa</span></center>");
                            $(".edit-button").addClass("hidden");
                            return;
                        }
                        $(".content-1, .content-2, .content-3").removeClass("hidden");
                        $(".hasil-error").addClass("hidden");

                        var resp = resp.Data[0];
                        $(".page-title .title-edit").html("<i class='fa fa-database'></i> Detail Siswa " + resp.nama);
                        $(".edit-button").attr('href',"<?php base_url("siswa/edit.html?nis=resp.nis"); ?>");
                        
                        foto = ParseGambar(resp.foto);
                        if(resp.foto != "default.png"){
                            $(".foto-siswa").attr('src', foto.replace("/original/", "/small/"));
                        } else {
                            $(".foto-siswa").attr('src', "<?php echo base_url("assets/img/default-user.png"); ?>");
                        }
                        $(".text-nama").html(resp.nama);
                        $(".text-id_finger").html(": " + resp.id_finger);
                        $(".text-nis").html(resp.nis);
                        $(".edit-button").attr('href',"edit.html?nis="+resp.nis+"");
                        $(".text-nisn").html(": " + CheckStrip(resp.nisn));
                        $(".text-id_jurusan").html(": " + resp.jurusan_nama);
                        $(".text-kelas").html(resp.kelas_nama);

                        if(resp.jk=="1") var jk = "Laki - laki";
                        if(resp.jk=="2") var jk = "Perempuan";
                        $(".text-jk").html(": " + jk);
                        
                        $(".text-alamat").html(": " + CheckStrip(resp.alamat));
                        $(".text-no_hp").html(": " + CheckStrip(resp.no_hp));
                        $(".text-email").html(": " + resp.email);
                        $(".text-password").html(": " + resp.password);
                        $('.loading-datasiswa').attr('class', "hidden");
                        $('.data-siswa').removeClass("hidden");

                        LoadingStatistik();
                    });
                } else {
                    $(".hasil-error .ket").html("<center><span class='label label-warning'>No Induk Siswa tidak valid</span></center>");
                    $(".edit-button").addClass("hidden");
                }
            }

            function Chart2Click(i, row){
                return false;
            }
        </script>
    </body>
</html>
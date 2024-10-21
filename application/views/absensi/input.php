<?php 
    $user = $this->session->userdata("user");
    $date = $this->input->get('tgl');
    $kls = $this->input->get('kls');
    if(empty($date)) {
        $date = date_indo("d M Y");
    } else {
        $date = date_indo("d M Y", strtotime($this->input->get('tgl')));
    }
    if(empty($kls)) {
        $kls = "";
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
        <title>Input Absensi | <?php echo $this->config->item("app_title"); ?></title>
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
        <style>
            .opacity-success{
                background-color: #ceede7;   
            }
            .opacity-update{
                background-color: #bad5ec;
            }
            .opacity-error{
                background-color: #fad9d9;
            }
            .mt-repeater-item, .mt-repeater-item td {
                padding-bottom: 8px !important;
            }
        </style>
        <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-32x32.png"); ?>" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-16x16.png"); ?>" sizes="16x16" />
    </head>
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <?php $this->load->view("other/header") ?>
        
        <div class="page-container">
            <?php $this->load->view("other/sidebar") ?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-head">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="page-title">
                                    <h1><i class="fa fa-address-book"></i> Input Absensi</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                    <li>
                                        <span class="active text-default">Absensi</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="<?php echo base_url('input_absensi_harian.html') ?>">Absensi Harian</a>
                                        </span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Input Absensi</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <form id="FrmSearch">
                                            <div class="input-group input-search">
                                                <input type="text" placeholder="Cari (Nama Siswa)" class="form-control kywd" autofocus title="Cari (Nama Siswa)"> 
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <a role="button" class="hiddensave1 btn btn-primary ladda-button ladda-button-submit" data-style="slide-up" onclick="Simpan();" title="Simpan">
                                            <i class="fa fa-floppy-o"></i>
                                        </a>
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
                                                <div class="col-md-3 col-sm-6 col-xs-6" style="align-items: center;">
                                                    <div class="form-group">
                                                        <label>Tanggal</label>
                                                        <div class='input-group date datetimepicker5'>
                                                            <input type='text' class="form-control tanggal" placeholder="Tanggal" value="<?php echo $date; ?>" required/>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-6 col-xs-6"  style="align-items: center; max-width: 107px;">
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
                                                <div class="col-md-3 col-sm-6 col-xs-6" >
                                                    <div class="form-group">
                                                        <label>Kelas</label>
                                                        <select style="width:100%;" class="form-control select2-normal dropdown-kelas kelas"  class="form">
                                                            <option value="">Semua Kelas</option>
                                                                <?php print_r($dropdownkelas->lsdt) ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-2 col-sm-6 col-xs-6" >
                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select style="width:100%;" class="form-control select2-nosearch dropdown-absen absen"  class="form">
                                                            <option value="0">Semua Absensi</option>
                                                            <option value="1">Belum Absen</option>
                                                            <option value="2">Sudah Absen</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-1" style="vertical-align: bottom;">
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
                                    <form id="FrmAddSIA" action="absensi/ajax-absensi-input.html" role="form">
                                        <div class="result-save hidden">
                                        </div>
                                        <div class="result hidden">
                                            <a role="button" class="close" aria-label="close" onclick="$(this).parent('div').addClass('hidden')">&times;</a>
                                            <div class="result-save-detil"></div>
                                        </div>
                                        <div class="mt-repeater-hidden hidden">
                                            <center>
                                                <img class="loading" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                            </center>
                                            <br>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="mt-checkbox-inline">
                                                <div class="row">
                                                    <div class="col-md-10 col-sm-9 col-xs-12">
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" class="check1"> NIS
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" class="check2"> NISN
                                                            <span></span>
                                                        </label>
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" class="check3"> Alamat
                                                            <span></span>
                                                        </label>
                                                        </div>
                                                        <div class="col-md-2 col-sm-3 col-xs-12">
                                                        <label class="mt-checkbox">
                                                            <input type="checkbox" class="check_hadir"> Semua Hadir
                                                            <span></span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="notifikasi"></div>
                                            <div class="table-container table-responsive">
                                                <table class="table datatable">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 75px;" class="text-center"> No </th>
                                                            <th style="width: 200px;"> Nama </th>
                                                            <th style="width: 250px;"> Kehadiran </th>
                                                            <th style="width: 250px;"> Keterangan </th>
                                                            <th style="width: 125px;" class="nis hidden"> NIS </th>
                                                            <th style="width: 125px;" class="nisn hidden"> NISN </th>
                                                            <th style="width: 200px;" class="alamat hidden"> Alamat</th>
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
                                        <div class="text-right">
                                            <hr class="hiddensave2">
                                            <button class=" hiddensave2 btn btn-default" type="button" onClick="backAway()">Batal</button>                                                    
                                            <button type="submit" class="hiddensave2 btn btn-primary ladda-button ladda-button-submit btnTambah" data-style="slide-up"><i class="fa fa-floppy-o"></i> Simpan</button>
                                        </div>
                                    </form>
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
        <script src="<?php echo base_url("assets/plugins/serializeJSON/jquery.serializejson.min.js"); ?>"></script>
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 

        <!-- Bootstrap Datepicker -->
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"); ?>" charset="UTF-8"></script>
        
        <script>
            pagename = "absensi/ajax-absensi-input.html";
            $(document).ready(function() {
                $('.datetimepicker5').datepicker({
                    defaultDate: new Date(),
                    autoclose: true,
                    format: 'dd M yyyy',
                    todayHighlight: true,
                    maxViewMode: 2,
                    immediateUpdates: true,
                    language: "id"
                });
                
                getdatadropdownkelas("<?php echo $kls ?>");
                request["filter"]["tgl_jurnal"] = "<?php echo $date ?>";
                $("#FrmFilter").find(".tanggal").val("<?php echo $date ?>");

                request["filter"]["id_kelas"] = "<?php echo $kls ?>";
                $("#FrmFilter").find(".kelas").val("<?php echo $kls ?>");

                GetData(request, "getdatabyclass");
                $(".check1, .check2, .check3, .check_hadir").removeAttr("checked");
                if("<?php echo $user->foto; ?>" == "default.png"){
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }
            });
            function backAway() {
                if(history.length === 1){
                    window.location = "<?php echo base_url("beranda.html")?>";
                } else {
                    window.location= "<?php echo base_url("input_absensi_harian.html")?>";
                }
            }

            $(".check_hadir").on("change", function() {
                var valueJSON  = $("#FrmAddSIA").serializeJSON(); //console.log(valueJSON);
                    valueJSON  = valueJSON.data;
                    
                var jumitem = Object.keys(valueJSON.items).length;
                $.each(valueJSON.items, function(index, item) {
                    if ($('.check_hadir').is(":checked"))
                    {
                        // if(empty($('.abs'+index).val())){
                            $('.sia_h'+index).prop("checked", true);
                        // }
                    } else {
                        //kosong
                    }
                });
            });

            $(".tambah-tanggal").on("click", function() {
                var selectedDay = $('.datetimepicker5').datepicker('getDate');

                var tmpSelectedDay= new Date(selectedDay);
                    tmpSelectedDay.setDate(tmpSelectedDay.getDate() + 1);

                $('.datetimepicker5').datepicker('update',tmpSelectedDay);

                $("#FrmFilter").submit();
            });

            $(".kurang-tanggal").on("click", function() {
                var selectedDay = $('.datetimepicker5').datepicker('getDate');

                var tmpSelectedDay= new Date(selectedDay);
                    tmpSelectedDay.setDate(tmpSelectedDay.getDate() - 1);

                $('.datetimepicker5').datepicker('update',tmpSelectedDay);

                $("#FrmFilter").submit();
            });

            $('.datetimepicker5').on("changeDate", function(e) {
                $("#FrmFilter").submit();
            });

            $(".dropdown-kelas").on("change", function() {
                request["filter"]["id_kelas"] = $(this).val();

                var kelas =  $(this).val();
                var tanggal = $(".tanggal").val();
                    tanggal = moment(tanggal, "DD MMM YYYY").format("YYYY-MM-DD");

                var url = "input_absensi.html?kls="+kelas+"&tgl="+tanggal+"";
                ChangeUrl('url', url);
            });

            $("#FrmFilter").submit(function() {
                var tanggal = $(this).find(".tanggal").val(), kelas = $(this).find(".kelas").val(), status = $(this).find(".absen").val();
                request["filter"]["id_kelas"] = kelas; 
                request["filter"]["tgl_jurnal"] = tanggal;
                request["filter"]["status"] = status;
                $('.result-save, .result-save-detil, .result').addClass("hidden");
                GetData(request, "getdatabyclass");
                $(".check1, .check2, .check3, .check_hadir").removeAttr("checked");
                $('.nis').addClass("hidden");
                $('.nisn').addClass("hidden");
                $('.alamat').addClass("hidden");
                //change url
                var kelas = $(".dropdown-kelas").val();
                var tanggal = $(".tanggal").val();
                    tanggal = moment(tanggal, "DD MMM YYYY").format("YYYY-MM-DD");

                var url = "input_absensi.html?kls="+kelas+"&tgl="+tanggal+"";
                ChangeUrl('url', url);
                return false;
            });

            $(".check1").on("change", function() {
                if ($('.check1').is(":checked"))
                {
                    $(".nis").removeClass("hidden");
                } else {
                    $(".nis").addClass("hidden");
                }
            });

            $(".check2").on("change", function() {
                if ($('.check2').is(":checked"))
                {
                    $(".nisn").removeClass("hidden");
                } else {
                    $(".nisn").addClass("hidden");
                }
            });

            $(".check3").on("change", function() {
                if ($('.check3').is(":checked"))
                {
                    $(".alamat").removeClass("hidden");
                } else {
                    $(".alamat").addClass("hidden");
                }
            });

            function Simpan () {
                $(".btnTambah").click();
            }

            function ChangeUrl(page, url) {
                if (typeof (history.pushState) != "undefined") {
                    var obj = { Page: page, Url: url };
                    history.pushState(obj, obj.Page, obj.Url);
                }
            }

            //Save SIA
            var FrmAddSIA = $("#FrmAddSIA").validate({
                submitHandler: function(form) {
                    var actionForm = $(form).attr("action");
                    var valueJSON  = $(form).serializeJSON(); //console.log(valueJSON);
                        valueJSON  = valueJSON.data;
                        
                    var datAdd = [], datEdit = [];
                    var add = 0, edit = 0, error = 0;    
                    var jumitem = Object.keys(valueJSON.items).length;
                    var editrow = 0;
                    var prosescekedit = true;
                    var listdataerror = false;
                    var tgl_jurnal = $(".tanggal").val(), kelas= $(".kelas").val(), jam = moment().format("HH:mm:ss");

                    $('.notifikasi').addClass("hidden");
                    $('.mt-repeater-hidden').removeClass("hidden");
                    $.each(valueJSON.items, function(index, item) {
                        var total_index = $(".mt-repeater-item").size();
                        var valoption = $("input[name='data[items]["+index+"][sia]']:checked").val();
                        if(empty(valoption)){
                            valoption = "";
                        }
                        var inputoption = $('.abs'+index).val();
                        var valket = $('.keterangan'+index).val();
                        var inputket = $('.formketerangan'+index).val();
                        if(valoption != inputoption || valket!=inputket){
                            if(!empty(item.sia)){
                                editrow++;
                            }
                        }
                    });
                    if(editrow != 0){
                        $.each(valueJSON.items, function(index, item) {
                            //update
                            var total_index = $(".mt-repeater-item").size();
                            var processed;
                            var valket = $('.keterangan'+index).val();
                            var inputket = $('.formketerangan'+index).val();
                            if(valket!=inputket || item.sia != item.abs){
                                if(!empty(item.abs)) {
                                    datEdit[index] = {    
                                        "nis": item.nis,
                                        "keterangan": item.sia,
                                        "tgl_jurnal": moment(tgl_jurnal, "DD MMM YYYY").format("YYYY-MM-DD"),
                                        "id_kelas"  : kelas,
                                        "old_ket"   : item.abs,
                                        "uraian"    : item.uraian,
                                        "jam"       : jam,
                                        "index"     : index
                                    }
                                }
                            }
                            //insert
                            if(!empty(item.sia) && empty(item.abs)) {
                                datAdd[index] = {    
                                    "nis": item.nis,
                                    "keterangan": item.sia,
                                    "tgl_jurnal": moment(tgl_jurnal, "DD MMM YYYY").format("YYYY-MM-DD"),
                                    "id_kelas"  : kelas,
                                    "uraian"    : item.uraian,
                                    "jam"       : jam,
                                    "index"     : index
                                }
                            }
                        });

                        if(!empty(datEdit)) {
                            datEdit = {act: "updatedataabsen", req: datEdit};
                            UpdateAbsensi(datEdit, actionForm, function(resp){
                                $.each(resp.DataRepeat, function(index, item) {
                                    if(item.IsError == false) {
                                        var valoption = $("input[name='data[items]["+item.index+"][sia]']:checked").val();
                                        $('.abs'+item.index).val(valoption);
                                        $('.item-index-data-'+item.index).removeClass("opacity-error opacity-success processed");
                                        $('.item-index-data-'+item.index).addClass("opacity-update processed");
                                    } else {
                                        listdataerror = true;
                                        $('.item-index-data-'+item.index).removeClass("opacity-success opacity-update processed");
                                        $('.item-index-data-'+item.index).addClass("opacity-error processed");
                                        $('.result-save-detil').append("<label class='text-danger'><b>NIS "+item.nis+"</b> : "+item.ErrMessage+"</label><br>");
                                    }
                                });
                                SetInserUpdateAbsensi(listdataerror);
                            });
                        }

                        if(!empty(datAdd)) {
                            datAdd = {act: "insertdataabsen", req: datAdd};
                            InsertAbsensi(datAdd, actionForm, function(resp){
                                $.each(resp.DataRepeat, function(index, item) {
                                    if(item.IsError == false) {
                                        var valoption = $("input[name='data[items]["+item.index+"][sia]']:checked").val();
                                        $('.abs'+item.index).val(valoption);
                                        $('.item-index-data-'+item.index).removeClass("opacity-error opacity-update processed");
                                        $('.item-index-data-'+item.index).addClass("opacity-success processed");
                                    } else {
                                        listdataerror = true;
                                        $('.item-index-data-'+item.index).removeClass("opacity-success opacity-update processed");
                                        $('.item-index-data-'+item.index).addClass("opacity-error processed");
                                        $('.result-save-detil').append("<label class='text-danger'><b>NIS "+item.nis+"</b> : "+item.ErrMessage+"</label><br>");
                                    }
                                });
                                SetInserUpdateAbsensi(listdataerror);
                            });
                        }
                    } else {
                        $('.mt-repeater-hidden, .result-save').addClass("hidden");
                    }
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

            function removeprocessed(){
                var total_remove = $(".mt-repeater-item").size();
                for(var z=1;z<=total_remove;z++){
                    $(".item-index-data-"+z).removeClass("processed");
                }
            }

            function AlertShow(msg, type = 'info') {
                return '<div class="alert alert-'+ type +'">'+ msg +'</div>';
            }

            function scrollToCenter(scroll, total_index) {
                var container = $('body'),
                    scrollTo = $('#data-'+scroll);
                container.animate({
                    scrollTop: scrollTo.offset().top - container.offset().top + scrollTo.scrollTop() - container.height() / total_index
                });
            }

            function SetInserUpdateAbsensi(listdataerror) {
                var insert = $(".opacity-success").size();
                var update = $(".opacity-update").size();
                var error = $(".opacity-error").size();
                $('.mt-repeater-hidden').addClass("hidden");
                $('.result-save').removeClass("hidden");
                removeprocessed();
                var alert = AlertShow(
                    "<span class='font-green-meadow'>" +
                        "<span class='bold'>"
                            + insert +
                        "</span>" + " Data insert. " +
                    "</span>" +
                    "<span class='text-info'>" +
                        "<span class='bold'>"
                            + update +
                        "</span>" + " Data update. " + 
                    "</span>" +
                    "<span class='text-danger'>" +
                        "<span class='bold'>"
                            + error +
                        "</span>" + " Data error." +
                    "</span>", "info"
                );
                if(listdataerror == true){
                    $('.result-save-detil, .result').removeClass("hidden");
                } else {
                    $('.result-save-detil, .result').addClass("hidden");
                }
                $(".result-save").html(alert);
                $('.scroll-to-top').click();
                editrow = 0;
            }
        </script>
    </body>
</html>
<?php 
    $user = $this->session->userdata("user");
    date_default_timezone_set('Asia/Jakarta');
    if(empty($date) && empty($time)) {
        $date = date_indo("d M Y"); $time = date("H:i");
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
        <title>Tambah Nilai | <?php echo $this->config->item("app_title"); ?></title>
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

        <link href="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker3.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/clockpicker/bootstrap-clockpicker.css"); ?>" rel="stylesheet">
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
            .custom-alerts {
                margin-bottom: 5px;
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
                                    <h1><i class="fa fa-tasks"></i> Tambah Nilai</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                    <li>
                                        <span class="active text-default">Nilai</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Tambah Nilai</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <a role="button" class="btn btn-primary ladda-button ladda-button-submit save-nilai hidden" data-style="slide-up" title="Simpan">
                                            <i class="fa fa-save"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" onclick="GetDataTable(true);" title="Refresh">
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
                                        <!-- <form action="nilai/ajax-nilai.html" role="form" id="FrmAddNilai"> -->
                                            <div class="row">
                                                <div class="col-md-2 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kelas</label>
                                                        <select style="width:100%;" class="form-control select2-normal dropdown-kelas kelas" required>
                                                            <option value="">Pilih Kelas</option>
                                                            <?php print_r($dropdownkelas->lsdt) ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kategori</label>
                                                        <select style="width:100%;" class="form-control select2-nosearch dropdown-kategori kategori" required>
                                                            <option value="">Pilih Kategori</option>
                                                            <?php print_r($dropdownkategori->lsdt) ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-4" style="align-items: center;">
                                                    <div class="form-group">
                                                        <label>Tgl Ujian</label>
                                                        <div class='input-group date datetimepicker5'>
                                                            <input type='text' class="form-control tgl_ujian" placeholder="Tanggal" required value="<?php echo $date; ?>"/>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-4" style="align-items: center;">
                                                    <div class="form-group">
                                                        <label>Tgl Publish</label>
                                                        <div class='input-group date datetimepicker5'>
                                                            <input type='text' class="form-control tanggal" placeholder="Tanggal" required value="<?php echo $date; ?>"/>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-calendar"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 col-sm-4" style="align-items: center;">
                                                    <div class="form-group">
                                                        <label>Jam Publish</label>
                                                        <div class="input-group clockpicker" data-align="bottom" data-autoclose="true">
                                                            <input type="text" class="form-control clock" placeholder="Waktu Post" required value="<?php echo $time; ?>"/>
                                                            <span class="input-group-addon">
                                                                <span class="glyphicon glyphicon-time"></span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="form[tgl_publish]" value="<?php echo date("Y-m-d"); echo " "; echo date("H:i:s"); ?>">
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 notif text-center">
                                                    <div class="custom-alerts alert alert-warning fade in col-md-12"><a role="button" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>Silahkan Pilih Kelas dan Kategori Terlebih Dahulu.</div>
                                                </div>
                                            </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 table-input hidden">
                                <div class="portlet custom light bordered">
                                    <div class="portlet-body">
                                        <div class="loading-hidden">
                                            <center>
                                                <img class="loading" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                            </center>
                                            <br>
                                        </div>
                                        <div class="table-container hidden">
                                            <form class="form-horizontal" action="nilai/ajax-nilai.html" role="form" id="FrmAddNilai">
                                                <div class="result-save hidden">
                                                </div>
                                                <div class="result-save-detil hidden">
                                                    <a role="button" class="close" aria-label="close" onclick="$(this).parent('div').addClass('hidden')">&times;</a>
                                                </div>
                                                <div class="mt-repeater-hidden hidden">
                                                    <center>
                                                        <img class="loading" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                                    </center>
                                                    <br>
                                                </div>
                                                <div class="mt-repeater">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                            <tr class="bg-grey-steel">
                                                                <th style="width: 175px;">NIS</th>
                                                                <th style="width: 250px;">Nama</th>
                                                                <th style="min-width: 200px;">Nilai (Keterangan)</th>
                                                                <th style="width: 35px;" class="text-center">Publish</th>
                                                                <!-- <th style="width: 35px;" class="text-center"></th> -->
                                                            </tr>
                                                        </thead>
                                                        <tbody data-repeater-list="data[items]" id="mt-repeater-tbody">
                                                                <tr data-repeater-item class="mt-repeater-item">
                                                                    <td style="vertical-align: middle;">
                                                                        <div class="mt-repeater-input">
                                                                            <label class="nis"></label>
                                                                            <input type="hidden" class="nis-text" name="form[nis]"></input>
                                                                            <input type="hidden" class="is_lock" name="form[is_lock]" value="0">
                                                                        </div>
                                                                    </td>
                                                                    <td style="vertical-align: middle;">
                                                                        <div class="mt-repeater-input">
                                                                            <a href="#" target="_blank" class="nama"></a>
                                                                        </div>
                                                                    </td>
                                                                    <td style="vertical-align: middle; width: auto;">
                                                                        <div class="mt-repeater-input">
                                                                            <textarea class="form-control input-ket" name="form[nilai]" style="width:100%;" placeholder="Nilai (Keterangan)" rows="1" autofocus ></textarea> 
                                                                        </div>
                                                                    </td>
                                                                    <td style="text-align: center; vertical-align: middle; width: auto;">
                                                                        <div class="mt-repeater-input mt-checkbox-inline" style="padding-left: 30px; align-items: center;">
                                                                            <label class="mt-checkbox  mt-checkbox-outline">
                                                                                <input type="checkbox" class="publish_check" checked>
                                                                                <span></span>
                                                                            </label>
                                                                            <input type="hidden" name="form[is_published]" class="publish_text" value="1">
                                                                        </div>
                                                                    </td>
                                                                    <td style="text-align: center; vertical-align: middle;" class="hidden">
                                                                        <center>
                                                                            <div class="mt-repeater-input mt-delete">
                                                                                <a role="button" data-repeater-delete class="mt-repeater-delete"><i class="fa fa-trash"></i></a>
                                                                            </div>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                    <a data-repeater-create role="button" class="btn btn-primary btnTambah hidden"><i class="fa fa-plus"></i> Tambah Data</a>
                                                    <div class="text-right">
                                                        <button class=" btn btn-default text-right" type="button" onClick="backAway()">Batal</button>  
                                                        <a role="button" class="btn btn-primary ladda-button ladda-button-submit save-nilai" data-style="slide-up"><i class="fa fa-floppy-o"></i> Simpan</a>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                        <div class="dataempty hidden">
                                            <center>
                                                <span class='label label-warning'>Tidak ada data</span>
                                            </center>
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
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"); ?>" charset="UTF-8"></script>
        <script src="<?php echo base_url("assets/plugins/clockpicker/bootstrap-clockpicker.js"); ?>"></script>

        <!-- Jquery Validate + Ladda Button -->
        <script src="<?php echo base_url("assets/plugins/validate/jquery.validate.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/ladda/spin.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.jquery.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/jquery-repeater/jquery.repeater.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/serializeJSON/jquery.serializejson.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/scripts/form-repeater.js"); ?>"></script>
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script>    
        <script>
            pagename = "nilai/ajax-nilai.html";
            $(document).ready(function() {
                getdatadropdownsiswa("",$(".kelas").val());
                // getdatadropdownkategori("",3);
                // getdatadropdownkelas();

                $('.datetimepicker5').datepicker({
                    defaultDate: new Date(),
                    autoclose: true,
                    format: 'dd M yyyy',
                    todayHighlight: true,
                    maxViewMode: 2,
                    immediateUpdates: true,
                    language: "id",
                    orientation:"bottom"
                });

                $('.clockpicker').clockpicker({
                    placement: 'bottom',
                    align: 'right'
                });
                $(".tanggal, .tanggal-ujian").val("<?php echo $date ?>");

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
                    history.back();
                }
            }

            $(".tanggal").on("change", function() {
                var tgl = moment($(".tanggal").val(), "DD MMM YYYY").format('YYYY-MM-DD');
                var jam = moment($(".clock").val(), "HH:mm").format('HH:mm:ss');
                $("input[name='form[tgl_publish]']").val(tgl + " " + jam);
            });

            $(".tanggal-ujian").on("change", function() {
                var tgl = moment($(".tanggal-ujian").val(), "DD MMM YYYY").format('YYYY-MM-DD');
                $("input[name='form[tgl_ujian]']").val(tgl);
            });

            $(".clock").on("change", function() {
                var tgl = moment($(".tanggal").val(), "DD MMM YYYY").format('YYYY-MM-DD');
                var jam = moment($(".clock").val(), "HH:mm").format('HH:mm:ss');
                $("input[name='form[tgl_publish]']").val(tgl + " " + jam)
            });

            $(".publish_check").on("change", function() {
                var index = $(this).parents(".mt-repeater-item").index();
                index = index + 1;
                if ($(this).is(":checked")) {
                    $(".mt-repeater-item:nth-child("+index+") .publish_text").val(1);
                } else {
                    $(".mt-repeater-item:nth-child("+index+") .publish_text").val(0);
                }
            });

            $(".kategori, .kelas").on("change", function() {
                GetDataTable()
            });

            $(".btnTambah").click(function() {
                var index = $(".nis").parents(".mt-repeater-item").index();
                index = index + 2;
                setTimeout(function(){
                    $(".mt-repeater-item:last-child() .publish_text").val(1);
                }, 10);
            });

            function GetDataTable(reload = false) {
                if($(".kategori").val() == "" || $(".kelas").val() == "") {
                    $(".table-input").addClass("hidden");
                    $(".notif").removeClass("hidden");
                    $(".save-nilai").addClass("hidden");

                    if(reload) location.reload();
                } else if ($(".kategori").val() != "" && $(".kelas").val() != "") {
                    $(".loading-hidden, .table-input").removeClass("hidden");
                    $(".table-container, .notif").addClass("hidden");
                    $('.result-save, .result-save-detil').addClass("hidden");
                    $.ajax({
                        type: "POST",
                        url: base_url + "/ajax/master-data/ajax-siswa.html",
                        data: {act:"getdatabyclass", req: $(".kelas").val()},
                        dataType: "JSON",
                        tryCount: 0,
                        retryLimit: 3,
                        success: function(resp){
                            var ind = 0;
                            var ifempty = "true";
                            if(resp.IsError == false) {
                                $("#FrmAddNilai").find(".mt-repeater-item:not(:first)").remove();
                                $("#FrmAddNilai").find(".mt-repeater-item:first textarea").removeAttr("disabled").val("");
                                $("#FrmAddNilai").find(".mt-repeater-item:first .publish_check").removeAttr("disabled");
                                $('.mt-repeater-item:first-child').attr('id', "data-1");
                                $.each(resp.Data, function(index, item) {
                                    if(resp.Data.length != 0) {
                                        $(".mt-repeater-item").removeClass("opacity-error opacity-success opacity-update processed");
                                        $(".mt-repeater-item:nth-child(" + (index+1) + ") .nis").html(resp.Data[index].nis);
                                        $(".mt-repeater-item:nth-child(" + (index+1) + ") .nis-text").val(resp.Data[index].nis);
                                        $(".mt-repeater-item:nth-child(" + (index+1) + ") .nama").html(resp.Data[index].nama);
                                        $(".mt-repeater-item:nth-child(" + (index+1) + ") .nama").attr("href", base_url + "/siswa/detail.html?nis="+resp.Data[index].nis);
                                        $(".mt-repeater-item:nth-child(" + (index+1) + ") .publish_text").val(1);
                                        if(index != resp.Data.length - 1) {
                                            $(".btnTambah").click();
                                            $('.mt-repeater-item:last-child').attr('id', "data-"+(index+2));
                                        }
                                        ifempty = "false";
                                        $(".table-container").removeClass("hidden");
                                        $(".loading-hidden, .dataempty").addClass("hidden");
                                        $(".save-nilai").removeClass("hidden");
                                    }
                                });
                                $("#FrmAddNilai").find(".mt-repeater-item:first .input-ket").focus();
                                if(ifempty=="true"){
                                    toastrshow("warning", "Kelas ini tidak mempunyai siswa", "Warning");
                                    $(".loading-hidden, .table-container").addClass("hidden");
                                    $(".dataempty").removeClass("hidden");
                                }
                            }
                        },
                        error: function(xhr, textstatus, errorthrown) {
                            if(textstatus == "timeout") {
                                this.tryCount++;
                                if(this.tryCount <= this.retryLimit) {
                                    $.ajax(this);
                                }
                            }
                        }
                    });
                }
            }

            var total_terisi;
            function GetValueRepeater() {
                total_terisi = 0;
                var last_bool = false; 
                $(".mt-repeater-item").each(function(index, item) {
                    var value = $(this).find(".input-ket").val();
                    if(!empty(value)) {
                        last_bool = true;
                        total_terisi++;
                    }
                });
                return last_bool;
            }

            var FrmSaveWebsite = $("#FrmAddNilai").validate({
                submitHandler: function(form) {
                    var actionForm = $(form).attr("action");
                    var valueJSON  = $(form).serializeJSON();
                        valueJSON  = valueJSON.data; 
                        
                    var datSis = [];
                    var listdataerror = false;
                    $('.result-save-detil').empty();

                    var total_index = $(".mt-repeater-item").size();
                    var value_terakhir = $(".mt-repeater-item:last-child").find(".input-ket").val();

                    var data_proses = GetValueRepeater(), tgl_ujian = $(".tgl_ujian").val();
                    tgl_ujian = moment(tgl_ujian, "DD MMM YYYY").format("YYYY-MM-DD");

                    var nilaikosong  = 0, proses = 0, total = valueJSON.items.length;
                    var index_simpan = 0;

                    $.each(valueJSON.items, function(index, item) {
                        if(!empty(item.nis)) {
                            var stringify = !empty(item.value) ? jsonstringify(item.value): "";
                            if(empty(item.nilai)) {
                                nilaikosong++;
                            }

                            if(!empty(item.nilai)) {
                                datSis[index_simpan] = {
                                    "nis": item.nis,
                                    "keterangan": item.nilai,
                                    "is_published": item.is_published,
                                    "tgl_publish": $("input[name='form[tgl_publish]']").val(),
                                    "id_kelas": $(".kelas").val(),
                                    "id_kategori": $(".kategori").val(),
                                    "nama_kategori": $(".kategori option:selected").text(),
                                    "tgl_ujian": tgl_ujian
                                };
                                index_simpan++;
                            }

                            if(item.is_lock == true) return true;
                            if(empty(item.nilai) && empty(value_terakhir) && data_proses == false) {
                                var index2 = (parseInt(index) + 1);
                                if(index2 == total_index) {
                                    toastrshow("warning", "Tidak ada data yang bisa disimpan", "Warning");
                                    return;
                                }
                                return;
                            }
                        } else if ($(".kelas").val() == "") {
                            toastrshow("warning", "Harap masukkan Kelas", "Warning");
                        } else if ($(".kategori").val() == "") {
                            toastrshow("warning", "Harap masukkan Kategori Nilai", "Warning");
                        } else if ($(".tanggal").val() == "") {
                            toastrshow("warning", "Harap masukkan Tanggal Publish", "Warning");
                        } else {
                            toastrshow("warning", "Data yang dimasukkan Tidak Valid", "Warning");
                        }                        
                    });

                    if(!empty(datSis)) {
                        var actionData = {act: "insertdatarepeat", req: datSis};
                        InsertRepeaterNoToaster("", actionData, actionForm,  function(resp) {
                            $.each(resp.DataRepeat, function(index, item) {
                                var repeat_selector = $(".mt-repeater-input label.nis").filter(function(){ return $(this).text() == item.nis });
                                    repeat_selector = repeat_selector.parents(".mt-repeater-item");
                                    
                                if(item.IsError == false) {
                                    repeat_selector.removeClass("opacity-error opacity-success processed");
                                    repeat_selector.addClass("opacity-success processed");
                                    repeat_selector.find(".input-ket, .publish_check ").attr("disabled", true);
                                    repeat_selector.find(".is_lock").val(true);

                                    $('.result-save-detil').append("<label class='font-green-meadow'><b>NIS "+item.nis+"</b> : Data Berhasil Disimpan</label><br>");
                                } else {
                                    listdataerror = true;
                                    repeat_selector.removeClass("opacity-success opacity-update processed");
                                    repeat_selector.addClass("opacity-error processed");

                                    $('.result-save-detil').append("<label class='text-danger'><b>NIS "+item.nis+"</b> : "+item.ErrMessage+"</label><br>");
                                }
                            });

                            var insert = $(".opacity-success").size();
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
                                "<span class='text-danger'>" +
                                    "<span class='bold'>"
                                        + error +
                                    "</span>" + " Data error." +
                                "</span>", "info"
                            );
                            if(listdataerror == true){
                                $('.result-save-detil').removeClass("hidden");
                            } else {
                                $('.result-save-detil').addClass("hidden");
                            }
                            $(".result-save").html(alert);
                            $('.scroll-to-top').click();
                        });
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

            $(".save-nilai").click(function() {
                $("#FrmAddNilai").submit();
            });

            $(".table-container").on("keydown", "textarea.input-ket", function(e) {
                var code = e.keyCode || e.which;
                if (code == 13 || code == 9) {
                    e.preventDefault();
                    var index = $(this).parents(".mt-repeater-item").index();
                        index = (index + 2);
                    $(".mt-repeater-item:nth-child("+index+") textarea").focus();
                    return false;
                }
            });

            function removeprocessed(){
                var total_remove = $(".mt-repeater-item").size();
                for(var z=1;z<=total_remove;z++){
                    $('.mt-repeater-item:nth-child('+parseInt(z)+')').removeClass("processed");
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
        </script>
    </body>
</html>
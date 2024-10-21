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
        <title>Bayar Tagihan | <?php echo $this->config->item("app_title"); ?></title>
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
        <link href="<?php echo base_url("assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"); ?>" rel="stylesheet">

        <link href="<?php echo base_url("assets/css/components-rounded.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/plugins.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/layout.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/default.min.css"); ?>" id="style_color" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/responsive.css"); ?>" rel="stylesheet">
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
            input[readonly]{
                cursor: default !important;
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
                            <div class="col-sm-10">
                                <div class="page-title">
                                    <h1><i class="fa fa-money"></i> Bayar Tagihan</h1>
                                </div>
                                <ul class="page-breadcrumb breadcrumb col-xs-12">
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
                                                <a onclick="location.reload();"> Bayar</a>
                                            </span>
                                        </li>
                                    </ul>
                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
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
                                    <form id="FrmFilter" role="form" class="form-horizontal">
                                        <div class="row form-body">
                                            <div class="col-md-5 col-sm-6">
                                                <div class="form-group form-md-line-input" style="margin-bottom: 0px;">
                                                    <label class="col-md-3 col-xs-4 text-left bold">NIS</label>
                                                    <div class="col-md-9 col-xs-8 input-group">
                                                        <input type="text" placeholder="Masukkan NIS" class="nis tagsinput_siswa form-control siswa" value="">
                                                        <span class="input-group-addon modalsiswalist" style="background: #337ab7; border-radius: 4px;">
                                                            <a role="button" style="color:white"><i class="fa fa-list"></i></a>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-line-input" style="margin-bottom: 0px;">
                                                    <label class="col-md-3 col-xs-4 text-left bold">Nama</label>
                                                    <div class="col-md-9 col-xs-8 input-group">
                                                        <input type="text" placeholder="Nama Siswa" class="siswa-show form-control" readonly>
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-line-input" style="margin-bottom: 15px;">
                                                    <label class="col-md-3 col-xs-4 text-left bold">Kelas</label>
                                                    <div class="col-md-9 col-xs-8 input-group">
                                                        <input type="text" placeholder="Nama Kelas" class="kelas-show form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-5 col-sm-6 col-md-offset-1">
                                                <div class="form-group form-md-line-input" style="margin-bottom: 0px;">
                                                    <label class="col-md-3 col-xs-4 text-left bold">Tgl Bayar</label>
                                                    <div class="input-group date col-md-9 col-xs-8" style="margin-bottom: 10px;">
                                                        <input id="datetimepicker6" type="text" class="form-control tanggal tgl_eksekusi_edit date-set valid" placeholder="Tanggal Post" value="<?php echo date_indo("d M Y"); ?>" style="background-color: #ffffff" readonly="readonly" aria-invalid="false" name="form[tgl_bayar]">
                                                    </div>
                                                </div>
                                                <input type="hidden" class="tgl_eksekusi">
                                                <div class="form-group">
                                                    <div class="col-md-3 col-xs-4">
                                                        <label class="bold" style="color:#888;">Cara Bayar</label>
                                                    </div>
                                                    <div class="col-md-9 col-xs-8" style="padding-left: 0px;padding-right: 0px;">
                                                        <select style="width:100%;" class="form-control select2-nosearch metode-bayar" name="form[cara_bayar]">
                                                            <option value="TUNAI" selected>Tunai</option>
                                                            <option value="TRANSFER">Transfer</option>
                                                            <option value="LAINNYA">Lainnya...</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-3 col-xs-4">
                                                        <label class="bold" style="color:#888;">Catatan</label>
                                                    </div>
                                                    <div class="col-md-9 col-xs-8" style="padding-left: 0px;padding-right: 0px;">
                                                        <input class="form-control uraian" placeholder="Catatan..." name="form[uraian]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 notif text-center">
                                                <input type="hidden" class="id_tarif">
                                                <div class="custom-alerts alert alert-warning fade in col-md-12 siswatidak">Silahkan Pilih NIS Terlebih Dahulu.</div>
                                            </div>
                                        </div>
                                    </form>
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
                                        <form class="form-horizontal" action="keuangan/ajax-pembayaran.html" role="form" id="FrmAddPembayaran">
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
                                            <div class="mt-repeater table-responsive">    
                                                <table class="table ">
                                                    <thead>
                                                        <tr class="bg-grey-steel" style="width: 100%;">
                                                            <th > No. Tagihan </th>
                                                            <th > Nama Tagihan </th>
                                                            <th style="width:200px" class="text-right"> Jumlah Tagihan </th>
                                                            <th style="min-width:200px" class="text-right"> Bayar </th>
                                                            <th style="width:30px">
                                                                <label class="mt-checkbox">
                                                                    <input type="checkbox" class="checkbox-bayar-semua" value="1"><span></span>
                                                                </label>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody data-repeater-list="data[items]" id="mt-repeater-tbody">
                                                        <tr data-repeater-item class="mt-repeater-item">
                                                            <td style="vertical-align: middle;">
                                                                <div class="mt-repeater-input">
                                                                    <a role="button" class="id-tagihan"></a>
                                                                    <input type="hidden" class="id_tagihan" name="form[id_tagihan]">
                                                                    <input type="hidden" class="nis-hidden" name="form[nis]">
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <div class="mt-repeater-input">
                                                                    <label class="nama-tagihan"></label>
                                                                </div>
                                                            </td>
                                                            <td style="vertical-align: middle;">
                                                                <div class="mt-repeater-inpu text-right">
                                                                    <label class="jumlah-tagihan"></label>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="mt-repeater-input">
                                                                    <input type="text" class="form-control formbayar text-right" name="form[jml_bayar]" placeholder="Bayar" onkeypress='return validatedata(event)'>
                                                                    <input type="hidden" class="id_bayar">
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="mt-repeater-input">
                                                                    <label class="mt-checkbox">
                                                                        <input type="checkbox" class="checkbox-bayar"><span></span>
                                                                    </label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot class="bg-grey-steel">
                                                        <tr>
                                                            <td class="text-right" colspan="5">
                                                                <div class="col-lg-6 col-lg-push-6 col-sm-6 col-sm-push-6">
                                                                    <div class="row">
                                                                        <div class="" style="font-size: 18px;">
                                                                            <label class="label-control col-lg-7 col-sm-6 col-xs-8">Total Tagihan</label>
                                                                            <div class="col-lg-5 col-sm-6 col-xs-4 text-right total-tagihan">Rp 0</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="" style="font-size: 18px;">
                                                                            <label class="label-control col-lg-7 col-sm-6 col-xs-8">Total Belum Bayar</label>
                                                                            <div class="col-lg-5 col-sm-6 col-xs-4 text-right total-belum-bayar">Rp 0</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="" style="font-size: 18px;">
                                                                            <label class="label-control col-lg-7 col-sm-6 col-xs-8 bold">
                                                                                <span class="sisa-tagihan bold">Total Bayar</span>
                                                                            </label>
                                                                            <div class="col-lg-5 col-sm-6 col-xs-4 text-right total-bayar bold">Rp 0</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                                <input type="hidden" name="form[no_pembayaran]" class="no_pembayaran">
                                                <a data-repeater-create role="button" class="btn btn-primary btnTambah hidden"><i class="fa fa-plus"></i> Tambah Data</a>
                                                <div class="col-sm-4">
                                                </div>
                                                <div class="col-sm-8 text-right">
                                                    <button class=" btn btn-default text-right" type="button" onClick="backAway()">Batal</button>
                                                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up"><i class="fa fa-save"></i>  Bayar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $this->load->view("other/footer") ?>
        </div>
        <?php $this->load->view("keuangan/pembayaran/modal/pilihsiswa") ?>
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
        <script src="<?php echo base_url("assets/plugins/serializeJSON/jquery.serializejson.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/scripts/form-repeater.js"); ?>"></script>

        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script>
        <!-- Bootstrap Datepicker -->
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"); ?>" charset="UTF-8"></script>
        <script>
        var editrow = 0;
        var base_url = "<?php echo base_url(); ?>";
        pagename = "keuangan/ajax-pembayaran.html";
        $(document).ready(function () {
            $(".dropdown-kelas").select2();
            getdatadropdownkelas2();
            $('#datetimepicker6').datepicker({
                defaultDate: new Date(),
                autoclose: true,
                format: 'dd M yyyy',
                todayHighlight: true,
                maxViewMode: 2,
                immediateUpdates: true,
                language: "id"
            });
            getdatadropdownkelas3();
            if ("<?php echo $user->foto; ?>" == "default.png"){
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


        $(".checkbox-bayar-semua").change(function () {
            var total_formnominal = $(".mt-repeater-item").size();
            var i = 1;
            var totalbayar;
            if ($(this).is(':checked')) {
                for (i = 1; i <= total_formnominal; i++) {
                    $('.mt-repeater-item:nth-child(' + i + ') .checkbox-bayar').prop("checked", true);
                    $('.mt-repeater-item:nth-child(' + i + ') .disableddata').prop("checked", false);
                    centangtempel(i);
                }
            } else {
                for (i = 1; i <= total_formnominal; i++) {
                    $('.mt-repeater-item:nth-child(' + i + ') .checkbox-bayar').prop("checked", false);
                    centangtempel(i);
                }
            }
            var totalbayar = 0;
            for (i = 1; i <= total_formnominal; i++) {
                bayarperrow = $('.mt-repeater-item:nth-child(' + i + ') .formbayar').val();
                bayarperrow = bayarperrow.replace(/\./g, "", bayarperrow);
                parseInt(totalbayar);
                parseInt(bayarperrow);
                totalbayar = ((totalbayar * 1) + (bayarperrow * 1));
            }
            var totalbelumbayar = $('.total-tagihan').text();
            totalbelumbayar = totalbelumbayar.replace(/\./g, "", totalbelumbayar);
            totalbelumbayar = totalbelumbayar.replace(/Rp /g, "", totalbelumbayar);
            parseInt(totalbelumbayar);
            totalbelumbayar = ((totalbelumbayar * 1) - (totalbayar * 1));
            var number_string = totalbayar.toString(), sisa = number_string.length % 3, totalbayar = number_string.substr(0, sisa), ribuan = number_string.substr(sisa).match(/\d{3}/g);
            if (ribuan) {
                separator = sisa ? '.' : '';
                totalbayar += separator + ribuan.join('.');
            }
            var number_string = totalbelumbayar.toString(), sisa = number_string.length % 3, totalbelumbayar = number_string.substr(0, sisa), ribuan = number_string.substr(sisa).match(/\d{3}/g);
            if (ribuan) {
                separator = sisa ? '.' : '';
                totalbelumbayar += separator + ribuan.join('.');
            }
            $('.total-bayar').text("Rp " + totalbayar);
            $('.total-belum-bayar').text("Rp " + totalbelumbayar);
        });

        $(".checkbox-bayar").change(function () {
            var index = $(this).parents(".mt-repeater-item").index();
            index = index + 1;
            centangtempel(index);
            total_formnominal = $(".mt-repeater-item").size();
            var totalbayar = 0;
            for (i = 1; i <= total_formnominal; i++) {
                bayarperrow = $('.mt-repeater-item:nth-child(' + i + ') .formbayar').val();
                bayarperrow = bayarperrow.replace(/\./g, "", bayarperrow);
                parseInt(totalbayar);
                parseInt(bayarperrow);
                totalbayar = ((totalbayar * 1) + (bayarperrow * 1));
            }
            var totalbelumbayar = $('.total-tagihan').text();
            totalbelumbayar = totalbelumbayar.replace(/\./g, "", totalbelumbayar);
            totalbelumbayar = totalbelumbayar.replace(/Rp /g, "", totalbelumbayar);
            parseInt(totalbelumbayar);
            totalbelumbayar = ((totalbelumbayar * 1) - (totalbayar * 1));
            var number_string = totalbayar.toString(), sisa = number_string.length % 3, totalbayar = number_string.substr(0, sisa), ribuan = number_string.substr(sisa).match(/\d{3}/g);
            if (ribuan) {
                separator = sisa ? '.' : '';
                totalbayar += separator + ribuan.join('.');
            }
            var number_string = totalbelumbayar.toString(), sisa = number_string.length % 3, totalbelumbayar = number_string.substr(0, sisa), ribuan = number_string.substr(sisa).match(/\d{3}/g);
            if (ribuan) {
                separator = sisa ? '.' : '';
                totalbelumbayar += separator + ribuan.join('.');
            }
            $('.total-bayar').text("Rp " + totalbayar);
            $('.total-belum-bayar').text("Rp " + totalbelumbayar);
        });

        function centangtempel(index) {
            var batasmaks = $(".mt-repeater-item:nth-child(" + index + ") .jumlah-tagihan").text();
            batasmaks = batasmaks.replace(/\./g, "", batasmaks);
            if ($(".mt-repeater-item:nth-child(" + index + ") .checkbox-bayar").is(':checked')) {
                var number_string = batasmaks.toString(),
                        sisa = number_string.length % 3,
                        batasmaks = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    batasmaks += separator + ribuan.join('.');
                }
                $(".mt-repeater-item:nth-child(" + index + ") .formbayar").val(batasmaks);
            } else {
                var disableddata = $(".mt-repeater-item:nth-child(" + index + ") .disableddata").val();
                if (empty(disableddata)) {
                    $(".mt-repeater-item:nth-child(" + index + ") .formbayar").val("");
                }
            }
        }

        $("#datetimepicker6, .clockpicker").change(function () {
            var tanggal = $("#datetimepicker6").val();
            tanggal = tanggal.replace(/Jan/g, "01", tanggal);
            tanggal = tanggal.replace(/Feb/g, "02", tanggal);
            tanggal = tanggal.replace(/Mar/g, "03", tanggal);
            tanggal = tanggal.replace(/Apr/g, "04", tanggal);
            tanggal = tanggal.replace(/May/g, "05", tanggal);
            tanggal = tanggal.replace(/Jun/g, "06", tanggal);
            tanggal = tanggal.replace(/Jul/g, "07", tanggal);
            tanggal = tanggal.replace(/Aug/g, "08", tanggal);
            tanggal = tanggal.replace(/Sep/g, "09", tanggal);
            tanggal = tanggal.replace(/Oct/g, "10", tanggal);
            tanggal = tanggal.replace(/Nov/g, "11", tanggal);
            tanggal = tanggal.replace(/Dec/g, "12", tanggal);
            var tgl = tanggal.substr(0, 2);
            var bln = tanggal.substr(3, 2);
            var thn = tanggal.substr(6, 4);
            var waktu = "00:00:00";
            tanggal = thn + "-" + bln + "-" + tgl + " " + waktu;
            $(".tgl_eksekusi").val(tanggal);
        });

        $(".kelas").change(function () {
            if ($(".kelas").val() == "") {
                $(".siswa").val("");
                $(".siswa").attr("disabled", "");
                $(".siswa").removeProp("style");
                // $(".table-input").addClass("hidden");
                // $(".notif").removeClass("hidden");
                GetDataPembayaran();
            } else {
                $(".siswa").removeAttr("disabled");
                $(".siswa").css("background", "#ffffff");
            }
        });
        $(".jenis-tagihan").change(function () {
            GetDataPembayaran();
        });
        $(".siswa, .modalsiswalist").click(function () {
            $('#pilihsiswa').modal();
        });

        function GetDataPembayaran() {
            if ($(".nis").val() == "") {
                $(".table-input").addClass("hidden");
                $(".notif").removeClass("hidden");
            } else if ($(".nis").val() != "") {
                $(".loading-hidden, .table-input").removeClass("hidden");
                $(".table-container, .notif").addClass("hidden");
                $('.result-save, .result-save-detil, .result').addClass("hidden");
                $.ajax({
                    type: "POST",
                    url: base_url + "/ajax/keuangan/ajax-tagihan.html",
                    data: {act: "getdatabynis", req: {
                            "nis": $(".nis").val(),
                            "jns_tagihan": 6
                        }},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function (resp) {
                        var ind = 0;
                        var ifempty = "true";
                        if (resp.IsError == false) {
                            $("#FrmAddPembayaran").find(".mt-repeater-item:not(:first)").remove();
                            $('.mt-repeater-item:first-child').attr('id', "data-1");
                            $.each(resp.Data, function (index, item) {
                                if (resp.Data.length != 0) {
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ") .id-tagihan").html(resp.Data[index].id_tagihan);
                                    var link = base_url + "tagihan/detail.html?id=" + resp.Data[index].id_tagihan;
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ") .id-tagihan").attr('href', link);
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ") .id_tagihan").val(resp.Data[index].id_tagihan);
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ") .nis-hidden").val(resp.Data[index].nis);
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ") .nama-tagihan").html(resp.Data[index].nama);
                                    //new data
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ")").removeClass("opacity-success opacity-error processed");
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ") .checkbox-bayar").removeClass("disableddata");
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ") .checkbox-bayar").removeAttr("disabled");
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ") .formbayar").removeClass("disableddata");
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ") .formbayar").removeAttr("disabled");
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ") .formbayar").val("");
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ") .id_bayar").val("");
                                    //end new data
                                    tagihan = (resp.Data[index].jml) - (resp.Data[index].jml_bayar)
                                    var number_string = tagihan.toString(), sisa = number_string.length % 3, tagihanribu = number_string.substr(0, sisa), ribuan = number_string.substr(sisa).match(/\d{3}/g);
                                    if (ribuan) {
                                        separator = sisa ? '.' : '';
                                        tagihanribu += separator + ribuan.join('.');
                                    }
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ") .jumlah-tagihan").html(tagihanribu);
                                    $(".mt-repeater-item:nth-child(" + (index + 1) + ") .formbayar").attr('data-max', tagihan);
                                    if (index != resp.Data.length - 1) {
                                        $(".btnTambah").click();
                                        $('.mt-repeater-item:last-child').attr('id', "data-" + (index + 2));
                                    }
                                    ifempty = "false";
                                    $(".table-container").removeClass("hidden");
                                    $(".loading-hidden, .dataempty").addClass("hidden");
                                }
                            });
                            if (ifempty == "true") {
                                toastrshow("warning", "Siswa Tidak Memiliki Tagihan", "Warning");
                                $(".loading-hidden, .table-container, .table-input").addClass("hidden");
                                $(".siswatidak").text("Siswa Tidak Memiliki Tagihan");
                                $(".dataempty, .notif").removeClass("hidden");
                            }
                        }
                        total_formnominal = $(".mt-repeater-item").size();
                        var totaltagihan = 0;
                        for (i = 1; i <= total_formnominal; i++) {
                            tagihanperrow = $('.mt-repeater-item:nth-child(' + i + ') .jumlah-tagihan').text();
                            tagihanperrow = tagihanperrow.replace(/\./g, "", tagihanperrow);
                            parseInt(totaltagihan);
                            parseInt(tagihanperrow);
                            totaltagihan = ((totaltagihan * 1) + (tagihanperrow * 1));
                        }
                        var number_string = totaltagihan.toString(), sisa = number_string.length % 3, totaltagihan = number_string.substr(0, sisa), ribuan = number_string.substr(sisa).match(/\d{3}/g);
                        if (ribuan) {
                            separator = sisa ? '.' : '';
                            totaltagihan += separator + ribuan.join('.');
                        }
                        $('.total-tagihan, .total-belum-bayar').text("Rp " + totaltagihan);
                        $('.total-bayar').text("Rp 0");
                        $(".no_pembayaran").val("");
                        $(".mt-repeater-item:nth-child(1) .formbayar").focus();
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
        }

        $(".formbayar").focus(function () {
            var index = $(this).parents(".mt-repeater-item").index();
            index = index + 1;
            var inputan = $(this).val();
            inputan = inputan.replace(/\./g, "", inputan);
            $(this).val(inputan);
        });

        $(".formbayar").blur(function (event) {
            event.stopPropagation();
            event.stopImmediatePropagation();

            var index = $(this).parents(".mt-repeater-item").index();
            index = index + 1;

            var inputan = $(".mt-repeater-item:nth-child(" + index + ") .formbayar").val();
            var batasmaks = $(".mt-repeater-item:nth-child(" + index + ") .jumlah-tagihan").text();
            batasmaks = batasmaks.replace(/\./g, "", batasmaks);
            inputan = parseInt(inputan);
            batasmaks = parseInt(batasmaks);
            if (inputan < batasmaks && inputan > 0) {
                var number_string = inputan.toString(),
                        sisa = number_string.length % 3,
                        inputan = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    inputan += separator + ribuan.join('.');
                }
                $(this).val(inputan);
                $('.mt-repeater-item:nth-child(' + index + ') .checkbox-bayar').prop("checked", false);
            } else if (inputan >= batasmaks) {
                var number_string = batasmaks.toString(),
                        sisa = number_string.length % 3,
                        batasmaks = number_string.substr(0, sisa),
                        ribuan = number_string.substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    batasmaks += separator + ribuan.join('.');
                }
                $(this).val(batasmaks);
                $('.mt-repeater-item:nth-child(' + index + ') .checkbox-bayar').prop("checked", true);
            } else if (inputan < 0) {
                $(this).val("");
            }

            //start hitung hasil
            total_formnominal = $(".mt-repeater-item").size();
            var totalbayar = 0;
            for (i = 1; i <= total_formnominal; i++) {
                bayarperrow = $('.mt-repeater-item:nth-child(' + i + ') .formbayar').val();
                bayarperrow = bayarperrow.replace(/\./g, "", bayarperrow);
                parseInt(totalbayar);
                parseInt(bayarperrow);
                totalbayar = ((totalbayar * 1) + (bayarperrow * 1));
            }
            var totalbelumbayar = $('.total-tagihan').text();
            totalbelumbayar = totalbelumbayar.replace(/\./g, "", totalbelumbayar);
            totalbelumbayar = totalbelumbayar.replace(/Rp /g, "", totalbelumbayar);
            parseInt(totalbelumbayar);
            totalbelumbayar = ((totalbelumbayar * 1) - (totalbayar * 1));
            var number_string = totalbayar.toString(), sisa = number_string.length % 3, totalbayar = number_string.substr(0, sisa), ribuan = number_string.substr(sisa).match(/\d{3}/g);
            if (ribuan) {
                separator = sisa ? '.' : '';
                totalbayar += separator + ribuan.join('.');
            }
            var number_string = totalbelumbayar.toString(), sisa = number_string.length % 3, totalbelumbayar = number_string.substr(0, sisa), ribuan = number_string.substr(sisa).match(/\d{3}/g);
            if (ribuan) {
                separator = sisa ? '.' : '';
                totalbelumbayar += separator + ribuan.join('.');
            }
            $('.total-bayar').text("Rp " + totalbayar);
            $('.total-belum-bayar').text("Rp " + totalbelumbayar);
        });

        $("#pilihsiswa").on('show.bs.modal', function () {
            pagename = "master-data/ajax-siswa.html";
            request["Page"] = 1;
            request["filter"]["kelas"] = $(".kelas").val();
            SetGetData(request, "listdatahtmlnamasiswa", "", ".list-group-siswa");
            setTimeout(function () {
                $(".col-md-7 .input-search .form-control.kywd").focus();
            }, 1100);
        });

        $(".list-group-siswa").on("click", ".nama-siswa", function () {
            var id_siswa = $(this).attr('id');
            id_siswa = id_siswa.replace(/nis/g, "", id_siswa);
            var namasiswa = $(this).attr('nama-siswa');
            $(".nis").val(id_siswa);
            var kelassiswa = $(this).text();
            kelassiswa = kelassiswa.replace(namasiswa + " - ", "", kelassiswa);
            kelassiswa = kelassiswa.replace(id_siswa + " - ", "", kelassiswa);
            $(".siswa-show").val(namasiswa);
            $(".kelas-show").val(kelassiswa);
            $('#pilihsiswa').modal('hide');
            GetDataPembayaran();
        });

        $(".nis").focus(function (event) {
            $(".nis").blur();
        });

        function random_no_pembayaran(func = "") {
            no_pembayaran = Math.floor(1000000000 + Math.random() * 9000000000);
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "/ajax/keuangan/ajax-pembayaran.html",
                data: {act: "getrandom", req: {
                        "no_pembayaran": no_pembayaran
                    }},
                dataType: "JSON",
                tryCount: 0,
                retryLimit: 3,
                success: function (resp) {
                    no_output = resp.Output;
                    if (no_output == false) {
                        $(".no_pembayaran").val(no_pembayaran);
                    } else {
                        random_no_pembayaran();
                    }

                    if (!empty(func)) {
                        func();
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

        var FrmSaveWebsite = $("#FrmAddPembayaran").validate({
            submitHandler: function (form) {
                CheckChangeDataSiswa();
                if (editrow != 0) {
                    var no_output;
                    var no_pembayaran;
                    var form_no_pembayaran = $(".no_pembayaran").val();
                    if (empty(form_no_pembayaran)) {
                        random_no_pembayaran(function () {
                            SaveDataPembayaran(form);
                        });
                    } else {
                        SaveDataPembayaran(form);
                    }
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

        $(".save-bayar").click(function () {
            $("#FrmAddPembayaran").submit();
        });

        function CheckChangeDataSiswa() {
            editrow = 0;
            total_formnominal = $(".mt-repeater-item").size();
            for (i = 1; i <= total_formnominal; i++) {
                var inputbayar1 = $('.mt-repeater-item:nth-child(' + i + ') .formbayar').val();
                //c = copy
                var c_inputbayar1 = $('.mt-repeater-item:nth-child(' + i + ') .id_bayar').val();
                if (inputbayar1 != c_inputbayar1) {
                    editrow = editrow + 1;
                }
            }
            editrow = editrow;
        }

        function removeprocessed() {
            var total_remove = $(".mt-repeater-item").size();
            for (var z = 1; z <= total_remove; z++) {
                $('.mt-repeater-item:nth-child(' + parseInt(z) + ')').removeClass("processed");
            }
        }

        function AlertShow(msg, type = 'info') {
            return '<div class="alert alert-' + type + '">' + msg + '</div>';
        }

        function SaveDataPembayaran(form) {
            $('.result-save').addClass("hidden");
            $('.mt-repeater-hidden').removeClass("hidden");
            var actionForm = $(form).attr("action");
            var valueJSON = $(form).serializeJSON();
            valueJSON = valueJSON.data;

            var datPemb = [];
            var listdataerror = false;
            $('.result-save-detil').empty();
            $.each(valueJSON.items, function (index, item) {
                var index2 = (parseInt(index) + 1);
                if (!empty(item.nis)) {
                    var id_bayar = $('.mt-repeater-item:nth-child(' +index2+ ') .id_bayar').val();
                    var formbayar = $('.mt-repeater-item:nth-child(' +index2+ ') .formbayar').val();
                    if (id_bayar != formbayar) {
                        var total_index = $(".mt-repeater-item").size();
                        var stringify = !empty(item.value) ? jsonstringify(item.value) : "";
                        var jumlahbayar = item.jml_bayar;
                        jumlahbayar = jumlahbayar.replace(/\./g, "", jumlahbayar);
                        tanggal_bayar = $("#datetimepicker6").val()
                        tanggal_bayar = moment(tanggal_bayar, "DD MMM YYYY").format("YYYY-MM-DD");
                        datPemb[index] = {
                            "nis": item.nis,
                            "id_tagihan": item.id_tagihan,
                            "jml_bayar": jumlahbayar,
                            "uraian": $(".uraian").val(),
                            "cara_bayar": $(".metode-bayar").val(),
                            "no_pembayaran": $(".no_pembayaran").val(),
                            "tgl_bayar": tanggal_bayar,
                            "index": index2
                        }
                    }
                }
            });

            if(!empty(datPemb)) {
                datPemb = {act: "insertdatarepeat", req: datPemb};
                InsertRepeaterNoToaster("id_tagihan", datPemb, actionForm, function (resp) {
                    $.each(resp.DataRepeat, function(index, item) {
                        if (item.IsError == false) {
                            var id = $(".mt-repeater-item:nth-child(" + item.index + ") .formbayar").val();
                            $(".mt-repeater-item:nth-child(" + item.index + ") .id_bayar").val(id);
                            $(".mt-repeater-item:nth-child(" + item.index + ") .formbayar").attr('disabled', "");
                            $(".mt-repeater-item:nth-child(" + item.index + ") .checkbox-bayar").attr('disabled', "");
                            $(".mt-repeater-item:nth-child(" + item.index + ") .formbayar").addClass("disableddata");
                            $(".mt-repeater-item:nth-child(" + item.index + ") .checkbox-bayar").addClass("disableddata");
                            $('.mt-repeater-item:nth-child(' + item.index + ') .checkbox-bayar').prop("checked", false);
                            $('.mt-repeater-item:nth-child(' + item.index + ')').removeClass("opacity-error opacity-success processed");
                            $('.mt-repeater-item:nth-child(' + item.index + ')').addClass("opacity-success processed");
                        } else {
                            listdataerror = true;
                            $('.mt-repeater-item:nth-child(' + item.index + ')').removeClass("opacity-success opacity-update processed");
                            $('.mt-repeater-item:nth-child(' + item.index + ')').addClass("opacity-error processed");
                        }
                    });
                    
                    SetInsertPembayaran();
                });
            }
        }

        function SetInsertPembayaran(listdataerror) {
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
            if (listdataerror == true) {
                $('.result-save-detil, .result').removeClass("hidden");
            } else {
                $('.result-save-detil, .result').addClass("hidden");
            }
            $(".result-save").html(alert);
            $('.scroll-to-top').click();

            window.open(base_url + "pembayaran/cetak.html?id=" + $(".no_pembayaran").val(), "", "width=800,height=400");
            editrow = 0;
        }
        </script>
    </body>
</html>
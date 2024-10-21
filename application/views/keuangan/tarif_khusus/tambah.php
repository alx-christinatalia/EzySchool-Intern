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
        <title>Set Tarif Khusus | <?php echo $this->config->item("app_title"); ?></title>
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

        <style type="text/css">
            .opacity-edited {
                background-color: #FFE082;
            }
            .opacity-success{
                background-color: #ceede7;   
            }
            .opacity-update{
                background-color: #bad5ec;
            }
            .opacity-error{
                background-color: #fad9d9;
            }
            .btn_tarif {
                margin-top: 23px;
                position: absolute;
                left: -5px;
            }
            .mt-repeater-item, .mt-repeater-item td {
                padding-bottom: 0px !important;
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
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="page-title">
                                    <h1><i class="fa fa-money"></i> Set Tarif Khusus</h1>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                                <div class="form-inline">
                                    <div class="form-group text-center">
                                        <a role="button" class="btn btn-primary save-nilai ladda-button ladda-button-submit" data-style="slide-up">
                                            <i class="fa fa-save"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" onclick="location.reload();">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb">
                        <li>
                            <span class="active text-default">Keuangan</span>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active text-default">
                                <a href="<?php echo base_url("tarif_khusus.html")?>">Tarif Khusus</a>
                            </span>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active text-default">
                                <a href="#" onclick="location.reload();">Set Tarif Khusus</a>
                            </span>
                        </li>
                    </ul>
                    <div class="base-content">
                        <div class="row">
                            <div style="margin-bottom: -10px;" class="filter in col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-body">
                                        <!-- FrmFilter -->
                                        <!-- <form action="nilai/ajax-nilai.html" role="form" id="FrmAddNilai"> -->
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Kelas</label>
                                                        <select style="width:100%;" class="form-control select2-normal dropdown-kelas kelas" required>
                                                            <option value="">Pilih Kelas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Kategori</label>
                                                        <select class="select2-nosearch dropdown-kattagihan kategori" name="form[id_kategori]" required style="width: 100%;">
                                                            <option value="">Pilih Kategori</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Nama Tarif</label>
                                                        <input type="text" class="form-control nama_tarif" placeholder="Klik tombol di sebelah Kanan" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>&nbsp;</label>
                                                        <a role="button" class="btn btn-primary btn_tarif disabled" style="margin-top: 23px;" data-toggle="modal" data-target="#pilihtarif">
                                                            <i class="fa fa-list-ul"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 notif text-center">
                                                    <input type="hidden" name="form[id_tarif]" class="id_tarif">
                                                    <div class="custom-alerts alert alert-warning fade in col-md-12">Silahkan Pilih Kelas, Kategori dan Nama Tarif Terlebih Dahulu.</div>
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
                                            <form class="form-horizontal" action="keuangan/ajax-tarif-khusus.html" role="form" id="FrmAddNilai">
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
                                                                <th style="width: 200px;">Nama</th>
                                                                <th style="width: 150px;">Nominal Tarif</th>
                                                                <th style="width: 200px;">Keterangan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody data-repeater-list="data[items]" id="mt-repeater-tbody">
                                                                <tr data-repeater-item class="mt-repeater-item">
                                                                    <td style="vertical-align: middle;">
                                                                        <div class="mt-repeater-input">
                                                                            <label class="nis"></label>
                                                                            <input type="hidden" class="id_tarifkhusus" name="form[id]">
                                                                        </div>
                                                                    </td>
                                                                    <td style="vertical-align: middle;">
                                                                        <div class="mt-repeater-input">
                                                                            <a role="button" class="nama" target="_blank"></a>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mt-repeater-input">
                                                                            <input type="text" class="form-control nom formnominal" name="form[tarif]" placeholder="Nominal Tarif" onkeypress='return validate(event)' value="0" autofocus>
                                                                            <input type="hidden" class="formnominallast">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mt-repeater-input">
                                                                            <input type="text" class="form-control formketerangan" name="form[ket]" style="width:100%;" placeholder="Keterangan">
                                                                            <input type="hidden" class="formketeranganlast">
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
                                                <a role="button" class="btn btn-primary ladda-button ladda-button-submit save-nilai" data-style="slide-up"><i class="fa fa-floppy-o"></i> Simpan</a>
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
            </div>
             
            <?php $this->load->view("other/footer") ?>
        </div>

        <?php $this->load->view("keuangan/tarif_khusus/modal/pilihtarif"); ?>

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
        <script src="<?php echo base_url("assets/plugins/jquery-repeater/jquery.repeater.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/serializeJSON/jquery.serializejson.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/scripts/form-repeater.js"); ?>"></script>
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 

        <script>
            var total_index;
            var editrow;
            pagename = "keuangan/ajax-tarif-khusus.html";
            $(document).ready(function() {
                $(".mt-repeater-delete").click();
                $(".btnTambah").click();
                getdatadropdownkattagihan();
                getdatadropdownkelas();

                if("<?php echo $user->foto; ?>" == "default.png"){
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }
            });

            function validate(evt) {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                return !(charCode > 31 && (charCode < 48 || charCode > 57));
            }

            $(".nom").blur(function() {
                var index = $(this).parents(".mt-repeater-item").index();
                index = index + 1;
                if($(this).val() != 0){
                    var selection = window.getSelection().toString();
                    if ( selection !== '' ) {
                        return;
                    }
                    if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                        return;
                    }
                    var $this = $(this);
                    var input = $this.val();
                    var input = input.replace(/[\D\s\._\-]+/g, "");
                        input = input ? parseInt( input, 10 ) : 0;

                    $this.val( function() {
                        return (input === 0) ? "" : input.toLocaleString("id");
                    });
                }
                if($(this).val() == "" || $(this).val() <= 0 ){
                    $(this).val(0);
                }
                if($(".mt-repeater-item:nth-child("+index+") .nom").val() != 0){
                    //kosong
                } else {
                    $(".mt-repeater-item:nth-child("+index+") .nomnom").val(0);
                }
            });
            $(".nom").keyup(function() {
                var index = $(this).parents(".mt-repeater-item").index();
                index = index + 1;
                if($(".mt-repeater-item:nth-child("+index+") .nom").val() != 0){
                    var value = $(this).val().replace(/\./g, "");
                    $(this).val(value);
                    $(".mt-repeater-item:nth-child("+index+") .nomnom").val($(".mt-repeater-item:nth-child("+index+") .min").val() + value);
                } else {
                    $(".mt-repeater-item:nth-child("+index+") .nomnom").val(0);
                }
            });
            $(".nom").focus(function() {
                var index = $(this).parents(".mt-repeater-item").index();
                index = index + 1;
                if($(".mt-repeater-item:nth-child("+index+") .nom").val() != 0){
                    var value = $(this).val().replace(/\./g, "");
                    $(this).val(value);
                    $(".mt-repeater-item:nth-child("+index+") .nomnom").val($(".mt-repeater-item:nth-child("+index+") .min").val() + value);
                } else {
                    $(".mt-repeater-item:nth-child("+index+") .nomnom").val(0);
                }
            });

            $(".kelas, .kategori").change(function() {
                var kategori = $(".kategori").val(), kelas = $(".kelas").val();
                if(!empty(kategori) && !empty(kelas)) {
                    $(".btn_tarif").removeClass("disabled");
                } else {
                    $(".btn_tarif").addClass("disabled");
                }

                $(".loading-hidden, .table-input").addClass("hidden");
                $('.result-save, .result-save-detil').addClass("hidden");
                $(".notif").removeClass("hidden");
                $(".nama_tarif, .id_tarif").val("");
            });

            function cek_keterangan(index2, nominal) {
                if(nominal > 0){
                    $(".mt-repeater-item:nth-child(" + (index2) + ") .formketerangan").removeAttr("disabled");
                } else {
                    $(".mt-repeater-item:nth-child(" + (index2) + ") .formketerangan").attr('disabled', "true");
                }
            }

            $(".btnTambah").click(function() {
                var index = $(".nama").parents(".mt-repeater-item").index();
                index = index + 2;
                setTimeout(function(){
                    $(".mt-repeater-item:last-child() .rad1").prop("checked", true);
                }, 10);
                $(".mt-repeater-item:last-child() .dropdown-siswa").select2();
            });

            function CheckChangeData() {
                var nominal1, nominal2, id_tarifkhusus, katerangan1, katerangan2;
                editrow = 0;
                total_formnominal = $(".mt-repeater-item").size();
                for (i = 1; i <= total_formnominal; i++) {
                    id_tarifkhusus = $('.mt-repeater-item:nth-child('+i+') .id_tarifkhusus').val();
                    nominal1 = $('.mt-repeater-item:nth-child('+i+') .formnominal').val();
                    nominal1 = nominal1.replace (/\./g, "");
                    nominal2 = $('.mt-repeater-item:nth-child('+i+') .formnominallast').val();

                    katerangan1 = $('.mt-repeater-item:nth-child('+i+') .formketerangan').val();
                    katerangan2 = $('.mt-repeater-item:nth-child('+i+') .formketeranganlast').val();

                    keterangan = $(".mt-repeater-item:nth-child("+i+") .keterangan").val();
                    if(nominal1 != nominal2 || katerangan1 != katerangan2){
                        editrow = editrow+1;                      
                    }
                }
                editrow = editrow;
            }

            $(".save-nilai").click(function() {
                $("#FrmAddNilai").submit();
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

            var last_kelas, last_kategori;
            $(".btn_tarif").on('click', function () {
               var kelas  = $(".kelas").val(), kategori = $(".kategori").val();

                if(last_kelas != kelas || last_kategori != kategori) {
                    last_kelas = kelas;
                    last_kategori = kategori;

                    pagename = "keuangan/ajax-tarif-khusus.html";
                    request["Page"] = 1;
                    request["filter"]["kategori"] = kategori;
                    SetGetData(request, "listdatahtmlpilihtarif", "", ".list-group-tarif");
                }                 
            });

            $(".list-group-tarif").on("click", ".nama-tarif", function() {
                var id_tarif = $(this).attr("data-id_tarif");
                var namatarif = $(this).text();

                $(".nama_tarif").val(namatarif);
                $(".id_tarif").val(id_tarif);
                $('#pilihtarif').modal('hide');

                $('.mt-repeater-item').removeClass("opacity-success opacity-update opacity-success opacity-edited processed");
                GetDataSiswaTarif();
            });

            function GetDataSiswaTarif() {
                var kelas = $(".kelas").val(), id_tarif = $(".id_tarif").val(), kategori = $(".kategori").val();
                if(empty(kelas) || empty(id_tarif) || empty(kategori)) {
                    return;
                }

                $(".loading-hidden, .table-input").removeClass("hidden");
                $(".table-container, .notif").addClass("hidden");
                $('.result-save, .result-save-detil').addClass("hidden");

                $.ajax({
                    type: "POST",
                    url: base_url + "/ajax/keuangan/ajax-tarif-khusus.html",
                    data: {act:"getdatabyclass", req: {
                        "id_kategori": kategori,
                        "kelas": kelas,
                        "tarif": id_tarif
                    }},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function(resp){
                        var ind = 0;
                        var ifempty = "true";
                        if(resp.IsError == false) {
                            $("#FrmAddNilai").find(".mt-repeater-item:not(:first)").remove();
                            $('.mt-repeater-item:first-child').attr('id', "data-1");

                            if(empty(resp.Data)) {
                                toastrshow("warning", "Kelas ini tidak mempunyai siswa", "Warning");
                                $(".loading-hidden, .table-container").addClass("hidden");
                                $(".dataempty").removeClass("hidden");
                                return;
                            }

                            $.each(resp.Data, function(index, item) {
                                $(".mt-repeater-item:nth-child(" + (index+1) + ") .nis").html(item.nis);
                                $(".mt-repeater-item:nth-child(" + (index+1) + ") .nama").html(item.nama).attr("href", base_url + "/siswa/detail.html?nis="+item.nis);
                                $(".mt-repeater-item:nth-child(" + (index+1) + ") .formketerangan").val(item.ket);
                                $(".mt-repeater-item:nth-child(" + (index+1) + ") .formketeranganlast").val(item.ket);
                                $(".mt-repeater-item:nth-child(" + (index+1) + ") .formnominal").val(FormatAngka(item.tarif));
                                $(".mt-repeater-item:nth-child(" + (index+1) + ") .formnominallast").val(item.tarif);
                                $(".mt-repeater-item:nth-child(" + (index+1) + ") .id_tarifkhusus").val(item.id);

                                if(!empty(item.id)) {
                                    $(".mt-repeater-item:nth-child(" + (index+1) + ")").addClass("opacity-edited");
                                }

                                if(index != resp.Data.length - 1) {
                                    $(".btnTambah").click();
                                    $('.mt-repeater-item:last-child').attr('id', "data-"+(index+2));
                                }
                                $(".table-container").removeClass("hidden");
                                $(".loading-hidden, .dataempty").addClass("hidden");
                            });
                        }
                    }
                });
            }

            var FrmSaveWebsite = $("#FrmAddNilai").validate({
                submitHandler: function(form) {
                    CheckChangeData();
                    if(editrow!=0) {
                        $('.result-save').addClass("hidden");
                        $('.mt-repeater-hidden').removeClass("hidden");
                        var actionForm = $(form).attr("action");
                        var valueJSON  = $(form).serializeJSON();
                            valueJSON  = valueJSON.data;
                            
                        var datSis = {};    
                        var listdataerror = false;

                        $('.result-save-detil').empty();
                        $.each(valueJSON.items, function(index, item) {
                            var total_index = $(".mt-repeater-item").size();
                            var nis       = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .nis').text();
                            var id_tarif  = $('.id_tarif').val();  
                            var id_tarifkhusus  = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .id_tarifkhusus').val();  
                            var kategori = $(".kategori").val();
                            var nominal1 = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .formnominal').val();
                                nominal1 = nominal1.replace (/\./g, "");
                            var nominal2 = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .formnominallast').val();
                            var katerangan1 = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .formketerangan').val();
                            var katerangan2 = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .formketeranganlast').val();

                            if(!empty(nis)) {
                                if(nominal1 != nominal2 || katerangan1 != katerangan2) {
                                    if(!empty(id_tarifkhusus)) {
                                        var edit = true;
                                    } else {
                                        var edit = false;
                                    }
                                } else {
                                    $('.mt-repeater-hidden').addClass("hidden");
                                    return;
                                }

                                //insert
                                if(empty(id_tarifkhusus) && edit == false){
                                    if(nominal1 != 0) {
                                        datSis = {act: "insertdatarepeat", req: {
                                            "nis": nis,
                                            "tarif": nominal1,
                                            "ket": item.ket,
                                            "id_kategori": kategori,
                                            "id_tarif": id_tarif
                                        }};
                                    }
                                } else if(!empty(id_tarifkhusus) && edit == true) {
                                    if(nominal1 != 0) {
                                        datSis = {act: "updatedatarepeat", req: {
                                            "id_tarifkhusus": id_tarifkhusus,
                                            "nis": nis,
                                            "tarif": nominal1,
                                            "ket": item.ket,
                                            "id_kategori": kategori,
                                            "id_tarif": id_tarif
                                        }};
                                    }
                                }

                                InsertRepeaterNoToaster(datSis, actionForm,  function(resp) {
                                    if(resp.IsError == false) {
                                        if(edit == true) {
                                            $(".mt-repeater-item:nth-child("+(parseInt(index)+1)+") .formketerangan").val(item.ket);
                                            $(".mt-repeater-item:nth-child("+(parseInt(index)+1)+") .formketeranganlast").val(item.ket);
                                            $(".mt-repeater-item:nth-child("+(parseInt(index)+1)+") .formnominal").val(FormatAngka(nominal1));
                                            $(".mt-repeater-item:nth-child("+(parseInt(index)+1)+ ") .formnominallast").val(nominal1);
                                            $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').removeClass("opacity-error opacity-update opacity-success processed");
                                            $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').addClass("opacity-update processed");
                                        } else {
                                            var id = resp.Output;
                                            $(".mt-repeater-item:nth-child("+(parseInt(index)+1)+") .id_tarifkhusus").val(id);
                                            $(".mt-repeater-item:nth-child("+(parseInt(index)+1)+") .formketerangan").val(item.ket);
                                            $(".mt-repeater-item:nth-child("+(parseInt(index)+1)+") .formketeranganlast").val(item.ket);
                                            $(".mt-repeater-item:nth-child("+(parseInt(index)+1)+") .formnominal").val(FormatAngka(nominal1));
                                            $(".mt-repeater-item:nth-child("+(parseInt(index)+1)+") .formnominallast").val(nominal1);
                                            $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').removeClass("opacity-error opacity-success opacity-update processed");
                                            $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').addClass("opacity-success processed");
                                        }
                                    } else {
                                        listdataerror = true;
                                        $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').removeClass("opacity-success opacity-update opacity-success processed");
                                        $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').addClass("opacity-error processed");
                                    }

                                    scroll = parseInt(index)+1;
                                    scrollToCenter(scroll, total_index);
                                    var processed = $(".processed").size();
                                    console.log("insert : "+editrow+" == "+processed);
                                    if(editrow==processed){
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
                                            $('.result-save-detil').removeClass("hidden");
                                        } else {
                                            $('.result-save-detil').addClass("hidden");
                                        }
                                        $(".result-save").html(alert);
                                        $('.scroll-to-top').click();
                                        editrow = 0;
                                    }
                                });
                            } else {
                                toastrshow("warning", "Data yang dimasukkan Tidak Valid", "Warning");
                            }
                        });
                    } else {
                        toastrshow("warning", "Tidak ada data yang bisa disimpan", "Warning");
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
        </script>
        <script>
            $("#SetFrmTarif").submit(function() {
                var kywd = $(this).find(".kywd").val();
                request["filter"]["kywd"] = kywd;
                SetGetData(request, act, getfunc, ".list-group-tarif");
                return false;
            });

            $(".btn.tarifprev").click(function() {
                request["Page"] = datanext;
                SetGetData(request, act, getfunc, ".list-group-tarif");
            });

            $(".btn.tarifnext").click(function() {
                request["Page"] = dataprev;
                SetGetData(request, act, getfunc, ".list-group-tarif");
            });
        </script>
    </body>
</html>
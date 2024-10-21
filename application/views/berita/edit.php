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
        <title>Edit Berita | <?php echo $this->config->item("app_title"); ?></title>
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
        <link href="<?php echo base_url("assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/clockpicker/bootstrap-clockpicker.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/summernote/summernote.css"); ?>" rel="stylesheet">

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
            .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control{
                background-color: #ebeef3;
            }
            .mrg-btm15 {
                margin-bottom: 15px;
            }
            .textarea-isi {
                padding: 13px !important;
            }
            .textarea-isi .portlet-body {
                padding-top: 0px !important;
            }
            .textarea-isi .panel {
                margin-bottom: 0px;
            }
            .form-horizontal .form-group {
                margin-left: auto;
                margin-right: auto;
            }
            .checkbox, .form-horizontal .checkbox {
                padding-left: 20px;
            }
            .select2-selection--multiple .select2-search--inline .select2-search__field {
                width: auto !important;
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
                            <div class="col-sm-8 col-xs-12">
                                <div class="page-title">
                                    <h1><i class="fa fa-newspaper-o"></i> Edit Berita</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                    <li>
                                        <span class="active text-default">Berita</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Edit Berita</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class=" col-sm-4 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <a role="button" class="btn btn-primary save-beritabaru ladda-button ladda-button-submit" data-style="slide-up" title="Simpan">
                                            <i class="fa fa-save"></i>
                                        </a>
                                        <button type="button" onclick="backAway()" class="btn btn-primary" title="Batal"> <i class="fa fa-times"></i></button>
                                        <a role="button" class="btn btn-primary" onclick="location.reload();" title="Refresh">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <form method="POST" action="berita/ajax-berita.html" class="form-horizontal form-berita-baru">
                        <div class="portlet light bordered loading-tambahberita">
                            <center>
                                <img style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                            </center>
                        </div>
                        <div class="hidden tambahberita row">
                            <div class="col-md-8">
                                <div class="content-box">
                                    <div class="portlet light bordered section2" style="margin-bottom: 15px;">
                                        <div class="portlet-body" style="padding-top: 3px;">
                                            <div class="row solid white">
                                                <div style="margin:0px 10px 0px 10px; padding:0px 0px 0px 0px;" class="row">
                                                    <input type="text" class="form-control" placeholder="Judul Berita" name="form[subyek]" required autofocus>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="content-box">
                                    <div class="portlet light bordered section2 mrg-btm15 textarea-isi">
                                        <div class="portlet-body">
                                            <div class="row solid white">
                                                <div style="margin-left: 0px; margin-right: 0px; padding-left:15px; padding-right: 15px;" class="row">
                                                    <textarea required class="isi"></textarea>
                                                    <input class="isitext" type="hidden" name="form[isi]">

                                                    <!--perbaikan : penambahan input id_update-->
                                                    <input type="hidden" class="hidden-idupdate" name="form[id_update]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="portlet light bordered section2 mrg-btm15">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-user"></i>
                                            <span class="caption-subject bold"> Penerbit</span>
                                        </div>
                                        <div class="tools">
                                            <a role="button" class="collapse" data-original-title="Buka/Tutup" title="Buka/Tutup"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row solid white">
                                            <div style="margin-left: 0px; margin-right: 0px; padding-left:15px; padding-right: 15px;" class="row">
                                                <div>
                                                    <select name="form[id_pegawai]" required style="width:100%;" class="select2-nosearch select2-notambah dropdown-pegawai"></select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="portlet light bordered section2 mrg-btm15">
                                    <div class="portlet-title">
                                        <div class="caption col-xs-11">
                                            <i class="fa fa-calendar-check-o"></i>
                                            <span class="caption-subject bold">Waktu Post & Status</span>
                                        </div>
                                        <div class="tools col-xs-1 text-right">
                                            <a role="button" class="collapse" data-original-title="Buka/Tutup" title="Buka/Tutup"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row solid white">
                                            <div style="margin-left: 0px; margin-right: 0px; padding-left:15px; padding-right: 15px;" class="row">
                                                <div>
                                                    <div class='input-group date' style="margin-bottom: 10px">
                                                        <input id='datetimepicker6' disabled type='text' class="form-control tanggal tgl_eksekusi_edit date-set" placeholder="Tanggal Post" value=""/>
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-calendar"></span>
                                                        </span>
                                                    </div>
                                                    <div class="input-group" data-placement="left" data-align="top" data-autoclose="true">
                                                        <input disabled type="text" class="form-control tgl_eksekusi_edit date-set clockpicker" value="" placeholder="Waktu Post">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>
                                                    <input type="hidden" class="tgl_publish" name="form[tgl_publish]">
                                                    <br>
                                                </div>
                                                <div class="pull-right">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox1_211" class="md-check status-publish">
                                                        <label for="checkbox1_211">
                                                        <span class="inc"></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Diterbitkan ? </label>
                                                    </div>
                                                    <input class="checkstatus" type="hidden" name="form[is_published]" value="0"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="portlet light bordered section2 mrg-btm15">
                                    <div class="portlet-title">
                                        <div class="caption col-xs-11">
                                            <i class="fa fa-tag"></i>
                                            <span class="caption-subject bold"> Kategori Berita</span>
                                        </div>
                                        <div class="tools col-xs-1 text-right">
                                            <a role="button" class="collapse" data-original-title="Buka/Tutup" title="Buka/Tutup"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="solid white">
                                            <div style="margin-left: 0px; margin-right: 0px;">
                                                <div class="form-group">
                                                    <select id="select-kategori" style="width:100%;" class="select2-normal dropdown-kategori" multiple></select>                                                                
                                                </div>
                                                <div class="form-group">
                                                    <a role="button" data-toggle="modal" data-target="#modalAdd" class="btn btn-primary">
                                                        <i class="fa fa-plus"></i> Tambah Kategori
                                                    </a>
                                                    <input type="hidden" class="id_kategori" name="form[id_kategori]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="portlet light bordered section2 mrg-btm15">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-image"></i>
                                            <span class="caption-subject bold"> Gambar</span>
                                        </div>
                                        <div class="tools">
                                            <a role="button" class="collapse" data-original-title="Buka/Tutup" title="Buka/Tutup"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="solid white row">
                                            <div class="text-center gambar">
                                                <img src="" class="img-responsive img-thumbnail hidden img-preview" style="width: 200px;" onerror="this.src='<?php echo base_url("assets/img/default-news.jpg");?>'">
                                                <div class="fileinput fileinput-new col-xs-12" data-provides="fileinput">
                                                    <span class="btn btn-primary btn-file">
                                                        <span class="fileinput-new">
                                                            <i class="fa fa-image"></i> Pilih Gambar 
                                                        </span>
                                                        <span class="fileinput-exists">
                                                            Ubah Gambar
                                                        </span>
                                                        <input type="hidden" value="" name="..."><input type="file" name="" class="photo "> 
                                                    </span>
                                                    <span class="fileinput-filename"></span> &nbsp;
                                                    <a href="javascript:;" class="close fileinput-exists" data-dismiss="fileinput"> </a>
                                                </div>
                                                <input type="hidden" class="input-photo" name="form[foto]">
                                                <input type="hidden" class="old-photo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="portlet light bordered section2 mrg-btm15">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-link"></i>
                                            <span class="caption-subject bold"> Sumber</span>
                                        </div>
                                        <div class="tools">
                                            <a role="button" class="expand" data-original-title="Buka/Tutup" title="Buka/Tutup"> </a>
                                        </div>
                                    </div>
                                    <div class="portlet-body" style="display: none;">
                                        <div class=" solid white">
                                            <div style="margin-left: 0px; margin-right: 0px;">
                                                <div class="form-group">
                                                    <input style="width:100%;" class="form-control" name="form[source]" placeholder="Judul Sumber Berita" style="margin-bottom: 10px;"/>
                                                </div>
                                                <div class="form-group">
                                                    <input type="url" style="width:100%;" class="form-control" name="form[source_url]" placeholder="URL Sumber Berita" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php $this->load->view("other/footer") ?>
        </div>

        <?php $this->load->view("berita/modal/kategori_baru"); ?>

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
        <script src="<?php echo base_url("assets/plugins/select2/select2.full.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/summernote/summernote.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/summernote/lang/summernote-id-ID.min.js"); ?>"></script>

        <!-- Jquery Validate + Ladda Button -->
        <script src="<?php echo base_url("assets/plugins/validate/jquery.validate.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/ladda/spin.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.jquery.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/clockpicker/bootstrap-clockpicker.js"); ?>"></script>

        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 
        <!-- <script src="<?php //echo base_url("assets/tinymce/js/tinymce/tinymce.min.js") ?>"></script> -->
        <script src="<?php echo base_url("assets/scripts/components-date-time-pickers.min.js"); ?>"></script> 
        <!-- Bootstrap Datepicker -->
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"); ?>" charset="UTF-8"></script>
        <script type="text/javascript">
            pagename = "berita/ajax-berita.html";
            var id_update  = "<?php echo $this->input->get('id'); ?>";
            var with_photo =  false;

            $(document).ready(function () {
                $('#datetimepicker6').datepicker({
                    defaultDate: new Date(),
                    autoclose: true,
                    format: 'dd M yyyy',
                    todayHighlight: true,
                    maxViewMode: 2,
                    immediateUpdates: true,
                    language: "id"
                });
                $('.clockpicker').clockpicker({
                    autoclose: true,
                    'default': 'now'
                });
                
                if(!empty(id_update)) {
                    getdatadropdownkategori2("", 1);
                    $(".can-hidden").addClass("hidden");

                    documentready();
                } else {
                    $(".loading-tambahberita").html("<center><span class='label label-warning'>ID Berita tidak valid</span></center>");
                    $(".save-beritabaru").addClass("hidden");
                }

                if ("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }

                $("a.close.fileinput-exists").click(function() {
                    $(".gambar .img-preview").attr("src", "").addClass("hidden");
                    $(".gambar .fileinput").removeAttr("style");
                });

                $(".isi").summernote({
                    lang: "id-ID",
                    height: 530,
                });
            });

            function backAway() {
                if(history.length === 1){
                    window.location = "<?php echo base_url("beranda.html")?>";
                } else {
                    history.back();
                }
            }

            $(".photo").change(function () {
                var selector = $(this);
                if (!this.files || !this.files[0]) {
                    return;
                }
                var tipefile = this.files[0].type.toString();
                if(tipefile != "image/png" && tipefile != "image/jpeg" && tipefile != "image/bmp") {
                    $(this).val("");
                    toastrshow("warning", "Format salah, pilih file dengan format jpg/png/bmp", "Warning");
                    return;
                }
                if((this.files[0].size / 1024) > 2048){
                    $(this).val("");
                    toastrshow("warning", "Maximum file size is 2 MB", "Warning");
                    return;
                }

                var FR = new FileReader();
                FR.addEventListener("load", function(readerEvent) {
                    var image = new Image();
                    image.onload = function(imageEvent) {
                        var canvas = document.createElement("canvas"),
                            max_size = 300,// TODO : pull max size from a site config
                            width = image.width,
                            height = image.height;
 
                        if (width > height) {
                            if (width > max_size) {
                                height *= max_size / width;
                                width = max_size;
                            }
                        } else {
                            if (height > max_size) {
                                width *= max_size / height;
                                height = max_size;
                            }
                        }
                        canvas.width = width;
                        canvas.height = height;
                        canvas.getContext("2d").drawImage(image, 0, 0, width, height);

                        var base64 = canvas.toDataURL("image/jpeg");
                        $(".gambar .img-preview").attr("src", base64).removeClass("hidden");
                        $(".gambar .fileinput").css("margin-top", "10px");

                        base64 = base64.replace(/^data:image\/(png|jpg|jpeg|bmp);base64,/, '');
                        $(".input-photo").val(base64);

                        with_photo = true;
                    };
                    image.src = readerEvent.target.result;
                }); 
                FR.readAsDataURL(this.files[0]);     
            });

            var FrmSaveWebsite = $(".form-berita-baru").validate({
                submitHandler: function (form) {
                    $(".loading-tambahberita").removeClass("hidden");
                    $(".tambahberita").addClass("hidden");
                    var base64 = $(".input-photo").val(), old_path = $(".old-photo").val();

                    if (base64 != "" && with_photo) {
                        var ajaxtarget = "berita/ajax-berita.html";
                        uploadfoto(ajaxtarget, base64, function (resp) {
                            // perbaikan: ganti method insert dengan update
                            UpdateDataAjax(form, function (resp) {});
                        }, "uploadfoto", old_path);
                    } else {
                        // perbaikan: ganti method insert dengan update
                        UpdateDataAjax(form, function (resp) {});
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

            $(".status-publish").change(function () {
                if ($(".status-publish").is(':checked')) {
                    $(".checkstatus").val("1");
                    $(".tgl_eksekusi_edit, .date-set").removeAttr('disabled');
                    $(".tgl_eksekusi_edit, .date-set").attr('readonly', "");
                    $(".form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control").attr('style', "background-color: #ffffff");
                    // perbaikan : penambahan if
                    if ($("#datetimepicker6").val().length == 0) {
                        $("#datetimepicker6").val("<?php date_default_timezone_set('Asia/Jakarta'); echo date("d M Y"); ?>");
                        $(".clockpicker").val("<?php date_default_timezone_set('Asia/Jakarta');  echo date("H:i"); ?>");
                    }
                    var tanggal = $("#datetimepicker6").val();
                    tanggal = tanggal.replace(/Jan/g, "01", tanggal);
                    tanggal = tanggal.replace(/Feb/g, "02", tanggal);
                    tanggal = tanggal.replace(/Mar/g, "03", tanggal);
                    tanggal = tanggal.replace(/Apr/g, "04", tanggal);
                    tanggal = tanggal.replace(/Mei/g, "05", tanggal);
                    tanggal = tanggal.replace(/Jun/g, "06", tanggal);
                    tanggal = tanggal.replace(/Jul/g, "07", tanggal);
                    tanggal = tanggal.replace(/Ags/g, "08", tanggal);
                    tanggal = tanggal.replace(/Sep/g, "09", tanggal);
                    tanggal = tanggal.replace(/Okt/g, "10", tanggal);
                    tanggal = tanggal.replace(/Nov/g, "11", tanggal);
                    tanggal = tanggal.replace(/Des/g, "12", tanggal);
                    var tgl = tanggal.substr(0, 2);
                    var bln = tanggal.substr(3, 2);
                    var thn = tanggal.substr(6, 4);
                    var waktu = $(".clockpicker").val() + ":00";
                    tanggal = thn + "-" + bln + "-" + tgl + " " + waktu;
                    $(".tgl_publish").val(tanggal);
                } else {
                    $(".checkstatus").val("0");
                    $(".tgl_eksekusi_edit, .date-set").removeAttr('readonly');
                    $(".tgl_eksekusi_edit, .date-set").attr('disabled', "");
                    $(".form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control").attr('style', "background-color: #ebeef3");
//                   perbaikan:  statement
                    $("#datetimepicker6").val($("#datetimepicker6").val().length !== 0 ? $("#datetimepicker6").val() : "");
                    $(".clockpicker").val($(".clockpicker").val().length !== 0 ? $(".clockpicker").val() : "");
                    $(".tgl_publish").val($(".tgl_publish").val().length !== 0 ? $(".tgl_publish").val() : "");
                }
            });

            $(".photo").change(function () {
                if ($(this).val() == "") {
                    $(".input-photo").val("");
                }
            });

            $("#datetimepicker6, .clockpicker").change(function () {
                var tanggal = $("#datetimepicker6").val();
                tanggal = tanggal.replace(/Jan/g, "01", tanggal);
                tanggal = tanggal.replace(/Feb/g, "02", tanggal);
                tanggal = tanggal.replace(/Mar/g, "03", tanggal);
                tanggal = tanggal.replace(/Apr/g, "04", tanggal);
                tanggal = tanggal.replace(/Mei/g, "05", tanggal);
                tanggal = tanggal.replace(/Jun/g, "06", tanggal);
                tanggal = tanggal.replace(/Jul/g, "07", tanggal);
                tanggal = tanggal.replace(/Ags/g, "08", tanggal);
                tanggal = tanggal.replace(/Sep/g, "09", tanggal);
                tanggal = tanggal.replace(/Okt/g, "10", tanggal);
                tanggal = tanggal.replace(/Nov/g, "11", tanggal);
                tanggal = tanggal.replace(/Des/g, "12", tanggal);
                var tgl = tanggal.substr(0, 2);
                var bln = tanggal.substr(3, 2);
                var thn = tanggal.substr(6, 4);
                var waktu = $(".clockpicker").val() + ":00";
                tanggal = thn + "-" + bln + "-" + tgl + " " + waktu;
                $(".tgl_publish").val(tanggal);
            });

            $(".save-beritabaru").click(function () {
                var valueisi = $(".isi").summernote("code");
                $(".isitext").val(valueisi);
                $(".form-berita-baru").submit();
            });

            $("#select-kategori").change(function () {
                var textToAppend = "";
                var selMulti = $("#select-kategori option:selected").each(function () {
                    textToAppend += (textToAppend == "") ? "" : ",";
                    textToAppend += $(this).val();
                });
                $(".id_kategori").val(textToAppend);
            });

            $("#modalAdd").on('shown.bs.modal', function () {
                $(".jns_kat").val(1);
                $(this).find(".nama_kategori").focus();
            });

            function documentready() {
                with_photo = false;

                var FrmSave = $(".form-berita-baru");
                $(".hidden-idupdate").val(id_update);

                $(".fileinput").fileinput("clear");
                getdatabyid(id_update, function (resp) {
                    if(resp.IsError == true) {
                        $(".loading-tambahberita").html("<center><span class='label label-warning'>"+ resp.ErrMessage +"</span></center>");
                        $(".save-beritabaru").addClass("hidden");
                        return;
                    }
                    if(empty(resp.Data)) {
                        $(".loading-tambahberita").html("<center><span class='label label-warning'>Tidak ada data berita</span></center>");
                        $(".save-beritabaru").addClass("hidden");
                        return;
                    }

                    var resp = resp.Data[0];
                    $(".page-title .title-edit").html("<i class='fa fa-bullhorn'></i> Edit Berita " + resp.subyek);
                    FrmSave.find("input[name='form[subyek]']").val(resp.subyek);
                    getdatadropdownpegawai(resp.id_pegawai);
                    // perbaikan:                    
                    FrmSave.find("input[name='form[is_published]']").val(resp.is_published);
                    if (resp.tgl_publish != "0000-00-00 00:00:00") {
                        tgl = moment(resp.tgl_publish, "YYYY-MM-DD HH:mm:ss").format('DD MMM YYYY');
                        jam = moment(resp.tgl_publish, "YYYY-MM-DD HH:mm:ss").format('HH:mm');
                        FrmSave.find(".tanggal").val(tgl);
                        FrmSave.find(".clockpicker").val(jam);
                        var tanggal = $("#datetimepicker6").val();
                        tanggal = tanggal.replace(/Jan/g, "01", tanggal);
                        tanggal = tanggal.replace(/Feb/g, "02", tanggal);
                        tanggal = tanggal.replace(/Mar/g, "03", tanggal);
                        tanggal = tanggal.replace(/Apr/g, "04", tanggal);
                        tanggal = tanggal.replace(/Mei/g, "05", tanggal);
                        tanggal = tanggal.replace(/Jun/g, "06", tanggal);
                        tanggal = tanggal.replace(/Jul/g, "07", tanggal);
                        tanggal = tanggal.replace(/Ags/g, "08", tanggal);
                        tanggal = tanggal.replace(/Sep/g, "09", tanggal);
                        tanggal = tanggal.replace(/Okt/g, "10", tanggal);
                        tanggal = tanggal.replace(/Nov/g, "11", tanggal);
                        tanggal = tanggal.replace(/Des/g, "12", tanggal);
                        var tgl = tanggal.substr(0,2);
                        var bln = tanggal.substr(3,2);
                        var thn = tanggal.substr(6,4);
                        var waktu = $(".clockpicker").val()+":00";
                        tanggal = thn+"-"+bln+"-"+tgl+" "+waktu;
                        $(".tgl_publish").val(tanggal);
                    } else {
                        FrmSave.find(".tanggal").val("");
                        FrmSave.find(".clockpicker").val("");
                    }
                    if (resp.is_published == 1) {
                        if ($(".status-publish").not(':checked')) {
                            $(".status-publish").attr("checked", true);
                        }
                        $(".checkstatus").val("1");
                        $(".tgl_eksekusi_edit, .date-set").removeAttr('disabled');
                        $(".tgl_eksekusi_edit, .date-set").attr('readonly', "");
                        $(".form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control").attr('style', "background-color: #ffffff");
                    }
                    
                    var kategori = resp.id_kategori;
                    kategori = kategori.split(",");
                    $(".dropdown-kategori").val(kategori).trigger("change");
                    $(".sumber-berita").val(resp.source);
                    $(".url-sumber").val(resp.source_url);
                    // perbaikan: replace char \r\n
                    var isi = resp.isi;
                    $(".isi").summernote("code", isi.replace(/(?:\\[rn])+/g, ""));

                    if(!empty(resp.foto)) {
                        var small = resp.foto.replace("original", "small");
                        $(".input-photo, .old-photo").val(resp.foto);
                        $(".gambar .img-preview").attr("src", ParseGambar(small)).removeClass("hidden");
                        $(".gambar .fileinput").css("margin-top", "10px");
                    }

                    $(".loading-tambahberita").addClass("hidden");
                    $(".tambahberita").removeClass("hidden");
                });
            }

            function documentnotready() {
                $(".loading-tambahberita").addClass("hidden");
                $(".tambahberita").removeClass("hidden");
            }

            var FrmSaveWebsite = $(".form-kategori-baru").validate({
                submitHandler: function (form) {
                    InsertData(form, function (resp) {
                        var id_kategori = resp.Output;
                        var nama_kategori = $(".nama_kategori").val();
                        var jns_kat = $(".jns_kat").val();
                        $(".dropdown-kategori").append("<option selected value='" + id_kategori + "'>" + nama_kategori + "</option>");
                        $(".nama_kategori").val("");
                        $(".jns_kat").val("");
                    });
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
    </body>
</html>
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
        <title>Edit Pengumuman | <?php echo $this->config->item("app_title"); ?></title>
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
        <link href="<?php echo base_url("assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css"); ?>" rel="stylesheet">
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
            .page-breadcrumb {
                padding-bottom: 0px; 
                margin-top: 5px;
                margin-bottom: 15px;
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
                            <div class="col-sm-8">
                                <div class="page-title">
                                    <h1 class="title-edit"><i class="fa fa-bullhorn"></i> Edit Pengumuman</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                    <li>
                                        <span class="active text-default">Pengumuman</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a onclick="location.reload();"> Edit Pengumuman</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <a role="button" class="btn btn-primary save-pengumumanbaru ladda-button ladda-button-submit" data-style="slide-up" title="Simpan">
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
                   
                    <form method="POST" action="pengumuman/ajax-pengumuman.html" class="form-horizontal form-pengumuman-edit">
                        <div class="portlet light bordered loading-tambahpengumuman">
                            <center>
                                <img style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                            </center>
                        </div>
                        <div class="hidden tambahpengumuman">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="content-box">
                                        <div class="portlet light bordered section2" style="margin-bottom: 15px; padding: 12px 15px 15px;">
                                            <div class="portlet-body" style="padding-top: 3px;">
                                                <input type="text" class="form-control" placeholder="Judul Pengumuman" name="form[subyek]" required autofocus>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-box">
                                        <div class="portlet light bordered section2 textarea-isi">
                                            <div class="portlet-body">
                                                <textarea class="pesan form-control" style="width: 100%;min-height: 300px;resize: vertical;" required></textarea>
                                                <input class="isipesan" type="hidden" name="form[pesan]">
                                                <input type="hidden" class="hidden-idupdate" name="form[id_update]">
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
                                            <select name="form[id_pegawai]" required style="width:100%;" class="select2-nosearch select2-notambah dropdown-pegawai"></select>
                                        </div>
                                    </div>

                                    <div class="portlet light bordered section2">
                                        <div class="portlet-title">
                                            <div class="caption col-xs-11">
                                                <i class="fa fa-calendar-check-o"></i>
                                                <span class="caption-subject bold"> Waktu Post & Status</span>
                                            </div>
                                            <div class="tools col-xs-1 text-right">
                                                <a role="button" class="collapse" data-original-title="Buka/Tutup" title="Buka/Tutup"> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row" style="padding-left:15px; padding-right: 15px;">
                                                <div>
                                                    <div class='input-group date' style="margin-bottom: 10px;">
                                                        <input id='datetimepicker6' disabled type='text' class="form-control tanggal tgl_eksekusi_edit date-set" placeholder="Tanggal Post" value="">
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
                                                    <input type="hidden" class="tgl_eksekusi" name="form[tgl_eksekusi]">
                                                </div>
                                                <div class="pull-right"  style="margin-top: 10px;">
                                                    <div class="md-checkbox">
                                                        <input type="checkbox" id="checkbox1_211" class="md-check status-publish">
                                                        <label for="checkbox1_211">
                                                        <span class="inc"></span>
                                                        <span class="check"></span>
                                                        <span class="box"></span> Diterbitkan ?</label>
                                                    </div>
                                                    <input class="checkstatus" type="hidden" name="form[is_published]" value="0"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="portlet light bordered section2 mrg-btm15">
                                        <div class="portlet-title">
                                            <div class="caption col-xs-11">
                                                <i class="fa fa-tag"></i>
                                                <span class="caption-subject bold"> Kategori Pengumuman</span>
                                            </div>
                                            <div class="tools col-xs-1 text-right">
                                                <a role="button" class="collapse" data-original-title="Buka/Tutup" title="Buka/Tutup"> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <select id="select-kategori" style="width:100%;" class="select2-normal dropdown-kategori view-kategori" multiple></select>

                                            <a role="button" data-toggle="modal" data-target="#modalAdd" class="btn btn-primary" style="margin-top: 10px;">
                                                <i class="fa fa-plus"></i> Tambah Kategori
                                            </a>
                                            <input type="hidden" class="id_kategori" name="form[id_kategori]">
                                        </div>
                                    </div>

                                    <div class="portlet light bordered section2">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-users"></i>
                                                <span class="caption-subject bold"> Penerima</span>
                                            </div>
                                            <div class="tools">
                                                <a role="button" class="collapse" data-original-title="Buka/Tutup" title="Buka/Tutup"> </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div>
                                                <select name="form[jns_penerima]" required style="width:100%;" class="jns_penerima select2-nosearch select2-notambah">
                                                    <option value="1"> Semua Siswa</option>
                                                    <option value="2"> Per Kelas</option>
                                                    <option value="3"> Per Siswa</option>
                                                </select>
                                            </div>
                                            <input type="hidden" value="" class="hidden tagsinput_penerima_hidden" name="form[penerima]">
                                            <div class="show-kelas collapse" style="margin-top: 10px;">
                                                <label class="bold">Kelas</label>
                                                <input type="text" value="" class="object_tagsinput tagsinput_kelas">

                                                <a href="#pilihkelas" role="button" data-toggle="modal" class="btn btn-primary" style="margin-top: 10px;">
                                                    <i class="fa fa-plus"></i> Tambah Kelas
                                                </a>
                                                <input type="hidden" value="" class="tagsinput_kelas_hidden">
                                            </div>
                                            <div class="show-siswa collapse" style="margin-top: 10px;">
                                                <label class="bold">Siswa</label>
                                                <input type="text" value="" class="object_tagsinput tagsinput_siswa">

                                                <a href="#pilihsiswa" role="button" data-toggle="modal" class="btn btn-primary" style="margin-top: 10px;">
                                                    <i class="fa fa-plus"></i> Tambah Siswa
                                                </a>
                                                <input type="hidden" hidden value="" class="tagsinput_siswa_hidden">
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
        <?php $this->load->view("pengumuman/modal/pilihkelas") ?>
        <?php $this->load->view("pengumuman/modal/pilihsiswa") ?>

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
        <script src="<?php echo base_url("assets/plugins/bootstrap-tagsinput/typeahead-tagsinput.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/clockpicker/bootstrap-clockpicker.js"); ?>"></script>
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/scripts/components-date-time-pickers.min.js"); ?>"></script>
        <!-- Bootstrap Datepicker -->
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker_indo.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"); ?>" charset="UTF-8"></script>

        <script type="text/javascript">
            pagename = "pengumuman/ajax-pengumuman.html";
            var id_update = "<?php echo $this->input->get('id'); ?>";
            $(document).ready(function() {
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
                $('.clockpicker').clockpicker({
                    autoclose: true,
                    'default': 'now'
                });
                $('.object_tagsinput').tagsinput({
                    itemValue: 'value',
                    itemText: 'text',
                    typeahead: {
                        source: function(query) {
                            return $.getJSON('cities.json');
                        }
                    }
                });
                
                if(!empty(id_update)) {
                    getdatadropdownkategori2("",2);
                    $(".can-hidden").addClass("hidden");

                    documentready();
                } else {
                    $(".loading-tambahpengumuman").html("<center><span class='label label-warning'>ID Berita tidak valid</span></center>");
                    $(".save-pengumumanbaru").addClass("hidden");
                }

                if("<?php echo $user->foto; ?>" == "default.png"){
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }

                $(".pesan").summernote({
                    lang: "id-ID",
                    height: 400,
                    toolbar: [
                        ["view", ["codeview"]],
                        ["help", ["help"]]
                    ]
                });
            });

            function backAway() {
                if(history.length === 1){
                    window.location = "<?php echo base_url("beranda.html")?>";
                } else {
                    history.back();
                }
            }

            var FrmSaveWebsite = $(".form-pengumuman-edit").validate({
                submitHandler: function(form) {
                    $(".loading-tambahpengumuman").removeClass("hidden");
                    $(".tambahpengumuman").addClass("hidden");
                    UpdateDataAjax(form, function(resp) {});  
                },
                errorPlacement: function (error, element) {
                    if (element.parent(".input-group").length) { 
                        error.insertAfter(element.parent());      // radio/checkbox?
                    } else if (element.hasClass("select2-normal") || element.hasClass("select2-nosearch")) {     
                        error.insertAfter(element.next("span"));  // select2
                    } else {                                      
                        error.insertAfter(element);               // default
                    }
                    $(".loading-tambahpengumuman").addClass("hidden");
                    $(".tambahpengumuman").removeClass("hidden");
                }
            });

            $("#pilihkelas").on('show.bs.modal', function () {
                pagename = "master-data/ajax-kelas.html";
                request["Page"] = 1;
                SetGetData(request, "listdatahtmlnamakelas", "", ".list-group-kelas");
                setTimeout(function(){
                    $("#SetFrmKelas .input-search .form-control.kywd").focus();
                }, 1100);
            });

            $("#pilihsiswa").on('show.bs.modal', function () {
                pagename = "master-data/ajax-siswa.html";
                request["Page"] = 1;
                SetGetData(request, "listdatahtmlnamasiswa", "", ".list-group-siswa");
                setTimeout(function(){
                    $(".col-md-7 .input-search .form-control.kywd").focus();
                }, 1100);
            });

            $(".list-group-kelas").on("click", ".nama-kelas", function() {
                var id_kelas = $(this).attr('id');
                id_kelas = id_kelas.replace (/kelas/g, "", id_kelas);
                var nama_kelas = $(this).text();
                $('.tagsinput_kelas').tagsinput('add', { "value": id_kelas , "text": nama_kelas  });
                $('#pilihkelas').modal('hide');
            });

            $(".list-group-siswa").on("click", ".nama-siswa", function() {
                var id_siswa = $(this).attr('id');
                id_siswa = id_siswa.replace (/nis/g, "", id_siswa);
                var namasiswa = $(this).text();
                namasiswa = namasiswa.replace (id_siswa+" - ", "", namasiswa);
                $('.tagsinput_siswa').tagsinput('add', { "value": id_siswa , "text": namasiswa  });
                $('#pilihsiswa').modal('hide');
            });

            $(".jns_penerima").change(function(){
                if($(this).val()==1){
                    $(".show-kelas").collapse("hide");
                    $(".show-siswa").collapse("hide");
                    $(".tagsinput_kelas_hidden, .tagsinput_siswa_hidden").attr('name', "");
                    $(".tagsinput_penerima_hidden").attr('name', "form[penerima]");
                }
                if($(this).val()==2){
                    $(".show-kelas").collapse("show");
                    $(".show-siswa").collapse("hide");
                    $(".tagsinput_penerima_hidden, .tagsinput_siswa_hidden").attr('name', "");
                    $(".tagsinput_kelas_hidden").attr('name', "form[penerima]");
                }
                if($(this).val()==3){
                    $(".show-kelas").collapse("hide");
                    $(".show-siswa").collapse("show");
                    $(".tagsinput_penerima_hidden, .tagsinput_kelas_hidden").attr('name', "");
                    $(".tagsinput_siswa_hidden").attr('name', "form[penerima]");
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
                        $("#datetimepicker6").val("<?php date_default_timezone_set('Asia/Jakarta'); echo date_indo("d M Y"); ?>");
                        $(".clockpicker").val("<?php date_default_timezone_set('Asia/Jakarta');  echo date_indo("H:i"); ?>");
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
                    $(".tgl_eksekusi").val(tanggal);
                } else {
                    $(".checkstatus").val("0");
                    $(".tgl_eksekusi_edit, .date-set").removeAttr('readonly');
                    $(".tgl_eksekusi_edit, .date-set").attr('disabled', "");
                    $(".form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control").attr('style', "background-color: #ebeef3");
//                   perbaikan:  statement
                    $("#datetimepicker6").val($("#datetimepicker6").val().length !== 0 ? $("#datetimepicker6").val() : "");
                    $(".clockpicker").val($(".clockpicker").val().length !== 0 ? $(".clockpicker").val() : "");
                    $(".tgl_eksekusi").val($(".tgl_eksekusi").val().length !== 0 ? $(".tgl_eksekusi").val() : "");
                }
            });

            $("#select-kategori").change(function() {
                var textToAppend = "";
                var selMulti = $("#select-kategori option:selected").each(function(){
                    textToAppend += (textToAppend == "") ? "" : ",";
                    textToAppend += $(this).val();           
                });
                $(".id_kategori").val(textToAppend);
            });

            $(".tagsinput_kelas").change(function() {
                var textToAppend = "";
                var selMulti = $(this).each(function(){
                    textToAppend += (textToAppend == "") ? "" : ",";
                    textToAppend += $(this).val();           
                });
                $(".tagsinput_kelas_hidden").val(textToAppend);
            });

            $(".tagsinput_siswa").change(function() {
                var textToAppend = "";
                var selMulti = $(this).each(function(){
                    textToAppend += (textToAppend == "") ? "" : ",";
                    textToAppend += $(this).val();           
                });
                $(".tagsinput_siswa_hidden").val(textToAppend);
            });

            $("#datetimepicker6, .clockpicker").change(function() {
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
                $(".tgl_eksekusi").val(tanggal);
            });

            $(".save-pengumumanbaru").click(function() {
                var valueisi = $(".pesan").summernote("code");
                $(".isipesan").val(valueisi);
                $(".form-pengumuman-edit").submit();
            });

            function documentready(){
                var FrmSave = $(".form-pengumuman-edit");
                $(".hidden-idupdate").val(id_update);
                getdatabyid(id_update, function(resp) {
                    if(resp.IsError == true) {
                        $(".loading-tambahpengumuman").html("<center><span class='label label-warning'>"+ resp.ErrMessage +"</span></center>");
                        $(".save-pengumumanbaru").addClass("hidden");
                        return;
                    }
                    if(empty(resp.Data)) {
                        $(".loading-tambahpengumuman").html("<center><span class='label label-warning'>Tidak ada data pengumuman</span></center>");
                        $(".save-pengumumanbaru").addClass("hidden");
                        return;
                    }

                    var resp = resp.Data[0];

                    FrmSave.find("input[name='form[subyek]']").val(resp.subyek);
                    getdatadropdownpegawai(resp.id_pegawai);
                   // perbaikan:                    
                    FrmSave.find("input[name='form[is_published]']").val(resp.is_published);
                    if (resp.tgl_eksekusi != "0000-00-00 00:00:00") {
                        tgl = moment(resp.tgl_eksekusi, "YYYY-MM-DD HH:mm:ss").format('DD MMM YYYY');
                        jam = moment(resp.tgl_eksekusi, "YYYY-MM-DD HH:mm:ss").format('HH:mm');
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
                        $(".tgl_eksekusi").val(tanggal);
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
                    $(".view-kategori").val(kategori).trigger("change");

                    var jns_penerima = resp.jns_penerima;
                        var penerima = resp.penerima;
                        if(jns_penerima == 1){
                            FrmSave.find("select[name='form[jns_penerima]']").val(jns_penerima).trigger("change");
                        }
                        if(jns_penerima == 2){
                            FrmSave.find("select[name='form[jns_penerima]']").val(jns_penerima).trigger("change");
                            FrmSave.find("input[name='form[penerima]']").val(penerima);

                            if(!empty(resp.penerima_nama)) {
                                var id = "";
                                $.each(resp.penerima_nama, function(index, item) {
                                    id = item.id;
                                    $(".tagsinput_kelas").tagsinput("add", {"value": id, "text": item.nama});
                                });
                            }
                        }
                        if(jns_penerima == 3){
                            FrmSave.find("select[name='form[jns_penerima]']").val(jns_penerima).trigger("change");
                            FrmSave.find("input[name='form[penerima]']").val(penerima);

                            if(!empty(resp.penerima_nama)) {
                                var id = "";
                                $.each(resp.penerima_nama, function(index, item) {
                                     id = item.nis;
                                    $(".tagsinput_siswa").tagsinput("add", {"value": id, "text": item.nama});
                                });
                            }
                        }
                    $(".pesan").summernote("code", resp.pesan);

                    $(".loading-tambahpengumuman").addClass("hidden");
                    $(".tambahpengumuman").removeClass("hidden");
                });
            }

            function documentnotready(){
                $(".loading-tambahpengumuman").addClass("hidden");
                $(".tambahpengumuman").removeClass("hidden");
            }

            var FrmSaveWebsite = $(".form-kategori-baru").validate({
                submitHandler: function(form) {
                    InsertData(form, function(resp) {
                        var id_kategori = resp.Output;
                        var nama_kategori = $(".nama_kategori").val();
                        $(".dropdown-kategori").append("<option selected value='"+id_kategori+"'>"+nama_kategori+"</option>");
                        $(".nama_kategori").val("");
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

            $("#modalAdd").on('shown.bs.modal', function () {
                $(".jns_kat").val(2);
                $(this).find(".nama_kategori").focus();
            });

            $("#SetFrmKelas").submit(function() {
                var kywd = $(this).find(".kywd").val();
                request["filter"]["kywd"] = kywd;
                SetGetData(request, act, getfunc, ".list-group-kelas");
                return false;
            });

            $("#SetFrmSiswa").submit(function() {
                var kywd = $(this).find(".kywd").val();
                request["filter"]["kywd"] = kywd;
                SetGetData(request, act, getfunc, ".list-group-siswa");
                return false;
            });

            $(".btn.kelasnext").click(function() {
                request["Page"] = datanext;
                SetGetData(request, act, getfunc, ".list-group-kelas");
            });

            $(".btn.siswanext").click(function() {
                request["Page"] = datanext;
                SetGetData(request, act, getfunc, ".list-group-siswa");
            });

            $(".btn.kelasprev").click(function() {
                request["Page"] = dataprev;
                SetGetData(request, act, getfunc, ".list-group-kelas");
            });

            $(".btn.siswaprev").click(function() {
                request["Page"] = dataprev;
                SetGetData(request, act, getfunc, ".list-group-siswa");
            });
        </script>
    </body>
</html>
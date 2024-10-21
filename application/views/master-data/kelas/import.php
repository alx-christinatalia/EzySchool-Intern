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
        <title>Import Kelas | <?php echo $this->config->item("app_title"); ?></title>
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
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="page-title">
                                    <h1><i class="fa fa-database"></i> Import Kelas</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                    <li>
                                        <span class="active text-default">Master Data</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="<?php echo base_url("kelas.html");?>">Kelas</a>
                                        </span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Import Kelas</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12 text-right">
                                <div class=" form-inline">
                                    <div class="form-group">
                                        <a data-toggle="modal" data-target="#modalImport" role="button" class="btn btn-primary" title="Import File Excel">
                                            <i class="fa fa-file-excel-o"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary save-kelasimport ladda-button ladda-button-submit hidden" data-style="slide-up" title="Simpan">
                                            <i class="fa fa-save"></i>
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
                        <div style="margin-bottom: -10px;" class="col-md-12 DivFilter hidden">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <!-- FrmFilter -->
                                    <form id="FrmFilter" role="form">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group margin-bottom-5">
                                                    <label>Wali Kelas</label>
                                                    <div class="input-group">
                                                        <select style="width: 100%;" class="select2-notambah dropdown-pegawai2 formwalikelasselectall">
                                                            <option value="">Pilih Wali Kelas</option>
                                                        </select>
                                                    </div>
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
                                    <div class="table-container">
                                        <form class="form-horizontal form-tambah-kelas" action="master-data/ajax-kelas.html" role="form">
                                            <div class="result-save hidden">
                                            </div>
                                            <div class="result hidden">
                                                <a role="button" class="close" aria-label="close" onclick="$(this).parent('div').addClass('hidden')">&times;</a>
                                                <div class="result-save-detil"></div>
                                            </div>
                                            <div class="mt-repeater-hidden" style="margin-bottom: 4px;">
                                                <center>
                                                    <img class="loading" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                                </center>
                                            </div>
                                            <div class="mt-repeater hidden">
                                                <table class="table table-responsive">
                                                    <thead>
                                                        <tr class="bg-grey-steel">
                                                            <th style="width: 50%">Nama <span class="text-danger">*</span></th>
                                                            <th style="width: 50%">Wali Kelas <span class="text-danger">*</span></th>
                                                            <th style="width: 30px;" class="text-center"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody data-repeater-list="data[items]" id="mt-repeater-tbody">
                                                            <tr data-repeater-item class="mt-repeater-item">
                                                                <td>
                                                                    <div class="mt-repeater-input">
                                                                        <input required autofocus type="text" class="form-control formnama" name="form[nama]" placeholder="Nama Kelas">
                                                                    </div>
                                                                    <input class="id_kelas" type="hidden" name="form[id]">
                                                                    <input class="nama" type="hidden">
                                                                </td>
                                                                <td>
                                                                    <div class="mt-repeater-input">
                                                                        <select required style="width: 100%;" class="select2-notambah dropdown-pegawai2 formwalikelas targetallchange" name="form[id_walikelas]">
                                                                            <option value="">Pilih Wali Kelas</option>
                                                                        </select>
                                                                    </div>
                                                                    <input class="walikelas" type="hidden">
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <div class="mt-repeater-input mt-delete">
                                                                            <a role="button" data-repeater-delete class="mt-repeater-delete"><i class="fa fa-trash"></i></a>
                                                                        </div>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                                <div class="text-right">
                                                    <a data-repeater-create role="button" class="btn blue-madison btnTambah pull-left"><i class="fa fa-plus"></i> Tambah Kelas</a>
                                                    <button class=" btn btn-default" type="button" onClick="backAway()">Batal</button>
                                                    <a role="button" class="btn btn-primary ladda-button ladda-button-submit save-kelasimport hidden" data-style="slide-up" title="Simpan"><i class="fa fa-floppy-o"></i> Simpan</a> <!-- update code -->
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
        
        <?php $this->load->view("master-data/kelas/modal/import") ?>

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
            var aftergetdata = "false";
            var editrow;
            pagename = "master-data/ajax-kelas-import.html";
            $(document).ready(function() {
                var FrmSave = $(".form-tambah-kelas");
                var id_update = "<?php echo $this->input->post("FileExcel"); ?>"; //"2|/738190/EzySchool-Template.xlsx"
               
                if(empty(id_update)) {
                    $(".table-container .mt-repeater-hidden").html("<div class='text-center'><span class='label label-warning'>Tidak ada file yang diimport</span></div>");
                } else {
                    tempeldata(id_update, FrmSave);
                }
                
                getdatadropdownpegawai2();
                $(".dropdown-pegawai2").select2();

                if("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }
                $('.mt-repeater-item:first-child').attr('id', "data-1");
            });

            function backAway() {
                if(history.length === 1){
                    window.location = "<?php echo base_url("beranda.html")?>";
                } else {
                    history.back();
                }
            }

            $(".fileimportkelas").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    var filename = this.files[0].name.toString();
                    var tipe = ['application/vnd.ms-excel', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/excel', 'application/download', 'application/vnd.ms-office', 'application/msword','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip', 'application/vnd.ms-excel', 'application/msword', 'application/x-zip', 'application/vnd.ms-excel.sheet.macroEnabled.12'];
                    if(tipe.indexOf(tipefile) == -1) {
                        $(this).val("");
                        toastrshow("warning", "Format salah, pilih file dengan format xls/xlsm/xlsx", "Warning");
                        return;
                    }

                    if((this.files[0].size / 1024) < 2048){
                        var FR = new FileReader();
                        FR.addEventListener("load", function(e) {
                            //var base64 = e.target.result;
                            var base64 = e.target.result.replace("data:"+tipefile+";base64,", '');
                            var ext = filename.split(".").pop();
                            $(".fileimportkelas-hidden").val(base64);
                            $(".fileimportkelasext-hidden").val(ext);
                        }); 
                        FR.readAsDataURL(this.files[0]);
                    } else {
                        $(this).val("");
                        toastrshow("warning", "Ukuran file maksimum adalah 2 MB", "Warning");
                    }
                }
            });

            var FrmImportKelas = $(".form-import-kelas").validate({
                submitHandler: function(form) {
                    uploadfile(form, function(resp) {
                        //GetData(request);
                    }, "uploaddata");                  
                }
            });

            $(".btnTambah").click(function() {
                var index = $(".dropdown-pegawai2").parents(".mt-repeater-item").index();
                index = index + 2;
                if(aftergetdata == "true"){
                    var lastchild = "true";
                    getdatadropdownpegawai2("", lastchild);
                }
                setTimeout(function(){
                    $('.mt-repeater-item:nth-child('+index+') .dropdown-pegawai2').select2();
                }, 10);
                var total_data = $(".mt-repeater-item").size();
                total_data = total_data + 1;
                setTimeout(function() {
                    $('.mt-repeater-item:nth-child('+total_data+')').attr('id', "data-"+total_data);
                }, 2000);
            });

            $(".formwalikelasselectall").change(function() {
                var total_formchange = $(".mt-repeater-item").size();
                var setvalue = $(this).val();
                if(!empty(setvalue)){
                    for (i = 1; i <= total_formchange; i++) {
                        $(".mt-repeater-item:nth-child("+i+")").find(".targetallchange").val(setvalue).trigger("change");
                    }
                }
            });

            function tempeldata(id_update, FrmSave) {
                $(".hidden-idupdate").val(id_update);
                getdatabyid(id_update, function(resp) {
                    if(resp.IsError == true) {
                        toastrshow("error", resp.ErrMessage, "Error");
                    } else {
                        var jumdata = (resp.Data.length - 1);
                        $.each(resp.Data, function(index, item) {
                            if(index < jumdata) {
                                $(".btnTambah").click();
                                FrmSave.find("input[name='data[items]["+index+"][nama]']").val(item.nama);
                            } else {
                                FrmSave.find("input[name='data[items]["+index+"][nama]']").val(item.nama);
                            }
                        });
                        $(".save-kelasimport").removeClass("hidden");
                        $(".DivFilter").removeClass("hidden");
                    }
                    getdatadropdownpegawai2();
                    $(".dropdown-pegawai2").select2();
                    $('.mt-repeater-hidden').addClass("hidden");
                    $('.mt-repeater').removeClass("hidden");
                    aftergetdata = "true";
                });
            }

            function CheckChangeDataKelas() {
                editrow = 0;
                total_formnominal = $(".mt-repeater-item").size();
                for (i = 1; i <= total_formnominal; i++) {
                    var nama1 = $('.mt-repeater-item:nth-child('+i+') .formnama').val();
                    var walikelas1 = $('.mt-repeater-item:nth-child('+i+') .formwalikelas').val();
                    //c = copy
                    var c_nama1 = $('.mt-repeater-item:nth-child('+i+') .nama').val();
                    var c_walikelas1 = $('.mt-repeater-item:nth-child('+i+') .walikelas').val();
                    if(nama1!=c_nama1 || walikelas1!=c_walikelas1){
                        editrow = editrow+1;
                    }
                }
                editrow = editrow;
            }

            var FrmSaveWebsite = $(".form-tambah-kelas").validate({
                submitHandler: function(form) {
                    CheckChangeDataKelas();
                    if(editrow!=0) {
                        $('.result-save').addClass("hidden");
                        $('.mt-repeater-hidden').removeClass("hidden");
                        var actionForm = $(form).attr("action");
                        var valueJSON  = $(form).serializeJSON();
                            valueJSON  = valueJSON.data;

                        var datAdd = [], datEdit = [];
                        var listdataerror = false;

                        $('.result-save-detil').empty();
                        $.each(valueJSON.items, function(index, item) {
                            if(!empty(item.nama)) {
                                var index2 = parseInt(index) + 1;
                                var total_index = $(".mt-repeater-item").size();
                                var nama = $('.mt-repeater-item:nth-child('+index2+') .formnama').val();
                                var walikelas = $('.mt-repeater-item:nth-child('+index2+') .formwalikelas').val();
                                //c = copy
                                var c_nama = $('.mt-repeater-item:nth-child('+index2+') .nama').val();
                                var c_walikelas = $('.mt-repeater-item:nth-child('+index2+') .walikelas').val();
                                if(nama!=c_nama || walikelas!=c_walikelas){
                                    var edit = "true";
                                } else {
                                    var edit = "false";
                                }
                                //insert
                                if($('.mt-repeater-item:nth-child('+index2+') .id_kelas').val()==""){
                                    var stringify = !empty(item.value) ? jsonstringify(item.value): "";
                                    if(!empty(item.nama)) {
                                        datAdd[index] = {
                                            "nama": item.nama,
                                            "id_walikelas": item.id_walikelas,
                                            "index": index2 
                                        };
                                    }
                                }
                                //update
                                if($('.mt-repeater-item:nth-child('+index2+') .id_kelas').val()!="" && edit=="true"){
                                    var stringify = !empty(item.value) ? jsonstringify(item.value): "";
                                    if(!empty(item.nama) && !empty(item.id)) {
                                        datEdit[index] = {
                                            "id_kelas": item.id,
                                            "nama": item.nama,
                                            "id_walikelas": item.id_walikelas,
                                            "index": index2
                                        };
                                    }
                                }
                            }
                        });

                        if(!empty(datAdd)) {
                            datAdd = {act: "insertdatarepeat", req: datAdd};
                            InsertRepeaterNoToaster("", datAdd, actionForm,  function(resp) {
                                $.each(resp.DataRepeat, function(index, item) {
                                    var index2 = item.index;
                                    if(item.IsError == false) {
                                        var id_kelas = item.Output;
                                        $('.mt-repeater-item:nth-child('+index2+') .id_kelas').val(id_kelas);
                                        $('.mt-repeater-item:nth-child('+index2+') .nama').val(item.nama);
                                        $('.mt-repeater-item:nth-child('+index2+') .walikelas').val(item.walikelas);
                                        $('.mt-repeater-item:nth-child('+index2+')').removeClass("opacity-error opacity-update processed");
                                        $('.mt-repeater-item:nth-child('+index2+')').addClass("opacity-success processed");
                                    } else {
                                        listdataerror = true;
                                        $('.mt-repeater-item:nth-child('+index2+')').removeClass("opacity-success opacity-update processed");
                                        $('.mt-repeater-item:nth-child('+index2+')').addClass("opacity-error processed");
                                        $('.result-save-detil').append("<label class='text-danger'><b>Kelas "+item.nama+"</b> : "+item.ErrMessage+"</label><br>");
                                    }
                                });
                                SetCheckInsertUpdateKelas(listdataerror);
                            });
                        }

                        if(!empty(datEdit)) {
                            datEdit = {act: "updatedatarepeat", req: datEdit};
                            InsertRepeaterNoToaster("", datEdit, actionForm,  function(resp) {
                                $.each(resp.DataRepeat, function(index, item) {
                                    var index2 = item.index;
                                    if(item.IsError == false) {
                                        $('.mt-repeater-item:nth-child('+index2+') .nama').val(item.nama);
                                        $('.mt-repeater-item:nth-child('+index2+') .walikelas').val(item.walikelas);
                                        $('.mt-repeater-item:nth-child('+index2+')').removeClass("opacity-error opacity-success processed");
                                        $('.mt-repeater-item:nth-child('+index2+')').addClass("opacity-update processed");
                                    } else {
                                        listdataerror = true;
                                        $('.mt-repeater-item:nth-child('+index2+')').removeClass("opacity-success opacity-update processed");
                                        $('.mt-repeater-item:nth-child('+index2+')').addClass("opacity-error processed");
                                        $('.result-save-detil').append("<label class='text-danger'><b>Kelas "+item.nama+"</b> : "+item.ErrMessage+"</label><br>");
                                    }
                                });
                                SetCheckInsertUpdateKelas(listdataerror);                                
                            });
                        }
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

            $(".save-kelasimport").click(function() {
                $(".form-tambah-kelas").submit();
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

            function SetCheckInsertUpdateKelas(listdataerror) {
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
                editrow = 0;
                $('.scroll-to-top').click();
            }
        </script>
    </body>
</html>
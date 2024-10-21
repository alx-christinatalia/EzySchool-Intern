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
        <title>Import Wali Kelas | <?php echo $this->config->item("app_title"); ?></title>
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
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="page-title">
                                    <h1 class="title-edit"><i class="fa fa-database"></i> Import Wali Kelas</h1>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                                <div class="pencarian-layout form-inline">
                                    <div class="form-group text-center">
                                        <a href="#" role="button" class="btn btn-primary save-pegawaiimport">
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
                            <span class="active text-default">Master Data</span>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active text-default">
                                <a href="<?php echo base_url("wali_kelas.html");?>">Wali Kelas</a>
                            </span>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active text-default">
                                <a href="#" onclick="location.reload();">Import Wali Kelas</a>
                            </span>
                        </li>
                    </ul>
                    <div class="base-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet custom light bordered">
                                    <div class="portlet-body">
                                        <div class="table-responsive table-responsive">
                                            <form class="form-horizontal form-tambah-pegawai" action="master-data/ajax-wali-kelas.html" role="form">
                                                <div class="result-save hidden">
                                                    <!-- <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="result-insert bold"></label>
                                                            <label>Data Berhasil Disimpan</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="result-update bold"></label>
                                                            <label>Data Berhasil Diubah</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label class="result-error bold"></label>
                                                            <label>Data Gagal Disimpan</label>
                                                        </div>
                                                    </div> -->
                                                </div>
                                                <div class="mt-repeater-hidden">
                                                    <center>
                                                        <img class="loading" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                                    </center>
                                                    <br>
                                                </div>
                                                <div class="mt-repeater hidden">
                                                    <table class="table">
                                                        <thead>
                                                            <tr class="bg-grey-steel">
                                                                <th style="width: 100px;">NIP</th>
                                                                <th style="width: 150px;">Nama</th>
                                                                <th style="width: 150px;">Username</th>
                                                                <th style="width: 120px;">Email</th>
                                                                <th style="width: 120px;">Jabatan</th>
                                                                <th style="width: 30px;" class="text-center"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody data-repeater-list="data[items]" id="mt-repeater-tbody">
                                                                <tr data-repeater-item class="mt-repeater-item">
                                                                    <td>
                                                                        <div class="mt-repeater-input">
                                                                            <input required type="text" class="form-control formnip" name="form[nip]">
                                                                            <input class="id_pegawai" type="hidden" name="form[id]">
                                                                            <input class="nip" type="hidden">
                                                                            <input type="hidden" name="form[password1]">
                                                                            <input type="hidden" name="form[password2]">
                                                                            <input type="hidden" name="form[no_hp]">
                                                                            <input type="hidden" name="form[alamat]">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mt-repeater-input">
                                                                            <input required type="text" class="form-control formnama" name="form[nama]">
                                                                            <input class="nama" type="hidden">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mt-repeater-input">
                                                                            <input required type="text" class="form-control formusername" name="form[username]">
                                                                            <input class="username" type="hidden">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mt-repeater-input">
                                                                            <input required type="text" class="form-control formemail" name="form[email]">
                                                                            <input class="email" type="hidden">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mt-repeater-input">
                                                                            <input required type="text" class="form-control formjabatan" name="form[jabatan]">
                                                                            <input class="jabatan" type="hidden">
                                                                        </div>
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
                                                <a data-repeater-create role="button" class="btn blue-madison btnTambah"><i class="fa fa-plus"></i> Tambah Data</a>
                                                </div>
                                            </form>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination-layout hidden">
                            <div class="row">
                                <div class="col-md-3 col-sm-4 col-xs-9">
                                    <div class="form-group">
                                        <div class="input-group paging">
                                            <span class="input-group-btn">
                                                <a role="button" class="btn btn-primary input-sm disabled first"><i class="fa fa-step-backward"></i></a>
                                                <a role="button" class="btn btn-primary input-sm disabled prev"><i class="fa fa-chevron-left"></i></a>
                                            </span>
                                            <form id="FrmGotoPage">
                                                <input type="text" class="form-control input-sm text-center" value="1">
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
            pagename = "master-data/ajax-wali-kelas.html";
            $(document).ready(function() {
                var FrmSave = $(".form-tambah-pegawai");
               // var id_update = "<?php //echo $this->input->post("FileExcel"); ?>"; //"2|/738190/EzySchool-Template.xlsx"
                var id_update = "<?php echo $this->input->post("FileExcel"); ?>"; //"2|/738190/EzySchool-Template.xlsx"
                tempeldata(id_update, FrmSave);
                
                if("<?php echo $user->foto; ?>" == "default.png")
                {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                }
                else
                {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }
            });
            
            function tempeldata(id_update, FrmSave) {
                $(".hidden-idupdate").val(id_update);
                getdatabyid(id_update, function(resp) {
                    var jumdata = (resp.Data.length - 1);
                    $.each(resp.Data, function(index, item) {
                        if(index < jumdata) {
                            $(".btnTambah").click();
                            $('.mt-repeater-item:nth-child('+index+')').attr('id', "data-"+index);
                            FrmSave.find("input[name='data[items]["+index+"][nip]']").val(item.nip);
                            FrmSave.find("input[name='data[items]["+index+"][nama]']").val(item.nama);
                            FrmSave.find("input[name='data[items]["+index+"][username]']").val(item.username);
                            FrmSave.find("input[name='data[items]["+index+"][email]']").val(item.email);
                            FrmSave.find("input[name='data[items]["+index+"][password1]']").val(item.password);
                            FrmSave.find("input[name='data[items]["+index+"][password2]']").val(item.password);
                            FrmSave.find("input[name='data[items]["+index+"][jabatan]']").val(item.jabatan);
                            FrmSave.find("input[name='data[items]["+index+"][no_hp]']").val(item.no_hp);
                            FrmSave.find("input[name='data[items]["+index+"][alamat]']").val(item.alamat);
                        } else {
                            $('.mt-repeater-item:nth-child('+jumdata+')').attr('id', "data-"+jumdata);
                            FrmSave.find("input[name='data[items]["+jumdata+"][nip]']").val(item.nip);
                            FrmSave.find("input[name='data[items]["+jumdata+"][nama]']").val(item.nama);
                            FrmSave.find("input[name='data[items]["+jumdata+"][username]']").val(item.username);
                            FrmSave.find("input[name='data[items]["+jumdata+"][email]']").val(item.email);
                            FrmSave.find("input[name='data[items]["+jumdata+"][password1]']").val(item.password);
                            FrmSave.find("input[name='data[items]["+jumdata+"][password2]']").val(item.password);
                            FrmSave.find("input[name='data[items]["+jumdata+"][jabatan]']").val(item.jabatan);
                            FrmSave.find("input[name='data[items]["+jumdata+"][no_hp]']").val(item.no_hp);
                            FrmSave.find("input[name='data[items]["+jumdata+"][alamat]']").val(item.alamat);
                        }
                        $('.mt-repeater-hidden').addClass("hidden");
                        $('.mt-repeater').removeClass("hidden");
                    });
                });
            }

            var FrmSaveWebsite = $(".form-tambah-pegawai").validate({
                submitHandler: function(form) {
                    $('.result-save').addClass("hidden");
                    $('.mt-repeater-hidden').removeClass("hidden");
                    var actionForm = $(form).attr("action");
                    var valueJSON  = $(form).serializeJSON();console.log(valueJSON);
                        valueJSON  = valueJSON.data;

                    var datSis = {};    
                    $.each(valueJSON.items, function(index, item) {
                        if(!empty(item.nama)) {
                            var total_index = $(".mt-repeater-item").size();
                            var nip = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .formnip').val();
                            var nama = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .formnama').val();
                            var username = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .formusername').val();
                            var email = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .formemail').val();
                            var jabatan = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .formjabatan').val();
                            //c = copy
                            var c_nip = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .nip').val();
                            var c_nama = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .nama').val();
                            var c_username = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .username').val();
                            var c_email = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .email').val();
                            var c_jabatan = $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .jabatan').val();
                            if(nip!=c_nip || nama!=c_nama || username!=c_username || email!=c_email || jabatan!=c_jabatan){
                                var edit = "true";
                            }
                            else{
                                var edit = "false";
                            }
                            //insert
                            if($('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .id_pegawai').val()==""){
                                var stringify = !empty(item.value) ? jsonstringify(item.value): "";
                                datSis = {act: "insertdatarepeat", req: {
                                    "nip": item.nip,
                                    "nama": item.nama,
                                    "username": item.username,
                                    "email": item.email,
                                    "password1": item.password1,
                                    "password2": item.password2,
                                    "jabatan": item.jabatan,
                                    "no_hp": item.no_hp,
                                    "alamat": item.alamat,
                                    "jk": item.jk
                                }};
                                InsertRepeaterData(datSis, actionForm,  function(resp) {
                                if(resp.IsError == false) {
                                    var id_pegawai = resp.Output;
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .id_pegawai').val(id_pegawai);
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .nip').val(nip);
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .nama').val(nama);
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .username').val(username);
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .email').val(email);
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .jabatan').val(jabatan);
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').removeClass("opacity-error opacity-update processed");
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').addClass("opacity-success processed");
                                } else {
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').removeClass("opacity-success opacity-update processed");
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').addClass("opacity-error processed");
                                }
                                scroll = parseInt(index)+1;
                                scrollToCenter(scroll);
                                var processed = $(".processed").size();
                                if(total_index==processed){
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
                                            "</span>" + " Data berhasil disimpan. " +
                                        "</span>" +
                                        "<span class='text-info'>" +
                                            "<span class='bold'>"
                                                + update +
                                            "</span>" + " Data berhasil diubah. " + 
                                        "</span>" +
                                        "<span class='text-danger'>" +
                                            "<span class='bold'>"
                                                + error +
                                            "</span>" + " Data gagal disimpan." +
                                        "</span>", "info"
                                    );
                                    $(".result-save").html(alert);
                                }
                                });
                            }
                            if($('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .id_pegawai').val()!="" && edit!="true"){
                                $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').addClass("processed");
                                var processed = $(".processed").size();
                                if(total_index==processed){
                                    var insert = $(".opacity-success").size();
                                    var update = $(".opacity-update").size();
                                    var error = $(".opacity-error").size();
                                    $('.result-insert').text(insert);
                                    $('.result-update').text(update);
                                    $('.result-error').text(error);
                                    $('.mt-repeater-hidden').addClass("hidden");
                                    $('.result-save').removeClass("hidden");
                                    removeprocessed();
                                }
                            }
                            //update
                            if($('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .id_pegawai').val()!="" && edit=="true"){
                                datSis = {act: "updatedatarepeat", req: {
                                    "id_users": item.id,
                                    "nip": item.nip,
                                    "nama": item.nama,
                                    "username": item.username,
                                    "email": item.email,
                                    "password1": item.password1,
                                    "password2": item.password2,
                                    "jabatan": item.jabatan,
                                    "no_hp": item.no_hp,
                                    "alamat": item.alamat,
                                    "jk": item.jk
                                }};
                                InsertRepeaterData(datSis, actionForm,  function(resp) {
                                var stringify = !empty(item.value) ? jsonstringify(item.value): "";
                                if(resp.IsError == false) {
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .nip').val(nip);
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .nama').val(nama);
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .username').val(username);
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .email').val(email);
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+') .jabatan').val(jabatan);
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').removeClass("opacity-error opacity-success processed");
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').addClass("opacity-update processed");
                                } else {
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').removeClass("opacity-success opacity-update processed");
                                    $('.mt-repeater-item:nth-child('+(parseInt(index)+1)+')').addClass("opacity-error processed");
                                }
                                var processed = $(".processed").size();
                                if(processed==processed){
                                    var insert = $(".opacity-success").size();
                                    var update = $(".opacity-update").size();
                                    var error = $(".opacity-error").size();
                                    /*$('.result-insert').text(insert);
                                    $('.result-update').text(update);
                                    $('.result-error').text(error);*/
                                    $('.mt-repeater-hidden').addClass("hidden");
                                    $('.result-save').removeClass("hidden");
                                    removeprocessed();
                                    var alert = AlertShow(
                                        "<span class='font-green-meadow'>" +
                                            "<span class='bold'>"
                                                + insert +
                                            "</span>" + " Data berhasil disimpan. " +
                                        "</span>" +
                                        "<span class='text-info'>" +
                                            "<span class='bold'>"
                                                + update +
                                            "</span>" + " Data berhasil diubah. " + 
                                        "</span>" +
                                        "<span class='text-danger'>" +
                                            "<span class='bold'>"
                                                + error +
                                            "</span>" + " Data gagal disimpan." +
                                        "</span>", "info"
                                    );
                                    $(".result-save").html(alert);
                                }
                                });
                            }
                        }
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

            $(".save-pegawaiimport").click(function() {
                $(".form-tambah-pegawai").submit();
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

            function scrollToCenter(scroll) {
                var container = $('body'),
                    scrollTo = $('#data-'+scroll);

                container.animate({
                    //scrolls to center
                    scrollTop: scrollTo.offset().top - container.offset().top + scrollTo.scrollTop() - container.height() / 2
                });
            }
            /*if(prosesstart = "mulai") {
            $(".dropdown-jurusan").on("change", function() {
                
                    var index = $(this).parents(".mt-repeater-item").index();
                    index = index + 1;
                    var id_jurusan = $(this).val();
                    $('.mt-repeater-item:nth-child('+index+') .dropdown-jurusan').find('.mt-repeater-item:nth-child('+index+') .dropdown-kelas').val(getdatadropdownkelas_parent('',id_jurusan, index)).trigger("change");
                
            });
            }*/
            /*pagename = "ajax-pengguna";
            $(document).ready(function() {
                GetData(request);
            });

            $("#FrmFilter").submit(function() {
                var status = $(this).find(".is_active").val(), sort = $(this).find(".sort").val();
                request["Sort"] = sort;
                request["filter"]["status"] = status; 
                GetData(request);
                return false;
            });
            */

           /* //Save Website
            var FrmSaveWebsite = $("#FrmSaveWebsite").validate({
                submitHandler: function(form) {
                   InsertData(form, function(resp) {
                        ReloadTable();
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

            //Save Group
            var FrmSaveGroup = $("#FrmSaveGroup").validate({
                submitHandler: function(form) {
                    var idupdate = $(form).find(".hidden-idupdate").val();
                    if(idupdate.length) {
                        UpdateData(form, function(resp) {
                            ReloadTable();
                            getdatadropdowngroup();
                        });
                    } else {
                        InsertData(form, function(resp) {
                            ReloadTable();
                            getdatadropdowngroup();
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

            function ReloadTable() {
                GetSidebar(function(resp) { $("#count1").html(resp.paging.Total); });
                GetData(request);
            }

            $(".datatable tbody").on("click", ".edit-data", function() {
                resetformvalue("#FrmSave");
                
                var FrmSave = $("#FrmSaveGroup");
                var id_update = $(this).data("idupdate");
                $(".hidden-idupdate").val(id_update);
                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    FrmSave.find("input[name='form[id_update]']").val(resp.id);
                    FrmSave.find("input[name='form[id_group]']").val(resp.id_group);
                    FrmSave.find(".hidden-idgroup").val(resp.id_group);
                    FrmSave.find("input[name='form[nama]']").val(resp.nama_group);
                    FrmSave.find("textarea[name='form[catatan]']").val(resp.catatan);
                });
                $(".modal-save-group .modal-title").html("Edit Group");
                $(".modal-save-group").modal("show");
            });*/

            
        </script>
    </body>
</html>
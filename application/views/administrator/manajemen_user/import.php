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
        <title>Import User | <?php echo $this->config->item("app_title"); ?></title>
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
                            <div class="col-sm-6">
                                <div class="page-title">
                                    <h1 class="title-edit"><i class="fa fa-user"></i> Import User</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                    <li>
                                        <span class="active text-default">Administrator</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="<?php echo base_url("manajemen_user.html");?>">Manajemen User</a>
                                        </span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Import User</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6 text-right">
                                <div class="form-inline">
                                    <div class="form-group ">
                                        <a href="#" role="button" class="btn btn-primary save-pegawaiimport" title="Simpan">
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
                        <div style="margin-bottom: -10px;" class="col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <!-- FrmFilter -->
                                    <form id="FrmFilter" role="form">
                                        <div class="row form-body">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Set Hak Akses</label>
                                                    <select required style="width: 100%;" class="select2-notambah dropdown-hak-akses2 formhakaksesselectall">
                                                        <option value="">Pilih Hak Akses</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-7"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="portlet custom light bordered">
                                <div class="portlet-body">
                                    <div class="table-container">
                                        <form class="form-horizontal form-tambah-pegawai" action="administrator/ajax-user.html" role="form">
                                            <div class="result-save hidden">
                                            </div>
                                            <div class="result hidden">
                                                <a role="button" class="close" aria-label="close" onclick="$(this).parent('div').addClass('hidden')">&times;</a>
                                                <div class="result-save-detil"></div>
                                            </div>
                                            <div class="mt-repeater-hidden">
                                                <center>
                                                    <img class="loading" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                                </center>
                                                <br>
                                            </div>
                                            <div class="mt-repeater hidden table-responsive ">
                                                <table class="table">
                                                    <thead>
                                                        <tr class="bg-grey-steel">
                                                            <th style="width: 150px;">NIP</th>
                                                            <th style="width: 150px;">Nama</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th style="width: 150px;">Username</th>
                                                            <th style="width: 150px;">Password</th>
                                                            <th>Hak Akses</th>
                                                            <th class="notwajib hidden"style="width: 150px;">Email</th>
                                                            <th class="notwajib hidden" style="width: 150px;">Jabatan</th>
                                                            <th style="width: 30px;"></th>
                                                            <th style="width: 30px;" class="text-center"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody data-repeater-list="data[items]" id="mt-repeater-tbody">
                                                            <tr data-repeater-item class="mt-repeater-item">
                                                                <td>
                                                                    <div class="mt-repeater-input">
                                                                        <input type="text" class="form-control formnip" name="form[nip]">
                                                                        <input class="id_pegawai" type="hidden" name="form[id]">
                                                                        <input class="nip" type="hidden">
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
                                                                        <select required style="width: 100%;" class="select2-normal select2-nosearch dropdown-jeniskelamin formjeniskelamin" name="form[jk]">
                                                                            <option value="">Jenis Kelamin</option>
                                                                            <option value="1">Laki - laki</option>
                                                                            <option value="2">Perempuan</option>
                                                                        </select>
                                                                        <input class="jeniskelamin" type="hidden">
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
                                                                        <input required type="password" class="form-control formpassword" name="form[password1]">
                                                                        <input class="password" type="hidden">
                                                                        <input class="formpassword2" type="hidden" name="form[password2]">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-repeater-input">
                                                                        <select required style="width: 100%;" class="select2-notambah dropdown-hak-akses2 formhakakses targetallchange" name="form[id_roles]">
                                                                            <option value="">Pilih Hak Akses</option>
                                                                        </select>
                                                                        <input class="hakakses" type="hidden">
                                                                    </div>
                                                                </td>
                                                                <td class="notwajib hidden">
                                                                    <div class="mt-repeater-input">
                                                                        <input required type="text" class="form-control formemail" name="form[email]">
                                                                        <input class="email" type="hidden">
                                                                    </div>
                                                                </td>
                                                                <td class="notwajib hidden">
                                                                    <div class="mt-repeater-input">
                                                                        <input required type="text" class="form-control formjabatan" name="form[jabatan]">
                                                                        <input class="jabatan" type="hidden">
                                                                    </div>
                                                                </td>
                                                                <td class="button-collapse hidden bold" style="background-color: #e9edef;vertical-align: middle;" >
                                                                        <center>
                                                                            <i class="fa fa-angle-double-right"></i>
                                                                        </center>
                                                                </td>
                                                                <td>
                                                                    <center>
                                                                        <div class="mt-repeater-input mt-delete">
                                                                            <a role="button" data-repeater-delete class="mt-repeater-delete delete-show-collapse"><i class="fa fa-trash"></i></a>
                                                                        </div>
                                                                    </center>
                                                                </td>
                                                            </tr>
                                                    </tbody>
                                                </table>
                                                <div class="text-right">
                                                    <a data-repeater-create role="button" class="btn blue-madison pull-left btnTambah"><i class="fa fa-plus"></i> Tambah Data</a>
                                                    <button class=" btn btn-default" type="button" onClick="backAway()">Batal</button> 
                                                            
                                                    <a role="button" class="btn btn-primary ladda-button ladda-button-submit save-pegawaiimport"><i class="fa fa-floppy-o"></i> Simpan</a> <!-- update code -->
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
        <script src="<?php echo base_url("assets/plugins/jquery-md5/jquery.md5.js"); ?>"></script>

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
            pagename = "administrator/ajax-user-import.html";
            var notwajib = 1;
            $(document).ready(function() {
                $(".btnTambah").click();
                $('.mt-repeater-item:first-child() .delete-show-collapse').click();
                var FrmSave = $(".form-tambah-pegawai");
                var id_update = "<?php echo $this->input->post("FileExcel"); ?>";
                
                if (empty(id_update)) {
                    $('.table-container .mt-repeater-hidden').html("<div class='text-center'><span class='label label-warning'>Tidak ada file yang diimport</span></div>")
                } else {
                    tempeldata(id_update, FrmSave);
                }

                getdatadropdownhakakses2();
                $(".dropdown-hak-akses2").select2();

                if("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }
            });

            
            $(".formhakaksesselectall").change(function() {
                var total_formchange = $(".mt-repeater-item").size();
                var setvalue = $(this).val();
                if(!empty(setvalue)){
                    for (i = 1; i <= total_formchange; i++) {
                        $(".mt-repeater-item:nth-child("+i+")").find(".targetallchange").val(setvalue).trigger("change");
                    }
                }
            });

            function backAway() {
                if(history.length === 1){
                    window.location = "<?php echo base_url("beranda.html")?>";
                } else {
                    history.back();
                }
            }

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
                        });
                    }
                    var total_data = $(".mt-repeater-item").size();
                    $('.mt-repeater-item:nth-child('+total_data+')').attr('id', "data-"+total_data);
                    setTimeout(function() {
                        $.each(resp.Data, function(index, item) {
                            index2 = index+1;
                            var jenis_kelamin = item.jenis_kelamin;
                            if(/\((\d+)\)/g.test(jenis_kelamin)) {
                                jenis_kelamin = jenis_kelamin.match(/(\d+)/g);
                                jenis_kelamin = jenis_kelamin[0];
                            }
                            $("#mt-repeater-tbody .mt-repeater-item:nth-child("+index2+")").find(".dropdown-jeniskelamin").val(jenis_kelamin).trigger("change");
                        });
                        $('.mt-repeater-hidden').addClass("hidden");
                        $('.mt-repeater').removeClass("hidden");
                        aftergetdata = "true";
                    }, 100);
                    getdatadropdownhakakses2();
                    $(".dropdown-hak-akses2").select2();
                    $(".dropdown-jeniskelamin").select2({
                        minimumResultsForSearch: Infinity
                    });
                });
            }

            $(".btnTambah").click(function() {
                var index = $(".dropdown-jeniskelamin").parents(".mt-repeater-item").index();
                index = index + 2;
                setTimeout(function(){
                    if(aftergetdata == "true"){
                        var lastchild = "true";
                        getdatadropdownhakakses2("", lastchild);
                        $('.mt-repeater-item:nth-child('+index+') .dropdown-hak-akses2').select2();
                        if(notwajib==2){
                            $('.mt-repeater-item:nth-child('+index+') .notwajib').removeClass("hidden");
                        }
                    }
                    $('.mt-repeater-item:nth-child('+index+') .dropdown-jeniskelamin').select2({
                        minimumResultsForSearch: Infinity
                    });
                }, 10);
                var total_data = $(".mt-repeater-item").size();
                total_data = total_data + 1;
                setTimeout(function() {
                    $('.mt-repeater-item:first-child() .button-collapse').attr('rowspan', total_data);
                    $('.mt-repeater-item:first-child() .button-collapse').removeClass("hidden");
                    $('.mt-repeater-item:first-child() .button-collapse').attr('role', "button");
                    $('.mt-repeater-item:first-child() .button-collapse').attr('onClick', "clickbuttoncollapse();");
                }, 100);
                setTimeout(function() {
                    $('.mt-repeater-item:nth-child('+total_data+')').attr('id', "data-"+total_data);
                }, 2000);
            });

            $(".formpassword").change(function() {
                var index = $(this).parents(".mt-repeater-item").index();
                index = index + 1;
                var password = $('.mt-repeater-item:nth-child('+parseInt(index)+') .formpassword').val();
                $('.mt-repeater-item:nth-child('+parseInt(index)+') .formpassword2').val(password);
            });
            $(".formpassword").focusin(function() {
                var index = $(this).parents(".mt-repeater-item").index();
                index = index + 1;
                $('.mt-repeater-item:nth-child('+parseInt(index)+') .formpassword').attr('type', "text");
            });
            $(".formpassword").focusout(function() {
                var index = $(this).parents(".mt-repeater-item").index();
                index = index + 1;
                $('.mt-repeater-item:nth-child('+parseInt(index)+') .formpassword').attr('type', "password");
            });

            $(".delete-show-collapse").click(function() {
                var index = $(this).parents(".mt-repeater-item").index();
                index = index + 1;
                if(index==1){
                    var total_data = $(".mt-repeater-item").size();
                    total_data = total_data + 1;
                    setTimeout(function() {
                        $('.mt-repeater-item:first-child() .button-collapse').attr('rowspan', total_data);
                        $('.mt-repeater-item:first-child() .button-collapse').removeClass("hidden");
                        $('.mt-repeater-item:first-child() .button-collapse').attr('role', "button");
                        $('.mt-repeater-item:first-child() .button-collapse').attr('onClick', "clickbuttoncollapse();");
                    }, 500);
                }
            });

            function clickbuttoncollapse() {
                if(notwajib==2){
                    $(".notwajib").addClass("hidden");
                    $(".button-collapse").html("<center><i class='fa fa-angle-double-right'</i></center>");
                    notwajib = 1;
                } else {
                    $(".notwajib").removeClass("hidden");
                    $(".button-collapse").html("<center><i class='fa fa-angle-double-left'</i></center>");
                    notwajib = 2;
                }
            }

            function CheckChangeDataUser() {
                editrow = 0;
                total_formnominal = $(".mt-repeater-item").size();
                for (i = 1; i <= total_formnominal; i++) {
                    var nip1 = $('.mt-repeater-item:nth-child('+i+') .formnip').val();
                    var nama1 = $('.mt-repeater-item:nth-child('+i+') .formnama').val();
                    var jeniskelamin1 = $('.mt-repeater-item:nth-child('+i+') .formjeniskelamin').val();
                    var username1 = $('.mt-repeater-item:nth-child('+i+') .formusername').val();
                    var email1 = $('.mt-repeater-item:nth-child('+i+') .formemail').val();
                    var jabatan1 = $('.mt-repeater-item:nth-child('+i+') .formjabatan').val();
                    var password1 = $('.mt-repeater-item:nth-child('+i+') .formpassword').val();
                    var hakakses1 = $('.mt-repeater-item:nth-child('+i+') .formhakakses').val();
                    //c = copy
                    var c_nip1 = $('.mt-repeater-item:nth-child('+i+') .nip').val();
                    var c_nama1 = $('.mt-repeater-item:nth-child('+i+') .nama').val();
                    var c_jeniskelamin1 = $('.mt-repeater-item:nth-child('+i+') .jeniskelamin').val();
                    var c_username1 = $('.mt-repeater-item:nth-child('+i+') .username').val();
                    var c_email1 = $('.mt-repeater-item:nth-child('+i+') .email').val();
                    var c_jabatan1 = $('.mt-repeater-item:nth-child('+i+') .jabatan').val();
                    var c_password1 = $('.mt-repeater-item:nth-child('+i+') .password').val();
                    var c_hakakses1 = $('.mt-repeater-item:nth-child('+i+') .hakakses').val();
                    if(nip1!=c_nip1 || nama1!=c_nama1 || jeniskelamin1!=c_jeniskelamin1 || username1!=c_username1 || email1!=c_email1 || jabatan1!=c_jabatan1 || password1!=c_password1 || hakakses1!=c_hakakses1){
                        editrow = editrow+1;
                    }
                }
                editrow = editrow;
            }

            var FrmSaveWebsite = $(".form-tambah-pegawai").validate({
                submitHandler: function(form) {
                    CheckChangeDataUser();
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
                            var index2 = (parseInt(index)+1);
                            if(!empty(item.nama)) {
                                var total_index = $(".mt-repeater-item").size();
                                var nip = $('.mt-repeater-item:nth-child('+index2+') .formnip').val();
                                var nama = $('.mt-repeater-item:nth-child('+index2+') .formnama').val();
                                var jeniskelamin = $('.mt-repeater-item:nth-child('+index2+') .formjeniskelamin').val();
                                var username = $('.mt-repeater-item:nth-child('+index2+') .formusername').val();
                                var email = $('.mt-repeater-item:nth-child('+index2+') .formemail').val();
                                var jabatan = $('.mt-repeater-item:nth-child('+index2+') .formjabatan').val();
                                var password = $('.mt-repeater-item:nth-child('+index2+') .formpassword').val();
                                var hakakses = $('.mt-repeater-item:nth-child('+index2+') .formhakakses').val();
                                //c = copy
                                var c_nip = $('.mt-repeater-item:nth-child('+index2+') .nip').val();
                                var c_nama = $('.mt-repeater-item:nth-child('+index2+') .nama').val();
                                var c_jeniskelamin = $('.mt-repeater-item:nth-child('+index2+') .jeniskelamin').val();
                                var c_username = $('.mt-repeater-item:nth-child('+index2+') .username').val();
                                var c_email = $('.mt-repeater-item:nth-child('+index2+') .email').val();
                                var c_jabatan = $('.mt-repeater-item:nth-child('+index2+') .jabatan').val();
                                var c_password = $('.mt-repeater-item:nth-child('+index2+') .password').val();
                                var c_hakakses = $('.mt-repeater-item:nth-child('+index2+') .hakakses').val();
                                if(nip!=c_nip || nama!=c_nama || jeniskelamin!=c_jeniskelamin || username!=c_username || email!=c_email || jabatan!=c_jabatan || password!=c_password || hakakses!=c_hakakses){
                                    var edit = "true";
                                } else {
                                    var edit = "false";
                                }
                                //insert
                                if($('.mt-repeater-item:nth-child('+index2+') .id_pegawai').val()==""){
                                    var stringify = !empty(item.value) ? jsonstringify(item.value): "";
                                    datAdd[index] = {
                                        "nip": item.nip,
                                        "nama": item.nama,
                                        "username": item.username,
                                        "email": item.email,
                                        "password1": $.md5(item.password1),
                                        "password2": $.md5(item.password2),
                                        "jabatan": item.jabatan,
                                        "no_hp": item.no_hp,
                                        "alamat": item.alamat,
                                        "jk": item.jk,
                                        "id_roles": item.id_roles,
                                        "index": index2
                                    }                                    
                                }
                                //update
                                if($('.mt-repeater-item:nth-child('+index2+') .id_pegawai').val()!="" && edit=="true"){
                                    datEdit[index] =  {
                                        "id_users": item.id,
                                        "nip": item.nip,
                                        "nama": item.nama,
                                        "username": item.username,
                                        "email": item.email,
                                        "password1": $.md5(item.password1),
                                        "password2": $.md5(item.password2),
                                        "jabatan": item.jabatan,
                                        "no_hp": item.no_hp,
                                        "alamat": item.alamat,
                                        "jk": item.jk,
                                        "id_roles": item.id_roles,
                                        "index": index2
                                    }
                                }
                            }
                        });

                        if(!empty(datAdd)) {
                            datAdd = {act: "insertdatarepeat", req: datAdd};
                            InsertRepeaterNoToaster("", datAdd, actionForm,  function(resp) {
                                $.each(resp.DataRepeat, function(index, item) {
                                    if(item.IsError == false) {
                                        var id_pegawai = item.Output;
                                        $('.mt-repeater-item:nth-child('+item.index+') .id_pegawai').val(id_pegawai);
                                        $('.mt-repeater-item:nth-child('+item.index+') .nip').val(item.nip);
                                        $('.mt-repeater-item:nth-child('+item.index+') .nama').val(item.nama);
                                        $('.mt-repeater-item:nth-child('+item.index+') .jeniskelamin').val(item.jk);
                                        $('.mt-repeater-item:nth-child('+item.index+') .username').val(item.username);
                                        $('.mt-repeater-item:nth-child('+item.index+') .email').val(item.email);
                                        $('.mt-repeater-item:nth-child('+item.index+') .jabatan').val(item.jabatan);
                                        $('.mt-repeater-item:nth-child('+item.index+') .password').val(item.password);
                                        $('.mt-repeater-item:nth-child('+item.index+') .hakakses').val(item.hakakses);
                                        $('.mt-repeater-item:nth-child('+item.index+')').removeClass("opacity-error opacity-update processed");
                                        $('.mt-repeater-item:nth-child('+item.index+')').addClass("opacity-success processed");
                                    } else {
                                        listdataerror = true;
                                        $('.mt-repeater-item:nth-child('+item.index+')').removeClass("opacity-success opacity-update processed");
                                        $('.mt-repeater-item:nth-child('+item.index+')').addClass("opacity-error processed");
                                        $('.result-save-detil').append("<label class='text-danger'><b>User "+item.nama+"</b> : "+item.ErrMessage+"</label><br>");
                                    }
                                });
                                SetInserUpdateUser(listdataerror);
                            });
                        }

                        if(!empty(datEdit)) {
                            datEdit = {act: "updatedatarepeat", req: datEdit};
                            InsertRepeaterNoToaster("", datEdit, actionForm,  function(resp) {
                                $.each(resp.DataRepeat, function(index, item) {
                                    if(item.IsError == false) {
                                        $('.mt-repeater-item:nth-child('+item.index+') .nip').val(item.nip);
                                        $('.mt-repeater-item:nth-child('+item.index+') .nama').val(item.nama);
                                        $('.mt-repeater-item:nth-child('+item.index+') .jeniskelamin').val(item.jk);
                                        $('.mt-repeater-item:nth-child('+item.index+') .username').val(item.username);
                                        $('.mt-repeater-item:nth-child('+item.index+') .email').val(item.email);
                                        $('.mt-repeater-item:nth-child('+item.index+') .jabatan').val(item.jabatan);
                                        $('.mt-repeater-item:nth-child('+item.index+') .password').val(item.password);
                                        $('.mt-repeater-item:nth-child('+item.index+') .hakakses').val(item.hakakses);
                                        $('.mt-repeater-item:nth-child('+item.index+')').removeClass("opacity-error opacity-success processed");
                                        $('.mt-repeater-item:nth-child('+item.index+')').addClass("opacity-update processed");
                                    } else {
                                        listdataerror = true;
                                        $('.mt-repeater-item:nth-child('+item.index+')').removeClass("opacity-success opacity-update processed");
                                        $('.mt-repeater-item:nth-child('+item.index+')').addClass("opacity-error processed");
                                        $('.result-save-detil').append("<label class='text-danger'><b>User "+item.nama+"</b> : "+item.ErrMessage+"</label><br>");
                                    }
                                });
                                SetInserUpdateUser(listdataerror);
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

            function scrollToCenter(scroll, total_index) {
                var container = $('body'),
                    scrollTo = $('#data-'+scroll);
                container.animate({
                    scrollTop: scrollTo.offset().top - container.offset().top + scrollTo.scrollTop() - container.height() / total_index
                });
            }

            function SetInserUpdateUser(listdataerror) {
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
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
        <title>Edit Wali Kelas | <?php echo $this->config->item("app_title"); ?></title>
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
    
        <link href="<?php echo base_url("assets/css/components-rounded.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/plugins.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/layout.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/default.min.css"); ?>" id="style_color" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/responsive.css"); ?>" rel="stylesheet">

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
                            <div class="col-md-6 col-sm-8 col-xs-12">
                                <div class="page-title">
                                    <h1 class="title-edit"><i class="fa fa-database"></i> Edit Wali Kelas</h1>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-4 col-xs-12 text-right">
                                <div class="pencarian-layout form-inline">
                                    <div class="form-group text-center">
                                        <a href="#" role="button" class="btn btn-primary simpandata">
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
                                <a href="#" onclick="location.reload();">Edit Wali Kelas</a>
                            </span>
                        </li>
                    </ul>
                    <div class="base-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet custom light bordered">
                                    <div class="portlet-body">
                                        <form class="form-horizontal form-edit-pegawai" action="master-data/ajax-wali-kelas.html" role="form">
                                            <div class="form-group">
                                                <center>
                                                    <img class="loading-pegawai hidden" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                                </center>
                                            </div>
                                            <div class="form-group edit-pegawai">
                                                <label class="control-label col-md-3">Foto Profil</label>
                                                <div class=" col-md-5 fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                        <img src="<?php echo base_url("assets/img/default-user.png"); ?>" alt="" class="foto-pegawai"> </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Pilih gambar </span>
                                                            <span class="fileinput-exists"> Ganti </span>
                                                            <input type="hidden" value="" name="..."><input type="file" name="" class="photo"> </span>
                                                        <a href="javascript:;" class="btn red fileinput-exists delete-foto" data-dismiss="fileinput"> Hapus </a>
                                                    </div>
                                                </div>
                                                <input type="hidden" class="input-photo" name="form[foto]">
                                            </div>
                                            <div class="form-group edit-pegawai">
                                                <label class="control-label col-md-3"> NIP </label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" placeholder="NIP" name="form[nip]"/>
                                                </div>
                                            </div>
                                            <div class="form-group edit-pegawai">
                                                <label class="control-label col-md-3"> Nama <span class="text-danger">*</span></label>
                                                <div class="col-md-5">
                                                    <input required type="text" class="form-control" placeholder="Nama" name="form[nama]"/>
                                                </div>
                                            </div>
                                            <div class="form-group edit-pegawai">
                                                <label class="control-label col-md-3"> Alamat </label>
                                                <div class="col-md-5">
                                                    <textarea style="max-width: 720px;" type="text" class="form-control" placeholder="Alamat" name="form[alamat]"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group edit-pegawai">
                                                <label class="control-label col-md-3"> No. Handphone </label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" placeholder="No HP" name="form[no_hp]"/>
                                                </div>
                                            </div>
                                            <div class="form-group edit-pegawai">
                                                <label class="control-label col-md-3"> Jabatan </label>
                                                <div class="col-md-5">
                                                    <input type="text" class="form-control" placeholder="Jabatan" name="form[jabatan]"/>
                                                </div>
                                            </div>
                                            <div class="form-group edit-pegawai">
                                                <label class="control-label col-md-3"> Jenis Kelamin <span class="text-danger">*</span></label>
                                                <div class="col-md-5">
                                                    <select class="select2-nosearch form-control jenis-kelamin" name="form[jk]" required style="width: 100%;">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="1">Laki - laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group edit-pegawai">
                                                <label class="control-label col-md-3"> Username <span class="text-danger">*</span></label>
                                                <div class="col-md-5">
                                                    <input required type="text" class="form-control" placeholder="Username" name="form[username]"/>
                                                </div>
                                            </div> -->
                                            <div class="form-group edit-pegawai">
                                                <label class="control-label col-md-3"> Email <span class="text-danger">*</span></label>
                                                <div class="col-md-5">
                                                    <input required type="email" class="form-control" placeholder="Email" name="form[email]"/>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary ladda-button ladda-button-submit edit-pegawai" data-style="slide-up">Simpan</button>
                                            <input type="hidden" class="hidden-idupdate" name="form[id_update]">
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
        <script src="<?php echo base_url("assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js"); ?>"></script>
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 
        <script>
            pagename = "master-data/ajax-wali-kelas.html";
            $(document).ready(function() {
                documentready();
                
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

            function documentready(){
                var FrmSave = $(".form-edit-pegawai");
                var id_update = "<?php echo $this->input->get('id'); ?>";
                $(".hidden-idupdate").val(id_update);
                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    $(".page-title .title-edit").html("<i class='fa fa-database'></i> Edit Wali Kelas " + resp.nama);
                    foto = ParseGambar(resp.foto);
                    if(resp.foto != "default.png"){
                        FrmSave.find(".foto-pegawai").attr('src', foto);
                    }
                    else{
                        FrmSave.find(".foto-pegawai").attr('src', "<?php echo base_url("assets/img/default-user.png"); ?>");
                    }
                    FrmSave.find("input[name='form[id_update]']").val(resp.id);
                    FrmSave.find("input[name='form[nip]']").val(resp.nip);
                    FrmSave.find("input[name='form[nama]']").val(resp.nama);
                    FrmSave.find("textarea[name='form[alamat]']").val(resp.alamat);
                    FrmSave.find("input[name='form[no_hp]']").val(resp.no_hp);
                    FrmSave.find("input[name='form[jabatan]']").val(resp.jabatan);
                    FrmSave.find("select[name='form[jk]']").val(resp.jk).trigger("change");
                    FrmSave.find("input[name='form[username]']").val(resp.username);
                    FrmSave.find("input[name='form[email]']").val(resp.email);
                    $('.loading-pegawai').addClass("hidden");
                    $('.edit-pegawai').removeClass("hidden");
                });
            } 

            $(".photo").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    if(tipefile == "image/png" || tipefile == "image/jpeg" || tipefile == "image/bmp" || tipefile == "image/gif") {
                        if((this.files[0].size / 1024) < 2048){
                            var FR = new FileReader();
                            FR.addEventListener("load", function(e) {
                                var base64 = e.target.result.replace(/^data:image\/(png|jpg|jpeg|bmp);base64,/, '');
                                $(".input-photo").val(base64);
                            }); 
                            FR.readAsDataURL(this.files[0]);
                        } else {
                            $(this).val("");
                            toastrshow("warning", "Ukuran file maksimum adalah 2 MB", "Warning");
                        }
                    } else {
                        $(this).val("");
                        toastrshow("warning", "Format salah, pilih file dengan format jpg/png/bmp", "Warning");
                    }
                }
            });

            function UpdateDataWithImage(base64) {
                $.ajax({
                    type: "POST",
                    url: base_url + "/ajax/master-data/ajax-wali-kelas.html",
                    data: {act:"uploadfoto", req:{"FileBase64": base64}},
                    dataType: "JSON",
                    cache: false,
                    tryCount: 0,
                    retryLimit: 3,
                    beforeSend: function() {
                        l.ladda("start");
                    },
                    success: function(resp){
                        l.ladda("stop");
                        form = $(".form-datapegawai-baru");
                        if(resp.IsError == false) {
                            toastrshow("success", "Sukses mengunggah foto", "Success");
                            $(".input-photo").val(resp.Output);
                            UpdateData(form, function(resp) {
                                if(resp.IsError == false) {
                                    setTimeout(function() {
                                        window.location.href = "<?php echo base_url("wali_kelas.html")?>";
                                    }, 750);
                                }
                            });                     
                        } else {
                            toastrshow("error", resp.ErrMessage, "Error");
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

            var FrmSaveWebsite = $(".form-edit-pegawai").validate({
                submitHandler: function(form) {
                    $('.loading-pegawai').removeClass("hidden");
                    $('.edit-pegawai').addClass("hidden");
                    var base64 = $(".input-photo").val();
                    if(base64 != "") {
                        UpdateDataWithImage(base64);
                    } else {
                        $(".input-photo").attr("name","form[foto]");
                        UpdateData(form, function(resp) {
                            if(resp.IsError == false) {
                                setTimeout(function() {
                                    window.location.href = "<?php echo base_url("wali_kelas.html")?>";
                                }, 750);
                            }
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

            $(".simpandata").click(function() {
                $(".form-edit-pegawai").submit();
            });
            
        </script>
    </body>
</html>
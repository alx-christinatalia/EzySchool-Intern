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
        <title>Edit User | <?php echo $this->config->item("app_title"); ?></title>
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
                            <div class="col-sm-10 col-xs-12">
                                <div class="page-title">
                                    <h1 class="title-edit"><i class="fa fa-user"></i> Edit User</h1>
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
                                            <a href="#" onclick="location.reload();">Edit User</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-2 col-xs-12 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <a href="#" role="button" class="btn btn-primary simpandata" title="Simpan">
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

                    <div class="portlet light hasil-error">
                        <div class="portlet-body ket">
                            <center>
                                <img class="loading-datasiswa" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                            </center>
                        </div>
                    </div>
                    
                    <div class="row content-1 hidden">
                        <div class="col-md-12">
                            <div class="portlet custom light bordered">
                                <div class="portlet-body">
                                    <form class="form-horizontal form-edit-pegawai" action="administrator/ajax-user.html" role="form">
                                        <div class="form-group">
                                            <center>
                                                <img class="loading-pegawai hidden" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                            </center>
                                        </div>
                                        <div class="form-group edit-pegawai">
                                            <label class="control-label col-sm-3 bold">Foto Profil</label>
                                            <div class=" col-sm-5 fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img alt="" class="foto-pegawai" onerror="this.src='<?php echo base_url("assets/img/default-user.png");?>'"> </div>
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
                                            <input type="hidden" class="old-photo">
                                        </div>
                                        <div class="form-group edit-pegawai">
                                            <label class="control-label col-sm-3 bold"> NIP </label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" placeholder="NIP" name="form[nip]" autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group edit-pegawai">
                                            <label class="control-label col-sm-3 bold"> Nama <span class="text-danger">*</span></label>
                                            <div class="col-sm-5">
                                                <input required type="text" class="form-control" placeholder="Nama" name="form[nama]"/>
                                            </div>
                                        </div>
                                        <div class="form-group edit-pegawai">
                                            <label class="control-label col-sm-3 bold"> Jenis Kelamin <span class="text-danger">*</span></label>
                                            <div class="col-sm-5">
                                                <select class="select2-nosearch form-control jenis-kelamin" name="form[jk]" required style="width: 100%;">
                                                <option value="">Pilih Jenis Kelamin</option>
                                                <option value="1">Laki - laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group edit-pegawai">
                                            <label class="control-label col-sm-3 bold"> Email <span class="text-danger">*</span></label>
                                            <div class="col-sm-5">
                                                <input required type="email" class="form-control" placeholder="Email" name="form[email]"/>
                                            </div>
                                        </div>
                                        <div class="form-group edit-pegawai">
                                            <label class="control-label col-sm-3 bold"> Alamat </label>
                                            <div class="col-sm-5">
                                                <textarea style="max-width: 720px;" type="text" class="form-control" placeholder="Alamat" name="form[alamat]"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group edit-pegawai">
                                            <label class="control-label col-sm-3 bold"> No HP </label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" placeholder="No HP" name="form[no_hp]" maxlength="15" onkeypress='return validatedata(event)'/>
                                            </div>
                                        </div>
                                        <div class="form-group edit-pegawai">
                                            <label class="control-label col-sm-3 bold"> Jabatan </label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" placeholder="Jabatan" name="form[jabatan]"/>
                                            </div>
                                        </div>
                                        <div class="form-group edit-pegawai">
                                            <label class="control-label col-sm-3 bold"> Hak Akses <span class="text-danger">*</span></label>
                                            <div class="col-sm-5">
                                                <select style="width: 100%;" class="select2-normal dropdown-hak-akses" name="form[id_roles]" required>
                                                    <option value="">Pilih Hak Akses</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-8 text-right">
                                                <button type="button" onclick="backAway()" class="btn btn-default">Batal</button>
                                                <button type="submit" class="btn btn-primary ladda-button ladda-button-submit edit-pegawai" data-style="slide-up"><i class="fa fa-save"></i> Simpan</button>
                                                <input type="hidden" class="hidden-idupdate" name="form[id_update]">
                                            </div>
                                        </div>
                                    </form>
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
            pagename = "administrator/ajax-user.html";
            var with_photo =  false;
            var id_update = "<?php echo $this->input->get('id'); ?>";

            $(document).ready(function() {
                getdatadropdownhakakses();
                if(!empty(id_update)) {
                    documentready();
                } else {
                    $(".hasil-error .ket").html("<center><span class='label label-warning'>ID User tidak valid</span></center>");
                    $(".simpandata").addClass("hidden");
                }
                
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

            $(".photo").change(function() {
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
                            base64 = base64.replace(/^data:image\/(png|jpg|jpeg|bmp);base64,/, '');

                        $(".input-photo").val(base64);
                        with_photo = true;
                    };
                    image.src = readerEvent.target.result;
                }); 
                FR.readAsDataURL(this.files[0]);  
            });

            $(".delete-foto").click(function() {
                $(".photo").val("");
                $(".input-photo").val("");
            });

            var FrmSaveWebsite = $(".form-edit-pegawai").validate({
                submitHandler: function(form) {
                    $('.loading-pegawai').removeClass("hidden");
                    $('.edit-pegawai').addClass("hidden");
                    var base64 = $(".input-photo").val(), old_path = $(".old-photo").val();
                    if(base64 != "" && with_photo) {
                        $(".input-photo").attr('name', "form[foto]");
                        var ajaxtarget = "administrator/ajax-user.html";
                        uploadfoto(ajaxtarget, base64, function(resp) {
                            UpdateDataAjax(form, function (resp) {});
                        }, "uploadfoto", old_path);
                    } else {
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

            function documentready(){
                with_photo = false;
                var FrmSave = $(".form-edit-pegawai");
                $(".hidden-idupdate").val(id_update);
                getdatabyid(id_update, function(resp) {
                    if(resp.IsError == true) {
                        $(".hasil-error .ket").html("<center><span class='label label-warning'>"+ resp.ErrMessage +"</span></center>");
                        $(".simpandata").addClass("hidden");
                        return;
                    }
                    if(empty(resp.Data)) {
                        $(".hasil-error .ket").html("<center><span class='label label-warning'>Tidak ada data user</span></center>");
                        $(".simpandata").addClass("hidden");
                        return;
                    }
                    $(".content-1").removeClass("hidden");
                    $(".hasil-error").addClass("hidden");

                    var resp = resp.Data[0];
                    $(".page-title .title-edit").html("<i class='fa fa-user'></i> Edit User " + resp.nama);
                    foto = ParseGambar(resp.foto);

                    if(!empty(resp.foto)) {
                        $(".input-photo, .old-photo").val(resp.foto);
                    }

                    if(resp.foto != "default.png"){
                        FrmSave.find(".foto-pegawai").attr('src', foto);
                    }
                    else{
                        FrmSave.find(".foto-pegawai").attr('src', "<?php echo base_url("assets/img/default-user.png"); ?>");
                    }
                    $(".foto-pegawai").error(function (){
                        $(".foto-pegawai").attr('src', "<?php echo base_url("assets/img/default-user.png"); ?>");
                    });


                    FrmSave.find("input[name='form[id_update]']").val(resp.id);
                    FrmSave.find("input[name='form[nip]']").val(resp.nip);
                    FrmSave.find("input[name='form[nama]']").val(resp.nama);
                    FrmSave.find("textarea[name='form[alamat]']").val(resp.alamat);
                    FrmSave.find("input[name='form[no_hp]']").val(resp.no_hp);
                    FrmSave.find("input[name='form[jabatan]']").val(resp.jabatan);
                    FrmSave.find("select[name='form[jk]']").val(resp.jk).trigger("change");
                    FrmSave.find("select[name='form[id_roles]']").val(resp.id_roles).trigger("change");
                    FrmSave.find("input[name='form[username]']").val(resp.username);
                    FrmSave.find("input[name='form[email]']").val(resp.email);
                    $('.loading-pegawai').addClass("hidden");
                    $('.edit-pegawai').removeClass("hidden");
                });
            } 

            $(".simpandata").click(function() {
                $(".form-edit-pegawai").submit();
            });
            
        </script>
    </body>
</html>
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
        <title>Profil | EzySchool Back Office</title>
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
        <link href="<?php echo base_url("assets/plugins/jquery-cropper/cropper.min.css"); ?>" rel="stylesheet">
    
        <link href="<?php echo base_url("assets/css/components-rounded.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/plugins.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/layout.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/default.min.css"); ?>" id="style_color" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/profile.min.css"); ?>" id="style_color" rel="stylesheet">
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
                                    <h1><i class="fa fa-user"></i> Profil <?php echo $user->nama; ?></h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                    <li>
                                        <span class="active text-default">Administrator</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Profil User</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-2 col-xs-12 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <a role="button" class="btn btn-primary edit-password" title="Edit Password">
                                            <i class="fa fa-lock"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary reload" onclick="location.reload();" title="Refresh">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    
                    <div class="row">
                        <center>
                            <img class="loading-profil hidden" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                        </center>
                        <div class="col-md-4 edit-profil">
                            <div class="profile-sidebar">
                                <div class="portlet light profile-sidebar-portlet bordered" style="min-height:350px;">
                                    <div class="profile-userpic" style="margin-top:20px;">
                                        <img class="img-responsive fotoprof" alt="" onerror="this.src='<?php echo base_url("assets/img/default-user.png");?>'">

                                    </div>
                                    <div class="profile-usertitle">
                                        <div class="profile-usertitle-name"><?php echo $user->nama; ?></div>
                                        <div class="profile-previlage">Administrator</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 edit-profil" >
                            <div class="portlet light bordered" style="min-height:350px;">
                                <div class="portlet-body">
                                <form class="form-edit-profil" action="ajax-profil.html" role="form">
                                    <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="bold">Nama <span class="text-danger">*</span></label>
                                                    <input required type="text" class="form-control" placeholder="Nama" name="form[nama]"/>
                                                </div>
                                                <div class="form-group">
                                                    <label class="bold">Email <span class="text-danger">*</span></label>
                                                    <input type="email" class="form-control" placeholder="Email" name="form[email]" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="bold">No. Handphone <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="No. Handphone" name="form[no_hp]" required maxlength="15">
                                                </div>
                                                <div class="form-group">
                                                    <label class="bold">Alamat <span class="text-danger">*</span></label>
                                                    <textarea class="form-control" placeholder="Alamat" name="form[alamat]" rows="2"required></textarea>
                                                </div>
                                                
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="bold">Jenis Kelamin <span class="text-danger">*</span></label>
                                                    <select class="select2-nosearch form-control jenis-kelamin" name="form[jk]" required style="width: 100%;">
                                                        <option value="">Pilih Jenis Kelamin</option>
                                                        <option value="1">Laki - laki</option>
                                                        <option value="2">Perempuan</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label class="bold">Jabatan <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" placeholder="Jabatan" name="form[jabatan]"  required>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="bold">Foto Profil</label>
                                                    <input type="file" class="form-control photo" name="userfile" accept="image/*">
                                                    <input type="hidden" class="input-photo" name="form[foto]">
                                                    <input type="hidden" class="old-photo">
                                                </div>
                                                <div class="form-group text-right">
                                                    <input type="hidden" class="hidden-idupdate" name="form[id_update]" value="<?php echo $user->id; ?>">
                                                    <button class="btn btn-default" type="button" onClick="backAway()">Batal</button>
                                                    <button type="submit" class="btn btn-primary ladda-button ladda-button-submit save-profil" data-style="slide-up">Simpan</button>
                                                </div>
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

        <?php $this->load->view("profil/modal/crop") ?>
        <?php $this->load->view("profil/modal/edit-password") ?>

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
        <script src="<?php echo base_url("assets/plugins/jquery-md5/jquery.md5.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/jquery-cropper/cropper.min.js"); ?>"></script>
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 

        <script>
            pagename = "administrator/ajax-user.html";
            var with_photo =  false;
            $(document).ready(function() {
                $(".jenis-kelamin").val(<?php echo $user->jk; ?>).trigger("change");

                if("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }
                documentready();
            });

            function backAway() {
                if(history.length === 1){
                    window.location = "<?php echo base_url("beranda.html")?>";
                } else {
                    history.back();
                }
            }

            $("#FrmSavePasswordProf .pass1").keyup(function() {
                $("#FrmSavePasswordProf .hidden-pass1").val($.md5($(this).val()));
            });

            $("#FrmSavePasswordProf .pass2").keyup(function() {
                $("#FrmSavePasswordProf .hidden-pass2").val($.md5($(this).val()));
            });

            var FrmSaveUserProf = $(".form-edit-profil").validate({
                submitHandler: function(form) {
                    $('.loading-profil').removeClass("hidden");
                    $('.edit-profil').addClass("hidden");
                    var base64 = $(".input-photo").val(), old_path = $(".old-photo").val();
                    if(base64 != "" && with_photo) {
                        $(".input-photo").attr('name', "form[foto]");
                        var ajaxtarget = "ajax-profil.html";
                        uploadfoto(ajaxtarget, base64, function (resp) {
                            // perbaikan: ganti method insert dengan update
                            UpdateDataAjax(form, function (resp) {
                                setTimeout(function() {
                                window.location.href = "<?php echo base_url("profil.html")?>";
                            }, 750);
                            });
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

            $(".edit-password").click(function(){
                $(".modal-save-password .modal title").html("Edit Password " + "<?php echo $user->nama; ?>");
                $(".modal-save-password").modal("show");
            });

            var FrmSavePasswordProf = $("#FrmSavePasswordProf").validate({
                submitHandler: function(form) {
                    UpdatePassword(form, function(resp) {
                        setTimeout(function() {
                            window.location.href = "<?php echo base_url("user/logout.html")?>";
                        }, 750);
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

            $(".photo").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    if(tipefile == "image/png" || tipefile == "image/jpeg" || tipefile == "image/bmp" || tipefile == "image/gif") {
                        if((this.files[0].size / 1024) < 2048){
                            var FR = new FileReader();
                            FR.addEventListener("load", function(e) {
                                // var base64 = e.target.result.replace(/^data:image\/(png|jpg|jpeg|bmp);base64,/, '');
                                // $(".input-photo").val(base64);
                                with_photo = true;
                                var base64 = e.target.result;
                                ImageCropAndResize(base64);
                                $(".modal-crop-image .modal-title").html("Edit Foto Profil");
                                $(".modal-crop-image").modal("show");
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

            $(".save-profil").click(function() {
                $(".form-edit-profil").submit();
               
            });


            function documentready(){
                with_photo = false;
                var FrmSave = $(".form-edit-profil");
                id_update = "<?php echo $user->id; ?>" ;
                $(".hidden-idupdate").val(id_update);
                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    $(".page-title .title-edit").html("<i class='fa fa-user'></i> Edit User " + resp.nama);
                    foto = ParseGambar(resp.foto);

                    if(!empty(resp.foto)) {
                        $(".input-photo, .old-photo").val(resp.foto);
                    }

                    if(resp.foto != "default.png"){
                        FrmSave.find(".fotoprof").attr('src', foto);
                    } else{
                        FrmSave.find(".fotoprof").attr('src', "<?php echo base_url("assets/img/default-user.png"); ?>");
                    }
                    FrmSave.find("input[name='form[id_user]']").val(resp.id);
                    FrmSave.find("input[name='form[nama]']").val(resp.nama);
                    FrmSave.find("textarea[name='form[alamat]']").val(resp.alamat);
                    FrmSave.find("input[name='form[no_hp]']").val(resp.no_hp);
                    FrmSave.find("input[name='form[jabatan]']").val(resp.jabatan);
                    FrmSave.find("select[name='form[jk]']").val(resp.jk).trigger("change");
                    FrmSave.find("input[name='form[email]']").val(resp.email);
                    $('.loading-profil').addClass("hidden");
                    $('.edit-profil').removeClass("hidden");
                });
            } 
            
            //Initialize Cropper Variable
            var layout = $(".crop-layout"), width  = 568, height = layout.height();
            var cropper_image = layout.find("img");
            var cropper_result;
            var cropper_option = {
                dragMode: "move",
                responsive: true,
                aspectRatio: 1 / 1, 
                cropBoxResizable: false,
                cropBoxMovable: false,
                minContainerWidth: width,
                minContainerHeight: height,
            }

            function ImageCropAndResize(base64) {
                cropper_image.attr("src", base64);
                cropper_image.cropper(cropper_option);
            }

            var FrmCropImage = $("#FrmCropImage").validate({
                submitHandler: function(form) {
                    var input = $(".input-photo");
                    l.ladda("start");
                    cropper_result = cropper_image.cropper("getCroppedCanvas");
                    cropper_result = cropper_result.toDataURL("image/png");
                    cropper_result = cropper_result.replace(/^data:image\/(png|jpg|jpeg|bmp|gif);base64,/, '');
                    input.val(cropper_result);  
      
                    $(".modal-crop-image").modal("hide");
                    l.ladda("stop");     
                }
            });

            $(".modal-crop-image a[data-dismiss]").click(function() {
                $(".crop-layout img").cropper("destroy");
                $(".photo").val("");
                $(".input-photo").val("");
            });

            $(".crop-action a").click(function() {
                var selector = $(this), data;
                data = {
                    method : selector.data("crop-method"),
                    option : selector.data("crop-value"),
                    option2: selector.data("crop-second-value")
                };

                switch (data.method) {
                    case "scaleX":
                    case "scaleY":
                        if(data.option == "-1") $(this).data("crop-value", "1");
                        else $(this).data("crop-value", "-1");
                    break;
                }

                cropper_result = cropper_image.cropper(data.method, data.option, data.option2);
            });
        </script>
    </body>
</html>
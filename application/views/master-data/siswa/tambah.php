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
        <title>Tambah Siswa | <?php echo $this->config->item("app_title"); ?></title>
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
                            <div class="col-sm-10">
                                 <div class="page-title">
                                    <h1><i class="fa fa-database"></i> Tambah Siswa</h1>
                                </div>
                                <ul class="page-breadcrumb breadcrumb col-xs-12" style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;">
                                    <li>
                                        <span class="active text-default">Master Data</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="<?php echo base_url("siswa.html");?>">Siswa</a>
                                        </span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Tambah Siswa</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <a href="#" role="button" class="btn btn-primary save-siswabaru ladda-button ladda-button-submit" data-style="slide-up" title="Simpan">
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
                        <div class="col-md-12">
                            <div class="portlet custom light bordered">
                                <div class="portlet-body">
                                    <form method="POST" action="master-data/ajax-siswa.html" class="form-horizontal form-datasiswa-baru">
                                        <div class="form-group">
                                            <center>
                                                <img class="loading-siswa hidden" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                            </center>
                                        </div>
                                        <div class="form-group add-siswa">
                                            <label class="control-label col-sm-3 bold">Foto Siswa</label>
                                            <div class=" col-sm-5 fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="<?php echo base_url("assets/img/default-user.png"); ?>" alt="" class="foto-siswa"> </div>
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
                                        <div class="form-group add-siswa">
                                            <label class="control-label col-sm-3 bold">NIS <span class="text-danger">*</span></label>
                                            <div class="col-sm-5">
                                                <input required type="text" class="form-control" placeholder="Nomor Induk Siswa" name="form[nis]" autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group add-siswa">
                                            <label class="control-label col-sm-3 bold">NISN </label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" placeholder="Nomor Induk Siswa Nasional" name="form[nisn]"/>
                                            </div>
                                        </div>
                                        <div class="form-group add-siswa">
                                            <label class="control-label col-sm-3 bold">Nama <span class="text-danger">*</span></label>
                                            <div class="col-sm-5">
                                                <input required type="text" class="form-control siswa-nama" placeholder="Nama Lengkap" name="form[nama]"/>
                                            </div>
                                        </div>
                                        <div class="form-group add-siswa">
                                            <label class="control-label col-sm-3 bold">Nama Panggilan <span class="text-danger">*</span></label>
                                            <div class="col-sm-5">
                                                <input required type="text" class="form-control siswa-nama_pgl" placeholder="Nama Panggilan" name="form[nama_pgl]"/>
                                            </div>
                                        </div>
                                        <div class="form-group add-siswa">
                                            <label class="control-label col-sm-3 bold">Jenis Kelamin <span class="text-danger">*</span></label>
                                            <div class="col-sm-5">
                                                <select required style="width: 100%;" class="select2-normal select2-nosearch dropdown-jeniskelamin" name="form[jk]" required>
                                                    <option class="selected" value="">Pilih Jenis Kelamin</option>
                                                    <option class="selected" value="1">Laki - laki</option>
                                                    <option value="2">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group add-siswa">
                                            <label class="control-label col-sm-3 bold">Kelas <span class="text-danger">*</span></label>
                                            <div class="col-sm-5">
                                                <select style="width: 100%;" class="select2-normal dropdown-kelas" name="form[id_kelas]" required>
                                                    <option value="">Pilih Kelas</option>
                                                    <?php print_r($dropdownkelas->lsdt) ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group add-siswa">
                                            <label class="control-label col-sm-3 bold"> Email</label>
                                            <div class="col-sm-5">
                                                <input type="email" class="form-control" placeholder="Email" name="form[email]" >
                                            </div>
                                        </div>
                                        <div class="form-group add-siswa">
                                            <label class="control-label col-sm-3 bold">No HP</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" placeholder="No Handphone" name="form[no_hp]" maxlength="15" onkeypress='return validatedata(event)'/>
                                            </div>
                                        </div>
                                        <div class="form-group add-siswa">
                                            <label class="control-label col-sm-3 bold">Alamat</label>
                                            <div class="col-sm-5">
                                                <textarea style="resize: vertical;" type="text" class="form-control" placeholder="Alamat Lengkap" name="form[alamat]"></textarea>
                                            </div>
                                        </div>
                                        <div class="row add-siswa">
                                            <div class="col-md-8 text-right">
                                                <button type="button" onclick="backAway()" class="btn btn-default" >Batal</button>
                                                <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up"><i class="fa fa-save"></i> Simpan</button>
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
        <script src="<?php echo base_url("assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js"); ?>"></script>
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 
        <script>
            pagename = "master-data/ajax-siswa.html";

            $(document).ready(function() {               
                if("<?php echo $user->foto; ?>" == "default.png") {
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

            function documentnotready(){
                $('.loading-siswa').addClass("hidden");
                $('.add-siswa').removeClass("hidden");
            }

            $(".siswa-nama").keyup(function() {
                var value = $(this).val();
                    value = value.split(/\s+/).slice(0,1);

                $(".siswa-nama_pgl").val(value);
            });

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
                    };
                    image.src = readerEvent.target.result;
                }); 
                FR.readAsDataURL(this.files[0]);   
            });

            $(".delete-foto").click(function() {
                $(".photo").val("");
                $(".input-photo").val("");
            });
            
            var FrmSaveWebsite = $(".form-datasiswa-baru").validate({
                submitHandler: function(form) {
                    $('.loading-siswa').removeClass("hidden");
                    $('.add-siswa').addClass("hidden");
                    var base64 = $(".input-photo").val();
                    if(base64 != "") {
                        $(".input-photo").attr('name', "form[foto]");
                        var ajaxtarget = "master-data/ajax-siswa.html";
                        uploadfoto(ajaxtarget, base64, function(resp) {
                            InsertDataAjax(form, function(resp){
                                if (!resp.isError) {
                                     setTimeout(function() {
                                        window.location.href = "<?php echo base_url("siswa.html")?>";
                                    }, 750);
                                }
                            }); 
                            
                        }, "uploadfoto");
                    } else {
                        $(".input-photo").val("");
                        InsertDataAjax(form, function(resp) {
                            if (!resp.isError) {
                                 setTimeout(function() {
                                    window.location.href = "<?php echo base_url("siswa.html")?>";
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

            $(".save-siswabaru").click(function() {
                $(".form-datasiswa-baru").submit();
            });

            function documentready(){
            }
        </script>
    </body>
</html>
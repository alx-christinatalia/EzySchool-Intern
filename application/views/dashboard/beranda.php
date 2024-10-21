<?php
$user = $this->session->userdata("user");
// print_r($this->session->userdata("user"));
// print_r($this->session->userdata("user_login"));
// print_r($this->session->userdata("sekolah"));
$sekolah = $this->session->userdata("sekolah")->Data[0];
$date = date("Y-m-d");
$jenjang = "";

if ($sekolah->jenjang == "TK") {
    $jenjang = "Taman Kanak-Kanak";
} else if ($sekolah->jenjang == "SD") {
    $jenjang = "Sekolah Dasar";
} else if ($sekolah->jenjang == "SMP") {
    $jenjang = "Sekolah Menengah Pertama";
} else if ($sekolah->jenjang == "SMA") {
    $jenjang = "Sekolah Menengah Atas";
} else if ($sekolah->jenjang == "SMK") {
    $jenjang = "Sekolah Menengah Kejuruan";
} else if ($sekolah->jenjang == "PT") {
    $jenjang = "Perguruan Tinggi";
} else if ($sekolah->jenjang == "KR") {
    $jenjang = "Kursus";
}
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Beranda | <?php echo $this->config->item("app_title"); ?></title>
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

        <style type="text/css">
            .text-blue{
                color: #337ab7;
            }

            .cover-img{
                height: 200px;
                width: 100%;
                display: block;
            }
            
            .cover-img img{
                height: 100%;
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
                            <div class="col-md-10 col-sm-10 col-xs-10">
                                <div class="page-title">
                                    <h1><i class="fa fa-home"></i> Beranda</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="base-content">
                        <div class="portlet light bordered" style="min-height: 550px;">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="portlet light" style="padding: 0px">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <span class="caption-subject bold uppercase font-dark">Profil Sekolah</span>
                                            </div>
                                            <a role="button" class="btn btn-default pull-right" href="<?php echo base_url("profil_sekolah.html"); ?>">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </div>
                                        <div class="portlet-body">

                                            <center>
                                                <img style="width: 50%" class="foto-sekolah" onerror="this.src='<?php echo base_url("assets/img/default-sekolah.png");?>'">
                                                <br>
                                                <label style="font-size: 18px;" class="bold margin-bottom-10"><?php echo $sekolah->nama; ?></label>
                                            </center>
                                            <ul class="list-group">
                                                <li class="list-group-item "> 
                                                    <div class="profile-desc-link">
                                                        <div class="row">
                                                            <div class="col-sm-1 col-xs-2">
                                                                <i class="icon-graduation"></i>
                                                            </div>
                                                            <div class="col-sm-11 col-xs-10">
                                                                <?php echo $jenjang ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="list-group-item">  
                                                    <div class="profile-desc-link">
                                                        <div class="row">
                                                            <div class="col-sm-1 col-xs-2">
                                                                <i class="icon-phone "></i>
                                                            </div>
                                                            <div class="col-sm-11 col-xs-10">
                                                                <?php echo $sekolah->telepon; ?>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </li>
                                                <li class="list-group-item">  
                                                    <div class="profile-desc-link">
                                                        <div class="row">
                                                            <div class="col-sm-1 col-xs-2">
                                                                <i class="glyphicon glyphicon-map-marker"></i>
                                                            </div>
                                                            <div class="col-sm-11 col-xs-10">
                                                                <?php echo $sekolah->alamat; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item">    
                                                    <div class=" profile-desc-link">
                                                        <div class="row">
                                                            <div class="col-sm-1 col-xs-2">
                                                                <i class="icon-globe "></i>
                                                            </div>
                                                            <div class="col-sm-11 col-xs-10">
                                                                <?php echo!empty($sekolah->website) ? "<a href='$sekolah->website' target='blank' >$sekolah->website</a>" : "-" ?>
                                                            </div>
                                                        </div>
                                                    </div> 

                                                </li>
                                                <li class="list-group-item">    
                                                    <div class="profile-desc-link">
                                                        <div class="row">
                                                            <div class="col-sm-1 col-xs-2">
                                                                <i class="icon-envelope"></i>
                                                            </div>
                                                            <div class="col-sm-11 col-xs-10">
                                                                <?php echo!empty($sekolah->email) ? $sekolah->email : "-" ?>
                                                            </div>
                                                        </div>
                                                    </div> 
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7 col-sm-12 col-xs-12">
                                    <div class="portlet light" style="padding: 0px;margin-bottom: 0px;">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <span class="caption-subject bold uppercase font-dark">Pengumuman</span>
                                            </div>
                                            <a role="button" class="btn btn-default pull-right" href="<?php echo base_url("pengumuman.html"); ?>">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pengumuman-beranda list-group">
                                                        <div class="text-center loading">
                                                            <img width="30" height="30" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 berita hidden">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span class="caption-subject bold uppercase font-dark">Berita</span>
                                        </div>
                                        <a role="button" class="btn btn-default pull-right" href="<?php echo base_url("berita.html"); ?>">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row">
                                            <div class="berita-beranda list-group">
                                                <div class="text-center loading">
                                                    <img width="30" height="30" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 sambutan hidden">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <span class="caption-subject bold uppercase font-dark">Sambutan Kepala Sekolah</span>
                                        </div>
                                        <a role="button" class="btn btn-default pull-right" href="<?php echo base_url("profil_sekolah.html#khusus"); ?>">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="row"> 
                                            <div class="col-md-3 col-sm-4 col-xs-12"  style="float:right;">
                                                <center>
                                                    <img style="width: 80%" src="" class="foto-kepsek img-responsive">
                                                    <hr>
                                                    <span class="profile-desc-title text-center"><?php echo $sekolah->kepsek_nama; ?></span>   
                                                    <hr>
                                                </center>
                                            </div> 
                                            <div class="col-md-9 col-sm-8 col-xs-12" style="float:right;">
                                                <p class="profile" align="justify"><?php echo $sekolah->sambutan_kepsek; ?></p>

                                            </div>
                                        </div>
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

<?php //$this->load->view("kunci/modal/modal")  ?>

    <!--[if lt IE 9]>
    <script src="../assets/global/plugins/respond.min.js"></script>
    <script src="../assets/global/plugins/excanvas.min.js"></script> 
    <script src="../assets/global/plugins/ie8.fix.min.js"></script> 
    <![endif]-->

    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script> 
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script> 

    <script src="<?php echo base_url("assets/plugins/counterup/jquery.waypoints.js"); ?>"></script>
    <script src="<?php echo base_url("assets/plugins/counterup/jquery.counterup.js"); ?>"></script>
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

    <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
    <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
    <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
    <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
    <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 
    <!-- END THEME GLOBAL SCRIPTS -->



    <script>

        pagename = "berita/ajax-berita.html";
        $(document).ready(function () {
            if ("<?php echo $user->foto; ?>" == "default.png") {
                $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
            } else {
                foto = ParseGambar("<?php echo $user->foto; ?>");
                foto = foto.replace("original", "small");
                $(".fotoprof").attr("src", foto);
            }
            
            pagename = "administrator/ajax_profil_sekolah.html";
            
            getdatabyid("<?php echo $sekolah->id; ?>",function(resp){
            
            resp = resp.Data[0];
            if(!empty(resp.sambutan_kepsek)){
                $(".sambutan").removeClass("hidden");
            }
                
            if (resp.kepsek_foto == "default.png"){
                $(".foto-kepsek").attr('src', "<?php echo base_url("assets/img/default-user.png"); ?>");
            } else{
                foto = ParseGambar(resp.kepsek_foto);
                $(".foto-kepsek").attr('src', foto);
            }
            
            if (resp.logo == "default.png"){
                $(".foto-sekolah").attr('src', "<?php echo base_url("assets/img/default-sekolah.png"); ?>");
            } else {
                foto = ParseGambar(resp.logo);
                $(".foto-sekolah").attr('src', foto);
            }
            });
            
            $(".foto-sekolah").error(function (){
                $(".foto-sekolah").attr('src', "<?php echo base_url("assets/img/default-sekolah.png"); ?>");
            });
            $(".foto-kepsek").error(function (){
                $(".foto-kepsek").attr('src',"<?php echo base_url("assets/img/default-user.png"); ?>");
            });
            $(".foto-berita").error(function (){
                $(".foto-berita").attr('src', "<?php echo base_url("assets/img/default-berita.jpg"); ?>");
            });


            pagename = "berita/ajax-berita.html";
            GetData("","getberitaberanda",function (resp){
                if(resp.paging.Count == 3){
                    $(".berita").removeClass("hidden");
                    $(".berita-beranda").html(resp.lsdt);
                }
            });
            pagename = "pengumuman/ajax-pengumuman.html";
            GetData("","getpengumumanberanda",function (resp){
                $(".pengumuman-beranda").html(resp.lsdt);
            });
        });
        
    </script>
</body>
</html>
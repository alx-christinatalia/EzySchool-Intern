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
        <title>404 Halaman tidak tersedia | <?php echo $this->config->item("app_title"); ?></title>
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="" name="description">

        <link href="<?php echo base_url("assets/css/font.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/ladda/ladda-themeless.min.css"); ?>" rel="stylesheet">

        <link href="<?php echo base_url("assets/css/components-rounded.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/plugins.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/layout.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/default.min.css"); ?>" id="style_color" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/responsive.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/error.min.css"); ?>" rel="stylesheet">

        <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-32x32.png"); ?>" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-16x16.png"); ?>" sizes="16x16" />
        <style type="text/css">
            .vertical-center {
                position: relative;
                top: 50%;
                -webkit-transform: translateY(-50%);
                -ms-transform: translateY(-50%);
                transform: translateY(-50%);
            }
            .number {
                top: 30px !important;
                font-size: 175px !important;
            } 
        </style>
    </head><!-- END HEAD -->
    <body class="page-container-bg-solid page-sidebar-closed-hide-logo page-sidebar-closed">
        <?php $this->load->view("other/header") ?>

        <div class="page-container">
            <?php //$this->load->view("other/sidebar") ?>
            <div class="page-content-wrapper">
                <div class="page-content" style="height: 555px;">
                    <div class="base-content" style="height: 100%">
                        <div class="page-404 vertical-center">
                            <div class="number font-green"> 404 </div>
                            <div class="details">
                                <h3>Halaman Tidak Tersedia</h3>
                                <p style="margin-top: 0px;">
                                    Kami tidak dapat menemukan halaman yang anda cari.
                                    <br/>
                                    <a href="<?php echo base_url("beranda.html"); ?>" class="btn btn-danger" style="margin-top: 10px;">
                                        <i class="fa fa-arrow-left"></i> Kembali ke Beranda
                                    </a>
                                </p>
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
        <script src="<?php echo base_url("assets/plugins/ladda/spin.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.jquery.min.js"); ?>"></script> 

        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 
        <script type="text/javascript">
            if("<?php echo $user->foto; ?>" == "default.png") {
                $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
            } else {
                foto = ParseGambar("<?php echo $user->foto; ?>");
                $(".fotoprof").attr("src", foto);
            }
        </script>
    </body>
</html>
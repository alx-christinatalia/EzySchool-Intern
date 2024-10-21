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
        <title>Chat | <?php echo $this->config->item("app_title"); ?></title>
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
        <link href="<?php echo base_url("assets/css/chat.css"); ?>" rel="stylesheet">

        <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-32x32.png"); ?>" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-16x16.png"); ?>" sizes="16x16" />
    </head><!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <?php $this->load->view("other/header") ?>

        <div class="page-container">
            <?php $this->load->view("other/sidebar") ?>
            <div class="page-content-wrapper">
                <div class="page-content" style="min-height: 400px;">
                    <!-- <div class="page-head">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="page-title">
                                    <h1><i class="fa fa-comments-o"></i> Chat</h1>
                                </div>
                            </div>
                        </div>
                    </div -->
                    <div class="base-content" style="margin-top: 0px;">
                        <div class="portlet custom light bordered" style="padding: 0px;">
                            <div class="row">
                                <div class="col-md-4" style="padding-right:0">
                                    <div class="col-xs-12 bg-grey" style="height: 80px; border-right: 1px solid #ecf0f1; padding-top: 20px; float:left; box-shadow: 0 3px 2px -2px grey; z-index: 999; " >
                                        <div class="portlet-title">
                                            <form id="FrmSearchRoom">
                                                <div class="input-icon right">
                                                    <i class="icon-magnifier"></i>
                                                    <input type="text" class="form-control search" placeholder="Pencarian (Nama Siswa, Pesan Terakhir)" autofocus title="Pencarian (Nama Siswa, Pesan Terakhir)">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="height: 440px; border-top: 1px solid #ecf0f1; border-right: 1px solid #ecf0f1; padding: 0px; ">
                                        <div id="slimtest1">
                                            <div class="kirim-pesan">
                                                <a role="button" class="btn btn-danger btn-block pesan-baru" style="border-radius: 0px;">
                                                    <i class="fa fa-users"></i> Buat Pesan Baru
                                                </a>
                                            </div>
                                            <div class="daftar-room"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8" style="padding-left:0">
                                    <input type="hidden" class="n_induk">
                                    <div class="col-xs-12 bg-grey title" style="height: 80px; vertical-align: middle; padding-top: 10px; padding-left:15; float:right ; box-shadow: 0 3px 2px -2px grey; z-index: 999;">
                                        <div class="row">
                                            <div class="col-xs-10">
                                                <div class="nama-siswa">Chatting</div>
                                                <div class="kelas-alamat">Pilih Pesan untuk Memulai</div>
                                            </div>
                                            <div class="col-xs-2">
                                                <button class="btn btn-refresh btn-primary pull-right disabled refresh-data">
                                                    <i class="fa fa-refresh"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12" style="height: 370px; border-top: 1px solid #ecf0f1; padding: 0px; overflow: ">
                                        <div id="slimtest2">
                                            <ul class="chats daftar-chat" style="margin: 0;"></ul>
                                        </div>
                                        <div class="chat-form" style="border-top: 1px solid #ecf0f1; margin-top: 14px; background-color: whitesmoke;">
                                            <form id="FrmChatAdd">
                                                <div class="input-cont"> 
                                                    <input class="form-control pesan" type="text" placeholder="Ketik pesan disini ..." disabled required autofocus>
                                                </div>
                                                <div class="btn-cont">
                                                    <span class="arrow"> </span>
                                                    <button class="btn blue icn-only">
                                                        <i class="fa fa-paper-plane icon-white"></i>
                                                    </button>
                                                </div>
                                            </form>
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

        <?php $this->load->view("chatting/modal/pilihsiswa") ?>

        <!--[if lt IE 9]>
        <script src="../assets/global/plugins/respond.min.js"></script>
        <script src="../assets/global/plugins/excanvas.min.js"></script> 
        <script src="../assets/global/plugins/ie8.fix.min.js"></script> 
        <![endif]-->

        <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script> 

        <script src="<?php echo base_url("assets/plugins/moment.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/js.cookie.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/jquery.blockui.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/bootstrap-switch/bootstrap-switch.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/toastr/toastr.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/select2/select2.full.min.js"); ?>"></script>

        <!-- Jquery Validate + Ladda Button -->
        <script src="<?php echo base_url("assets/plugins/validate/jquery.validate.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/ladda/spin.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/ladda/ladda.jquery.min.js"); ?>"></script> 

        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/chat.js"); ?>"></script> 

        <!-- Jquery Slimscroll -->
        <script src="<?php echo base_url("assets/plugins/scroll/jquery.slimscroll.js"); ?>"></script> 

        <script>
            $(document).ready(function () {

                $("#slimtest1").slimScroll({
                    height: "auto",
                    size: "5px",
                    wheelStep: 5,
                });

                $("#slimtest2").slimScroll({
                    height: "auto",
                    size: "5px",
                    wheelStep: 5,
                    start: "bottom",
                });

                if ("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }
            });
        </script>
    </body>
</html>
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

        <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-32x32.png"); ?>" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-16x16.png"); ?>" sizes="16x16" />
        <style>
            .ktk {
                background-color: whitesmoke;
                border-bottom: 1px solid lightgrey;
                padding-top: 15px;
                height: 75px;
                width: 325px;
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
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="page-title">
                                    <h1><i class="fa fa-comments-o"></i> Chat</h1>
                                </div>
                            </div>
                        </div>
                    </div
                    <br>
                    <div class="base-content">
                        <div class="portlet custom light bordered" style="padding: 0px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4" style="height: 75px; border-right: 1px solid lightgrey; padding-top: 20px;">
                                        <div class="portlet-title">
                                            <div class="input-icon right">
                                                <i class="icon-magnifier"></i>
                                                <input type="text" class="form-control input-circle" placeholder="Pencarian..." style="width: 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="height: 75px; vertical-align: middle; padding-top: 20px;">
                                        <label class="bold customer"><font size="5">Lisa Wong</font></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-4" style="height: 605px; border-top: 1px solid lightgrey; border-right: 1px solid lightgrey; padding: 0px;">
                                        <div id="slimtest1">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="ktk">
                                                        <div class="col-md-2">
                                                            <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>" style="height:45px; width:45px;">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label class="bold customer">Lisa Wong</label>
                                                                    </div>
                                                                    <div class="col-md-6 pull-right">
                                                                        <span class="datetime pull-right"> 20:11 </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-9">
                                                                        <label class="short_message">Lorem ipsum dolor...</label>
                                                                    </div>
                                                                    <div class="col-md-3 pull-left">
                                                                        <span class="badge">2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ktk">
                                                        <div class="col-md-2">
                                                            <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>" style="height:45px; width:45px;">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label class="bold customer">Lisa Wong</label>
                                                                    </div>
                                                                    <div class="col-md-6 pull-right">
                                                                        <span class="datetime pull-right"> 20:11 </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-9">
                                                                        <label class="short_message">Lorem ipsum dolor...</label>
                                                                    </div>
                                                                    <div class="col-md-3 pull-left">
                                                                        <span class="badge">2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ktk">
                                                        <div class="col-md-2">
                                                            <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>" style="height:45px; width:45px;">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label class="bold customer">Lisa Wong</label>
                                                                    </div>
                                                                    <div class="col-md-6 pull-right">
                                                                        <span class="datetime pull-right"> 20:11 </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-9">
                                                                        <label class="short_message">Lorem ipsum dolor...</label>
                                                                    </div>
                                                                    <div class="col-md-3 pull-left">
                                                                        <span class="badge">2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ktk">
                                                        <div class="col-md-2">
                                                            <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>" style="height:45px; width:45px;">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label class="bold customer">Lisa Wong</label>
                                                                    </div>
                                                                    <div class="col-md-6 pull-right">
                                                                        <span class="datetime pull-right"> 20:11 </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-9">
                                                                        <label class="short_message">Lorem ipsum dolor...</label>
                                                                    </div>
                                                                    <div class="col-md-3 pull-left">
                                                                        <span class="badge">2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ktk">
                                                        <div class="col-md-2">
                                                            <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>" style="height:45px; width:45px;">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label class="bold customer">Lisa Wong</label>
                                                                    </div>
                                                                    <div class="col-md-6 pull-right">
                                                                        <span class="datetime pull-right"> 20:11 </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-9">
                                                                        <label class="short_message">Lorem ipsum dolor...</label>
                                                                    </div>
                                                                    <div class="col-md-3 pull-left">
                                                                        <span class="badge">2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ktk">
                                                        <div class="col-md-2">
                                                            <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>" style="height:45px; width:45px;">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label class="bold customer">Lisa Wong</label>
                                                                    </div>
                                                                    <div class="col-md-6 pull-right">
                                                                        <span class="datetime pull-right"> 20:11 </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-9">
                                                                        <label class="short_message">Lorem ipsum dolor...</label>
                                                                    </div>
                                                                    <div class="col-md-3 pull-left">
                                                                        <span class="badge">2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ktk">
                                                        <div class="col-md-2">
                                                            <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>" style="height:45px; width:45px;">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label class="bold customer">Lisa Wong</label>
                                                                    </div>
                                                                    <div class="col-md-6 pull-right">
                                                                        <span class="datetime pull-right"> 20:11 </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-9">
                                                                        <label class="short_message">Lorem ipsum dolor...</label>
                                                                    </div>
                                                                    <div class="col-md-3 pull-left">
                                                                        <span class="badge">2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ktk">
                                                        <div class="col-md-2">
                                                            <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>" style="height:45px; width:45px;">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label class="bold customer">Lisa Wong</label>
                                                                    </div>
                                                                    <div class="col-md-6 pull-right">
                                                                        <span class="datetime pull-right"> 20:11 </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-9">
                                                                        <label class="short_message">Lorem ipsum dolor...</label>
                                                                    </div>
                                                                    <div class="col-md-3 pull-left">
                                                                        <span class="badge">2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ktk">
                                                        <div class="col-md-2">
                                                            <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>" style="height:45px; width:45px;">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label class="bold customer">Lisa Wong</label>
                                                                    </div>
                                                                    <div class="col-md-6 pull-right">
                                                                        <span class="datetime pull-right"> 20:11 </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-9">
                                                                        <label class="short_message">Lorem ipsum dolor...</label>
                                                                    </div>
                                                                    <div class="col-md-3 pull-left">
                                                                        <span class="badge">2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="ktk">
                                                        <div class="col-md-2">
                                                            <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>" style="height:45px; width:45px;">
                                                        </div>
                                                        <div class="col-md-10">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-6">
                                                                        <label class="bold customer">Lisa Wong</label>
                                                                    </div>
                                                                    <div class="col-md-6 pull-right">
                                                                        <span class="datetime pull-right"> 20:11 </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="col-md-9">
                                                                        <label class="short_message">Lorem ipsum dolor...</label>
                                                                    </div>
                                                                    <div class="col-md-3 pull-left">
                                                                        <span class="badge">2</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8" style="height: 605px; border-top: 1px solid lightgrey; padding: 0px; overflow: ">
                                        <div id="slimtest2">
                                            <ul class="chats">
                                                <li class="out">
                                                    <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>">
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a class="name"> SMKN 100 Malang </a>
                                                        <span class="datetime"> 19.56 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="out">
                                                    <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>">
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a class="name"> SMKN 100 Malang </a>
                                                        <span class="datetime"> 19.58 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="in">
                                                    <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>">
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a class="name"> Lisa Wong </a>
                                                        <span class="datetime"> 20.00 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="in">
                                                    <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>">
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a class="name"> Lisa Wong </a>
                                                        <span class="datetime"> 20:01 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="out">
                                                    <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>">
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a class="name"> SMKN 100 Malang </a>
                                                        <span class="datetime"> 19.56 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="out">
                                                    <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>">
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a class="name"> SMKN 100 Malang </a>
                                                        <span class="datetime"> 19.58 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="in">
                                                    <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>">
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a class="name"> Lisa Wong </a>
                                                        <span class="datetime"> 20.00 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                                <li class="in">
                                                    <img class="avatar" alt="" src="<?php echo base_url("assets/img/default-user.png"); ?>">
                                                    <div class="message">
                                                        <span class="arrow"> </span>
                                                        <a class="name"> Lisa Wong </a>
                                                        <span class="datetime"> 20:01 </span>
                                                        <span class="body"> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="chat-form" style="border-top: 1px solid lightgrey; margin-top: 16px; background-color: whitesmoke;">
                                            <div class="input-cont"> 
                                                <input class="form-control" type="text" placeholder="Tuliskan pesan disini..."> </div>
                                            <div class="btn-cont">
                                                <span class="arrow"> </span>
                                                <a href="" class="btn blue icn-only">
                                                    <i class="fa fa-paper-plane icon-white"></i>
                                                </a>
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

        <!-- Jquery Slimscroll -->
        <script src="<?php echo base_url("assets/plugins/scroll/jquery.slimscroll.js"); ?>"></script> 

        <script>
            $(document).ready(function() {

                $('#slimtest1, #slimtest2').slimScroll({
                    height: 'auto',
                    size: '5px',
                    wheelStep: 5,
                });

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
        </script>
    </body>
</html>
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
        <title>Tambah Hak Akses | <?php echo $this->config->item("app_title"); ?></title>
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
                            <div class="col-sm-8">
                                <div class="page-title">
                                    <h1 class="title-edit"><i class="fa fa-user"></i> Tambah Hak Akses</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="col-xs-12 page-breadcrumb breadcrumb">
                                    <li>
                                        <span class="active text-default">Administrator</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="<?php echo base_url("manajemen_user.html");?>">Manajemen Hak Akses</a>
                                        </span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" class="button-reload" onclick="location.reload();">Tambah Hak Akses</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-4 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <a role="button" role="button" class="btn btn-primary simpandata ladda-button ladda-button-submit" data-style="slide-up" title="Simpan">
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
                                    <form class="form-horizontal form-tambah-roles" action="administrator/ajax-hak-akses.html">
                                        <div class="form-group add-pegawai">
                                            <label class="control-label col-md-2 bold">Nama Hak Akses  <span class="text-danger">*</span></label>
                                            <div class="col-md-5">
                                                <input type="text" class="form-control" placeholder="Nama Hak Akses" name="form[nama]" required autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group add-pegawai">
                                            <label class="control-label col-md-2 bold">Catatan</label>
                                            <div class="col-md-5">
                                                <textarea class="form-control" placeholder="Catatan" rows="5" name="form[catatan]"></textarea>
                                            </div>
                                        </div>

                                        <div class="div-hakakses">
                                            <div class="table-hakakses">
                                                <table class="table table-striped table-hover table-responsive list-hakakses" style="margin-bottom: 5px;">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center" style="width: 5%;">No.</th>
                                                            <th>Daftar Menu</th>
                                                            <th class="text-center" style="width: 150px;">Hak Akses 
                                                                <div class="mt-repeater-input mt-checkbox-inline pull-right" style="padding: 0px; align-items: center;">
                                                                    <label class="mt-checkbox">
                                                                        <input type="checkbox" class="checkall">
                                                                        <span></span>
                                                                    </label>
                                                                </div>
                                                            </th>
                                                            <th class="text-center" style="width: 4%;"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $list_menu = $this->config->item("menu_list");

                                                            $html = ""; $no1 = 1;
                                                            foreach ($list_menu as $key => $value) {
                                                                $chevron = !empty($value) ? '<a role="button" class="text-danger chevron"><i class="fa fa-chevron-right"></a>': "";
                                                                $checkhak_akses = empty($value) ? "checkhak_akses": "";

                                                                $html .= "<tr class='menu' data-menu='".$no1."' style='background-color: #F5F5F5;'>";
                                                                $html .= '
                                                                    <td class="text-center"><b>'.$no1.'.</b></td>
                                                                    <td>Menu '.$key.'</td>
                                                                    <td class="text-center">
                                                                        <div class="mt-repeater-input mt-checkbox-inline" style="padding: 0px 0px 5px 10px; align-items: center;">
                                                                            <label class="mt-checkbox">
                                                                                <input type="checkbox" class="'.$checkhak_akses.' checkhak_aksesmenu" value="'.$no1.'">
                                                                                <span></span>
                                                                            </label>
                                                                        </div>
                                                                    </td>
                                                                    <td>'.$chevron.'</td>
                                                                ';
                                                                $html .= "</tr>";

                                                                if(!empty($value)) {
                                                                    $no2 = 1;
                                                                    foreach ($value as $index => $text) {
                                                                        $html .= "<tr class='submenu-".$no1." hidden'>";
                                                                        $html .= '
                                                                            <td class="text-center"></td>
                                                                            <td><b>'.$no1.'.'.$no2.'.</b> '.$text.'</td>
                                                                            <td class="text-center">
                                                                                <div class="mt-repeater-input mt-checkbox-inline" style="padding: 0px 0px 5px 10px; align-items: center;">
                                                                                    <label class="mt-checkbox">
                                                                                        <input type="checkbox" class="checkhak_akses checkhak_aksessubmenu" value="'.$no1.'.'.$no2.'">
                                                                                        <span></span>
                                                                                    </label>
                                                                                </div>
                                                                            </td>
                                                                            <td></td>
                                                                        ';
                                                                        $html .= "</tr>";
                                                                        $no2++;
                                                                    }
                                                                }
                                                                $no1++;
                                                            }

                                                            echo $html;
                                                        ?>
                                                    </tbody>
                                                </table>
                                                <div class="text-right margin-top-10">
                                                    <button type="button" onclick="backAway()" class="btn btn-default">Batal</button> 
                                                    <button type="submit" class="btn btn-primary simpandata ladda-button ladda-button-submit" data-style="slide-up"><i class="fa fa-save"></i> Simpan</button>
                                                </div>
                                                <input type="hidden" class="hak_akses" name="form[hak_akses]">
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
            pagename = "administrator/ajax-hak-akses.html";
            $(document).ready(function() {
                if("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }

                checkhak_akses();
                $(".checkhak_akses").click(function() {
                    checkhak_akses();
                });

                $(".checkall").click(function() {
                    var selector = $(this);
                    if(selector.is(":checked")) {
                        $(".list-hakakses tr").each(function(index, item) {
                            $(".checkhak_akses").prop("checked", true);
                            $(".checkhak_aksesmenu").prop("checked", true);
                        });
                    } else {
                        $(".list-hakakses tr").each(function(index, item) {
                            $(".checkhak_akses").prop("checked", false);
                            $(".checkhak_aksesmenu").prop("checked", false);
                        });
                    }
                    checkhak_akses();
                });
            });

            $(".checkhak_aksesmenu").click(function() {
                var selector = $(this), value = selector.val();
                if(selector.is(":checked")) {
                    for(i = 1; i <= 10; i++) {
                        $(".checkhak_aksessubmenu[value='"+value+"."+i+"']").prop("checked", true);
                    }
                } else {
                    for(i = 1; i <= 10; i++) {
                        $(".checkhak_aksessubmenu[value='"+value+"."+i+"']").prop("checked", false);
                    }
                }
                checkhak_akses();
            });

            $(".checkhak_aksessubmenu").click(function() {
                var selector = $(this), 
                    value = selector.val(),
                    value = value.split(".");

                var menu_check = false;
                for(i = 1; i <= 10; i++) {
                    var selector2 = $(".checkhak_aksessubmenu[value='"+value[0]+"."+i+"']");
                    if(selector2.is(":checked")) {
                        menu_check = true;
                        $(".checkhak_aksesmenu[value='"+value[0]+"']").prop("checked", true);
                        return;
                    } else {
                        menu_check = false;
                    }     

                    if(menu_check == false) $(".checkhak_aksesmenu[value='"+value[0]+"']").prop("checked", false);         
                }
            });

            $("tr.menu").click(function() {
                var selector = $(this), menu = selector.data("menu");
                if(selector.hasClass("open")) {
                    $(".submenu-"+menu).addClass("hidden");
                    selector.find(".chevron > .fa").addClass("fa-chevron-right")
                    selector.find(".chevron > .fa").removeClass("fa-chevron-down");
                    selector.removeClass("open");
                } else {
                    $(".submenu-"+menu).removeClass("hidden");
                    selector.find(".chevron > .fa").removeClass("fa-chevron-right")
                    selector.find(".chevron > .fa").addClass("fa-chevron-down");
                    selector.addClass("open");
                }
            });

            function backAway() {
                if(history.length === 1){
                    window.location = "<?php echo base_url("beranda.html")?>";
                } else {
                    history.back();
                }
            }

            function checkhak_akses() {
                var allVals = [];
                $(".checkhak_akses").each(function() {
                    var selector = $(this);
                    if(selector.is(":checked")) {
                        allVals.push(selector.val());
                    }
                });

                allVals = allVals.join(",");
                $(".hak_akses").val(allVals);
            }

            var FrmSaveWebsite = $(".form-tambah-roles").validate({
                submitHandler: function(form) {
                    InsertData(form, function(resp) {
                        if(resp.IsError == false) {
                            setTimeout(function() {
                                window.location.href = "<?php echo base_url("manajemen_hak_akses.html"); ?>";
                            }, 3000)
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

            $(".simpandata").click(function() {
                $(".form-tambah-roles").submit();
            });
        </script>
    </body>
</html>
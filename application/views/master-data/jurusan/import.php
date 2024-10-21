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
        <title>Import Jurusan | <?php echo $this->config->item("app_title"); ?></title>
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
    </head><!-- END HEAD -->
    <body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
        <?php $this->load->view("other/header") ?>
        <div class="page-container">
            <?php $this->load->view("other/sidebar") ?>
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-head">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="page-title">
                                    <h1><i class="fa fa-database"></i> Import Jurusan</h1>
                                </div>
                            </div>
                            <div class="col-md-8 col-sm-6 col-xs-12 text-right">
                                <div class="pencarian-layout form-inline">
                                    <div class="form-group text-center">
                                        <a href="#" role="button" class="btn btn-primary save-jurusanimport">
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
                                <a href="<?php echo base_url("jurusan.html");?>">Jurusan</a>
                            </span>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active text-default">
                                <a href="#" onclick="location.reload();">Import Jurusan</a>
                            </span>
                        </li>
                    </ul>
                    <div class="base-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet custom light bordered">
                                    <div class="portlet-body">
                                        <div class="table-container">
                                            <form class="form-horizontal form-tambah-jurusan" action="master-data/ajax-jurusan.html" role="form">
                                                <div class="mt-repeater">
                                                    <table class="table table-hover table-responsive">
                                                        <thead>
                                                            <tr class="bg-grey-steel">
                                                                <th style="width: 150px;">ID</th>
                                                                <th>Nama</th>
                                                                <th style="width: 30px;" class="text-center"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody data-repeater-list="data[items]" id="mt-repeater-tbody">
                                                                <tr data-repeater-item class="mt-repeater-item">
                                                                    <td>
                                                                        <div class="mt-repeater-input">
                                                                            <input type="text" class="form-control" name="form[id]">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mt-repeater-input">
                                                                            <input type="text" class="form-control" name="form[nama]">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <center>
                                                                            <div class="mt-repeater-input mt-delete">
                                                                                <a role="button" data-repeater-delete class="mt-repeater-delete"><i class="fa fa-trash"></i></a>
                                                                            </div>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                        </tbody>
                                                    </table>
                                                <a data-repeater-create role="button" class="btn blue-madison btnTambah"><i class="fa fa-plus"></i> Tambah Data</a>
                                                </div>
                                            </form>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pagination-layout hidden">
                            <div class="row">
                                <div class="col-md-3 col-sm-4 col-xs-9">
                                    <div class="form-group">
                                        <div class="input-group paging">
                                            <span class="input-group-btn">
                                                <a role="button" class="btn btn-primary input-sm disabled first"><i class="fa fa-step-backward"></i></a>
                                                <a role="button" class="btn btn-primary input-sm disabled prev"><i class="fa fa-chevron-left"></i></a>
                                            </span>
                                            <form id="FrmGotoPage">
                                                <input type="text" class="form-control input-sm text-center" value="1">
                                            </form>
                                            <span class="input-group-btn">
                                                <a role="button" class="btn btn-primary input-sm disabled next"><i class="fa fa-chevron-right"></i></a>
                                                <a role="button" class="btn btn-primary input-sm disabled last"><i class="fa fa-step-forward"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 hidden-sm hidden-xs">
                                    <div class="form-group">
                                        <div class="info text-right">1 - 10 dari 264 Data | 27 Halaman</div>
                                    </div>
                                </div>
                                <div class="col-md-1 hidden-sm hidden-xs">
                                    <div class="form-group">
                                        <select class="form-control select2-nosearch input-sm limit" style="width: 100%;">
                                            <option value="10" selected>10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
            <?php $this->load->view("other/footer") ?>
        </div>
        
        <?php $this->load->view("master_data/jurusan/modal/import") ?>

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
        <script src="<?php echo base_url("assets/plugins/serializeJSON/jquery.serializejson.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/scripts/form-repeater.js"); ?>"></script>
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 
        <script>
            pagename = "master-data/ajax-jurusan-import.html";
            $(document).ready(function() {
                var FrmSave = $(".form-tambah-jurusan");
                var id_update = "<?php echo $this->input->post("FileExcel"); ?>"; //"2|/738190/EzySchool-Template.xlsx"
                tempeldata(id_update, FrmSave);
                
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
            
            function tempeldata(id_update, FrmSave) {
                $(".hidden-idupdate").val(id_update);
                getdatabyid(id_update, function(resp) {
                    var jumdata = (resp.Data.length - 1);
                    $.each(resp.Data, function(index, item) {
                        if(index < jumdata) {
                            $(".btnTambah").click();
                            FrmSave.find("input[name='data[items]["+index+"][id]']").val(item.id);
                            FrmSave.find("input[name='data[items]["+index+"][nama]']").val(item.nama);
                        } else {
                            FrmSave.find("input[name='data[items]["+index+"][id]']").val(item.id);
                            FrmSave.find("input[name='data[items]["+index+"][nama]']").val(item.nama);
                        }
                    });
                });
            }

            var FrmSaveWebsite = $(".form-tambah-jurusan").validate({
                submitHandler: function(form) {
                    var actionForm = $(form).attr("action");
                    var valueJSON  = $(form).serializeJSON();console.log(valueJSON);
                        valueJSON  = valueJSON.data;
                        

                    var datSis = {};    
                    $.each(valueJSON.items, function(index, item) {
                        if(!empty(item.nama)) {
                            var stringify = !empty(item.value) ? jsonstringify(item.value): "";
                            datSis = {act: "insertdatarepeat", req: {"id": item.id, "nama": item.nama}};
                            InsertRepeaterData(datSis, actionForm);
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

            $(".save-jurusanimport").click(function() {
                $(".form-tambah-jurusan").submit();
            });
            /*if(prosesstart = "mulai") {
            $(".dropdown-jurusan").on("change", function() {
                
                    var index = $(this).parents(".mt-repeater-item").index();
                    index = index + 1;
                    var id_jurusan = $(this).val();
                    $('.mt-repeater-item:nth-child('+index+') .dropdown-jurusan').find('.mt-repeater-item:nth-child('+index+') .dropdown-kelas').val(getdatadropdownkelas_parent('',id_jurusan, index)).trigger("change");
                
            });
            }*/
            /*pagename = "ajax-pengguna";
            $(document).ready(function() {
                GetData(request);
            });

            $("#FrmFilter").submit(function() {
                var status = $(this).find(".is_active").val(), sort = $(this).find(".sort").val();
                request["Sort"] = sort;
                request["filter"]["status"] = status; 
                GetData(request);
                return false;
            });
            */

           /* //Save Website
            var FrmSaveWebsite = $("#FrmSaveWebsite").validate({
                submitHandler: function(form) {
                   InsertData(form, function(resp) {
                        ReloadTable();
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

            //Save Group
            var FrmSaveGroup = $("#FrmSaveGroup").validate({
                submitHandler: function(form) {
                    var idupdate = $(form).find(".hidden-idupdate").val();
                    if(idupdate.length) {
                        UpdateData(form, function(resp) {
                            ReloadTable();
                            getdatadropdowngroup();
                        });
                    } else {
                        InsertData(form, function(resp) {
                            ReloadTable();
                            getdatadropdowngroup();
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

            function ReloadTable() {
                GetSidebar(function(resp) { $("#count1").html(resp.paging.Total); });
                GetData(request);
            }

            $(".datatable tbody").on("click", ".edit-data", function() {
                resetformvalue("#FrmSave");
                
                var FrmSave = $("#FrmSaveGroup");
                var id_update = $(this).data("idupdate");
                $(".hidden-idupdate").val(id_update);
                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    FrmSave.find("input[name='form[id_update]']").val(resp.id);
                    FrmSave.find("input[name='form[id_group]']").val(resp.id_group);
                    FrmSave.find(".hidden-idgroup").val(resp.id_group);
                    FrmSave.find("input[name='form[nama]']").val(resp.nama_group);
                    FrmSave.find("textarea[name='form[catatan]']").val(resp.catatan);
                });
                $(".modal-save-group .modal-title").html("Edit Group");
                $(".modal-save-group").modal("show");
            });*/

            
        </script>
    </body>
</html>
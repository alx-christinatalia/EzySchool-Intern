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
        <title>Periode Absensi | <?php echo $this->config->item("app_title"); ?></title>
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
                            <div class="col-sm-6 ">
                                <div class="page-title">
                                    <h1><i class="fa fa-address-book"></i> Periode Absensi</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="col-xs-12 page-breadcrumb breadcrumb">
                                    <li>
                                        <span class="active text-default">Absensi</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Periode Absensi</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-6 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <a role="button" class="btn btn-primary tambah-periode" title="Tambah Periode">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" data-toggle="collapse" data-target=".filter" title="Filter Data">
                                            <i class="fa fa-filter"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" onclick="location.reload();" title="Refresh">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                        <span class="pagination-layout">
                                            <a role="button" class="btn btn-primary disabled prev" title="Daftar Sebelumnya">
                                                <i class="fa fa-chevron-left"></i>
                                            </a>    
                                            <a role="button" class="btn btn-primary disabled next" title="Daftar Selanjutnya">
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div style="margin-bottom: -10px;" class="filter in col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <!-- FrmFilter -->
                                    <form id="FrmFilter" role="form">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6">
                                                <div class="form-group">
                                                    <label>Tahun</label>
                                                    <select style="width: 100%;" class="select2-nosearch dropdown-tahun tahun">
                                                        <option value="">Pilih Tahun</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-xs-6" style="vertical-align: bottom;">
                                                <div class="form-group">
                                                    <label>&nbsp;</label><br>
                                                    <button class="btn btn-primary">Tampilkan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="portlet custom light bordered">
                                <div class="portlet-body">
                                    <div class="table-container table-responsive">
                                        <table class="table table-striped table-hover datatable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 200px; text-align: left;"> Periode Bulan </th>
                                                    <th style="width: 200px;"> Periode Tahun </th>
                                                    <th style="width: 100px;text-align: left;"> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="10" class="text-center loading">
                                                        <img src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
            <?php $this->load->view("other/footer") ?>
        </div>
        
        <?php $this->load->view("absensi/modal/tambah-periode") ?>

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
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 
        <script>
            pagename = "absensi/ajax-absensi-periode.html";
            $(document).ready(function() {
                var date = new Date().getFullYear();
                for(i = date; i > date - 10; i--){
                    $(".dropdown-tahun").append("<option value=" + i + ">" + i + "</option>");
                }

                $(".tahun").val(new Date().getFullYear()).trigger("change");
                // $(".bulan").val(new Date().getMonth() + 1).trigger("change");
                $("#FrmFilter").submit();

                $(".tambah-periode").on("click", function() {
                    resetformvalue("#FrmAddPeriode");
                    $(".tahun").val(new Date().getFullYear()).trigger("change");
                    $(".modal-tambah-periode .modal-title").html("Tambah Periode Absensi");
                    $(".modal-tambah-periode").modal("show");
                });
                
                if("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }
            });

            $("#FrmFilter").submit(function() {
                var tahun = $(this).find(".tahun").val(), bulan = $(this).find(".bulan").val();
                request["filter"]["tahun"] = tahun; 
                // request["filter"]["bulan"] = bulan;
                GetData(request);
                return false;
            });

            // $(".semester").on("change", function() {
            //     if($(this).val() == 1){
            //         $(".bulan").html("<option value=''>Pilih Bulan</option><option value='7'>Juli</option><option value='8'>Agustus</option><option value='9'>September</option><option value='10'>Oktober</option><option value='11'>November</option><option value='12'>Desember</option>");
            //     }
            //     else {
            //         $(".bulan").html("<option value=''>Pilih Bulan</option><option value='1'>Januari</option><option value='2'>Februari</option><option value='3'>Maret</option><option value='4'>April</option><option value='5'>Mei</option><option value='6'>Juni</option>");
            //     }
            // });

            //Sync Periode
            $(".datatable tbody").on("click", ".sync-data", function() {
                $(".modal-alert-sync .image-gif").removeClass("hidden");
                $(".modal-alert-sync .data-sync").removeClass("label-success");
                $(".modal-alert-sync .data-sync").removeClass("label-danger");

                var tahun = $(this).data("idtahun");
                var bulan = $(this).data("idbulan");

                $.ajax({
                    type: "POST",
                    url: base_url + "/ajax/absensi/ajax-absensi-periode",
                    data: {act:"sinkronisasi", req: {"tahun": tahun, "bulan": bulan}},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function(resp){
                        if(resp.IsError == false) {
                            toastrshow("success", "Periode "+bulan+"-"+tahun+" : "+resp.Output, "Success");
                        } else {
                            toastrshow("error", "Periode "+bulan+"-"+tahun+" : "+resp.ErrMessage, "Error");
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
            });
            
            //Save Periode
            var FrmAddPeriode = $("#FrmAddPeriode").validate({
                submitHandler: function(form) {
                    var cek = 0, success = 0, error = 0;
                    $("#FrmAddPeriode input:checked").each(function() {
                        $.ajax({
                            type: "POST",
                            url: base_url + "/ajax/absensi/ajax-absensi-periode",
                            data: {act: "insertdata", req: {"tahun": $(".tahun").val(), "bulan": $(this).val()}},
                            dataType: "JSON",
                            tryCount: 0,
                            retryLimit: 3,
                            beforeSend: function() {
                                l.ladda("start");
                            },
                            success: function(resp){
                                l.ladda("stop");
                                if(resp.IsError == false) {
                                    cek++; success++; console.log("Check: " + cek); console.log("Success: " + success);
                                    toastrshow("success", "Data berhasil disimpan", "Success");
                                    $(".modal-tambah-periode").modal("hide");


                                    $(".tahun").val(new Date().getFullYear()).trigger("change");
                                    // $(".bulan").val(new Date().getMonth() + 1).trigger("change");
                                    $("#FrmFilter").submit();     
                                } else {
                                    cek++; error++; console.log("Check: " + cek); console.log("Error: " + error);
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
                    });

                    // if ((success + error) == cek) {
                    //     if(success == cek){
                    //         toastrshow("success", "Data berhasil disimpan", "Success");
                    //     }
                    //     else if (error == cek) {
                    //         toastrshow("error", "Data gagal disimpan", "Error");
                    //     }
                    //     toastrshow("warning", "Periksa kembali data yang telah dimasukkan", "Warning");
                    // }            
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
        </script>
    </body>
</html>
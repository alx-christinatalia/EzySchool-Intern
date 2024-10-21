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
        <title>Detail Tagihan | <?php echo $this->config->item("app_title"); ?></title>
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
        <style>
            .font15{
                font-size: 15px;
            }
            .table-info>tbody>tr>td{
                 border-top: none; 
                 border-bottom: 1px solid #e7ecf1; 
            }
            .table-info{
                margin-bottom: 0px;
            }
        </style>
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
                            <div class="col-xs-10">
                                <div class="page-title col-xs-12">
                                    <h1 class="title-edit"><i class="fa fa-money"></i> Detail Tagihan</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb">
                                    <li>
                                        <span class="active text-default">Keuangan</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">Tagihan</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="<?php echo base_url("tagihan.html"); ?>">Daftar</a>
                                        </span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Detail</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-2 text-right">
                                <div class="form-inline">
                                    <div class="form-group text-center">
                                        <!-- <a href="#" role="button" class="btn btn-primary save-siswabaru">
                                            <i class="fa fa-save"></i>
                                        </a> -->
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

                    <!--informasi siswa--> 
                    <div class="portlet custom light bordered content-1 hidden">
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="col-sm-12 loading-datasiswa1">
                                        <center>
                                            <img style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                        </center>
                                    </div>
                                    <div class="data-siswa1 hidden">
                                        <center>
                                            <img class="foto-siswa" style="width: 125px" src="<?php echo base_url("assets/img/default-user.png"); ?>">
                                            <br><br>
                                            <label style="font-size: 20px;" class="bold text-nama"></label>
                                        </center>
                                        <ul class="list-group">
                                            <li class="list-group-item "> 
                                                <div class="profile-desc-link">
                                                    <i class="fa fa-id-card"></i> <label class="text-nis"></label>
                                                </div>
                                            </li>
                                            <li class="list-group-item "> 
                                                <div class="profile-desc-link">
                                                    <i class="fa fa-venus-mars"></i> <label class="text-jk"></label>
                                                </div>
                                            </li>
                                            <li class="list-group-item "> 
                                                <div class="profile-desc-link">
                                                    <i class="fa fa-columns"></i> <label class="text-id_kelas"></label>
                                                </div>
                                            </li>
                                            <li class="list-group-item">  
                                                <div class="profile-desc-link">
                                                    <i class="icon-phone "></i> <label class="text-no_hp"></label>
                                                </div> 
                                            </li>
                                            <li class="list-group-item">    
                                                <div class="profile-desc-link">
                                                    <i class="icon-envelope"></i> <label class="text-email"></label>
                                                </div> 
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--[END] informasi siswa-->
                                <!--informasi tagihan--> 
                                <div class="col-sm-8">  
                                    <div class="col-sm-12 loading-datasiswa">
                                        <center>
                                            <img style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                        </center>
                                    </div>
                                    <div class="data-siswa hidden">
                                        <table class="table table-info">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 150px"><label class="bold font15">Nomor Tagihan</label></td>
                                                    <td style="width: 10px"><label class="bold font15">:</label></td>
                                                    <td><label class="text-id_tagihan"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label class="bold font15">Uraian Tagihan</label></td>
                                                    <td><label class="bold font15">:</label></td>
                                                    <td><label class="text-nama_tagihan"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label class="bold font15">Kategori</label></td>
                                                    <td><label class="bold font15">:</label></td>
                                                    <td><label class="text-kategori_nama"></label></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 150px"><label class="bold font15">Tgl Dibuat</label></td>
                                                    <td style="width: 10px"><label class="bold font15">:</label></td>
                                                    <td><label class="text-tgl_tagihan"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label class="bold font15">Tgl Jatuh Tempo</label></td>
                                                    <td><label class="bold font15">:</label></td>
                                                    <td><label class="text-tgl_jatuh_tempo"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label class="bold font15">Waktu insert</label></td>
                                                    <td><label class="bold font15">:</label></td>
                                                    <td><label class="text-tgl_insert"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label class="bold font15">Total Tagihan</label></td>
                                                    <td><label class="bold font15">:</label></td>
                                                    <td><label class="text-jml"></label></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 150px"><label class="bold font15">Status</label></td>
                                                    <td style="width: 10px"><label class="bold font15">:</label></td>
                                                    <td><label class="text-status"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label class="bold font15">Publish</label></td>
                                                    <td><label class="bold font15">:</label></td>
                                                    <td><label class="text-is_published"></label></td>
                                                </tr>
                                                <tr>
                                                    <td><label class="bold font15">Keterangan</label></td>
                                                    <td><label class="bold font15">:</label></td>
                                                    <td><label class="text-keterangan"></label></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row content-2 hidden">  
                        <!--[END] informasi tagihan-->
                        <!--riwayat pembayaran-->
                        <div class="col-xs-12">
                            <div class="portlet custom light bordered">
                                <div class="portlet-title">
                                    <label style="font-size: 25px;" class="bold"><i class="fa fa-history"></i> Riwayat Pembayaran</label>
                                </div>
                                <div class="portlet-body">
                                    <div class="table-container">
                                        <table class="table table-striped table-hover datatable">
                                            <thead>
                                                <tr>
                                                    <th class="col-xs-1"> No Pembayaran</th>
                                                    <th class="col-xs-1"> No Referensi </th>
                                                    <th class="col-xs-1"> Tgl Bayar </th>
                                                    <th class="col-xs-1"> Cara Bayar </th>
                                                    <th class="col-xs-1"> Jml Bayar </th>
                                                    <th class="col-xs-1"> Sisa Tagihan </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="10" class="text-center"><span class="label label-warning">Tidak ada data</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!--paging-->
                            <div class="pagination-layout">
                                <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-9">
                                        <div class="form-group">
                                            <div class="input-group paging">
                                                <span class="input-group-btn">
                                                    <a role="button" class="btn btn-primary input-sm disabled first"><i class="fa fa-step-backward"></i></a>
                                                    <a role="button" class="btn btn-primary input-sm disabled prev"><i class="fa fa-chevron-left"></i></a>
                                                </span>
                                                <form id="FrmGotoPage">
                                                    <input type="text" name="page" class="form-control input-sm text-center" value="1">
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
                        <!--[END] riwayat pembayaran-->
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
        <script src="<?php echo base_url("assets/plugins/moment-locale-id.js"); ?>"></script> 
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
            pagename = "keuangan/ajax-tagihan.html";
            var id_update = "<?php echo $this->input->get('id'); ?>";

            $(document).ready(function () {
                if ("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto.replace('original', 'small'));
                }

                if(!empty(id_update)) {
                    GetDataDetailTagihan();
                } else {
                    $(".hasil-error .ket").html("<center><span class='label label-warning'>ID Tagihan tidak valid</span></center>");
                }
            });

            function GetDataDetailTagihan() {
                getdatabyid(id_update, function (resp) {
                    if(resp.IsError == true) {
                        $(".hasil-error .ket").html("<center><span class='label label-warning'>"+ resp.ErrMessage +"</span></center>");
                        return;
                    }
                    if(empty(resp.Data)) {
                        $(".hasil-error .ket").html("<center><span class='label label-warning'>Tidak ada data Tagihan</span></center>");
                        return;
                    }
                    $(".content-1, .content-2").removeClass("hidden");
                    $(".hasil-error").addClass("hidden");

                    var resp = resp.Data[0];
                    $(".page-title .title-edit").html("<i class='fa fa-database'></i> Detail Tagihan " + resp.siswa_nama);

                    if (resp.foto == "default.png" || resp.foto == null || resp.foto == "") {
                        $(".foto-siswa").attr('src', "<?php echo base_url("assets/img/default-user.png"); ?>");
                    } else {
                        foto = ParseGambar(resp.foto);
                        $(".foto-siswa").attr('src', foto);
                    }
                    $(".text-nama").html(resp.siswa_nama);

                    $(".text-nis").html(resp.nis);
                    if (resp.jk == "1") {
                        var jk = "Laki - laki";
                    }
                    if (resp.jk == "2") {
                        var jk = "Perempuan";
                    }
                    $(".text-jk").html(jk);
                    $(".text-id_kelas").html(resp.kelas_nama);
                    $(".text-alamat").html(resp.alamat);
                    $(".text-no_hp").html(resp.no_hp);
                    $(".text-email").html(resp.email);
                    $(".text-nama_tagihan").html(resp.nama);

                    $(".text-id_tagihan").html(resp.id_tagihan);
                    $(".text-kategori_nama").html(resp.kategori_nama);
                    if (resp.status == 0 && (new Date(resp.tgl_jatuh_tempo).getTime()) > $.now()) {
                        var status = "<span class='label label-info'>Akan Datang</span>";
                    } else if (resp.status == 0) {
                        var status = "<span class='label label-danger'>Belum Dibayar</span>";
                    } else if (resp.status == 1) {
                        var status = "<span class='label label-warning'>Sudah Dibayar / Angsur</span>";
                    } else if (resp.status == 2) {
                        var status = "<span class='label ' style='background-color: #4CAF50;'>Lunas</span>";
                    }
                    $(".text-status").html(status);
                    $(".text-keterangan").html(CheckStrip(resp.keterangan));

                    if (resp.is_published == 0) {
                        var publish = "<span class='label label-warning'>Tidak Publish</span>";
                    } else if (resp.is_published == 1) {
                        var publish = "<span class='label label-success'>Publish</span>";
                    }
                    $(".text-is_published").html(publish);
                    jml = resp.jml.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                    jml_bayar = resp.jml_bayar.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                    $(".text-jml").html("Rp. " + jml);
                    $(".text-jml_bayar").html("Rp. " + jml_bayar);

                    tgl1 = moment(resp.tgl_tagihan, "YYYY-MM-DD HH:mm:ss").format('DD MMM YYYY');
                    tgl2 = moment(resp.tgl_jatuh_tempo, "YYYY-MM-DD HH:mm:ss").format('DD MMM YYYY');
                    tgl3 = moment(resp.tgl_telat, "YYYY-MM-DD HH:mm:ss").format('DD MMM YYYY');
                    tgl4 = moment(resp.tgl_insert, "YYYY-MM-DD HH:mm:ss").format('DD MMM YYYY HH:mm');
                    $(".text-tgl_tagihan").html(CheckStrip(tgl1));
                    $(".text-tgl_jatuh_tempo").html(CheckStrip(tgl2));
                    $(".text-tgl_telat").html(CheckStrip(tgl3));
                    $(".text-tgl_insert").html(CheckStrip(tgl4));

                    request["filter"]["id_tagihan"] = resp.id_tagihan;
                    request["total-tagihan"] = resp.jml;
                    GetData(request, "listdatatransaksihtml");


                    $('.loading-datasiswa, .loading-datasiswa1').addClass("hidden");
                    $('.data-siswa, .data-siswa1').removeClass("hidden");
                });
            }
            $(".foto-siswa").error(function () {
                $(".foto-siswa").attr('src', "<?php echo base_url("assets/img/default-user.png"); ?>")
            });
        </script>
    </body>
</html>
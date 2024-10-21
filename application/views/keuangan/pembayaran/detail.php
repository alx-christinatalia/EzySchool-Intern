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
        <title>Detail Pembayaran | <?php echo $this->config->item("app_title"); ?></title>
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
            .table>tfoot>tr>td, .table>tfoot>tr>th {
                padding: 8px;
            }
            hr{
                margin: 5px 0;
            }
            .table-info>tbody>tr>td{
                 border-top: none; 
                 border-bottom: 1px solid #e7ecf1; 
            }
            .table-siswa{
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
                                    <h1 class="title-edit"><i class="fa fa-money"></i> Detail Pembayaran</h1>
                                </div>
                                <ul class="page-breadcrumb breadcrumb">
                                    <li>
                                        <span class="active text-default">Keuangan</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">Pembayaran</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="<?php echo base_url("pembayaran/riwayat.html"); ?>">Riwayat</a>
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
                                <div class="pencarian-layout form-inline">
                                    <div class="form-group text-center">
                                        <!-- <a href="#" role="button" class="btn btn-primary save-siswabaru">
                                            <i class="fa fa-save"></i>
                                        </a> -->
                                        <a role="button" class="btn btn-primary" onclick="location.reload();">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php if(!empty($this->input->get("id"))) { ?>
                        <?php if(!$list->IsError) { ?>
                            <?php if(!empty($list->Data)) { ?>
                            <div class="portlet custom light bordered">
                                <div class="portlet-body">
                                    <div class="row data-pembayaran">
                                        <div class="col-sm-6">
                                            <table class="table table-info table-siswa">
                                                <tbody>
                                                    <tr>
                                                        <td class="bold col-sm-3 col-xs-4"><span>NIS</span></td>
                                                        <td class="bold" style="width: 10px"><span>:</span></td>
                                                        <td><?php echo $nis ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold" ><span>Nama</span></td>
                                                        <td class="bold" ><span>:</span></td>
                                                        <td><?php echo $nama ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold" ><span>Kelas</span></td>
                                                        <td class="bold" ><span>:</span></td>
                                                        <td><?php echo $kelas ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold" ><span>Petugas</span></td>
                                                        <td class="bold" ><span>:</span></td>
                                                        <td><?php echo $pegawai ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-sm-6">
                                            <table class="table table-info">
                                                <tbody>
                                                    <tr>
                                                        <td class="bold col-sm-3 col-xs-4"><span>Tgl Bayar</span></td>
                                                        <td class="bold" style="width: 10px"><span>:</span></td>
                                                        <td><?php echo $tgl_bayar ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold" ><span>No Bayar</span></td>
                                                        <td class="bold" ><span>:</span></td>
                                                        <td><?php echo $no_bayar ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold" ><span>Cara Bayar</span></td>
                                                        <td class="bold" ><span>:</span></td>
                                                        <td><?php echo $cara_bayar ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="bold" ><span>Catatan</span></td>
                                                        <td class="bold" ><span>:</span></td>
                                                        <td><?php echo $uraian ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">  
                                <!--riwayat pembayaran-->
                                <div class="col-xs-12">
                                    <div class="portlet custom light bordered">
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="table-responsive">
                                                        <div>
                                                            <table class="table table-striped table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="col-xs-4">No Tagihan</th>
                                                                        <th class="col-xs-4">Nama Tagihan</th>
                                                                        <th class="col-xs-2"></th>
                                                                        <th class="col-xs-2 text-right"> Jumlah </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    $total_bayar = 0;
                                                                    if (isset($list->Data)) {
                                                                        foreach ($list->Data as $item) {
                                                                            $total_bayar += $item->jml_bayar;
                                                                            echo "<tr><td><a href='". base_url('tagihan/detail.html?id').$item->id_tagihan ."'>$item->id_tagihan </a></td>";
                                                                            echo "<td>$item->tagihan_nama </td>";
                                                                            echo "<td class='text-right'>Rp </td>";
                                                                            echo "<td class=\"text-right\">" . $this->foglobal->formatAngka($item->jml_bayar) . "</td> </tr>";
                                                                        }
                                                                    } else {
                                                                        echo "<tr><td colspan='4' class='text-center'>-</td></tr>";
                                                                    }
                                                                    ?>
                                                                </tbody>
                                                                <tfoot class="bg-grey-steel">
                                                                    
                                                                <tr>
                                                                    <td class="text-right" colspan="9">
                                                                        <div class="col-lg-6 col-lg-push-6 col-sm-6 col-sm-push-6">
                                                                            <div class="row">
                                                                                <div class="" style="font-size: 18px;">
                                                                                    <label class="label-control col-lg-7 col-sm-6 col-xs-8 bold">
                                                                                        <span class="sisa-tagihan bold">Total Bayar</span>
                                                                                    </label>
                                                                                    <div class="col-lg-5 col-sm-6 col-xs-4 text-right total-bayar bold" style="padding-right: 0px;">
                                                                                        Rp <?php echo $this->foglobal->formatAngka($total_bayar) ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12" >
                                                    <button class="btn btn-primary pull-right cetak"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--[END] riwayat pembayaran-->
                            </div>
                            <?php } else { ?>
                                <div class="portlet custom light bordered">
                                    <div class="portlet-body">
                                        <div class="loading-hasil" style="margin-bottom: 3px;">
                                            <center>
                                                <span class="label label-warning">Tidak ada data pembayaran</span>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="portlet custom light bordered">
                                <div class="portlet-body">
                                    <div class="loading-hasil" style="margin-bottom: 3px;">
                                        <center>
                                            <span class="label label-warning"><?php echo $list->ErrMessage; ?></span>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <div class="portlet custom light bordered">
                            <div class="portlet-body">
                                <div class="loading-hasil" style="margin-bottom: 3px;">
                                    <center>
                                        <span class="label label-warning">No Pembayaran tidak valid</span>
                                    </center>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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
            var id_cetak = "<?php echo $this->input->get('id'); ?>";
            $(document).ready(function () {
                if ("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto.replace('original', 'small'));
                }

                $(".fotoprof").error(function () {
                    $(".fotoprof").attr('src', "<?php echo base_url("assets/img/default-user.png"); ?>")
                });
                
            });
            $(".cetak").click(function(){
                window.open("<?php echo base_url('pembayaran/cetak.html?id='.$this->input->get('id'))?>", "", "width=800,height=400", "false");
            });
        </script>
    </body>
</html>
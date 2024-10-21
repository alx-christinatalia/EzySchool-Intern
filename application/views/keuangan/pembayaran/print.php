<?php
$user = $this->session->userdata("user");

$sekolah = $this->session->userdata("sekolah")->Data[0];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Bukti Pembayaran - <?php echo $list->Data[0]->no_pembayaran ?> - <?php echo $sekolah->nama; ?></title>
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="" name="description">

        <link href="<?php echo base_url("assets/css/font.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/font-awesome.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet">
        <style>
            @media print{
                @page {
                    size: A5 landscape;   /* auto is the initial value */
                    margin: 0mm;  /* this affects the margin in the printer settings */
                    margin-top: 10mm;
                }
                body {
                    margin-top: 5px;
                }
            }
            .table{
                margin-bottom: 0px;
                overflow:hidden;
            }
            .table-detail>tbody>tr>td, .table-detail>tbody>tr>th{
                padding: 2px;
                border:0;
            }
            .table-tagihan>thead>tr, .table>thead>tr>th, .table-tagihan>tbody{
                border-top:1px solid black;
                border-bottom:1px solid black;
                padding: 0 0 10px 0;
            }
            body {
                border-color: grey !important;
                font-size: 12px;
            }
            .table td, .table thead tr th {
                font-size: 12px;
                margin: 1px;
                padding: 0;
            }
            hr{
                border: 0;
                border-top: 1px solid black;
                border-bottom: 0;
                margin: 2px 0;
            }
            .table>tbody>tr>td {
                padding: 0px;
                line-height: 1.42857;
                vertical-align: top;
                border-top: 1px solid white;
            }
            .table-detail, .table-siswa {
                margin: 3px 0px;
            }
            .table-tagihan>tbody>tr>td {
                padding: 3px 0px;
            }
            .table-tagihan>tbody>tr:not(:last-child)>td {
                border-bottom: 1px solid #ecf0f1;
            }
            .wrapper{
                margin: auto;
                width: 700px;
            }
            .line-ttd:before {
                content: "";
                border-bottom: 1px solid black;
                width: 160px;
                position: absolute;
                bottom: 0px;
                left: 15px;
            }
        </style>
        <link rel="shortcut icon" href="<?php echo base_url("assets/img/favicon.ico"); ?>">
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-32x32.png"); ?>" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon-16x16.png"); ?>" sizes="16x16" />
    </head><!-- END HEAD -->
    <body onLoad="printit()">
        <!--<body >-->
        <div class="wrapper bg-white">
            <div class="row">
                <div class="col-xs-8">
                    <h4><strong><?php echo $sekolah->nama ?></strong></h4>
                    <p style="margin-bottom: 0"><?php echo $sekolah->alamat ?></p>
                </div>
                <div class="col-xs-4">
                    <h4 class=" pull-right" style="border:1px dashed; padding:5px; margin:5px 0;"> Bukti Pembayaran</h4>
                    <h6 class=" pull-right" style="margin: 0px"> EzySchool. Powered By EzyPay</h6>
                </div>
            </div>
            <hr>   
            <div class="row">
                <div class="col-xs-5">
                    <table class="table table-siswa">
                        <tbody>
                            <tr>
                                <td><span>NIS</span></td>
                                <td><span>:</span></td>
                                <td><?php echo $nis ?></td>
                            </tr>
                            <tr>
                                <td style="width: 100px"><span>Nama</span></td>
                                <td style="width: 10px"><span>:</span></td>
                                <td><?php echo $nama ?></td>
                            </tr>
                            <tr>
                                <td><span>Kelas</span></td>
                                <td><span>:</span></td>
                                <td><?php echo $kelas ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-offset-2 col-xs-5">
                    <table class="table table-detail">
                        <tbody>
                            <tr>
                                <td style="width: 100px"><span>Tgl Bayar</span></td>
                                <td style="width: 10px"><span>:</span></td>
                                <td><?php echo $tgl_bayar ?></td>
                            </tr>
                            <tr>
                                <td><span>No Pembayaran</span></td>
                                <td><span>:</span></td>
                                <td><?php echo $no_bayar ?></td>
                            </tr>
                            <tr>
                                <td><span>Cara Bayar</span></td>
                                <td><span>:</span></td>
                                <td><?php echo $cara_bayar ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-responsive">
                        <div>
                            <table class="table table-tagihan">
                                <thead>
                                    <tr>
                                        <th class="col-xs-4">No Tagihan</th>
                                        <th class="col-xs-5">Nama Tagihan</th>
                                        <th class="col-xs-1"></th>
                                        <th class="col-xs-3 text-right"> Jumlah </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $total_bayar = 0;
                                    if (isset($list->Data)) {
                                        foreach ($list->Data as $item) {
                                            $total_bayar += $item->jml_bayar;
                                            echo "<tr><td>$item->id_tagihan </td>";
                                            echo "<td>$item->tagihan_nama </td>";
                                            echo "<td style='width:20px'>Rp </td>";
                                            echo "<td class=\"text-right\">" . $this->foglobal->formatAngka($item->jml_bayar) . "</td> </tr>";
                                        }
                                    } else {
                                        echo "<tr><td colspan='4' class='text-center'>-</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
                </div>
            </div>
            <div class="row" style="margin-top:5px;">
                <div class="col-xs-3">
                    <div class="text-center">
                        <span>Penyetor</span><br/><br/><br/>
                        <span class="line-ttd text-center">&nbsp;</span>
                    </div>
                </div>
                <div class="col-xs-3">
                    <div class="text-center">
                        <span>Petugas</span><br/><br/><br/>
                        <span class="line-ttd text-center"><?php echo $pegawai ?></span>
                    </div>
                </div>
                <div class="col-xs-offset-2 col-xs-4">
                    <div class="row">
                        <div >
                            <label class="span-control col-xs-6">
                                <span >Total : Rp</span>
                            </label>
                            <div class="col-xs-6 text-right"><?php echo $this->foglobal->formatAngka($total_bayar) ?>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="col-xs-12" style="margin-top: 5px;">
                    <span>Catatan: </span><br>
                    <span><?php echo $uraian ?></span>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        function printit(){  
            if (window.print) {
                window.print() ;
                window.close();  
            } else {
                window.close();  
            }
        }
    </script>
</html>
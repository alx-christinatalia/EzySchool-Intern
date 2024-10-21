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
        <title>Konfirmasi Pembayaran | <?php echo $this->config->item("app_title"); ?></title>
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
            .content-detail {
                margin-bottom: 0px
            }
            .content-detail .list-group-item:first-child {
                border-radius: 0px;
            }
            .content-detail .list-group-item:last-child {
                border-radius: 0px;
                border-bottom: none;
            }
            .content-detail2 .list-group-item:first-child {
                border-radius: 0px;
                border-top: 0px;
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
                            <div class="col-sm-5">
                                <div class="page-title">
                                    <h1><i class="fa fa-tasks"></i> Konfirmasi Pembayaran</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
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
                                            <a onclick="location.reload();">Konfirmasi</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-7 text-right">
                                <div class="form-inline">
                                    <div class="form-group" style="margin-bottom:15px;">
                                        <form id="FrmSearch">
                                            <div class="input-group input-search">
                                                <input type="text" placeholder="Cari (Nama Tagihan, Rekening Asal, Rekening Tujuan, Nis, Nama Siswa)" class="form-control kywd" autofocus title="Cari (Nama)"> 
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="form-group" style="margin-bottom:15px;">
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
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch is_active">
                                                        <option value="0">Menuggu Konfirmasi</option>
                                                        <option value="1">Sukses</option>
                                                        <option value="2">Dibatalkan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Kelas</label>
                                                    <select style="width:100%;" class="form-control select2-normal dropdown-kelas filter-kelas"  class="form">
                                                        <option value="">Semua Kelas</option>
                                                        <?php print_r($dropdownkelas->lsdt) ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Urutkan</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch sort" class="form">
                                                        <option value="tgl_insert desc">Default</option>
                                                        <option value="tgl_bayar asc">Tgl Bayar [A-Z]</option>
                                                        <option value="tgl_bayar desc">Tgl Bayar [Z-A]</option>
                                                        <option value="jml_bayar asc">Total Bayar [A-Z]</option>
                                                        <option value="jml_bayar desc">Total Bayar [Z-A]</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="vertical-align: bottom;">
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
                                                    <th style="width: 50xp;" class="text-center"> Action </th>
                                                    <th>Nama Tagihan </th>
                                                    <th>Nama Siswa</th>
                                                    <th>Atas Nama</th>
                                                    <th class="text-right">Total Bayar</th>
                                                    <th>Bukti</th>
                                                    <th>Tgl Bayar</th>
                                                    <th>Tgl Konfirmasi</th>
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
                        <div class="col-md-12">
                            <div class="pagination-layout hidden">
                                <div class="row">
                                    <div class="col-sm-4 col-xs-8">
                                        <div class="form-group" style="max-width: 250px;">
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
                                    <div class="col-md-7 hidden-sm hidden-xs">
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
            </div>
             
            <?php $this->load->view("other/footer") ?>
        </div>

        <?php $this->load->view("keuangan/konfirmasi/modal/detail"); ?>
        <?php $this->load->view("keuangan/konfirmasi/modal/edit-konfirmasi"); ?>

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
            pagename = "keuangan/ajax-konfirmasi.html";

            var Output;
            $(document).ready(function() {
                GetData(request);
                
                if("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }
            });

            $("#FrmFilter").submit(function() {
                var status = $(this).find(".is_active").val(), sort = $(this).find(".sort").val(), kelas = $(this).find(".filter-kelas").val();
                request["Sort"] = sort;
                request["filter"]["status"] = status; 
                request["filter"]["kelas"] = kelas; 
                GetData(request);
                return false;
            });

            $(".datatable").on("click", ".BtnKonfirmasiSukses", function() {
                Output = "";

                var modal = $(".modal-edit-konfirmasi");
                var no_ref = $(this).data("noref");

                modal.find(".is_batal").html("");
                modal.find(".BtnSimpan").html("Ya, Konfirmasi Sekarang");
                modal.find(".BtnSimpan").attr("data-status", "1");
                modal.find(".hidden-idupdate").val(no_ref);
                getdatabyid(no_ref, function(resp) {
                    var resp = resp.Data[0];
                        Output = resp;
                    var selector = $(".content-detail");

                    selector.find(".text-noref").html(": " +resp.no_ref);
                    selector.find(".text-namatagihan").html(resp.tagihan_nama);
                    selector.find(".text-namatagihan").attr("href", base_url + "/tagihan/detail.html?id=" + resp.id_tagihan);
                    selector.find(".text-banktujuan").html(": ("+ resp.kode_bank_tujuan +") "+ resp.nama_bank_tujuan);
                    selector.find(".text-norektujuan").html(": " +resp.no_rek_tujuan+" A/N "+resp.nama_rek_tujuan);
                    selector.find(".text-norekasal").html(": " +resp.no_rek_asal+" A/N "+resp.nama_rek_asal);
                    selector.find(".text-totalbayar").html(FormatAngka(resp.jml_bayar));
                    
                    selector.find(".text-siswa").html(resp.siswa_nama + " - "+ resp.nis);
                    selector.find(".text-siswa").attr("href", base_url + "/siswa/detail.html?nis=" + resp.nis);

                    selector.find(".text-bukti").attr("data-bukti", resp.bukti_bayar);
                    var tgl_bayar = moment(resp.tgl_bayar).format("DD MMM YYYY")
                    selector.find(".text-tglbayar").html(": " +tgl_bayar);

                    modal.find(".BtnSimpan").attr("data-nis", resp.nis);
                    modal.find(".hidden-reg_id").val(resp.registration_id);

                    if(!empty(resp.tgl_konfirmasi)) {
                        var tgl_konfirmasi = moment(resp.tgl_konfirmasi).format("DD MMM YYYY HH:mm:ss");
                        selector.find(".text-tglkonfirmasi").html(": " + tgl_konfirmasi);
                    }
                    $(".keterangan").focus();
                });

                random_no_pembayaran();
                modal.modal("show");
            });

            $(".datatable").on("click", ".BtnKonfirmasiGagal", function() {
                Output = "";

                var modal = $(".modal-edit-konfirmasi");
                var no_ref = $(this).data("noref");

                modal.find(".is_batal").html("membatalkan");
                modal.find(".BtnSimpan").html("Ya, Batalkan Sekarang");
                modal.find(".BtnSimpan").attr("data-status", "2");
                modal.find(".hidden-idupdate").val(no_ref);
                getdatabyid(no_ref, function(resp) {
                    var resp = resp.Data[0];
                        Output = resp;
                    var selector = $(".content-detail");

                    selector.find(".text-noref").html(": " +resp.no_ref);
                    selector.find(".text-namatagihan").html(resp.tagihan_nama);
                    selector.find(".text-namatagihan").attr("href", base_url + "/tagihan/detail.html?id=" + resp.id_tagihan);
                    selector.find(".text-banktujuan").html(": ("+ resp.kode_bank_tujuan +") "+ resp.nama_bank_tujuan);
                    selector.find(".text-norektujuan").html(": " +resp.no_rek_tujuan+" A/N "+resp.nama_rek_tujuan);
                    selector.find(".text-norekasal").html(": " +resp.no_rek_asal+" A/N "+resp.nama_rek_asal);
                    selector.find(".text-totalbayar").html(FormatAngka(resp.jml_bayar));

                    selector.find(".text-siswa").html(resp.siswa_nama + " - "+ resp.nis);
                    selector.find(".text-siswa").attr("href", base_url + "/siswa/detail.html?nis=" + resp.nis);

                    selector.find(".text-bukti").attr("data-bukti", resp.bukti_bayar);
                    var tgl_bayar = moment(resp.tgl_bayar).format("DD MMM YYYY")
                    selector.find(".text-tglbayar").html(": " +tgl_bayar);

                    modal.find(".BtnSimpan").attr("data-nis", resp.nis);
                    modal.find(".hidden-reg_id").val(resp.registration_id);

                    if(!empty(resp.tgl_konfirmasi)) {
                        var tgl_konfirmasi = moment(resp.tgl_konfirmasi).format("DD MMM YYYY HH:mm:ss");
                        selector.find(".text-tglkonfirmasi").html(": " + tgl_konfirmasi);
                    }
                    $(".keterangan").focus();
                });

                random_no_pembayaran();
                modal.modal("show");
            });

            $(".datatable").on("click", ".BtnKonfirmasiDetail", function() {
                var modal = $(".modal-detail");
                var no_ref = $(this).data("noref");

                getdatabyid(no_ref, function(resp) {
                    var resp = resp.Data[0];
                    var selector = $(".content-detail");

                    selector.find(".text-noref").html(": " +resp.no_ref);
                    selector.find(".text-namatagihan").html(resp.tagihan_nama);
                    selector.find(".text-namatagihan").attr("href", base_url + "/tagihan/detail.html?id=" + resp.id_tagihan);
                    selector.find(".text-banktujuan").html(": ("+ resp.kode_bank_tujuan +") "+ resp.nama_bank_tujuan);
                    selector.find(".text-norektujuan").html(": " +resp.no_rek_tujuan+" A/N "+resp.nama_rek_tujuan);
                    selector.find(".text-norekasal").html(": " +resp.no_rek_asal+" A/N "+resp.nama_rek_asal);
                    selector.find(".text-totalbayar").html(FormatAngka(resp.jml_bayar));

                    selector.find(".text-siswa").html(resp.siswa_nama + " - "+ resp.nis);
                    selector.find(".text-siswa").attr("href", base_url + "/siswa/detail.html?nis=" + resp.nis);

                    selector.find(".text-bukti").attr("data-bukti", resp.bukti_bayar);
                    var tgl_bayar = moment(resp.tgl_bayar).format("DD MMM YYYY")
                    selector.find(".text-tglbayar").html(": " +tgl_bayar);

                    if(!empty(resp.tgl_konfirmasi)) {
                        var tgl_konfirmasi = moment(resp.tgl_konfirmasi).format("DD MMM YYYY HH:mm:ss");
                        selector.find(".text-tglkonfirmasi").html(": " + tgl_konfirmasi);
                    }
                });
                modal.modal("show");
            });

            $(".text-bukti").click(function() {
                var bukti = $(this).attr("data-bukti");
                window.open(ParseGambar(bukti), "", "width=800,height=400");
            });

            $(".BtnSimpan").click(function() {
                var no_ref = $(".hidden-idupdate").val(), 
                    status = $(this).attr("data-status"), 
                    ket = $(".keterangan").val(), 
                    reg_id = $(".hidden-reg_id").val(),
                    nis = $(this).attr("data-nis");

                $.ajax({
                    type: "POST",
                    url: base_url + "/ajax/keuangan/ajax-konfirmasi.html",
                    data: {act: "updatedata", req: {
                        "no_ref": no_ref, 
                        "status": status, 
                        "keterangan": ket, 
                        "registration_id": reg_id, 
                        "nis": nis
                    }},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    beforeSend: function() {
                        l.ladda("start");
                    },
                    success: function(resp){
                        l.ladda("stop");
                        if(resp.IsError == false) {
                            if(status == 1) {
                                InsertPembayaran(function(resp) {
                                    toastrshow("success", "Pembayaran berhasil dikonfirmasi", "Success");
                                });
                            } else if(status == 2) {
                                toastrshow("success", "Pembayaran berhasil dibatalkan", "Success");
                            }
                            $(".modal-edit-konfirmasi").modal("hide"); //Tutup modal

                            request["Page"] = 1;
                            GetData(request);
                        } else {
                            toastrshow("error", "Update Konfirmasi : " + resp.ErrMessage, "Error");
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
                
                return false;
            });

            function InsertPembayaran(func) { 
                var random_number = $(".hidden-no_pemb").val();
                var ket = $(".keterangan").val();

                var datSis = {act: "insertdatasatuan", req: {
                    "nis": Output.nis,
                    "no_ref": Output.no_ref,
                    "id_tagihan": Output.id_tagihan,
                    "jml_bayar": Output.jml_bayar,
                    "uraian": ket,
                    "cara_bayar": "TRANSFER",
                    "no_pembayaran": random_number,
                    "tgl_bayar": Output.tgl_bayar
                }};

                var rData = InsertRepeaterData(datSis, "keuangan/ajax-pembayaran.html", function(resp) {
                    if(resp.IsError == false) {
                        func(resp);
                    }
                });
            }

            function random_no_pembayaran() {
                no_pembayaran = Math.floor(1000000000 + Math.random() * 9000000000);
                $.ajax({
                    type: "POST",
                    url: base_url + "/ajax/keuangan/ajax-pembayaran.html",
                    data: {act: "getrandom", req: {"no_pembayaran": no_pembayaran}},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function (resp) {
                        no_output = resp.Output;
                        if (no_output == false) $(".hidden-no_pemb").val(no_pembayaran);
                        else random_no_pembayaran();
                    },
                    error: function (xhr, textstatus, errorthrown) {
                        if (textstatus == "timeout") {
                            this.tryCount++;
                            if (this.tryCount <= this.retryLimit) {
                                $.ajax(this);
                            }
                        }
                    }
                });
            }
        </script>
    </body>
</html>
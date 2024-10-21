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
        <title>Tarif Khusus | <?php echo $this->config->item("app_title"); ?></title>
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
        <link href="<?php echo base_url("assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css"); ?>" rel="stylesheet">
    
        <link href="<?php echo base_url("assets/css/components-rounded.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/plugins.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/layout.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/default.min.css"); ?>" id="style_color" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/custom.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/css/responsive.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css"); ?>" rel="stylesheet">
        
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
                            <div class="col-sm-4">
                                <div class="page-title">
                                    <h1><i class="fa fa-money"></i> Tarif Khusus</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                    <li>
                                        <span class="active text-default">Keuangan</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Tarif Khusus</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-8 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <form id="FrmSearch">
                                            <div class="input-group input-search">
                                                <input type="text" placeholder="Cari (NIS, Nama Siswa, Nama Tarif, Keterangan)" class="form-control kywd" autofocus title="Cari (NIS, Nama Siswa, Nama Tarif, Keterangan)"> 
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <!-- <a role="button" class="btn btn-primary" href="<?php //echo base_url("tarif_khusus/tambah.html");?>">
                                            <i class="fa fa-pencil"></i>
                                        </a> -->
                                        <a role="button" class="btn btn-primary tambah-tarif" data-toggle="modal" data-target=".modal-tambah-tarifkhusus" title="Tambah Tarif Khusus">
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
                    
                    <div class="result hidden">
                        <a role="button" class="close" aria-label="close" onclick="$(this).parent('div').addClass('hidden')">&times;</a>
                        <div class="result-save-detil"></div>
                    </div>

                    <div class="row">
                        <div style="margin-bottom: -10px;" class="filter in col-md-12">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <!-- FrmFilter -->
                                    <form id="FrmFilter" role="form">
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label>Kelas</label>
                                                    <select style="width:100%;" class="form-control select2-normal dropdown-kelas filter-kelas"  class="form">
                                                        <option value="">Semua Kelas</option>
                                                        <?php print_r($dropdownkelas->lsdt) ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3">
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch dropdown-kattagihan2 filter-kategori"  class="form">
                                                        <option value="">Semua Kategori</option>
                                                        <?php print_r($dropdownkategori->lsdt) ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch is_active">
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="form-group">
                                                    <label>Urutkan</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch sort" class="form">
                                                        <option value="tgl_last_update desc">Default</option>
                                                        <option value="tgl_last_update asc">Last Update [A-Z]</option>
                                                        <option value="tgl_last_update desc">Last Update [Z-A]</option>
                                                        <option value="nis asc">NIS [A-Z]</option>
                                                        <option value="nis desc">NIS [Z-A]</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2" style="vertical-align: bottom;">
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
                                                    <th style="width: 75px;" class="text-center"> Action </th>
                                                    <th style="width: 100px;"> NIS </th>
                                                    <th style="width: 150;"> Nama </th>
                                                    <th style="width: 125px;"> Kategori </th>
                                                    <th style="width: 180px;"> Nama Tarif </th>
                                                    <th> Tarif </th>
                                                    <th style="width: 150px;"> Last Update </th>
                                                    <th style="width: 75px;" class="text-center"> Status </th>
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
        
        <?php $this->load->view("keuangan/tarif_khusus/modal/tambah") ?>
        <?php $this->load->view("keuangan/tarif_khusus/modal/edit-data") ?>
        <?php $this->load->view("keuangan/tarif_khusus/modal/edit-status") ?>
        <?php $this->load->view("keuangan/tarif_khusus/modal/detail") ?>
        <?php $this->load->view("keuangan/tarif_khusus/modal/pilihtarif"); ?>
        <?php $this->load->view("keuangan/tarif_khusus/modal/pilihsiswa"); ?>

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
        <script src="<?php echo base_url("assets/plugins/bootstrap-tagsinput/typeahead-tagsinput.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"); ?>"></script>

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
        <!-- Bootstrap Datepicker -->
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"); ?>" charset="UTF-8"></script>
        <script>
            pagename = "keuangan/ajax-tarif-khusus.html";
            $(document).ready(function() {
                GetData(request);

                // getdatadropdownkattagihan2();
                getdatadropdownkelas2();
                
                $(".tambah-tarif").on("click", function() {
                    resetformvalue("#FrmAddTarifKhusus");
                    var length_kategori = $(".tambah-kategori option").length;

                    if(length_kategori <= 1) {
                        getdatadropdownkattagihan();
                    }
                    $(".tagsinput_siswa").tagsinput('removeAll');
                });

                if("<?php echo $user->foto; ?>" == "default.png"){
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }

                $('.object_tagsinput').tagsinput({
                    itemValue: 'value',
                    itemText: 'text',
                    typeahead: {
                        source: function(query) {
                            return $.getJSON('cities.json');
                        }
                    }
                });
            });

            $(".tambah-kategori").change(function() {
                var value = $(this).val();
                if(!empty(value)) {
                    $(".btn_pilihtarif").removeClass("disabled");
                } else {
                    $(".btn_pilihtarif").addClass("disabled");
                }
                $(".nama_tarif, .id_tarif").val("");
            });

            $(".btn_pilihtarif").on('click', function () {
                var kategori = $(".tambah-kategori").val();

                pagename = "keuangan/ajax-tarif-khusus.html";
                request["Page"] = 1;
                request["filter"]["kategori"] = kategori;
                SetGetData(request, "listdatahtmlpilihtarif", "", ".list-group-tarif");
            });

            $(".btn_pilihsiswa").on('click', function () {
                pagename = "master-data/ajax-siswa.html";
                request["Page"] = 1;
                SetGetData(request, "listdatahtmlnamasiswa", "", ".list-group-siswa");
                setTimeout(function(){
                    $(".col-md-7 .input-search .form-control.kywd").focus();
                }, 1100);
            });

            $(".list-group-tarif").on("click", ".nama-tarif", function() {
                var id_tarif = $(this).attr("data-id_tarif");
                var namatarif = $(this).text();

                $(".nama_tarif").val(namatarif);
                $(".tambah-id_tarif").val(id_tarif);

                $(".tambah-kategori, .nama_tarif").valid();
                $('#pilihtarif').modal('hide');
            });

            $(".list-group-siswa").on("click", ".nama-siswa", function() {
                var id_siswa = $(this).attr('id');
                    id_siswa = id_siswa.replace (/nis/g, "", id_siswa);

                var namasiswa = $(this).text();
                    namasiswa = namasiswa.replace (id_siswa+" - ", "", namasiswa);
                $('.tagsinput_siswa').tagsinput('add', {"value": id_siswa , "text": namasiswa});

                var nama  = $(".tambah-tagsinput_siswa_hidden_nama").val();
                    nama += (nama == "") ? "" : ",";
                    nama += namasiswa;
                $(".tambah-tagsinput_siswa_hidden_nama").val(nama);
                $('#pilihsiswa').modal('hide');
            });

            $(".tagsinput_siswa").change(function() {
                var textToAppend = "";
                var selMulti = $(this).each(function(){
                    textToAppend += (textToAppend == "") ? "" : ",";
                    textToAppend += $(this).val();      
                });
                $(".tambah-tagsinput_siswa_hidden").val(textToAppend);
            });

            $("#FrmFilter").submit(function() {
                var status = $(this).find(".is_active").val(), sort = $(this).find(".sort").val();
                var kategori = $(this).find(".filter-kategori").val(), kelas = $(this).find(".filter-kelas").val();
                request["Sort"] = sort;
                request["filter"]["status"] = status; 
                request["filter"]["kategori"] = kategori; 
                request["filter"]["kelas"] = kelas; 
                GetData(request);
                return false;
            });

            $(".datatable tbody").on("click", ".status-data", function() {
                resetformvalue("#FrmUpdateStatus");
                var FrmSave = $("#FrmUpdateStatus");
                var id_update = $(this).data("idupdate");

                $(".hidden-idupdate").val(id_update);

                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    FrmSave.find("input[name='form[nis]']").val(resp.nis);
                    FrmSave.find("select[name='form[is_active]']").val(resp.is_active).trigger("change");

                    $(".modal-update-status .modal-title").html("Edit Status Tarif Khusus " + resp.siswa_nama);
                    $(".modal-update-status").modal("show");
                });
            });

            var FrmUpdateStatus = $("#FrmUpdateStatus").validate({
                submitHandler: function(form) {
                   UpdateData(form, function(resp) {
                        GetData(request);
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

            $(".datatable tbody").on("click", ".detail-data", function() {
                resetformvalue("#FrmDetail");
                var FrmDetail = $("#FrmDetail");
                var id_update = $(this).data("idupdate");
                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    FrmDetail.find("label[name='form[nis]']").html(CheckStrip(resp.nis));
                    FrmDetail.find("label[name='form[siswa_nama]']").html(CheckStrip(resp.siswa_nama));
                    FrmDetail.find("label[name='form[kategori_nama]']").html(CheckStrip(resp.kategori_nama));

                    var tarif = resp.tarif.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");

                    FrmDetail.find("label[name='form[tarif]']").html(tarif);
                    FrmDetail.find("label[name='form[ket]']").html(CheckStrip(resp.ket));

                    tgl = moment(resp.tgl_insert, "YYYY-MM-DD HH:mm:ss").format('DD MMM YYYY HH:mm');
                    FrmDetail.find("label[name='form[tgl_insert]']").html(CheckStrip(tgl));

                    $(".modal-detail .modal-title").html("Detail Tarif Khusus " + resp.siswa_nama);
                    $(".modal-detail").modal("show");
                });
            });

            function validate(evt) {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                return !(charCode > 31 && (charCode < 48 || charCode > 57));
            }

            $(".datatable tbody").on("click", ".edit-data", function() {
                resetformvalue("#FrmSaveTarifKhusus");
                var FrmSave = $("#FrmSaveTarifKhusus");
                var id_update = $(this).data("idupdate");

                $(".hidden-idupdate").val(id_update);

                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];

                    $(".dropdown-kelas3").on("change", function() {
                        if($(this).val() == "") {
                            $(".dropdown-siswa2").val("").trigger("change");
                            $(".dropdown-siswa2").prop("disabled", true);
                            FrmSave.find("input[name='form[nis]']").val("");
                        } else if ($(this).val() != "") {
                            $(".dropdown-siswa2").removeProp("disabled");
                            $(".dropdown-siswa2").val("").trigger("change");
                            getdatadropdownsiswa2("",$(this).val());
                            FrmSave.find("input[name='form[nis]']").val($(".dropdown-siswa2").val());
                        }
                    });

                    $(".dropdown-siswa2").on("change", function() {
                        if($(this).val() == "") {
                            FrmSave.find("input[name='form[nis]']").val("");
                        } else if ($(this).val() != "") {
                            FrmSave.find("input[name='form[nis]']").val($(this).val());
                        }
                    });

                    setTimeout(function() {
                        getdatadropdownkelas3(resp.id_kelas);
                    }, 100);
                    setTimeout(function() {
                        getdatadropdownsiswa2(resp.nis,resp.id_kelas);
                    }, 250);
                    getdatadropdownkattagihan(resp.id_kategori);

                    FrmSave.find("input[name='form[nis]']").val(resp.nis);

                    var tarif = resp.tarif.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                        tarif = tarif.replace("-", "");

                    FrmSave.find(".nom").val(tarif);
                    FrmSave.find("input[name='form[tarif]']").val(resp.tarif);
                    FrmSave.find("textarea[name='form[ket]']").val(resp.ket);

                    $(".modal-save-tarifkhusus .modal-title").html("Edit Tarif Khusus " + resp.siswa_nama);
                    $(".modal-save-tarifkhusus").modal("show");
                });
            });

            var FrmSaveTarifKhusus = $("#FrmSaveTarifKhusus").validate({
                submitHandler: function(form) {
                    UpdateData(form, function(resp) {
                        GetData(request);
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

            var FrmAddTarifKhusus = $("#FrmAddTarifKhusus").validate({
                submitHandler: function(form) {
                    var cek = 0, success = 0, error = 0;

                    var kategori = $(".tambah-kategori").val();
                    var id_tarif = $(".tambah-id_tarif").val();

                    var siswa = $(".tambah-tagsinput_siswa_hidden").val(),
                        siswa = siswa.split(","),
                        siswa_lenght = siswa.length;

                    var nama_siswa = $(".tambah-tagsinput_siswa_hidden_nama").val();
                        nama_siswa = nama_siswa.split(",");
                            
                    var nominal = $(".tambah-nominal").val();
                        nominal = nominal.replace(/\./g, "");
                    var ket = $(".tambah-ket").val();   

                    $(".result-save-detil").empty();
                    $.each(siswa, function(index, item) {
                         $.ajax({
                            type: "POST",
                            url: base_url + "/ajax/keuangan/ajax-tarif-khusus.html",
                            data: {act: "insertdatarepeat", req: {
                                                            "nis": item,
                                                            "tarif": nominal,
                                                            "ket": ket,
                                                            "id_kategori": kategori,
                                                            "id_tarif": id_tarif
                                                           }},
                            dataType: "JSON",
                            tryCount: 0,
                            retryLimit: 3,
                            beforeSend: function() {
                                l.ladda("start");
                            },
                            success: function(resp){
                                l.ladda("stop");
                                $('.result').removeClass("hidden");

                                if(resp.IsError == false) {
                                    cek++; success++;
                                    $('.result-save-detil').append("<label class='font-green-meadow'><b>Tarif Khusus "+nama_siswa[index]+"</b> : Data Berhasil Disimpan</label><br>");
                                } else {
                                    cek++; error++;
                                    $('.result-save-detil').append("<label class='text-danger'><b>Tarif Khusus "+nama_siswa[index]+"</b> : "+resp.ErrMessage+"</label><br>");
                                }

                                console.log(siswa_lenght);

                                if ((success + error) == siswa_lenght) {
                                    if(success == siswa_lenght){
                                        ResetRequest();

                                        pagename = "keuangan/ajax-tarif-khusus.html";
                                        request["Page"] = 1;
                                        GetData(request);
                                        toastrshow("success", "Data berhasil disimpan", "Success");
                                        $(".modal-tambah-tarifkhusus").modal("hide");
                                    } else if(error > 0) { 
                                        $(".modal-tambah-tarifkhusus").modal("hide");
                                    } else {
                                        toastrshow("warning", "Periksa kembali data yang telah dimasukkan", "Warning");
                                    }
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

            $(".nom").blur(function() {
                // When user select text in the document, also abort.
                var selection = window.getSelection().toString();
                if ( selection !== '' ) {
                    return;
                }
                            
                // When the arrow keys are pressed, abort.
                if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                    return;
                }
                            
                var $this = $(this);
                            
                // Get the value.
                var input = $this.val();
                var input = input.replace(/[\D\s\._\-]+/g, "");
                    input = input ? parseInt( input, 10 ) : 0;

                $this.val( function() {
                    return (input === 0) ? "" : input.toLocaleString("id");
                });
            });
            $(".nom").on("focus keyup", function() {
                var value = $(this).val().replace(/\./g, "");
                $(this).val(value);
                $("input[name='form[tarif]']").val($(".min").val() + value);
            });
        </script>
    </body>
</html>
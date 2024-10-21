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
        <title>Tarif | <?php echo $this->config->item("app_title"); ?></title>
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
                                    <h1><i class="fa fa-money"></i> Tarif</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                    <li>
                                        <span class="active text-default">Keuangan</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Tarif</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-sm-8 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <form id="FrmSearch">
                                            <div class="input-group input-search">
                                                <input type="text" placeholder="Cari (Nama, Catatan)" class="form-control kywd" autofocus title="Cari (Nama, Catatan)"> 
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <a role="button" class="btn btn-primary tambah-tarif" title="Tambah Tarif">
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
                        <div style="margin-bottom: -10px;" class="filter col-md-12 collapse in">
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <!-- FrmFilter -->
                                    <form id="FrmFilter" role="form">
                                        <div class="row">
                                            <div class="col-md-2 col-sm-3">
                                                <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch dropdown-kattagihan2 filter-kategori"  class="form">
                                                        <option value="">Semua Kategori</option>
                                                        <?php print_r($dropdownkategori->lsdt) ?> 
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3">
                                                <div class="form-group">
                                                    <label>Bulan</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch filter-bulan"  class="form">
                                                        <option value="">Semua Bulan</option>
                                                        <option value="1">Januari</option>
                                                        <option value="2">Februari</option>
                                                        <option value="3">Maret</option>
                                                        <option value="4">April</option>
                                                        <option value="5">Mei</option>
                                                        <option value="6">Juni</option>
                                                        <option value="7">Juli</option>
                                                        <option value="8">Agustus</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3">
                                                <div class="form-group">
                                                    <label>Tahun</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch dropdown-tahun filter-tahun"  class="form">
                                                        <option value="">Semua Tahun</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch filter-is_active" class="form">
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-3">
                                                <div class="form-group">
                                                    <label>Urutkan</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch sort" class="form">
                                                        <option value="tgl_last_update desc">Default</option>
                                                        <option value="tarif asc">Tarif [A-Z]</option>
                                                        <option value="tarif desc">Tarif [Z-A]</option>
                                                        <option value="bulan asc">Bulan [A-Z]</option>
                                                        <option value="bulan desc">Bulan [Z-A]</option>
                                                        <option value="tahun asc">Tahun [A-Z]</option>
                                                        <option value="tahun desc">Tahun [Z-A]</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-1 col-sm-3" style="vertical-align: bottom;">
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
                                    <div class="table-container table-responsive ">
                                        <table class="table table-striped table-hover datatable">
                                            <thead>
                                                <tr>
                                                    <th style="width: 75px;" class="text-center"> Action </th>
                                                    <th style="width: 175px;"> Nama </th>
                                                    <th style="width: 105px;"> Tarif </th>
                                                    <th style="width: 115px;"> Kategori</th>
                                                    <th style="width: 75px;"> Bulan </th>
                                                    <th style="width: 75px;"> Tahun </th>
                                                    <th style="width: 140px;"> Tgl Insert </th>
                                                    <th style="width: 140px;"> Last Update </th>
                                                    <th class="status">Status</th>
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
        
        <?php $this->load->view("keuangan/tarif/modal/tambah") ?>
        <?php $this->load->view("keuangan/tarif/modal/edit-data") ?>
        <?php //$this->load->view("keuangan/tarif/modal/edit-status") ?>
        <?php $this->load->view("keuangan/tarif/modal/detail") ?>

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
        <script src="<?php echo base_url("assets/plugins/bootstrap-tagsinput/typeahead-tagsinput.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"); ?>"></script>
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 

        <!-- Bootstrap Datepicker -->
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"); ?>"></script>

        <script>
            pagename = "keuangan/ajax-tarif.html";
            $(document).ready(function() {
                var date1 = new Date().getFullYear() + 3, date2 = new Date().getFullYear() - 3;
                for(i = date1; i > (date1 - 4); i--){
                    $(".dropdown-tahun").append("<option value=" + i + ">" + i + "</option>");
                }
                for(i = date2; i < (date2 + 3); i++){
                    $(".dropdown-tahun").append("<option value=" + i + ">" + i + "</option>");
                }
                $(".tahun").val(new Date().getFullYear()).trigger("change");

                GetData(request);

                $(".select2-multiple").select2({
                    placeholder: "Pilih Bulan",
                    closeOnSelect: false
                });
                
                function validate(evt) {
                    var charCode = (evt.which) ? evt.which : evt.keyCode;
                    return !(charCode > 31 && (charCode < 48 || charCode > 57));
                }

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
                $(".nom").keyup(function() {
                    var value = $(this).val().replace(/\./g, "");
                    $(this).val(value);
                    $("input[name='form[tarif]']").val(value);
                });
                $(".nom").focus(function() {
                    var value = $(this).val().replace(/\./g, "");
                    $(this).val(value);
                    $("input[name='form[tarif]']").val(value);
                });
                
                $(".tambah-tarif").on("click", function() {
                    resetformvalue("#FrmAddTarif");
                    getdatadropdownkattagihan();

                    var bulan_sekarang= moment().format("M");
                    $(".bulan").val([bulan_sekarang]).trigger("change");
                    $(".tahun").val(new Date().getFullYear()).trigger("change");
                    $(".modal-tambah-tarif").find("select[name='form[is_active]']").val("1").trigger("change");
                    $(".modal-tambah-tarif .modal-title").html("Tambah Tarif");
                    $(".modal-tambah-tarif").modal("show");
                });

                $(".semua-bulan").click(function() {
                	$(".bulan").val([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]).trigger("change");
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

            $("#select-bulan").change(function(s) {
                bulan_text();
            });

            function bulan_text() {
                var data = [];
                $("#select-bulan option:selected").each(function(index, selector) {
                    text = $(this).text();
                    if($(this).is(":selected")) {
                        data.push(text);
                    }
                });

                data = data.join(",");
                $(".text-bulan").val(data);
            }

            $("#FrmFilter").submit(function() {
                var status = $(this).find(".filter-is_active").val(), sort = $(this).find(".sort").val();
                var bulan = $(this).find(".filter-bulan").val(), tahun = $(this).find(".filter-tahun").val();
                var kategori = $(this).find(".filter-kategori").val();

                request["Sort"] = sort;
                request["filter"]["status"] = status; 
                request["filter"]["bulan"]  = bulan; 
                request["filter"]["tahun"]  = tahun; 
                request["filter"]["kategori"]  = kategori; 
                GetData(request);
                return false;
            });

            $(".datatable tbody").on("click", ".detail-data", function() {
                resetformvalue("#FrmDetail");
                var FrmDetail = $("#FrmDetail");
                var id_update = $(this).data("idupdate");
                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    FrmDetail.find("label[name='form[nama]']").html(CheckStrip(resp.nama));

                    FrmDetail.find("label[name='form[bulan]']").html(CheckMonth(CheckStrip(resp.bulan)));
                    FrmDetail.find("label[name='form[tahun]']").html(CheckStrip(resp.tahun));

                    FrmDetail.find("label[name='form[tarif]']").html(CheckStrip(resp.tarif));
                    FrmDetail.find("label[name='form[catatan]']").html(CheckStrip(resp.catatan));

                    tgl1 = moment(resp.tgl_insert, "YYYY-MM-DD HH:mm:ss").format('DD MMM YYYY HH:mm');
                    FrmDetail.find("label[name='form[tgl_insert]']").html(CheckStrip(tgl1));

                    tgl2 = moment(resp.tgl_last_update, "YYYY-MM-DD HH:mm:ss").format('DD MMM YYYY HH:mm');
                    FrmDetail.find("label[name='form[tgl_last_update]']").html(CheckStrip(tgl2));

                    $(".modal-detail .modal-title").html("Detail Tarif " + resp.nama);
                    $(".modal-detail").modal("show");
                });
            });

            $(".datatable tbody").on("click", ".edit-data", function() {
                resetformvalue("#FrmSaveTarif");
                var FrmSave = $("#FrmSaveTarif");
                var id_update = $(this).data("idupdate");

                $(".hidden-idupdate").val(id_update);

                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    FrmSave.find("input[name='form[nama]']").val(resp.nama);
                    getdatadropdownkattagihan(resp.id_kategori);

                    if(resp.bulan != "" || resp.bulan != null){
                        FrmSave.find("select[name='form[bulan]']").val(resp.bulan).trigger("change");
                    } if(resp.tahun != "" || resp.tahun != null){
                        FrmSave.find("select[name='form[tahun]']").val(resp.tahun).trigger("change");
                    } 
                    var tarif = resp.tarif.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.");
                        tarif = tarif.replace("-", "");
                    FrmSave.find(".nom").val(tarif);
                    FrmSave.find("input[name='form[tarif]']").val(resp.tarif);
                    FrmSave.find("textarea[name='form[catatan]']").val(resp.catatan);
                    FrmSave.find("select[name='form[is_active]']").val(resp.is_active).trigger("change");

                    $(".modal-save-tarif .modal-title").html("Edit Tarif " + resp.nama);
                    $(".modal-save-tarif").modal("show");
                });
            });

            var FrmSaveTarif = $("#FrmSaveTarif").validate({
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

            function alert_bulan() {
                var explode = $("input[name='form[bulan]']").val().split(',');
                var length = explode.length;
                for(var i = 0; i<length; i++){
                    bul = explode[i];
                    alert(bul);
                }
            }

            var FrmAddTarif = $("#FrmAddTarif").validate({
                submitHandler: function(form) {
                    var cek = 0, success = 0, error = 0;
                    var bulan = $(".bulan").val(), bulan_length = bulan.length;

                    var bulan_text = $(".text-bulan").val();
                        bulan_text = bulan_text.split(",");

                    $(".result-save-detil").empty();
                    $.each(bulan, function(index, item) {
                        $.ajax({
                            type: "POST",
                            url: base_url + "/ajax/keuangan/ajax-tarif.html",
                            data: {act: "insertdatarepeat", req: {
                                                            "nama": $("input[name='form[nama]']").val(),
                                                            "bulan": item,
                                                            "tahun": $(".tahun").val(),
                                                            "id_kategori": $("select[name='form[id_kategori]']").val(),
                                                            "tarif": $("input[name='form[tarif]']").val(),
                                                            "catatan": $("textarea[name='form[catatan]']").val()
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
                                    $('.result-save-detil').append("<label class='font-green-meadow'><b>Tarif Bulan "+bulan_text[index]+"</b> : Data Berhasil Disimpan</label><br>");
                                } else {
                                    cek++; error++;
                                    $('.result-save-detil').append("<label class='text-danger'><b>Tarif Bulan "+bulan_text[index]+"</b> : "+resp.ErrMessage+"</label><br>");
                                }

                                if ((success + error) == bulan_length) {
                                    if(success == bulan_length){
                                        ResetRequest();

                                        request["Page"] = 1;
                                        GetData(request);

                                        toastrshow("success", "Data berhasil disimpan", "Success");
                                        $(".modal-tambah-tarif").modal("hide");
                                    } else if(error > 0) { 
                                        $(".modal-tambah-tarif").modal("hide");
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
                    return false;
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
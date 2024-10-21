<?php 
    $user = $this->session->userdata("user");
    $sekolah = $this->session->userdata("sekolah");
    $sekolah = $sekolah->Data[0];
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Siswa | <?php echo $this->config->item("app_title"); ?></title>
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
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="page-title">
                                    <h1><i class="fa fa-database"></i> Siswa</h1>
                                </div>
                                <ul  class="page-breadcrumb breadcrumb col-xs-12" style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;">
                                    <li>
                                        <span class="active text-default">Master Data</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Siswa</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-9 col-sm-9 col-xs-12 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <form id="FrmSearchSiswa">
                                            <div class="input-group input-search">
                                                <input type="text" placeholder="Cari (NIS, NISN, Nama Siswa)" class="form-control kywd" autofocus title="Cari (NIS, NISN, Nama Siswa)"> 
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="form-group">
                                        <a data-toggle="modal" data-target="#modalImport" role="button" class="btn btn-primary" title="Import File Excel">
                                            <i class="fa fa-file-excel-o"></i>
                                        </a>
                                        <a href="<?php echo base_url("siswa/tambah.html") ?>" role="button" class="btn btn-primary tambah-group" title="Tambah Siswa">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" data-toggle="collapse" data-target=".filter" title="Filter Siswa">
                                            <i class="fa fa-filter"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" onclick="location.reload();" data-toggle="tooltip" title="Refresh">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Cetak Data" >
                                                <i class="fa fa-asterisk" aria-hidden="true"></i> <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a role="button" data-toggle="modal" data-target="#modalCetakSiswa">
                                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i> Cetak Password
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <span class="pagination-layout">
                                            <a role="button" class="btn btn-primary disabled prevsiswa" title="Daftar Sebelumnya">
                                                <i class="fa fa-chevron-left"></i>
                                            </a>    
                                            <a role="button" class="btn btn-primary disabled nextsiswa" title="Daftar Selanjutnya">
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
                            <?php 
                                if($sekolah->install_step == 2) {
                                    echo $this->foglobal->MakeAlert("<strong>Info!</strong> Tambahkan siswa dengan klik tombol <a role='button' href='".base_url("siswa/tambah.html")."' class='btn btn-vs btn-primary'><i class='fa fa-plus'></i></a> (Minimal tambahkan 1 siswa). Menu lainnya dapat diakses setelah menambahkan siswa.");
                                }
                            ?>
                            <div class="portlet light bordered">
                                <div class="portlet-body">
                                    <!-- FrmFilter -->
                                    <form id="FrmFilter" role="form">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Kelas</label>
                                                    <select style="width: 100%;" class="select2-normal dropdown-kelas">
                                                    <option value="">Semua Kelas</option>
                                                            <?php print_r($dropdownkelas->lsdt) ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch is_active">
                                                        <option value="1">Aktif</option>
                                                        <option value="0">Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label>Urutkan</label>
                                                    <select style="width:100%;" class="form-control select2-nosearch sort" class="form">
                                                        <option value="id asc">Default</option>
                                                        <option value="nama asc">Nama Siswa [A-Z]</option>
                                                        <option value="nama desc">Nama Siswa [Z-A]</option>
                                                        <option value="nis asc">NIS Siswa [A-Z]</option>
                                                        <option value="nis desc">NIS Siswa [Z-A]</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3" style="vertical-align: bottom;">
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
                                                    <th style="width: 125px;"> NIS </th>
                                                    <th style="width: 125px;"> NISN </th>
                                                    <th style="width: 200px;"> Nama </th>
                                                    <th style="width: 125px;"> Jenis Kelamin </th>
                                                    <th style="width: 100px;"> Kelas </th>
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
                                                    <a role="button" class="btn btn-primary input-sm disabled firstsiswa"><i class="fa fa-step-backward"></i></a>
                                                    <a role="button" class="btn btn-primary input-sm disabled prevsiswa"><i class="fa fa-chevron-left"></i></a>
                                                </span>
                                                <form id="FrmGotoPage">
                                                    <input type="text" class="form-control input-sm text-center" value="1">
                                                </form>
                                                <span class="input-group-btn">
                                                    <a role="button" class="btn btn-primary input-sm disabled nextsiswa"><i class="fa fa-chevron-right"></i></a>
                                                    <a role="button" class="btn btn-primary input-sm disabled lastsiswa"><i class="fa fa-step-forward"></i></a>
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
        
        <?php $this->load->view("master-data/siswa/modal/import") ?>
        <?php $this->load->view("master-data/siswa/modal/edit-status") ?>
        <?php $this->load->view("master-data/siswa/modal/cetak-siswa") ?>
        <?php $this->load->view("pengumuman/modal/pilihkelas") ?>
        <?php $this->load->view("pengumuman/modal/pilihsiswa") ?>

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
        <script src="<?php echo base_url("assets/plugins/bootstrap-tagsinput/typeahead-tagsinput.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/serializeJSON/jquery.serializejson.min.js"); ?>"></script>

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
            pagename = "master-data/ajax-siswa.html";
            $(document).ready(function() {
                $('.object_tagsinput').tagsinput({
                    itemValue: 'value',
                    itemText: 'text',
                    typeahead: {
                        source: function(query) {
                            return $.getJSON('cities.json');
                        }
                    }
                });

                GetDataSiswa(request);

                if("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }                
                document.getElementById("form-import-siswa").reset();

            });
            $("#FrmSearchSiswa").submit(function() {
                var kywd = $(this).find(".kywd").val();
                request["Page"] = 1;
                request["filter"]["kywd"] = kywd;
                pagename = "master-data/ajax-siswa.html";
                GetDataSiswa(request);
                return false;
            });
            $("#FrmFilter").submit(function() {
                var status = $(this).find(".is_active").val(), sort = $(this).find(".sort").val(), jurusan = $(this).find(".dropdown-jurusan").val(), kelas = $(this).find(".dropdown-kelas").val();
                request["Sort"] = sort;
                request["filter"]["status"] = status;
                request["filter"]["jurusan"] = jurusan;
                request["filter"]["kelas"] = kelas;
                pagename = "master-data/ajax-siswa.html";
                request["Page"] = 1;
                GetDataSiswa(request);
                return false;
            });

            $(".datatable tbody").on("click", ".edit-status", function() {
                resetformvalue("#modalEditStatus");
                
                var FrmSave = $("#modalEditStatus");
                var id_update = $(this).data("idupdate");
                $(".hidden-idupdate").val(id_update);
                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    FrmSave.find("input[name='form[nis]']").val(resp.nis);
                    FrmSave.find("select[name='form[is_active]']").val(resp.is_active).trigger("change");

                    $(".modal-edit-siswa-status .modal-title").html("Edit Status " + resp.nama);
                    $(".modal-edit-siswa-status").modal("show");
                });
            });

            var FrmSaveWebsite = $(".form-edit-siswa-status").validate({
                submitHandler: function(form) {
                    UpdateData(form, function(resp) {
                        GetDataSiswa(request);
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

            $(".fileimportsiswa").change(function() {
                var selector = $(this);
                if (this.files && this.files[0]) {
                    var tipefile = this.files[0].type.toString();
                    var filename = this.files[0].name.toString();
                    var tipe = ['application/vnd.ms-excel', 'application/msexcel', 'application/x-msexcel', 'application/x-ms-excel', 'application/x-excel', 'application/x-dos_ms_excel', 'application/xls', 'application/x-xls', 'application/excel', 'application/download', 'application/vnd.ms-office', 'application/msword','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/zip', 'application/vnd.ms-excel', 'application/msword', 'application/x-zip', 'application/vnd.ms-excel.sheet.macroEnabled.12'];
                    if(tipe.indexOf(tipefile) == -1) {
                        $(this).val("");
                        toastrshow("warning", "Format salah, pilih file dengan format xls/xlsm/xlsx", "Warning");
                        return;
                    }

                    if((this.files[0].size / 1024) < 2048){
                        var FR = new FileReader();
                        FR.addEventListener("load", function(e) {
                            //var base64 = e.target.result;
                            var base64 = e.target.result.replace("data:"+tipefile+";base64,", '');
                            var ext = filename.split(".").pop();
                            $(".fileimportsiswa-hidden").val(base64);
                            $(".fileimportsiswaext-hidden").val(ext);
                        }); 
                        FR.readAsDataURL(this.files[0]);
                    } else {
                        $(this).val("");
                        toastrshow("warning", "Ukuran file maksimum adalah 2 MB", "Warning");
                    }
                }
            });

            var FrmSaveWebsite = $(".form-import-siswa").validate({
                submitHandler: function(form) {
                    uploadfile(form, function(resp) {
                        GetDataSiswa(request);
                    }, "uploaddata");
                }
            });
        </script>
        <script>
            $("#modalCetakSiswa").on("hidden.bs.modal", function() {
                ResetRequest();
                pagename = "master-data/ajax-siswa.html"; act = "listdatahtml";

                request["filter"]["kywd"]   = $(".kywd").val();
                request["filter"]["kelas"]  = $(".dropdown-kelas").val();
                request["filter"]["status"] = $(".is_active").val();
                request["Sort"]  = $(".sort").val();
                request["Limit"] = $(".limit").val();
            });

            $("#pilihsiswa").on("shown.bs.modal", function() {
                var length = $(this).find(".dropdown-kelas option").length;
                if(length <= 1) {
                    getdatadropdownkelas2();
                }
            });

            $("#modalCetakSiswa").on('show.bs.modal', function () {
                $(".opsi_cetak").val("1").trigger("change");
                $(".tagsinput_siswa").tagsinput("removeAll");;
                $(".tagsinput_siswa_hidden").val("");
                $(".tagsinput_kelas").tagsinput("removeAll");;
                $(".tagsinput_kelas_hidden").val("");
                $(this).find("input[name='duplicate']").val("1");
            });
            
            $(".jumlahcetakdata").change(function() {
                if($(this).val()==""){
                    $(this).val(1);
                }
            });

            $("#pilihkelas").on('show.bs.modal', function () {
                ResetRequest();

                var length = $(".list-group-kelas a").length;
                if(length == 0) {
                    pagename = "master-data/ajax-kelas.html";
                    request["Page"] = 1;
                    SetGetData(request, "listdatahtmlnamakelas", "", ".list-group-kelas");
                }
            });

            $("#pilihsiswa").on('show.bs.modal', function () {
                ResetRequest();

                var length = $(".list-group-siswa a").length;
                if(length == 0) {
                    pagename = "master-data/ajax-siswa.html";
                    request["Page"] = 1;
                    SetGetData(request, "listdatahtmlnamasiswa", "", ".list-group-siswa");
                }
            });
            $(".opsi_cetak").change(function(){
                var value = $(this).val();
                if(value==1){
                    $(".show-kelas").collapse("show");
                    $(".show-siswa").collapse("hide");
                    $(".tagsinput_siswa").tagsinput("removeAll");;
                    $(".tagsinput_siswa_hidden").val("");
                }
                if(value==2){
                    $(".show-kelas").collapse("hide");
                    $(".show-siswa").collapse("show");
                    $(".tagsinput_kelas").tagsinput("removeAll");;
                    $(".tagsinput_kelas_hidden").val("");
                }
            });
            $(".tagsinput_kelas").change(function() {
                var textToAppend = "";
                var selMulti = $(this).each(function(){
                    textToAppend += (textToAppend == "") ? "" : ",";
                    textToAppend += $(this).val();           
                });
                $(".tagsinput_kelas_hidden").val(textToAppend);
            });

            $(".tagsinput_siswa").change(function() {
                var textToAppend = "";
                var selMulti = $(this).each(function(){
                    textToAppend += (textToAppend == "") ? "" : ",";
                    textToAppend += $(this).val();           
                });
                $(".tagsinput_siswa_hidden").val(textToAppend);
            });

             $("#SetFrmKelas").submit(function() {
                var kywd = $(this).find(".kywd").val();
                pagename = "master-data/ajax-kelas.html";
                request["filter"]["kywd"] = kywd;
                SetGetData(request, act, getfunc, ".list-group-kelas");
                return false;
            });

            $("#SetFrmSiswa").submit(function() {
                var kywd = $(this).find(".kywd").val();
                pagename = "master-data/ajax-siswa.html";
                request["filter"]["kywd"] = kywd;
                SetGetData(request, act, getfunc, ".list-group-siswa");
                return false;
            });

            $(".btn.kelasnext").click(function() {
                pagename = "master-data/ajax-kelas.html";
                request["Page"] = datanext;
                SetGetData(request, act, getfunc, ".list-group-kelas");
            });

            $(".btn.siswanext").click(function() {
                pagename = "master-data/ajax-siswa.html";
                request["Page"] = datanext;
                SetGetData(request, act, getfunc, ".list-group-siswa");
            });

            $(".btn.kelasprev").click(function() {
                pagename = "master-data/ajax-kelas.html";
                request["Page"] = dataprev;
                SetGetData(request, act, getfunc, ".list-group-kelas");
            });

            $(".btn.siswaprev").click(function() {
                pagename = "master-data/ajax-siswa.html";
                request["Page"] = dataprev;
                SetGetData(request, act, getfunc, ".list-group-soswa");
            });

            $(".list-group-kelas").on("click", ".nama-kelas", function() {
                var id_kelas = $(this).attr('id');
                id_kelas = id_kelas.replace (/kelas/g, "", id_kelas);
                var nama_kelas = $(this).text();
                $('.tagsinput_kelas').tagsinput('add', { "value": id_kelas , "text": nama_kelas  });
                $('#pilihkelas').modal('hide');
            });

            $(".list-group-siswa").on("click", ".nama-siswa", function() {
                var id_siswa = $(this).attr('id');
                id_siswa = id_siswa.replace (/nis/g, "", id_siswa);
                var namasiswa = $(this).text();
                namasiswa = namasiswa.replace (id_siswa+" - ", "", namasiswa);
                $('.tagsinput_siswa').tagsinput('add', { "value": id_siswa , "text": namasiswa  });
                $('#pilihsiswa').modal('hide');
            });

            var FrmCetak = $(".form-cetak-password").validate({
                submitHandler: function(form) {
                    var item = $(form).serializeJSON(), parameter = "";
                    if($(".opsi_cetak").val()==1){
                        var tagsinput_kelas = $(".tagsinput_kelas_hidden").val();
                        if(!empty(tagsinput_kelas)){
                            if(!empty(item.nis)) {
                                parameter += "?nis="+item.nis;
                                if(!empty(item.duplicate) && item.duplicate > 0) {
                                     parameter += "&duplicate="+item.duplicate;
                                }
                            }
                            if(!empty(item.id_kelas)) {
                                parameter += "?id_kelas="+item.id_kelas;
                                if(!empty(item.duplicate) && item.duplicate > 0) {
                                     parameter += "&duplicate="+item.duplicate;
                                }
                            }
                            l.ladda("start");
                            setTimeout(function() {
                                var win = window.open(base_url + "/siswa/cetak.html"+ parameter, "_blank");
                                if (win) {
                                    win.focus();
                                } else {
                                    toastrshow("error", "Please allow popups for this website", "Error");
                                }
                            }, 500);
                            l.ladda("stop");
                        } else{
                            toastrshow("warning", "Mohon pilih kelas terlebih dahulu", "Warning");
                        }
                    }
                    if($(".opsi_cetak").val()==2){
                        var tagsinput_kelas = $(".tagsinput_siswa_hidden").val();
                        if(!empty(tagsinput_kelas)){
                            if(!empty(item.nis)) {
                                parameter += "?nis="+item.nis;
                                if(!empty(item.duplicate) && item.duplicate > 0) {
                                     parameter += "&duplicate="+item.duplicate;
                                }
                            }
                            if(!empty(item.id_kelas)) {
                                parameter += "?id_kelas="+item.id_kelas;
                                if(!empty(item.duplicate) && item.duplicate > 0) {
                                     parameter += "&duplicate="+item.duplicate;
                                }
                            }
                            l.ladda("start");
                            setTimeout(function() {
                                var win = window.open(base_url + "/siswa/cetak.html"+ parameter, "_blank");
                                if (win) {
                                    win.focus();
                                } else {
                                    toastrshow("error", "Please allow popups for this website", "Error");
                                }
                            }, 500);
                            l.ladda("stop");
                        } else{
                            toastrshow("warning", "Mohon pilih siswa terlebih dahulu", "Warning");
                        }
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

            $(".btn.nextsiswa").click(function() {
                pagename = "master-data/ajax-siswa.html";
                request["Page"] = datanext;
                GetDataSiswa(request, act, getfunc);
            });
            $(".btn.prevsiswa").click(function() {
                pagename = "master-data/ajax-siswa.html";
                request["Page"] = dataprev;
                GetDataSiswa(request, act, getfunc);
            });
            $(".btn.firstsiswa").click(function() {
                pagename = "master-data/ajax-siswa.html";
                request["Page"] = 1;
                GetDataSiswa(request, act, getfunc);
            });
            $(".btn.lastsiswa").click(function() {
                pagename = "master-data/ajax-siswa.html";
                request["Page"] = "-1";
                GetDataSiswa(request, act, getfunc);
            });
            $("#FrmGotoPageSiswa").submit(function() {
                pagename = "master-data/ajax-siswa.html";
                var page = $(this).find("input[type='text']").val();
                request["Page"] = page;
                GetDataSiswa(request, act, getfunc);
                return false;
            });
            function GetDataSiswa(req = "", action = "", succsesfunc = "") {
                act = "listdatahtml";
                $(".datatable tbody").html(loader(true));
                $.ajax({
                    type: "POST",
                    url: base_url + "/ajax/" + pagename,
                    data: {act:act, req:req},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function(resp){
                        if(resp.paging.Total != undefined) {
                            $(".datatable tbody").html(resp.lsdt);
                            paginationsiswa(resp.paging);
                            if(succsesfunc != "") {
                                getfunc = succsesfunc;
                                succsesfunc(resp);
                            }
                        } else {
                            $(".datatable tbody").html(resp.lsdt);
                            $(".pagination-layout").addClass("hidden");
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
            }
            function paginationsiswa(page) {
                var paginglayout = $(".pagination-layout");
                var infopage = page.InfoPage+" Records | "+page.JmlHalTotal+" Pages";
                
                paginglayout.removeClass("hidden");
                paginglayout.find("input[type='text']").val(page.HalKe);
                paginglayout.find("div.info").html(infopage);
                if(page.IsNext == true) {
                    paginglayout.find(".btn.nextsiswa").removeClass("disabled");
                    paginglayout.find(".btn.lastsiswa").removeClass("disabled");
                    datanext = (page.HalKe + 1);
                } else {
                    paginglayout.find(".btn.nextsiswa").addClass("disabled");
                    paginglayout.find(".btn.lastsiswa").addClass("disabled");
                    dataprev = 0;
                }
                if(page.IsPrev == true) {
                    paginglayout.find(".btn.prevsiswa").removeClass("disabled");
                    paginglayout.find(".btn.firstsiswa").removeClass("disabled");
                    dataprev = (page.HalKe - 1);
                } else {
                    paginglayout.find(".btn.prevsiswa").addClass("disabled");
                    paginglayout.find(".btn.firstsiswa").addClass("disabled");
                    dataprev = 0;
                }
            }
        </script>
    </body>
</html>
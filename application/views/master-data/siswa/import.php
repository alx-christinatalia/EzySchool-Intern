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
        <title>Import Siswa | <?php echo $this->config->item("app_title"); ?></title>
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
        <style>
            .opacity-success{
                background-color: #ceede7;   
            }
            .opacity-update{
                background-color: #bad5ec;
            }
            .opacity-error{
                background-color: #fad9d9;
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
                            <div class="col-sm-10 ">
                                <div class="page-title">
                                    <h1><i class="fa fa-database"></i> Import Siswa</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                <li>
                                    <span class="active text-default">Master Data</span>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span class="active text-default">
                                        <a href="<?php echo base_url("siswa.html");?>">Siswa</a>
                                    </span>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span class="active text-default">
                                        <a href="#" onclick="location.reload();">Import Siswa</a>
                                    </span>
                                </li>
                            </ul>   
                            </div>
                            <div class="col-sm-2 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <a data-toggle="modal" data-target="#modalImport" role="button" class="btn btn-primary" title="Import File Excel">
                                            <i class="fa fa-file-excel-o"></i>
                                        </a>
                                        <a href="#" role="button" class="btn btn-primary save-siswaimport hidden" title="Simpan">
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
                                    <div class="table-container">
                                        <form class="form-horizontal form-tambah-siswa" action="master-data/ajax-siswa.html" role="form">
                                            <div class="result-save hidden">
                                            </div>
                                            <div class="result hidden">
                                                <a role="button" class="close" aria-label="close" onclick="$(this).parent('div').addClass('hidden')">&times;</a>
                                                <div class="result-save-detil"></div>
                                            </div>
                                            <div class="mt-repeater-hidden">
                                                <center>
                                                    <img class="loading" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                                </center>
                                            </div>
                                            <div class="mt-repeater hidden table-responsive ">
                                                <table class="table ">
                                                    <thead>
                                                        <tr class="bg-grey-steel">
                                                            <th style="min-width: 100px;">NIS <span class="text-danger">*</span></th>
                                                            <th style="min-width: 100px;">NISN</th>
                                                            <th style="min-width: 100px;">Nama <span class="text-danger">*</span></th>
                                                            <th style="min-width: 100px;">Jenis Kelamin <span class="text-danger">*</span></th>
                                                            <th style="min-width: 120px;">Kelas <span class="text-danger">*</span></th>
                                                            <th style="min-width: 30px;" class="text-center"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody data-repeater-list="data[items]" id="mt-repeater-tbody">
                                                            <tr data-repeater-item class="mt-repeater-item">
                                                                <td>
                                                                    <div class="mt-repeater-input">
                                                                        <input autofocus required type="text" class="form-control formnis" name="form[nis]" placeholder="NIS">
                                                                        <input class="id_siswa" type="hidden" name="form[id_siswa]">
                                                                        <input class="nis" type="hidden">
                                                                        <input type="hidden" name="form[nama_pgl]" class="siswa-nama_pgl">
                                                                        <input type="hidden" name="form[alamat]">
                                                                        <input type="hidden" name="form[no_hp]">
                                                                        <input type="hidden" name="form[email]">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-repeater-input">
                                                                        <input type="text" class="form-control formnisn" name="form[nisn]" placeholder="NISN">
                                                                        <input class="nisn" type="hidden">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-repeater-input">
                                                                        <input required type="text" class="form-control formnama" name="form[nama]" placeholder="Nama">
                                                                        <input class="nama" type="hidden">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-repeater-input">
                                                                        <select required style="width: 100%;" class="select2-normal select2-nosearch dropdown-jeniskelamin formjeniskelamin" name="form[jk]">
                                                                            <option value="">Jenis Kelamin</option>
                                                                            <option value="1">Laki - laki</option>
                                                                            <option value="2">Perempuan</option>
                                                                        </select>
                                                                        <input class="jeniskelamin" type="hidden">
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mt-repeater-input">
                                                                        <select required style="width: 100%;" class="dropdown-kelas formkelas" name="form[id_kelas]">
                                                                            <option value="">Pilih Kelas</option>
                                                                        </select>
                                                                        <input class="kelas" type="hidden">
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
                                                <div class="text-right">
                                                    <a data-repeater-create role="button" class="btn blue-madison btnTambah pull-left "><i class="fa fa-plus"></i> Tambah Data</a>
                                                    <button class=" btn btn-default" type="button" onClick="backAway()">Batal</button> 
                                                    <a role="button" class="btn btn-primary ladda-button ladda-button-submit save-siswaimport hidden"><i class="fa fa-floppy-o"></i> Simpan</a> <!-- update code -->
                                                </div>
                                            </div>
                                        </form>
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
            var aftergetdata = "false";
            var editrow;
            pagename = "master-data/ajax-siswa-import.html";
            $(document).ready(function() {
                $(".dropdown-kelas").select2();
                var FrmSave = $(".form-tambah-siswa");
                var id_update = "<?php echo $this->input->post("FileExcel"); ?>";

                if(empty(id_update)) {
                    $('.table-container .mt-repeater-hidden').html("<div class='text-center'><span class='label label-warning'>Tidak ada file yang diimport</span></div>")
                } else{
                    tempeldata(id_update, FrmSave);
                }
                
                if("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }
            });

            $(".formnama").keyup(function() {
                var value = $(this).val();
                    value = value.split(/\s+/).slice(0,1);

                var index = $(this).parents(".mt-repeater-item").index();
                    index = (index + 1);
                $(".mt-repeater-item:nth-child("+index+") .siswa-nama_pgl").val(value);
            });
            
            function backAway() {
                if(history.length === 1){
                    window.location = "<?php echo base_url("beranda.html")?>";
                } else {
                    history.back();
                }
            }

            function tempeldata(id_update, FrmSave) {
                $(".hidden-idupdate").val(id_update);
                getdatabyid(id_update, function(resp) {
                     if(resp.IsError == true) {
                        toastrshow("error", resp.ErrMessage, "Error");
                    } else {
                        var jumdata = (resp.Data.length - 1);
                        $.each(resp.Data, function(index, item) {
                            if(index < jumdata) {
                                $(".btnTambah").click();
                                $('.mt-repeater-item:nth-child('+index+')').attr('id', "data-"+index);
                                FrmSave.find("input[name='data[items]["+index+"][nis]']").val(item.nis);
                                FrmSave.find("input[name='data[items]["+index+"][nisn]']").val(item.nisn);

                                var nama = item.nama.ucwords();
                                FrmSave.find("input[name='data[items]["+index+"][nama]']").val(nama);

                                var nama_pgl = !empty(item.nama_pgl) ? item.nama_pgl.ucwords(): nama.split(/\s+/).slice(0,1);
                                FrmSave.find("input[name='data[items]["+index+"][nama_pgl]']").val(nama_pgl);
                                FrmSave.find("input[name='data[items]["+index+"][alamat]']").val(item.alamat);
                                FrmSave.find("input[name='data[items]["+index+"][no_hp]']").val(item.no_hp);
                                FrmSave.find("input[name='data[items]["+index+"][email]']").val(item.email);
                            } else {
                                $('.mt-repeater-item:nth-child('+jumdata+')').attr('id', "data-"+jumdata);
                                FrmSave.find("input[name='data[items]["+jumdata+"][nis]']").val(item.nis);
                                FrmSave.find("input[name='data[items]["+jumdata+"][nisn]']").val(item.nisn);

                                var nama = item.nama.ucwords();
                                FrmSave.find("input[name='data[items]["+jumdata+"][nama]']").val(nama);

                                var nama_pgl = !empty(item.nama_pgl) ? item.nama_pgl.ucwords(): nama.split(/\s+/).slice(0,1);
                                FrmSave.find("input[name='data[items]["+jumdata+"][nama_pgl]']").val(nama_pgl);
                                FrmSave.find("input[name='data[items]["+jumdata+"][alamat]']").val(item.alamat);
                                FrmSave.find("input[name='data[items]["+jumdata+"][no_hp]']").val(item.no_hp);
                                FrmSave.find("input[name='data[items]["+jumdata+"][email]']").val(item.email);
                            }
                        });
                        $(".save-siswaimport").removeClass("hidden");
                    }

                    getdatadropdownkelas();
                    $(".dropdown-kelas").select2();
                    var total_data = $(".mt-repeater-item").size();
                    $('.mt-repeater-item:nth-child('+total_data+')').attr('id', "data-"+total_data);
                    setTimeout(function() {
                        $.each(resp.Data, function(index, item) {
                            index2 = index+1;
                            var jenis_kelamin = item.jenis_kelamin;
                            if(/\((\d+)\)/g.test(jenis_kelamin)) {
                                jenis_kelamin = jenis_kelamin.match(/(\d+)/g);
                                jenis_kelamin = jenis_kelamin[0];
                            }
                            var kelas = item.kelas;
                            if(/\((\d+)\)/g.test(kelas)) {
                                kelas = kelas.match(/(\d+)/g);
                                kelas = kelas[0];
                            }
                            $("#mt-repeater-tbody .mt-repeater-item:nth-child("+index2+")").find(".dropdown-jeniskelamin").val(jenis_kelamin).trigger("change");
                            $("#mt-repeater-tbody .mt-repeater-item:nth-child("+index2+")").find(".dropdown-kelas").val(kelas).trigger("change");
                        });
                        $('.mt-repeater-hidden').addClass("hidden");
                        $('.mt-repeater').removeClass("hidden");
                        aftergetdata = "true";
                    }, 3000);
                });
            }
            $(".btnTambah").click(function() {
                var index = $(".dropdown-kelas").parents(".mt-repeater-item").index();
                index = index + 2;
                if(aftergetdata == "true"){
                    var lastchild = "true";
                    getdatadropdownkelas("", lastchild);
                }
                setTimeout(function(){
                    $('.mt-repeater-item:nth-child('+index+') .dropdown-kelas').select2();
                    $('.mt-repeater-item:nth-child('+index+') .dropdown-jeniskelamin').select2({
                        minimumResultsForSearch: Infinity
                    });
                }, 10);
                var total_data = $(".mt-repeater-item").size();
                total_data = total_data + 1;
                setTimeout(function() {
                    $('.mt-repeater-item:nth-child('+total_data+')').attr('id', "data-"+total_data);
                }, 2000);
            });

            function CheckChangeDataSiswa() {
                editrow = 0;
                total_formnominal = $(".mt-repeater-item").size();
                for (i = 1; i <= total_formnominal; i++) {
                    var nis1 = $('.mt-repeater-item:nth-child('+i+') .formnis').val();
                    var nisn1 = $('.mt-repeater-item:nth-child('+i+') .formnisn').val();
                    var nama1 = $('.mt-repeater-item:nth-child('+i+') .formnama').val();
                    var jeniskelamin1 = $('.mt-repeater-item:nth-child('+i+') .formjeniskelamin').val();
                    var kelas1 = $('.mt-repeater-item:nth-child('+i+') .formkelas').val();
                    //c = copy
                    var c_nis1 = $('.mt-repeater-item:nth-child('+i+') .nis').val();
                    var c_nisn1 = $('.mt-repeater-item:nth-child('+i+') .nisn').val();
                    var c_nama1 = $('.mt-repeater-item:nth-child('+i+') .nama').val();
                    var c_jeniskelamin1 = $('.mt-repeater-item:nth-child('+i+') .jeniskelamin').val();
                    var c_kelas1 = $('.mt-repeater-item:nth-child('+i+') .kelas').val();
                    if(nis1!=c_nis1 || nisn1!=c_nisn1 || nama1!=c_nama1 || jeniskelamin1!=c_jeniskelamin1 || kelas1!=c_kelas1){
                        editrow = editrow+1;
                    }
                }
                editrow = editrow;
            }

            var FrmSaveWebsite = $(".form-tambah-siswa").validate({
                submitHandler: function(form) {
                    CheckChangeDataSiswa();
                    if(editrow!=0) {
                        $('.result-save').addClass("hidden");
                        $('.mt-repeater-hidden').removeClass("hidden");
                        var actionForm = $(form).attr("action");
                        var valueJSON  = $(form).serializeJSON();
                            valueJSON  = valueJSON.data;

                        var datAdd = [], datEdit = [];
                        var listdataerror = false;
                        $('.result-save-detil').empty();
                        $.each(valueJSON.items, function(index, item) {
                            var index2 = (parseInt(index)+1);
                            if(!empty(item.nama)) {
                                var total_index = $(".mt-repeater-item").size();
                                var nis = $('.mt-repeater-item:nth-child('+index2+') .formnis').val();
                                var nisn = $('.mt-repeater-item:nth-child('+index2+') .formnisn').val();
                                var nama = $('.mt-repeater-item:nth-child('+index2+') .formnama').val();
                                var jeniskelamin = $('.mt-repeater-item:nth-child('+index2+') .formjeniskelamin').val();
                                var kelas = $('.mt-repeater-item:nth-child('+index2+') .formkelas').val();
                                //c = copy
                                var c_nis = $('.mt-repeater-item:nth-child('+index2+') .nis').val();
                                var c_nisn = $('.mt-repeater-item:nth-child('+index2+') .nisn').val();
                                var c_nama = $('.mt-repeater-item:nth-child('+index2+') .nama').val();
                                var c_jeniskelamin = $('.mt-repeater-item:nth-child('+index2+') .jeniskelamin').val();
                                var c_kelas = $('.mt-repeater-item:nth-child('+index2+') .kelas').val();
                                if(nis!=c_nis || nisn!=c_nisn || nama!=c_nama || jeniskelamin!=c_jeniskelamin || kelas!=c_kelas){
                                    var edit = "true";
                                } else { 
                                    var edit = "false";
                                }
                                //insert
                                if($('.mt-repeater-item:nth-child('+index2+') .id_siswa').val()==""){
                                    var stringify = !empty(item.value) ? jsonstringify(item.value): "";
                                    if(!empty(item.nis) && !empty(item.nama)) {
                                        datAdd[index] = {
                                            "nis": item.nis,
                                            "nisn": item.nisn,
                                            "nama": item.nama,
                                            "nama_pgl": item.nama_pgl,
                                            "alamat": item.alamat,
                                            "no_hp": item.no_hp,
                                            "email": item.email,
                                            "id_kelas": item.id_kelas,
                                            "jk": item.jk,
                                            "index": index2
                                        }
                                    }
                                }
                                //update
                                if($('.mt-repeater-item:nth-child('+index2+') .id_siswa').val()!="" && edit=="true"){
                                    if(!empty(item.nis) && !empty(item.nama) && !empty(item.id_siswa)) {
                                        datEdit[index] = {
                                            "id_siswa": item.id_siswa,
                                            "nis": item.nis,
                                            "nisn": item.nisn,
                                            "nama": item.nama,
                                            "nama_pgl": item.nama_pgl,
                                            "alamat": item.alamat,
                                            "no_hp": item.no_hp,
                                            "email": item.email,
                                            "id_kelas": item.id_kelas,
                                            "jk": item.jk,
                                            "id_siswa": item.id_siswa,
                                            "index": index2
                                        };
                                    }
                                }
                            }
                        });
    
                        if(!empty(datAdd)) {
                            datAdd = {act: "insertdatarepeat", req: datAdd};
                            InsertRepeaterNoToaster("", datAdd, actionForm,  function(resp) {
                                $.each(resp.DataRepeat, function(index, item) {
                                    if(item.IsError == false) {
                                        var id_siswa = item.IdOutput;
                                        $('.mt-repeater-item:nth-child('+item.index+') .id_siswa').val(id_siswa);
                                        $('.mt-repeater-item:nth-child('+item.index+') .nis').val(item.nis);
                                        $('.mt-repeater-item:nth-child('+item.index+') .nisn').val(item.nisn);
                                        $('.mt-repeater-item:nth-child('+item.index+') .nama').val(item.nama);
                                        $('.mt-repeater-item:nth-child('+item.index+') .jeniskelamin').val(item.jeniskelamin);
                                        $('.mt-repeater-item:nth-child('+item.index+') .kelas').val(item.kelas);
                                        $('.mt-repeater-item:nth-child('+item.index+')').removeClass("opacity-error opacity-update processed");
                                        $('.mt-repeater-item:nth-child('+item.index+')').addClass("opacity-success processed");
                                    } else {
                                        listdataerror = true;
                                        $('.mt-repeater-item:nth-child('+item.index+')').removeClass("opacity-success opacity-update processed");
                                        $('.mt-repeater-item:nth-child('+item.index+')').addClass("opacity-error processed");
                                        $('.result-save-detil').append("<label class='text-danger'><b>NIS "+item.nis+"</b> : "+item.ErrMessage+"</label><br>");
                                    }
                                });

                                SetCheckInsertUpdateSiswa(listdataerror);
                            });
                        }

                        if(!empty(datEdit)) {
                            datEdit = {act: "updatedatarepeat", req: datEdit}
                            InsertRepeaterNoToaster("", datEdit, actionForm,  function(resp) {
                                $.each(resp.DataRepeat, function(index, item) {
                                    if(item.IsError == false) {
                                        $('.mt-repeater-item:nth-child('+item.index+') .nis').val(item.nis);
                                        $('.mt-repeater-item:nth-child('+item.index+') .nisn').val(item.nisn);
                                        $('.mt-repeater-item:nth-child('+item.index+') .nama').val(item.nama);
                                        $('.mt-repeater-item:nth-child('+item.index+') .jeniskelamin').val(item.jeniskelamin);
                                        $('.mt-repeater-item:nth-child('+item.index+') .kelas').val(item.kelas);
                                        $('.mt-repeater-item:nth-child('+item.index+')').removeClass("opacity-error opacity-success processed");
                                        $('.mt-repeater-item:nth-child('+item.index+')').addClass("opacity-update processed");
                                    } else {
                                        listdataerror = true;
                                        $('.mt-repeater-item:nth-child('+item.index+')').removeClass("opacity-success opacity-update processed");
                                        $('.mt-repeater-item:nth-child('+item.index+')').addClass("opacity-error processed");
                                        $('.result-save-detil').append("<label class='text-danger'><b>NIS "+item.nis+"</b> : "+item.ErrMessage+"</label><br>");
                                    }
                                });
                                
                                SetCheckInsertUpdateSiswa(listdataerror);
                            });
                        }
                    } else {
                        toastrshow("warning", "Tidak ada data yang bisa disimpan", "Warning");
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

            $(".save-siswaimport").click(function() {
                $(".form-tambah-siswa").submit();
            });

            function removeprocessed(){
                var total_remove = $(".mt-repeater-item").size();
                for(var z=1;z<=total_remove;z++){
                    $('.mt-repeater-item:nth-child('+parseInt(z)+')').removeClass("processed");
                }
            }

            function AlertShow(msg, type = 'info') {
                return '<div class="alert alert-'+ type +'">'+ msg +'</div>';
            }

            function scrollToCenter(scroll, total_index) {
                var container = $('body'),
                    scrollTo = $('#data-'+scroll);
                container.animate({
                    scrollTop: scrollTo.offset().top - container.offset().top + scrollTo.scrollTop() - container.height() / total_index
                });
            }

            function SetCheckInsertUpdateSiswa(listdataerror) {  
                var insert = $(".opacity-success").size();
                var update = $(".opacity-update").size();
                var error = $(".opacity-error").size();
                $('.mt-repeater-hidden').addClass("hidden");
                $('.result-save').removeClass("hidden");
                removeprocessed();
                var alert = AlertShow(
                    "<span class='font-green-meadow'>" +
                        "<span class='bold'>"
                            + insert +
                        "</span>" + " Data insert. " +
                    "</span>" +
                    "<span class='text-info'>" +
                        "<span class='bold'>"
                            + update +
                        "</span>" + " Data update. " + 
                    "</span>" +
                    "<span class='text-danger'>" +
                        "<span class='bold'>"
                            + error +
                        "</span>" + " Data error." +
                    "</span>", "info"
                );
                if(listdataerror == true){
                    $('.result-save-detil, .result').removeClass("hidden");
                } else {
                    $('.result-save-detil, .result').addClass("hidden");
                }
                $(".result-save").html(alert);
                $('.scroll-to-top').click();
            }
        </script>
        <script>
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
    </body>
</html>
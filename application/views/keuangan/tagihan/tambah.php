<?php 
    $user = $this->session->userdata("user");
    date_default_timezone_set('Asia/Jakarta');
    $tgl_tagihan = date_indo("d M Y");
    $tgl_jatuh_tempo = date_indo("d M Y", strtotime("+7 day"));
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Tambah Tagihan | <?php echo $this->config->item("app_title"); ?></title>
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
        <link href="<?php echo base_url("assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"); ?>" rel="stylesheet">
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
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="page-title">
                                    <h1><i class="fa fa-money"></i> Tambah Tagihan</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                    <li>
                                        <span class="active text-default">Keuangan</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="<?php echo base_url("tagihan.html"); ?>" >Tagihan</a>
                                        </span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Tambah Tagihan</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <a href="#" role="button" class="btn btn-primary save-tagihanbaru ladda-button ladda-button-submit" data-style="slide-up" title="Simpan">
                                            <i class="fa fa-save"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" data-toggle="modal" data-target=".modal-tambah-tarif" title="Tambah Tarif"><i class="fa fa-plus"></i>
                                        </a>
                                        <a role="button" class="btn btn-primary" onclick="location.reload();" title="Refresh">
                                            <i class="fa fa-refresh"></i>
                                        </a>
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
                        <div class="col-md-12">
                            <div class="portlet custom light bordered">
                                <div class="portlet-body">
                                    <form method="POST" class="form-horizontal form-tagihan-baru">
                                        <div class="form-group">
                                        <label class="control-label col-md-3">Kategori <span class="text-danger">*</span></label>
                                            <div class="col-md-5">
                                                <select style="width:100%;" class="form-control select2-nosearch dropdown-kattagihan kategori_tag"  class="form" required>
                                                    <option value="">Pilih Kategori</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Tgl Tagihan <span class="text-danger">*</span></label>
                                            <div class="col-md-5">
                                                <div class='input-group date'>
                                                    <input id='datetimepicker5' type='text' name="form[tgl_tagihan]" readonly required class="form-control tgl_tagihan tanggal" placeholder="Tanggal Tagihan Dibuat" value="<?php echo $tgl_tagihan; ?>"/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 5px;">
                                            <label class="control-label col-md-3">Tgl Jatuh Tempo <span class="text-danger">*</span></label>
                                            <div class="col-md-5">
                                                <div class='input-group date'>
                                                    <input type="text" class="form-control tgl_jatuh_tempo tanggal" readonly required name="form[tgl_jatuh_tempo]" placeholder="Tanggal Jatuh Tempo" id='datetimepicker6' value="<?php echo $tgl_jatuh_tempo; ?>"/>
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-calendar"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0px;">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-9">
                                                <div class="btn-group btn-group-sm chooselist" data-toggle="buttons">
                                                    <label class="documentactive btn blue active">
                                                        <input name="valuedata" type="radio" class="toggle input-sm chooseday" datavalue="day" value="7">H+7</label>
                                                    <label class="btn blue">
                                                        <input name="valuedata" type="radio" class="toggle input-sm chooseday" datavalue="day" value="14">H+14</label>
                                                    <label class="btn blue">
                                                        <input name="valuedata" type="radio" class="toggle input-sm chooseday" datavalue="day" value="21">H+21</label>
                                                    <label class="btn blue">
                                                        <input name="valuedata" type="radio" class="toggle input-sm chooseday" datavalue="month" value="1">B+1</label>
                                                    <label class="btn blue">
                                                        <input name="valuedata" type="radio" class="toggle input-sm chooseday" datavalue="month" value="4">B+4</label>
                                                    <label class="btn blue">
                                                        <input name="valuedata" type="radio" class="toggle input-sm chooseday" datavalue="month" value="8">B+8</label>
                                                    <label class="btn blue">
                                                        <input name="valuedata" type="radio" class="toggle input-sm chooseday" datavalue="month" value="12">B+12</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-sm-2 col-xs-5" style="max-width: 140px;">
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-btn">
                                                        <a role="button" class="btn btn-primary input-sm hari-prev"><i class="fa fa-chevron-left"></i></a>
                                                    </span>
                                                    <input type="text" name="page" class="form-control input-sm text-center hari-text" value="7" style="min-width: 25px;">
                                                    <span class="input-group-btn">
                                                        <a role="button" class="btn btn-primary input-sm hari-next"><i class="fa fa-chevron-right"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-xs-1" style="padding-left: 0px;">
                                                <label class="control-label bold">Hari</label>
                                            </div>
                                            <div class="col-sm-2 col-xs-5" style="max-width: 140px;">
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-btn">
                                                        <a role="button" class="btn btn-primary input-sm bulan-prev"><i class="fa fa-chevron-left"></i></a>
                                                    </span>
                                                    <input type="text" name="page" class="form-control input-sm text-center bulan-text" value="0" style="min-width: 25px;">
                                                    <span class="input-group-btn">
                                                        <a role="button" class="btn btn-primary input-sm bulan-next"><i class="fa fa-chevron-right"></i></a>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-sm-1 col-xs-1" style="padding-left: 0px;">
                                                <label class="control-label bold">Bulan</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Nama Tarif <span class="text-danger">*</span></label>
                                            <div class="col-md-5">
                                                <div class='input-group'>
                                                    <input type="text" class="form-control nama_tarif" required placeholder="Klik tombol di sebelah kanan" disabled>
                                                    <a role="button" class="btn btn-primary btn_tarif disabled input-group-addon" data-toggle="modal" data-target="#pilihtarif">
                                                        <span class="fa fa-list-ul"></span>
                                                    </a>
                                                </div>
                                            </div>
                                            <input type="hidden" name="form[id_tarif]" class="id_tarif"/>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Penerima <span class="text-danger">*</span></label>
                                            <div class="col-md-5">
                                                <select style="width: 100%;" class="select2-nosearch dropdown-jns_penerima" required>
                                                    <option value="1">Semua Siswa</option>
                                                    <option value="2">Per Kelas</option>
                                                    <option value="3">Per Siswa</option>
                                                </select>
                                                <input type="hidden" value="1" class="input-jns_penerima" name="form[jns_penerima]">
                                            </div>
                                        </div>
                                        <div class="form-group show-kelas collapse">
                                            <label class="control-label col-md-3">Kelas <span class="text-danger">*</span></label>
                                            <div class="col-md-5">
                                                <input type="text" value="" class="object_tagsinput tagsinput_kelas">
                                                <a href="#pilihkelas" role="button" data-toggle="modal" class="btn btn-primary margin-top-10">
                                                    <i class="fa fa-plus"></i> Tambah Kelas
                                                </a>
                                                <input type="hidden" class="tagsinput_kelas_hidden">
                                                <input type="hidden" class="tagsinput_namakelas_hidden">
                                            </div>
                                        </div>
                                        <div class="form-group show-siswa collapse">
                                            <label class="control-label col-md-3">Siswa <span class="text-danger">*</span></label>
                                            <div class="col-md-5">
                                                <input type="text" class="object_tagsinput tagsinput_siswa">
                                                <a href="#pilihsiswa" role="button" data-toggle="modal" class="btn btn-primary margin-top-10">
                                                    <i class="fa fa-plus"></i> Tambah Siswa
                                                </a>
                                                <input type="hidden" class="tagsinput_siswa_hidden">
                                                <input type="hidden" class="tagsinput_namasiswa_hidden">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Keterangan</label>
                                            <div class="col-md-5">
                                                <textarea style="max-width: 600px;" type="text" class="form-control keterangan" placeholder="Keterangan" name="form[keterangan]"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-right col-md-3">Lainnya <a data-placement="right" data-container="body" data-toggle="tooltip" title="Jika tarif khusus diaktifkan, maka siswa yang memiliki tarif khusus akan secara otomatis mendapatkan tagihan yang disesuaikan dengan tarif khusus yang dikenakan."><i class="fa fa-question-circle"></i></a></label>
                                            <div class="col-md-5">
                                                <div class="md-checkbox">
                                                    <input type="checkbox" id="checkbox1_211" class="md-check status-withtarif">
                                                    <label for="checkbox1_211">
                                                    <span class="inc"></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>Dikenakan Tarif Khusus? </label>
                                                </div>
                                            </div>
                                            <input type="hidden" class="withtarif">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-md-3"></label>
                                            <div class="col-md-5">
                                                <div class="md-checkbox">
                                                    <input type="checkbox" id="checkbox1_2" class="md-check status-publish">
                                                    <label for="checkbox1_2">
                                                    <span class="inc"></span>
                                                    <span class="check"></span>
                                                    <span class="box"></span>Publish </label>
                                                </div>
                                            </div>
                                            <input type="hidden" class="publish" name="form[is_published]" val="0">
                                        </div>
                                        <div class="form-group text-right">
                                            <div class="col-md-8">
                                                <button class="btn btn-default" type="button" onClick="backAway()">Batal</button>                                                    
                                                <button class="btn btn-primary ladda-button ladda-button-submit add-siswa" type="submit"  data-style="slide-up"><i class="fa fa-save"></i> Simpan</button>
                                            </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             
            <?php $this->load->view("other/footer") ?>
        </div>
        <?php $this->load->view("keuangan/tagihan/modal/pilihkelas") ?>
        <?php $this->load->view("keuangan/tagihan/modal/pilihsiswa") ?>
        <?php $this->load->view("keuangan/tagihan/modal/pilihtarif") ?>
        <?php $this->load->view("keuangan/tagihan/modal/tambah_tarif") ?>

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
        <script src="<?php echo base_url("assets/plugins/serializeJSON/jquery.serializejson.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/plugins/bootstrap-tagsinput/typeahead-tagsinput.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js"); ?>"></script>
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script> 

        <!-- Bootstrap Datetimepicker -->
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"); ?>"></script>
        <script src="<?php echo base_url("assets/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.id.min.js"); ?>" charset="UTF-8"></script>

        <script>
            pagename = "keuangan/ajax-tagihan.html";
            $(document).ready(function() {
                $(".select2-multiple").select2({
                    placeholder: "Pilih Bulan",
                    closeOnSelect: false
                });
                $('[data-toggle="tooltip"]').tooltip({
                    trigger: 'click',
                    placement: 'bottom'
                });
                getdatadropdownkelas2();
                getdatadropdownkattagihan();

                $('.object_tagsinput').tagsinput({
                    itemValue: 'value',
                    itemText: 'text',
                    typeahead: {
                        source: function(query) {
                            return $.getJSON('cities.json');
                        }
                    }
                });
                
                var date = new Date().getFullYear() + 3;
                for(i = date; i > date - 4; i--){
                    $(".dropdown-tahun").append("<option value=" + i + ">" + i + "</option>");
                }
                $(".tahun").val(new Date().getFullYear()).trigger("change");

                GetData(request);

                $('#datetimepicker5').datepicker({
                    defaultDate: new Date(),
                    autoclose: true,
                    format: 'dd M yyyy',
                    todayHighlight: true,
                    maxViewMode: 2,
                    immediateUpdates: true,
                    language: "id"
                }).on('changeDate', function (selected) {
                    var minDate = new Date(selected.date.valueOf());
                    var jatuhtempo = new Date($('#datetimepicker6').val());
                    $('#datetimepicker6').datepicker('setStartDate', minDate);
                    if(minDate > jatuhtempo){
                        $('#datetimepicker6').datepicker('setDate', minDate);
                    }
                });

                $('#datetimepicker6').datepicker({
                    startDate: new Date($('#datetimepicker5').val()),
                    defaultDate: new Date(),
                    autoclose: true,
                    format: 'dd M yyyy',
                    todayHighlight: true,
                    maxViewMode: 2,
                    immediateUpdates: true,
                    language: "id"
                });
                
                if("<?php echo $user->foto; ?>" == "default.png"){
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else {
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto);
                }
                GetKelasTagihan();
                $(".status-withtarif, .status-publish").click();
                $(".documentactive").addClass("active");
            });

            function backAway() {
                if(history.length === 1){
                    window.location = "<?php echo base_url("beranda.html")?>";
                } else {
                    history.back();
                }
            }

            $(".chooselist").click(function(){
                setTimeout(function(){
                    var attrvalue = $("input[name='valuedata']:checked").attr('datavalue');
                    var valuedata = $("input[name='valuedata']:checked").val();
                    console.log(attrvalue+" "+valuedata);
                    if(attrvalue=="day"){
                        $(".bulan-text").val(0);
                        $(".hari-text").val(valuedata);
                    }
                    if(attrvalue=="month"){
                        $(".hari-text").val(0);
                        $(".bulan-text").val(valuedata);
                    }
                    startdate();
                }, 10);
            });
            $(".hari-text").change(function(){
                $(".btn.blue.active").removeClass('active');
                if(/(\d+)/.test($(".hari-text").val())) {
                    if(/[a-zA-Z]/.test($(".hari-text").val())){
                        $(".hari-text").val(0);
                    }
                    if(/[~`!@#$%^&*(){}\[\];:"'<,.>?\/\\|_+=-]/.test($(".hari-text").val())){
                        $(".hari-text").val(0);
                    }
                } else {
                  $(".hari-text").val(0);
                }
                startdate();
            });
            $(".hari-prev").click(function(){
                $(".btn.blue.active").removeClass('active');
                var hari = $(".hari-text").val();
                if(hari > 0){
                    hari = (hari*1)-1;
                    $(".hari-text").val(hari);
                }
                startdate();
            });
            $(".hari-next").click(function(){
                $(".btn.blue.active").removeClass('active');
                var hari = $(".hari-text").val();
                hari = (hari*1)+1;
                $(".hari-text").val(hari);
                startdate();
            });
            $(".bulan-text").change(function(){
                $(".btn.blue.active").removeClass('active');
                if(/(\d+)/.test($(".bulan-text").val())) {
                    if(/[a-zA-Z]/.test($(".bulan-text").val())){
                        $(".bulan-text").val(0);
                    }
                    if(/[~`!@#$%^&*(){}\[\];:"'<,.>?\/\\|_+=-]/.test($(".bulan-text").val())){
                        $(".bulan-text").val(0);
                    }
                } else {
                  $(".bulan-text").val(0);
                }
                startdate();
            });
            $(".bulan-prev").click(function(){
                $(".btn.blue.active").removeClass('active');
                var hari = $(".bulan-text").val();
                if(hari > 0){
                    hari = (hari*1)-1;
                    $(".bulan-text").val(hari);
                }
                startdate();
            });
            $(".bulan-next").click(function(){
                $(".btn.blue.active").removeClass('active');
                var hari = $(".bulan-text").val();
                hari = (hari*1)+1;
                $(".bulan-text").val(hari);
                startdate();
            });
            $(".tgl_tagihan").change(function(){
                $(".btn.blue.active").removeClass('active');
                var hari = $(".hari-text").val();
                startdate();
            });
            $(".tgl_jatuh_tempo").change(function(){
                $(".btn.blue.active").removeClass('active');
                var tgl_tagihan = $(".tgl_tagihan").val();
                var tgl_jatuh_tempo = $(this).val();
                tgl_tagihan = moment(tgl_tagihan, 'DD MMM YYYY');
                tgl_jatuh_tempo = moment(tgl_jatuh_tempo, 'DD MMM YYYY');
                texthari = tgl_jatuh_tempo.diff(tgl_tagihan, 'days');
                if(texthari < 0){
                    texthari = $(".hari-text").val();
                }
                $(".hari-text").val(texthari);
            });
            $(".tgl_jatuh_tempo").blur(function(){
                var tanggaltagihan = $(".tgl_tagihan").val();
                var harijumlah = moment(tanggaltagihan, 'DD MMM YYYY').add($(".hari-text").val(), 'days').add($(".bulan-text").val(), 'months');
                harijumlah = moment(harijumlah).format("DD MMM YYYY");
                $(".tgl_jatuh_tempo ").val(harijumlah);
            });
            function startdate(){
                var tanggaltagihan = $(".tgl_tagihan").val();
                var harijumlah = moment(tanggaltagihan, 'DD MMM YYYY').add($(".hari-text").val(), 'days').add($(".bulan-text").val(), 'months');
                harijumlah = moment(harijumlah).format("DD MMM YYYY");
                $(".tgl_jatuh_tempo ").val(harijumlah);
            }

            $(".status-withtarif").change(function(){
                if ($(this).is(":checked")) {
                    $(".withtarif").val(0);
                } else {
                    $(".withtarif").val(1);
                }
            });

            $(".status-publish").change(function(){
                if ($(this).is(":checked")) {
                    $(".publish").val(1);
                } else {
                    $(".publish").val(0);
                }
            });

            $(".dropdown-jns_penerima").change(function(){
                if($(this).val() == 1){
                    $(".show-kelas").collapse("hide");
                    $(".show-siswa").collapse("hide");
                    $("input[name='form[jns_penerima]']").val(1);
                    GetKelasTagihan();
                } else if($(this).val() == 2){
                    $(".show-kelas").collapse("show");
                    $(".show-siswa").collapse("hide");
                    $("input[name='form[jns_penerima]']").val(1);
                } else if($(this).val() == 3){
                    $(".show-kelas").collapse("hide");
                    $(".show-siswa").collapse("show");
                    $("input[name='form[jns_penerima]']").val(2);
                }
            });
            
            $(".tanggal").attr('style', "background-color: #ffffff");

            $("#pilihkelas").on('show.bs.modal', function () {
                pagename = "master-data/ajax-kelas.html";
                request["Page"] = 1;
                SetGetData(request, "listdatahtmlnamakelas", "", ".list-group-kelas");
                setTimeout(function(){
                    $("#SetFrmKelas .input-search .form-control.kywd").focus();
                }, 1100);
            });

            $("#pilihsiswa").on('show.bs.modal', function () {
                pagename = "master-data/ajax-siswa.html";
                request["Page"] = 1;
                SetGetData(request, "listdatahtmlnamasiswa", "", ".list-group-siswa");
                setTimeout(function(){
                    $(".col-md-7 .input-search .form-control.kywd").focus();
                }, 1100);
            });

            $("#pilihtarif").on('show.bs.modal', function () {
                var tgl= $(".tgl_tagihan").val(), 
                    bulan = moment(tgl, "DD-MMM-YYYY").format("M"), 
                    tahun = moment(tgl, "DD-MMM-YYYY").format("YYYY"),
                    kategori = $(".kategori_tag").val();

                pagename = "keuangan/ajax-tagihan.html";
                request["Page"] = 1;
                request["filter"]["bulan"] = bulan;
                request["filter"]["tahun"] = tahun;
                request["filter"]["kategori"] = kategori;
                SetGetData(request, "listdatahtmlpilihtarif", "", ".list-group-tarif");
                setTimeout(function(){
                    $("#SetFrmTarif .input-search .form-control.kywd").focus();
                }, 1100);
            });

            $(".modal-tambah-tarif").on('show.bs.modal', function () {
                resetformvalue("#FrmAddTarif");
                getdatadropdownkattagihan();

                var bulan_sekarang= moment().format("M");
                $(".bulan").val([bulan_sekarang]).trigger("change");;
                $(".tahun").val(new Date().getFullYear()).trigger("change");
                $(".modal-tambah-tarif .modal-title").html("Tambah Tarif");
            });

            $(".semua-bulan").click(function() {
                $(".bulan").val(["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"]).trigger("change");
            });

            $(".nom").blur(function() {
                var selection = window.getSelection().toString();
                if ( selection !== '' ) {
                    return;
                }
                if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
                    return;
                }
                var $this = $(this);
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
            function validate(evt) {
                var charCode = (evt.which) ? evt.which : evt.keyCode;
                return !(charCode > 31 && (charCode < 48 || charCode > 57));
            }

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

            $(".list-group-tarif").on("click", ".nama-tarif", function() {
                var id_tarif = $(this).data("id_tarif");
                var namatarif = $(this).text();

                $(".nama_tarif").val(namatarif);
                $(".id_tarif").val(id_tarif);
                $('#pilihtarif').modal('hide');
            });

            $(".tagsinput_kelas").change(function() {
                var textToAppend = "";
                var selMulti = $(this).each(function(){
                    textToAppend += (textToAppend == "") ? "" : ",";
                    textToAppend += $(this).val();           
                });
                $(".tagsinput_kelas_hidden").val(textToAppend);
                $(".tagsinput_namakelas_hidden").html(textToAppend);
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
                request["filter"]["kywd"] = kywd;
                SetGetData(request, act, getfunc, ".list-group-kelas");
                return false;
            });

            $("#SetFrmSiswa").submit(function() {
                var kywd = $(this).find(".kywd").val();
                request["filter"]["kywd"] = kywd;
                SetGetData(request, act, getfunc, ".list-group-siswa");
                return false;
            });

            $(".btn.kelasnext").click(function() {
                request["Page"] = datanext;
                SetGetData(request, act, getfunc, ".list-group-kelas");
            });

            $(".btn.siswanext").click(function() {
                request["Page"] = datanext;
                SetGetData(request, act, getfunc, ".list-group-siswa");
            });

            $(".btn.kelasprev").click(function() {
                request["Page"] = dataprev;
                SetGetData(request, act, getfunc, ".list-group-kelas");
            });

            $(".btn.siswaprev").click(function() {
                request["Page"] = dataprev;
                SetGetData(request, act, getfunc, ".list-group-siswa");
            });
            
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

            var FrmSaveWebsite = $(".form-tagihan-baru").validate({
                submitHandler: function(form) {
                    if($(".id_tarif").val() != ""){    
                        var cek = 0, success = 0, error = 0;
                        var kategori = $(".kategori_tag").val(),
                            tgl_tagihan = $(".tgl_tagihan").val(),
                            tgl_jt_tempo = $(".tgl_jatuh_tempo").val(),
                            id_tarif = $(".id_tarif").val(),
                            nama_tarif = $(".nama_tarif").val(),
                            jns_penerima = $(".input-jns_penerima").val(),
                            dropdownjns_penerima = $(".dropdown-jns_penerima").val(),
                            is_tarifkhusus = $(".withtarif").val(),
                            is_published = $(".publish").val(),
                            keterangan = $(".keterangan").val(),
                            id_kelas, nama_kelas, nis, nama_siswa, action_name = "", request, input;

                        if(dropdownjns_penerima == 1) {
                            id_kelas = $(".tagsinput_kelas_hidden").val();
                            id_kelas = id_kelas.split(",");
                            input    = id_kelas;

                            nama_kelas = $(".tagsinput_namakelas_hidden").val();
                            nama_kelas = nama_kelas.split(",");
                        } else {
                            if(jns_penerima == 1) {
                                id_kelas = $(".tagsinput_kelas_hidden").val();
                                id_kelas = id_kelas.split(",");
                                input    = id_kelas;

                                nama_kelas = $(".tagsinput_kelas").tagsinput("items");
                            } else if(jns_penerima == 2) {
                                nis   = $(".tagsinput_siswa_hidden").val();
                                nis   = nis.split(",");

                                nama_siswa = $(".tagsinput_siswa").tagsinput("items");
                                input = nis;
                            }
                        }
                        

                        if(is_tarifkhusus == 0){
                            action_name = "insertdatawithtarif";
                        }
                        else {
                            action_name = "insertdatarepeat";
                        }

                        $(".result-save-detil").empty();
                        $(".result").removeClass("hidden");

                        $.each(input, function(index, item) {
                            request = {
                                "jns_penerima": jns_penerima, 
                                "id_tarif": id_tarif, 
                                "id_kategori": kategori,
                                "keterangan": keterangan,
                                "is_published": is_published,
                                "tgl_tagihan": tgl_tagihan,
                                "tgl_jatuh_tempo": tgl_jt_tempo
                            };
                            if(dropdownjns_penerima == 1) {
                                request["id_kelas"] = item;
                                request["nama_kelas"] = nama_kelas[index];

                                var nama_alert = nama_kelas[index];
                                if(empty(nama_alert)) return;
                            } else {
                                if(jns_penerima == 1) {
                                    request["id_kelas"] = item;
                                    request["nama_kelas"] = nama_kelas[index].text;

                                    var nama_alert = nama_kelas[index].text;
                                } else if(jns_penerima == 2) {
                                    request["nis"] = item;

                                    var nama_alert = nama_siswa[index].text;
                                }
                            }
                            data = {act: action_name, req: request};

                            InsertRepeaterNoToaster("", data, "keuangan/ajax-tagihan.html", function(resp) {
                                if(resp.IsError == false) {
                                    $(".result-save-detil").append("<label class='font-green-meadow'><b>"+nama_tarif+" ("+nama_alert+")</b> : Tagihan telah dibuat</label><br>");
                                } else {
                                    $(".result-save-detil").append("<label class='text-danger'><b>"+nama_tarif+" ("+nama_alert+")</b> : "+ resp.ErrMessage +"</label><br>");
                                }
                            });
                            $(window).scrollTop(0);
                        });

                        return false;
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

            $(".save-tagihanbaru").click(function() {
                $(".form-tagihan-baru").submit();
            });

            $(".kategori_tag").change(function() {
                var value = $(this).val();
                $(".nama_tarif").val("");
                if(!empty(value)) {
                    $(".btn_tarif").removeClass("disabled");
                } else {
                    $(".btn_tarif").addClass("disabled");
                }
            });

            function GetKelasTagihan() {
                $(".tagsinput_kelas_hidden, .tagsinput_namakelas_hidden").val("");
                $.ajax({
                    type: "POST",
                    url: base_url + "/ajax/master-data/ajax-kelas.html",
                    data: {act:"getdata"},
                    dataType: "JSON",
                    tryCount: 0,
                    retryLimit: 3,
                    success: function(resp){
                        if(resp.IsError == false) {
                            $.each(resp.Data, function(index, item) {
                                if(resp.Data.length != 0) {
                                    $(".tagsinput_kelas_hidden").val($(".tagsinput_kelas_hidden").val() + resp.Data[index].id_kelas + ",");
                                    $(".tagsinput_namakelas_hidden").val($(".tagsinput_namakelas_hidden").val() + resp.Data[index].nama + ",");
                                }
                            });
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
        </script>
    </body>
</html>
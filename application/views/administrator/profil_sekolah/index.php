<?php 
    $user = $this->session->userdata("user");
    //print_r($this->session->userdata("sekolah"));
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Profil Sekolah | EzySchool Sekolah</title>
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta content="" name="description">

        <link href="<?php echo base_url("assets/css/styles.css")?>" rel="stylesheet">

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

        <link href="<?php echo base_url("assets/plugins/clockpicker/bootstrap-clockpicker.css"); ?>" rel="stylesheet">

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
                             <div class="col-xs-8"> 
                                <div class="page-title">
                                    <h1 class="title-edit"><i class="fa fa-user"></i> Profil Sekolah</h1>
                                </div>
                                <ul style="padding-bottom: 0px; margin-top: 5px; margin-bottom: 15px;" class="page-breadcrumb breadcrumb col-xs-12">
                                    <li>
                                        <span class="active text-default">Administrator</span>
                                        <i class="fa fa-circle"></i>
                                    </li>
                                    <li>
                                        <span class="active text-default">
                                            <a href="#" onclick="location.reload();">Profil Sekolah</a>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-4 text-right"> 
                                <div class="form-inline">
                                    <span class="form-group text-center"> 
                                        <a role="button" class="btn btn-primary simpandata ladda-button ladda-button-submit" data-style="slide-up" title="Simpan">
                                            <i class="fa fa-save"></i>
                                        </a>
                                    </span>
                                    <span class="form-group text-center">
                                        <a role="button" class="btn btn-primary" onclick="location.reload();" title="Refresh">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="notifikasi">
                                <?php 
                                    print_r($this->session->userdata("notifikasi")); 
                                    $this->session->unset_userdata("notifikasi"); 
                                ?>
                            </div>
                            <div class="portlet custom light bordered">
                                <div class="portlet-body">
                                 <form class="form-horizontal form-edit-siswa" action="administrator/ajax-profil-sekolah.html" role="form">
                                    <div class="mt-repeater-hidden">
                                        <center>
                                            <img class="loading" style="width: 30px;" src="<?php echo base_url("assets/img/loading_2.gif") ?>" alt="Loading ...">
                                        </center>
                                        <br>
                                    </div>
                                    <div class="mt-repeater-data hidden">
                                      <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#umum">Informasi Umum</a></li>
                                        <li><a data-toggle="tab" href="#khusus">Informasi Khusus </a></li>
                                        <li><a data-toggle="tab" href="#pengaturan">Pengaturan</a></li>
                                      </ul>
                                      <div class="tab-content">
                                        <div id="umum" class="tab-pane fade in active">
                                          <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Logo Sekolah</label>
                                            <div class="col-md-5 col-sm-9 col-xs-12 fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img alt="" class="foto-sekolah"> </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Pilih gambar </span>
                                                        <span class="fileinput-exists"> Ganti </span>
                                                        <input type="hidden" value="" name="..."><input type="file" name="" class="photo1"> </span>
                                                        <input type="hidden" class="old-photo1">
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hapus </a>
                                                </div>
                                            </div>
                                            <input type="hidden" class="input-photo1" name="form[logo]">
                                        </div>
                                        <input type="hidden" name="form[id_update]" required>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Nama Sekolah
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input required type="text" class="form-control" placeholder="Nama Sekolah" name="form[nama]" autofocus/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Alamat
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input required type="text" class="form-control" placeholder="Alamat" name="form[alamat]"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Jenjang
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <select class="form-control select2-nosearch" name="form[jenjang]" style="width: 100%;" required>
                                                    <option value="">Pilih Jenjang</option>
                                                    <option value="TK">Taman Kanak-Kanak (TK)</option>
                                                    <option value="SD">Sekolah Dasar (SD)</option>
                                                    <option value="SMP">Sekolah Menengah Pertama (SMP)</option>
                                                    <option value="SMA">Sekolah Menengah Atas (SMA)</option>
                                                    <option value="SMK">Sekolah Menengah Kejuruan (SMK)</option>
                                                    <option value="PT">Perguruan Tinggi (PT)</option>
                                                    <option value="KR">Kursus (KR)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Status
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <select class="form-control select2-nosearch" name="form[status]" style="width: 100%;" required>
                                                    <option value="">Pilih Status</option>
                                                    <option value="Negeri">Negeri</option>
                                                    <option value="Swasta">Swasta</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Telepon
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input required type="text" class="form-control" placeholder="Telepon" name="form[telepon]" onkeypress='return validatedata(event)'/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Fax
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" placeholder="Fax" name="form[fax]"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Website
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" placeholder="Website" name="form[website]"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Email
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input type="email" class="form-control" placeholder="Email" name="form[email]"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Provinsi
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <select class="select2-normal dropdown-provinsi provinsi" name="form[id_provinsi]" style="width: 100%;" required>
                                                    <option value="">Pilih Provinsi</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Kota/Kabupaten
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <select class="select2-normal dropdown-kotakab kotakab" name="form[id_kota]" style="width: 100%;" required>
                                                    <option value="">Pilih Kota/Kabupaten</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Kecamatan
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <select class="select2-normal dropdown-kecamatan kecamatan" name="form[id_kecamatan]" style="width: 100%;" required>
                                                    <option value="">Pilih Kecamatan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Peta Lokasi
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12" style="position: relative;">
                                                <div class="map_canvas"></div>
                                                <div style="position: absolute; top: 18px; right: 25px;">
                                                  <input type="text" class="form-control" placeholder="Cari Lokasi" id="geocomplete" style="width: 245px;"/>
                                                  <input type="button" value="find" class="hidden" />
                                                </div>
                                                <div class="row details">
                                                    <div class="col-md-6 col-sm-6 col-xs-6"> <!-- update code -->
                                                        <input type="text" class="form-control" placeholder="Latitude" data-geo="lat"  name="form[lokasi_lat]" readonly required style="width: 100%;"/>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6"> <!-- update code -->
                                                        <input type="text" class="form-control" placeholder="Longitude" data-geo="lng"  name="form[lokasi_lon]" readonly required style="width: 100%;"/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <div id="khusus" class="tab-pane fade">
                                          <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Foto Kepala Sekolah</label>
                                            <div class=" col-md-5 col-sm-9 col-xs-12 fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img alt="" class="foto-kepsek"> </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Pilih gambar </span>
                                                        <span class="fileinput-exists"> Ganti </span>
                                                        <input type="hidden" value="" name="..."><input type="file" name="" class="photo2"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Hapus </a>
                                                </div>
                                            </div>
                                            <input type="hidden" class="input-photo2" name="form[kepsek_foto]">
                                            <input type="hidden" class="old-photo2">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Nama Kepala Sekolah
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input required type="text" class="form-control" placeholder="Nama Kepala Sekolah" name="form[kepsek_nama]"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">NIP Kepala Sekolah
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input required type="text" class="form-control" placeholder="NIP Kepala Sekolah" name="form[kepsek_nip]"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">No HP Kepala Sekolah
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" placeholder="No. HP Kepala Sekolah" name="form[kepsek_nohp]" onkeypress='return validatedata(event)'/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Email Kepala Sekolah
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input type="email" class="form-control" placeholder="Email Kepala Sekolah" name="form[kepsek_email]"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Sambutan Kepala Sekolah
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <textarea style="max-width: 600px;" rows="5" type="text" class="form-control" placeholder="Sambutan Kepala Sekolah" name="form[sambutan_kepsek]"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Nama Contact Person
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input required type="text" class="form-control" placeholder="Nama Contact Person" name="form[cp_nama]"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">No HP Contact Person
                                                <span class="required"> * </span>
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input required type="text" class="form-control" placeholder="Nama Contact Person" name="form[cp_nohp]" onkeypress='return validatedata(event)'/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Email Contact Person
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input type="email" class="form-control" placeholder="Email Contact Person" name="form[cp_email]"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Sejarah Sekolah
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <textarea style="max-width: 600px;" rows= "5" type="text" class="form-control" placeholder="Sambutan Kepala Sekolah" name="form[sejarah_sekolah]"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Visi dan Misi Sekolah
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <textarea style="max-width: 600px;" rows= "5" type="text" class="form-control" placeholder="Sambutan Kepala Sekolah" name="form[visi_misi]"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label bold col-md-3 col-sm-3 col-xs-12">Slogan
                                            </label>
                                            <div class="col-md-5 col-sm-9 col-xs-12">
                                                <input type="text" class="form-control" placeholder="Slogan" name="form[slogan]"/>
                                            </div>
                                        </div>
                                        </div>
                                        <div id="pengaturan" class="tab-pane fade">
                                            <div class="form-group">
                                                <h4 class="uppercase bold control-label bold col-md-3 col-sm-3 col-xs-12 font-grey-cascade">Akun EzyPay</h4>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label bold col-md-3 col-sm-3 col-xs-12 bold">Nama & Email</label>
                                                <div class="col-md-5 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control" placeholder="Mohon lengkapi data akun EzyPay dibawah ini" name="ezypay_nama" disabled />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label bold col-md-3 col-sm-3 col-xs-12 bold">No HP <span class="required">*</span></label>
                                                <div class="col-md-5 col-sm-9 col-xs-12">
                                                    <input type="text" class="form-control" placeholder="No HP" name="form[ezypay_nohp]" onkeypress='return validatedata(event)' required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label bold col-md-3 col-sm-3 col-xs-12 bold">Password <span class="required">*</span></label>
                                                <div class="col-md-5 col-sm-9 col-xs-12">
                                                    <input type="password" class="form-control ezypay_pass" placeholder="Password 6 digit angka" name="form[ezypay_pass]" maxlength="6"/>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="form-group">
                                                <h4 class="uppercase bold control-label bold col-md-3 col-sm-3 col-xs-12 font-grey-cascade ">WAKTU SEKOLAH</h4>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label bold col-md-3 col-sm-3 col-xs-12 bold">Zona Waktu
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5 col-sm-9 col-xs-12">
                                                    <select class="form-control select2-nosearch timezone_nama" name="form[timezone_nama]" style="width: 100%;" required>
                                                        <option value="">Pilih Zona Waktu</option>
                                                        <option value="WIB">WIB</option>
                                                        <option value="WITA">WITA</option>
                                                        <option value="WIT">WIT</option>
                                                    </select>
                                                    <input type="hidden" name="form[timezone]" class="timezone">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label bold col-md-3 col-sm-3 col-xs-12 bold">Jam Masuk
                                                    <span class="required"> * </span>  
                                                </label>
                                                <div class="col-md-5 col-sm-9 col-xs-12">
                                                    <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                                        <input type="text" class="form-control" placeholder="Jam Masuk" name="form[jam_masuk]">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label bold col-md-3 col-sm-3 col-xs-12 bold">Jam Pulang
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5 col-sm-9 col-xs-12">
                                                    <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                                        <input type="text" class="form-control" placeholder="Jam Keluar" name="form[jam_pulang]">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label bold col-md-3 col-sm-3 col-xs-12 bold">Batas Keterlambatan
                                                    <span class="required"> * </span>
                                                </label>
                                                <div class="col-md-5 col-sm-9 col-xs-12">
                                                    <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                                        <input type="text" class="form-control" placeholder="Batas Keterlambatan" name="form[jam_masuk]">
                                                        <span class="input-group-addon">
                                                            <span class="glyphicon glyphicon-time"></span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label bold col-md-3 col-sm-3 col-xs-12 bold">Hari Aktif Sekolah
                                                    <span class="required"> * </span>
                                                    
                                                </label>
                                                <div class="col-md-5 col-sm-9 col-xs-12">
                                                    <div class="col-xs-4">
                                                        <div class="mt-repeater-input " style="padding: 0px; align-items: center;">
                                                            <label class="mt-checkbox mt-checkbox-outline">
                                                                <input type="checkbox" class="checkhari_aktif" checked value="1"> Senin
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="mt-repeater-input" style="padding: 0px; align-items: center;">
                                                            <label class="mt-checkbox mt-checkbox-outline">
                                                                <input type="checkbox" class="checkhari_aktif" checked value="2"> Selasa
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="mt-repeater-input" style="padding: 0px; align-items: center;">
                                                            <label class="mt-checkbox mt-checkbox-outline">
                                                                <input type="checkbox" class="checkhari_aktif" checked value="3"> Rabu
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="mt-repeater-input" style="padding: 0px; align-items: center;">
                                                            <label class="mt-checkbox mt-checkbox-outline">
                                                                <input type="checkbox" class="checkhari_aktif" checked value="4"> Kamis
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5">
                                                        <div class="mt-repeater-input" style="padding: 0px; align-items: center;">
                                                            <label class="mt-checkbox mt-checkbox-outline">
                                                                <input type="checkbox" class="checkhari_aktif" checked value="5"> Jumat
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="mt-repeater-input" style="padding: 0px; align-items: center;">
                                                            <label class="mt-checkbox mt-checkbox-outline">
                                                                <input type="checkbox" class="checkhari_aktif" checked value="6"> Sabtu
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                        <div class="mt-repeater-input" style="padding: 0px; align-items: center;">
                                                            <label class="mt-checkbox mt-checkbox-outline">
                                                                <input type="checkbox" class="checkhari_aktif" checked value="0"> Minggu
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" class="hari_aktif" name="form[hari_tidakaktif]">
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-md-8 col-sm-12 col-xs-12 text-right">
                                            <button type="button" onclick="backAway()" class="btn btn-default">Batal</button>
                                            
                                            <button type="submit" class="btn btn-primary ladda-button ladda-button-submit" data-style="slide-up"><i class="fa fa-save"></i> Simpan</button> <!-- update code -->
                                        </div>
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
        
        <?php //$this->load->view("kunci/modal/modal") ?>

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
        <script src="<?php echo base_url("assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js"); ?>"></script>
              
        <script src="<?php echo base_url("assets/js/theme.js"); ?>"></script>   
        <script src="<?php echo base_url("assets/js/layout.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/demo.min.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/proses.js"); ?>"></script> 
        <script src="<?php echo base_url("assets/js/public.js"); ?>"></script>

        <!-- Bootstrap Timepicker -->
        <script src="<?php echo base_url("assets/plugins/clockpicker/bootstrap-clockpicker.js"); ?>"></script>
        <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDx0kO83xAokjuqaSL-hoNcEA7x7JNmqM0&libraries=places"></script>
        <script src="<?php echo base_url("assets/js/jquery.geocomplete.min.js")?>"></script>

        <script>
            pagename = "administrator/ajax-profil-sekolah.html";
            var upload_foto1 = false, upload_foto2 = false;
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip(); 
                $('.clockpicker').clockpicker();
                // foto profil navbar
                if("<?php echo $user->foto; ?>" == "default.png") {
                    $(".fotoprof").attr("src", "<?php echo base_url("assets/img/default-user.png"); ?>");
                } else{
                    foto = ParseGambar("<?php echo $user->foto; ?>");
                    $(".fotoprof").attr("src", foto.replace("original","small"));
                }

                var timezone = {"WIB": "Asia/Jakarta", "WITA": "Asia/Pontianak", "WIT": "Asia/Jayapura"};
                $(".timezone_nama").change(function() {
                    var value = $(this).val();
                    $(".timezone").val(timezone[value]);
                });

                $(".checkhari_aktif").click(function() {
                    CheckHariAktif();
                });

                <?php
                    if(!empty($this->input->get("tab"))) {
                        echo '$(".nav-tabs a[href=\'#'.$this->input->get("tab").'\']").tab("show");';
                    }
                ?>

                documentready();
            });

            function backAway() {
                if(history.length === 1){
                    window.location = "<?php echo base_url("beranda.html")?>";
                } else {
                    history.back();
                }
            }

            $(function(){
                $("#geocomplete").bind("geocode:dragged", function(event, latLng){
                    $("input[name='form[lokasi_lat]']").val(latLng.lat());
                    $("input[name='form[lokasi_lon]']").val(latLng.lng());
                    $("#reset").show();});

                    $("#reset").click(function(){
                    $("#geocomplete").geocomplete("resetMarker");
                    $("#reset").hide();
                    return false;
                });

                $("#find").click(function(){
                    $("#geocomplete").trigger("geocode");
                });
            });
            
            $(".foto-sekolah").error(function (){
                $(".foto-sekolah").attr('src', "<?php echo base_url(); ?>" + "assets/img/default-sekolah.png");
            });
            $(".foto-kepsek").error(function (){
                $(".foto-kepsek").attr('src', "<?php echo base_url("assets/img/default-user.png"); ?>");
            });

            function documentready() {
                $(".mt-repeater-hidden").addClass("hidden");
                $(".mt-repeater-data").removeClass("hidden");

                var FrmSave = $(".form-edit-siswa");
                var id_update = <?php echo $this->session->userdata("db"); ?>;
                $(".hidden-idupdate").val(id_update);
                getdatabyid(id_update, function(resp) {
                    var resp = resp.Data[0];
                    FrmSave.find("input[name='form[id_update]']").val(resp.id);
                    
                    $(".page-title .title-edit").html("<i class='fa fa-user'></i> Profil "+ resp.nama);
                    FrmSave.find("input[name='form[nama]']").val(resp.nama);
                    FrmSave.find("input[name='form[alamat]']").val(resp.alamat);

                    FrmSave.find("input[name='form[lokasi_lat]']").val(resp.lokasi_lat);
                    FrmSave.find("input[name='form[lokasi_lon]']").val(resp.lokasi_lon);

                    if(!empty(resp.lokasi_lat) && !empty(resp.lokasi_lon)) {
                        FrmSave.find("input[name='form[lokasi_lat]']").val(resp.lokasi_lat);
                        FrmSave.find("input[name='form[lokasi_lon]']").val(resp.lokasi_lon);

                        var setloc = new google.maps.LatLng(resp.lokasi_lat, resp.lokasi_lon);
                    } else {
                        FrmSave.find("input[name='form[lokasi_lat]']").val("-6.1753924");
                        FrmSave.find("input[name='form[lokasi_lon]']").val("106.8262588");

                        var setloc = new google.maps.LatLng(-6.1753924, 106.8262588);
                    }

                    $("#geocomplete").geocomplete({
                        map: ".map_canvas",
                        details: ".details",
                        detailsAttribute: "data-geo",
                        markerOptions: {
                            draggable: true
                        },
                        location: setloc
                    });

                    var id_prov = resp.id_provinsi, id_kot = resp.id_kota, id_kec = resp.id_kecamatan;
                    getdatadropdownprovinsi(id_prov, function(resp) {
                        getdatadropdownkotakab(id_prov, id_kot, function(resp) {
                            getdatadropdownkecamatan(id_kot, id_kec, function() {
                                dropdown_lokasi();
                            });
                        });
                    });

                    FrmSave.find("select[name='form[jenjang]']").val(resp.jenjang).trigger("change");
                    FrmSave.find("select[name='form[status]']").val(resp.status).trigger("change");

                    if(resp.logo == "default.png"){
                        FrmSave.find(".foto-sekolah").attr('src', "<?php echo base_url(); ?>" + "assets/img/default-sekolah.png");
                    } else {
                        foto = ParseGambar(resp.logo);
                        FrmSave.find(".foto-sekolah").attr('src', foto.replace("original","small"));
                        $(".old-photo1").val(resp.logo.replace("small","original"));
                    }
                    FrmSave.find("input[name='form[telepon]']").val(resp.telepon);
                    FrmSave.find("input[name='form[fax]']").val(resp.fax);
                    FrmSave.find("input[name='form[website]']").val(resp.website);
                    FrmSave.find("input[name='form[email]']").val(resp.email);

                    FrmSave.find("input[name='form[kepsek_nama]']").val(resp.kepsek_nama);
                    FrmSave.find("input[name='form[kepsek_nip]']").val(resp.kepsek_nip);
                    FrmSave.find("input[name='form[kepsek_nohp]']").val(resp.kepsek_nohp);
                    if(resp.kepsek_foto == "default.png") {
                        FrmSave.find(".foto-kepsek").attr('src', "<?php echo base_url("assets/img/default-user.png"); ?>");
                    } else {
                        foto = ParseGambar(resp.kepsek_foto);
                        FrmSave.find(".foto-kepsek").attr('src', foto.replace("original","small"));
                        $(".old-photo2").val(resp.kepsek_foto.replace("small","original"));
                    }
                    FrmSave.find("input[name='form[kepsek_email]']").val(resp.kepsek_email);
                    FrmSave.find("textarea[name='form[sambutan_kepsek]']").val(resp.sambutan_kepsek);

                    FrmSave.find("input[name='form[cp_nama]']").val(resp.cp_nama);
                    FrmSave.find("input[name='form[cp_nohp]']").val(resp.cp_nohp);
                    FrmSave.find("input[name='form[cp_email]']").val(resp.cp_email);

                    FrmSave.find("textarea[name='form[sejarah_sekolah]']").val(resp.sejarah_sekolah);
                    FrmSave.find("textarea[name='form[visi_misi]']").val(resp.visi_misi);

                    FrmSave.find("input[name='form[slogan]']").val(resp.slogan);

                    jam_masuk = moment(resp.jam_masuk, "HH:mm:ss").format('HH:mm');
                    jam_pulang = moment(resp.jam_pulang, "HH:mm:ss").format('HH:mm');

                    FrmSave.find("input[name='form[jam_masuk]']").val(jam_masuk); 
                    FrmSave.find("input[name='form[jam_pulang]']").val(jam_pulang); 
                    FrmSave.find("select[name='form[jml_hari_aktif]']").val(resp.jml_hari_aktif).trigger("change");
                    FrmSave.find("select[name='form[timezone_nama]']").val(resp.timezone_nama).trigger("change");
                    FrmSave.find(".input-photo1").val(resp.logo);
                    FrmSave.find(".input-photo2").val(resp.kepsek_foto);

                    var ezypay_email  = "";
                    if(!empty(resp.ezypay_email)) ezypay_email = " ("+resp.ezypay_email+")"; 

                    if(!empty(resp.ezypay_nama)) {
                        FrmSave.find("input[name='ezypay_nama']").val(resp.ezypay_nama + ezypay_email);
                    }
                    FrmSave.find("input[name='form[ezypay_nohp]']").val(resp.ezypay_nohp);
                    FrmSave.find("input[name='form[ezypay_pass]']").val("");

                    var hari_aktif = resp.hari_tidakaktif.split(",");
                    $.each(hari_aktif, function(index, item) {
                        if(!empty(item)) {
                            $(".mt-repeater-input .checkhari_aktif[value="+item+"]").prop("checked", false);
                        }
                    });
                    CheckHariAktif();
                });
            }

            function documentnotready() {
                $(".mt-repeater-hidden").addClass("hidden");
                $(".mt-repeater-data").removeClass("hidden");
            }

            function dropdown_lokasi() {
                $(".dropdown-provinsi").on("change", function() {
                    var id_prov = $(this).val();
                    if(!empty(id_prov)) {
                        getdatadropdownkotakab(id_prov);
                    } else {
                        $(".dropdown-kotakab").html("<option value=''>Pilih Kota/Kabupaten</option>");
                        $(".dropdown-kecamatan").html("<option value=''>Pilih Kecamatan</option>");
                        $(".dropdown-kotakab, .dropdown-kecamatan").val("").trigger("change");
                    }
                });

                $(".dropdown-kotakab").on("change", function() {
                    var id_kot = $(this).val();
                    if(!empty(id_kot)) {
                        getdatadropdownkecamatan(id_kot);
                    } else {
                        $(".dropdown-kecamatan").html("<option value=''>Pilih Kecamatan</option>");
                        $(".dropdown-kecamatan").val("").trigger("change");
                    }
                });
            }

            $(".photo1").change(function() {
                var selector = $(this);
                if (!this.files || !this.files[0]) {
                    return;
                }
                var tipefile = this.files[0].type.toString();
                if(tipefile != "image/png" && tipefile != "image/jpeg" && tipefile != "image/bmp") {
                    $(this).val("");
                    toastrshow("warning", "Format salah, pilih file dengan format jpg/png/bmp", "Warning");
                    return;
                }
                if((this.files[0].size / 1024) > 2048){
                    $(this).val("");
                    toastrshow("warning", "Maximum file size is 2 MB", "Warning");
                    return;
                }

                var FR = new FileReader();
                FR.addEventListener("load", function(readerEvent) {
                    var image = new Image();
                    image.onload = function(imageEvent) {
                        var canvas = document.createElement("canvas"),
                            max_size = 300,// TODO : pull max size from a site config
                            width = image.width,
                            height = image.height;
 
                        if (width > height) {
                            if (width > max_size) {
                                height *= max_size / width;
                                width = max_size;
                            }
                        } else {
                            if (height > max_size) {
                                width *= max_size / height;
                                height = max_size;
                            }
                        }
                        canvas.width = width;
                        canvas.height = height;
                        canvas.getContext("2d").drawImage(image, 0, 0, width, height);

                        var base64 = canvas.toDataURL("image/jpeg");
                            base64 = base64.replace(/^data:image\/(png|jpg|jpeg|bmp);base64,/, '');

                        upload_foto1 = true;    
                        $(".input-photo1").val(base64);
                    };
                    image.src = readerEvent.target.result;
                }); 
                FR.readAsDataURL(this.files[0]);  
            });

            $(".photo2").change(function() {
                var selector = $(this);
                if (!this.files || !this.files[0]) {
                    return;
                }
                var tipefile = this.files[0].type.toString();
                if(tipefile != "image/png" && tipefile != "image/jpeg" && tipefile != "image/bmp") {
                    $(this).val("");
                    toastrshow("warning", "Format salah, pilih file dengan format jpg/png/bmp", "Warning");
                    return;
                }
                if((this.files[0].size / 1024) > 2048){
                    $(this).val("");
                    toastrshow("warning", "Maximum file size is 2 MB", "Warning");
                    return;
                }

                var FR = new FileReader();
                FR.addEventListener("load", function(readerEvent) {
                    var image = new Image();
                    image.onload = function(imageEvent) {
                        var canvas = document.createElement("canvas"),
                            max_size = 300,// TODO : pull max size from a site config
                            width = image.width,
                            height = image.height;
 
                        if (width > height) {
                            if (width > max_size) {
                                height *= max_size / width;
                                width = max_size;
                            }
                        } else {
                            if (height > max_size) {
                                width *= max_size / height;
                                height = max_size;
                            }
                        }
                        canvas.width = width;
                        canvas.height = height;
                        canvas.getContext("2d").drawImage(image, 0, 0, width, height);

                        var base64 = canvas.toDataURL("image/jpeg");
                            base64 = base64.replace(/^data:image\/(png|jpg|jpeg|bmp);base64,/, '');

                        upload_foto2 = true;    
                        $(".input-photo2").val(base64);
                    };
                    image.src = readerEvent.target.result;
                }); 
                FR.readAsDataURL(this.files[0]);  
            });

            function CheckHariAktif() {
                var allVals = [];
                $(".checkhari_aktif").each(function() {
                    var selector = $(this);
                    if(selector.is(":not(:checked)")) {
                        allVals.push(selector.val());
                    }
                });

                allVals = allVals.join(",");
                $(".hari_aktif").val(allVals);
            }

            var FrmSaveWebsite = $(".form-edit-siswa").validate({
                submitHandler: function(form) {
                    $(".mt-repeater-hidden").removeClass("hidden");
                    $(".mt-repeater-data").addClass("hidden");
                    var base64a = $(".input-photo1").val();
                    var base64b = $(".input-photo2").val();
                    var old_patha = $(".old-photo1").val();
                    var old_pathb = $(".old-photo2").val();
                    var ajaxtarget = "administrator/ajax-profil-sekolah.html";
                    
                    if(!empty(base64a) && !empty(base64b) && upload_foto1 == true && upload_foto2 == true) {
                        uploadfoto(ajaxtarget,base64a,function (resp){
                            if(!resp.IsError) {
                                $(".input-photo1").val(resp.Output);
                                 uploadfoto(ajaxtarget,base64b,function (resp){
                                    if(!resp.IsError) {
                                         $(".input-photo2").val(resp.Output);
                                        UpdateDataAjax(form, function(resp) {
                                            if(!resp.IsError) {
                                                documentready();                
                                            }
                                        });
                                    }   
                                },"uploadfoto",old_pathb);
                            }
                        },"uploadfoto", old_patha);
                    } else if(!empty(base64a) && upload_foto1 == true) {
                        uploadfoto(ajaxtarget,base64a,function (resp){
                            if(!resp.IsError) {
                                $(".input-photo1").val(resp.Output);
                                UpdateDataAjax(form, function(resp) {
                                    if(!resp.IsError) {
                                        documentready();                
                                    }
                                });
                            }
                        },"uploadfoto", old_patha);
                    } else if(!empty(base64b) && upload_foto2 == true) {
                        uploadfoto(ajaxtarget,base64b,function (resp){
                            if(!resp.IsError) {
                                $(".input-photo2").val(resp.Output);
                                UpdateDataAjax(form, function(resp) {
                                    if(!resp.IsError) {
                                        documentready();                
                                    }
                                });
                            }
                        },"uploadfoto", old_pathb);
                    } else {
                        UpdateDataAjax(form, function(resp) {
                            if(!resp.IsError) {
                                documentready();                
                            }
                        });
                    }
                    upload_foto1 = false;
                    upload_foto2 = false;
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

            $(".simpandata").click(function() {
                $(".form-edit-siswa").submit();
            });
            $(".ezypay_pass").keydown(function (e) {
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                    (e.keyCode >= 35 && e.keyCode <= 40)) {
                         return;
                }
                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });
        </script>
    </body>
</html>
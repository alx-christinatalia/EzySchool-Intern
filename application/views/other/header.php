<?php
    $user    = $this->session->userdata("user");
    $sekolah = $this->session->userdata("sekolah");
    $date = date("Y-m-d");
?>
<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner">
        <div class="page-logo">
            <div class="text-center" style="vertical-align: middle;">
            <a href="<?php echo base_url(); ?>">
                <img alt="logo" class="logo-default" src="<?php echo base_url("assets/img/EzySchool-Text-2.png") ?>" style="max-height: 35px; max-width: 145px;">
            </a>
            <div class="menu-toggler sidebar-toggler"></div>
            </div>
        </div>
        <a role="button" class="menu-toggler responsive-toggler" data-target=".navbar-collapse" data-toggle="collapse"></a> <!-- END RESPONSIVE MENU TOGGLER -->
         <div class="page-group top-menu">
                <ul class="nav navbar-nav pull-right">
                    <li class="dropdown dropdown-extended dropdown-dark hidden-xs hidden-sm" style="padding: 20px 12px 0px">
                        <h2 class="group"><span class="group-name"><?php echo $sekolah->Data[0]->nama; ?></span></h2>
                    </li>
                </ul>
            </div>
            <div class="top-menu pull-right">
                <ul class="nav navbar-nav pull-right">
                    
                    <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                            <i class="icon-plus" style="font-size: 25px;"></i>
                        </a>
                        <ul class="dropdown-menu" style="width:200px">
                            <li class="external">
                                <h3>
                                    <span class="bold">Aksi</span>
                                </h3>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" data-handle-color="#637283" data-initialized="1">
                                    <li>
                                        <a href="<?php echo base_url(); ?>input_absensi_harian.html?tgl=<?php echo $date; ?>">
                                            <span class="details">
                                                <span class="label label-icon label-success">
                                                    <i class="fa fa-address-book"></i>
                                                </span> Tambah Absensi 
                                            </span>
                                        </a>
                                        <a href="<?php echo base_url(); ?>nilai/tambah.html?tgl=<?php echo $date; ?>">
                                            <span class="details">
                                                <span class="label label-icon label-success">
                                                    <i class="fa fa-tasks"></i>
                                                </span> Tambah Nilai 
                                            </span>
                                        </a>
                                        <a href="<?php echo base_url("berita/tambah.html"); ?>">
                                            <span class="details">
                                                <span class="label label-icon label-success">
                                                    <i class="fa fa-newspaper-o"></i>
                                                </span> Tambah Berita 
                                            </span>
                                        </a>
                                        <a href="<?php echo base_url("pengumuman/tambah.html"); ?>">
                                            <span class="details">
                                                <span class="label label-icon label-success">
                                                    <i class="fa fa-bullhorn"></i>
                                                </span> Tambah Pengumuman 
                                            </span>
                                        </a>
                                        <a href="<?php echo base_url("tagihan/tambah.html"); ?>">
                                            <span class="details">
                                                <span class="label label-icon label-success">
                                                    <i class="fa fa-money"></i>
                                                </span> Tambah Tagihan 
                                            </span>
                                        </a>
                                        <a href="<?php echo base_url("/pembayaran.html"); ?>">
                                            <span class="details">
                                                <span class="label label-icon label-success">
                                                    <i class="fa fa-money"></i>
                                                </span> Tambah Pembayaran 
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a class="dropdown-toggle" data-close-others="true" data-hover="dropdown" data-toggle="dropdown" href="#">
                            <span class="username hidden-xs "><?php echo $user->nama; ?></span>
                            <img alt="" class="img-circle fotoprof" onerror="this.src='<?php echo base_url("assets/img/default-user.png");?>'">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="<?php echo base_url("user/profil.html"); ?>"><i class="fa fa-user"></i> Edit Profil</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url("user/logout.html"); ?>"><i class="fa fa-sign-out"></i> Keluar</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
    </div>
</div>

<div class="clearfix"></div>
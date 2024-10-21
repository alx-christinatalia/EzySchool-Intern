<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <?php if($this->foglobal->HakAkses("1", false)) { ?>
            <li class="nav-item start <?php if(!empty($dashboard)){ echo $dashboard;} ?>">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="arrow <?php if(!empty($dashboard)){ echo "open";}?>"></span>
                </a>
                <ul class="sub-menu">
                    <?php if($this->foglobal->HakAkses("1.1", false)) { ?>
                    <li class="nav-item <?php if(!empty($dash_abs)){ echo $dash_abs;} ?>">
                        <a href="<?php echo base_url('beranda.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Sekolah</span>
                        </a>
                    </li>
                    <?php } ?> 
                    <?php if($this->foglobal->HakAkses("1.2", false)) { ?>
                    <li class="nav-item <?php if(!empty($dash_keu)){ echo $dash_keu;} ?>">
                        <a href="<?php echo base_url('dashboard_keuangan.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Keuangan</span>
                        </a>
                    </li>
                    <?php } ?> 
                </ul>
            </li> 
            <?php } ?>            
            <?php if($this->foglobal->HakAkses("2", false)) { ?>
            <li class="nav-item <?php if(!empty($absensi)){ echo $absensi;} ?>">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-address-book"></i>
                    <span class="title">Absensi</span>
                    <span class="arrow <?php if(!empty($absensi)){ echo "open";}?>"></span>
                </a>
                <ul class="sub-menu">
                    <?php if($this->foglobal->HakAkses("2.1", false)) { ?>
                    <li class="nav-item <?php if(!empty($input)){ echo $input;} ?>">
                        <a href="<?php echo base_url('input_absensi_harian.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Input Absensi</span>
                        </a>
                    </li>
                    <?php } ?> 
                    <?php if($this->foglobal->HakAkses("2.2", false)) { ?>
                    <li class="nav-item <?php if(!empty($harian)){ echo $harian;} ?>">
                        <a href="<?php echo base_url('rekap_absensi_harian.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Rekap Absensi Harian</span>
                        </a>
                    </li>
                    <?php } ?> 
                    <?php if($this->foglobal->HakAkses("2.3", false)) { ?>
                    <li class="nav-item <?php if(!empty($bulanan)){ echo $bulanan;} ?>">
                        <a href="<?php echo base_url('rekap_absensi_bulanan.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Rekap Absensi Bulanan</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("2.5", false)) { ?>
                    <li class="nav-item <?php if(!empty($r_siswa)){ echo $r_siswa;} ?>">
                        <a href="<?php echo base_url('rekap_absensi_siswa.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Rekap Absensi Per Siswa</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("2.4", false)) { ?>
                    <li class="nav-item <?php if(!empty($periode)){ echo $periode;} ?>">
                        <a href="<?php echo base_url('periode_absensi.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Periode Absensi</span>
                        </a>
                    </li>
                    <?php } ?> 
                </ul>
            </li>
            <?php } ?>
            <?php if($this->foglobal->HakAkses("3", false)) { ?>
            <li class="nav-item <?php if(!empty($keuangan)){ echo $keuangan;} ?>">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-money"></i>
                    <span class="title">Keuangan</span>
                    <span class="arrow <?php if(!empty($keuangan)){ echo "open";}?>"></span>
                </a>
                <ul class="sub-menu">
                    <?php if($this->foglobal->HakAkses("3.1", false) || $this->foglobal->HakAkses("3.2", false)) { ?>
                    <li class="nav-item <?php if(!empty($tagihan)){ echo $tagihan;} ?>">
                        <a href="<?php echo base_url('tagihan.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Tagihan</span>
                            <span class="arrow <?php if(!empty($tagihan)){ echo "open";}?>"></span>
                        </a>
                        <ul class="sub-menu">
                            <?php if($this->foglobal->HakAkses("3.1", false)) { ?>
                            <li class="nav-item <?php if(!empty($daftartagihan)){ echo $daftartagihan;} ?>">
                               <a href="<?php echo base_url('tagihan.html') ?>" class="nav-link nav-toggle">
                                    <span class="title">Daftar Tagihan</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if($this->foglobal->HakAkses("3.2", false)) { ?>
                            <li class="nav-item <?php if(!empty($tambahtagihan)){ echo $tambahtagihan;} ?>">
                               <a href="<?php echo base_url('tagihan/tambah.html') ?>" class="nav-link nav-toggle">
                                    <span class="title">Tambah Tagihan</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php } ?>
                    <li class="nav-item <?php if(!empty($pembayaran)){ echo $pembayaran;} ?>">
                        <?php if($this->foglobal->HakAkses("3.3", false) || $this->foglobal->HakAkses("3.4", false) || $this->foglobal->HakAkses("3.5", false)) { ?>
                        <a href="<?php echo base_url('pembayaran.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Pembayaran</span>
                            <span class="arrow <?php if(!empty($pembayaran)){ echo "open";}?>"></span>
                        </a>
                        <ul class="sub-menu">
                            <?php if($this->foglobal->HakAkses("3.3", false)) { ?>
                            <li class="nav-item <?php if(!empty($bayartagihan)){ echo $bayartagihan;} ?>">
                               <a href="<?php echo base_url('pembayaran.html') ?>" class="nav-link nav-toggle">
                                    <span class="title">Bayar Tagihan</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if($this->foglobal->HakAkses("3.4", false)) { ?>
                            <li class="nav-item <?php if(!empty($riwayatbayar)){ echo $riwayatbayar;} ?>">
                               <a href="<?php echo base_url('pembayaran/riwayat.html') ?>" class="nav-link nav-toggle">
                                    <span class="title">Daftar Pembayaran</span>
                                </a>
                            </li>
                            <?php } ?>
                            <?php if($this->foglobal->HakAkses("3.5", false)) { ?>
                            <li class="nav-item <?php if(!empty($konfirmasibayar)){ echo $konfirmasibayar;} ?>">
                               <a href="<?php echo base_url('pembayaran/konfirmasi.html') ?>" class="nav-link nav-toggle">
                                    <span class="title">Konfirmasi Pembayaran</span>
                                </a>
                            </li>
                            <?php } ?>
                        </ul>
                        <?php } ?>
                    </li>
                    <?php if($this->foglobal->HakAkses("3.6", false)) { ?>
                    <li class="nav-item <?php if(!empty($tarif)){ echo $tarif;} ?>">
                        <a href="<?php echo base_url('tarif.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Tarif</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("3.7", false)) { ?>
                    <li class="nav-item <?php if(!empty($tarif_khusus)){ echo $tarif_khusus;} ?>">
                        <a href="<?php echo base_url('tarif_khusus.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Tarif Khusus</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("3.8", false)) { ?>
                    <li class="nav-item <?php if(!empty($kategori_tagihan)){ echo $kategori_tagihan;} ?>">
                        <a href="<?php echo base_url('tagihan/kategori.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Kategori Tagihan</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->foglobal->HakAkses("4", false)) { ?>
            <li class="nav-item <?php if(!empty($nilai)){ echo $nilai;} ?>">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-tasks"></i>
                    <span class="title">Nilai</span>
                    <span class="arrow <?php if(!empty($nilai)){ echo "open";}?>"></span>
                </a>
                <ul class="sub-menu">
                    <?php if($this->foglobal->HakAkses("4.1", false)) { ?>
                    <li class="nav-item <?php if(!empty($tambah_nilai)){ echo $tambah_nilai;} ?>">
                       <a href="<?php echo base_url('nilai/tambah.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Tambah Nilai</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("4.2", false)) { ?>
                    <li class="nav-item <?php if(!empty($index_nilai)){ echo $index_nilai;} ?>">
                       <a href="<?php echo base_url('nilai.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Daftar Nilai</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("4.3", false)) { ?>
                    <li class="nav-item <?php if(!empty($kategori_nilai)){ echo $kategori_nilai;} ?>">
                        <a href="<?php echo base_url('nilai/kategori.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Kategori Nilai</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->foglobal->HakAkses("5", false)) { ?>
            <li class="nav-item <?php if(!empty($pengumuman)){ echo $pengumuman;} ?>">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-bullhorn"></i>
                    <span class="title">Pengumuman</span>
                    <span class="arrow  <?php if(!empty($pengumuman)){ echo "open";}?>"></span>
                </a>
                <ul class="sub-menu">
                    <?php if($this->foglobal->HakAkses("5.1", false)) { ?>
                    <li class="nav-item <?php if(!empty($tambah_pengumuman)){ echo $tambah_pengumuman;} ?>">
                       <a href="<?php echo base_url('pengumuman/tambah.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Tambah Pengumuman</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("5.2", false)) { ?>
                    <li class="nav-item <?php if(!empty($index_pengumuman)){ echo $index_pengumuman;} ?>">
                        <a href="<?php echo base_url('pengumuman.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Daftar Pengumuman</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("5.3", false)) { ?>
                    <li class="nav-item <?php if(!empty($kategori_pengumuman)){ echo $kategori_pengumuman;} ?>">
                        <a href="<?php echo base_url('pengumuman/kategori.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Kategori Pengumuman</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->foglobal->HakAkses("6", false)) { ?>
            <li class="nav-item <?php if(!empty($berita)){ echo $berita;} ?>">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-newspaper-o"></i>
                    <span class="title">Berita</span>
                    <span class="arrow <?php if(!empty($berita)){ echo "open";}?>"></span>
                </a>
                <ul class="sub-menu">
                    <?php if($this->foglobal->HakAkses("6.1", false)) { ?>
                    <li class="nav-item <?php if(!empty($tambah_berita)){ echo $tambah_berita;} ?>">
                       <a href="<?php echo base_url('berita/tambah.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Tambah Berita</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("6.2", false)) { ?>
                    <li class="nav-item <?php if(!empty($index_berita)){ echo $index_berita;} ?>">
                        <a href="<?php echo base_url('berita.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Daftar Berita</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("6.3", false)) { ?>
                    <li class="nav-item <?php if(!empty($kategori_berita)){ echo $kategori_berita;} ?>">
                        <a href="<?php echo base_url('berita/kategori.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Kategori Berita</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->foglobal->HakAkses("7", false)) { ?>
            <li class="nav-item <?php if(!empty($chatting)){ echo $chatting;} ?>">
                <a href="<?php echo base_url('chat.html') ?>" class="nav-link nav-toggle sidebar-chat">
                    <i class="fa fa-comments-o"></i>
                    <span class="title">Chat</span>
                    <span class="badge badge-danger hidden">0</span>
                </a>
            </li>
            <?php } ?>
            <?php if($this->foglobal->HakAkses("8", false)) { ?>
            <li class="nav-item <?php if(!empty($master)){ echo $master;} ?>">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-database"></i>
                    <span class="title">Master Data</span>
                    <span class="arrow <?php if(!empty($master)){ echo "open";}?>"></span>
                </a>
                <ul class="sub-menu">
                    <?php if($this->foglobal->HakAkses("8.1", false)) { ?>
                    <li class="nav-item <?php if(!empty($siswa)){ echo $siswa;} ?>">
                        <a href="<?php echo base_url('siswa.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Siswa</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("8.2", false)) { ?>
                    <li class="nav-item <?php if(!empty($kelas)){ echo $kelas;} ?>">
                        <a href="<?php echo base_url('kelas.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Kelas</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
            <?php if($this->foglobal->HakAkses("9", false)) { ?>
            <li class="nav-item <?php if(!empty($administrator)){ echo $administrator;} ?>">
                <a href="#" class="nav-link nav-toggle">
                    <i class="fa fa-user"></i>
                    <span class="title">Administrator</span>
                    <span class="arrow <?php if(!empty($administrator)){ echo "open";}?>"></span>
                </a>
                <ul class="sub-menu">
                    <?php if($this->foglobal->HakAkses("9.1", false)) { ?>
                    <li class="nav-item <?php if(!empty($manajemen_user)){ echo $manajemen_user;} ?>">
                        <a href="<?php echo base_url('manajemen_user.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Manajemen User</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("9.2", false)) { ?>
                    <li class="nav-item <?php if(!empty($manajemen_hak_akses)){ echo $manajemen_hak_akses;} ?>">
                        <a href="<?php echo base_url('manajemen_hak_akses.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Manajemen Hak Akses</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("9.3", false)) { ?>
                    <li class="nav-item <?php if(!empty($profil_sekolah)){ echo $profil_sekolah;} ?>">
                        <a href="<?php echo base_url('profil_sekolah.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Profil Sekolah</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("9.4", false)) { ?>
                    <li class="nav-item <?php if(!empty($rekening_sekolah)){ echo $rekening_sekolah;} ?>">
                        <a href="<?php echo base_url('rekening_sekolah.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Rekening Sekolah</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("9.5", false)) { ?>
                    <li class="nav-item <?php if(!empty($aktivitas_user)){ echo $aktivitas_user;} ?>">
                        <a href="<?php echo base_url('aktivitas_user.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Aktivitas User</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if($this->foglobal->HakAkses("9.6", false)) { ?> 
                    <li class="nav-item <?php if(!empty($notifikasi)){ echo $notifikasi;} ?>">
                        <a href="<?php echo base_url('notifikasi.html') ?>" class="nav-link nav-toggle">
                            <span class="title">Notifikasi</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </li>
            <?php } ?>
       </ul>
    </div>
</div>
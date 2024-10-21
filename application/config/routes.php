<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = 'dashboard/error_page/not_found';
$route['translate_uri_dashes'] = FALSE;

$route['ajax/(\w+)-(\w+)']  									= "ajax/$1_$2";
$route['ajax/(\w+)-(\w+)-(\w+)']  								= "ajax/$1_$2_$3";
$route['ajax/(\w+)-(\w+)-(\w+)-(\w+)']  						= "ajax/$1_$2_$3_$4";
$route['ajax/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']  					= "ajax/$1_$2_$3_$4_$5";

$route['ajax/administrator/(\w+)-(\w+)']  						= "ajax/administrator/$1_$2";
$route['ajax/administrator/(\w+)-(\w+)-(\w+)']  				= "ajax/administrator/$1_$2_$3";
$route['ajax/administrator/(\w+)-(\w+)-(\w+)-(\w+)']  			= "ajax/administrator/$1_$2_$3_$4";
$route['ajax/administrator/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']  	= "ajax/administrator/$1_$2_$3_$4_$5";

$route['ajax/master-data/(\w+)-(\w+)']  						= "ajax/master-data/$1_$2";
$route['ajax/master-data/(\w+)-(\w+)-(\w+)']  					= "ajax/master-data/$1_$2_$3";
$route['ajax/master-data/(\w+)-(\w+)-(\w+)-(\w+)']  			= "ajax/master-data/$1_$2_$3_$4";
$route['ajax/master-data/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']  		= "ajax/master-data/$1_$2_$3_$4_$5";

$route['ajax/absensi/(\w+)-(\w+)']  							= "ajax/absensi/$1_$2";
$route['ajax/absensi/(\w+)-(\w+)-(\w+)']  						= "ajax/absensi/$1_$2_$3";
$route['ajax/absensi/(\w+)-(\w+)-(\w+)-(\w+)']  				= "ajax/absensi/$1_$2_$3_$4";
$route['ajax/absensi/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']  			= "ajax/absensi/$1_$2_$3_$4_$5";

$route['ajax/keuangan/(\w+)-(\w+)']  							= "ajax/keuangan/$1_$2";
$route['ajax/keuangan/(\w+)-(\w+)-(\w+)']  						= "ajax/keuangan/$1_$2_$3";
$route['ajax/keuangan/(\w+)-(\w+)-(\w+)-(\w+)']  				= "ajax/keuangan/$1_$2_$3_$4";
$route['ajax/keuangan/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']			= "ajax/keuangan/$1_$2_$3_$4_$5";

$route['ajax/kategori/(\w+)-(\w+)']  							= "ajax/kategori/$1_$2";
$route['ajax/kategori/(\w+)-(\w+)-(\w+)']  						= "ajax/kategori/$1_$2_$3";
$route['ajax/kategori/(\w+)-(\w+)-(\w+)-(\w+)']  				= "ajax/kategori/$1_$2_$3_$4";
$route['ajax/kategori/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']			= "ajax/kategori/$1_$2_$3_$4_$5";

$route['ajax/berita/(\w+)-(\w+)']  								= "ajax/berita/$1_$2";
$route['ajax/berita/(\w+)-(\w+)-(\w+)']  						= "ajax/berita/$1_$2_$3";
$route['ajax/berita/(\w+)-(\w+)-(\w+)-(\w+)']  					= "ajax/berita/$1_$2_$3_$4";
$route['ajax/berita/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']				= "ajax/berita/$1_$2_$3_$4_$5";
$route['ajax/berita-kategori/(\w+)-(\w+)']  					= "ajax/berita-kategori/$1_$2";
$route['ajax/berita-kategori/(\w+)-(\w+)-(\w+)']  				= "ajax/berita-kategori/$1_$2_$3";
$route['ajax/berita-kategori/(\w+)-(\w+)-(\w+)-(\w+)']  		= "ajax/berita-kategori/$1_$2_$3_$4";
$route['ajax/berita-kategori/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']	= "ajax/berita-kategori/$1_$2_$3_$4_$5";

$route['ajax/nilai/(\w+)-(\w+)']  								= "ajax/nilai/$1_$2";
$route['ajax/nilai/(\w+)-(\w+)-(\w+)']  						= "ajax/nilai/$1_$2_$3";
$route['ajax/nilai/(\w+)-(\w+)-(\w+)-(\w+)']  					= "ajax/nilai/$1_$2_$3_$4";
$route['ajax/nilai/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']				= "ajax/nilai/$1_$2_$3_$4_$5";
$route['ajax/nilai-kategori/(\w+)-(\w+)']  						= "ajax/nilai-kategori/$1_$2";
$route['ajax/nilai-kategori/(\w+)-(\w+)-(\w+)']  				= "ajax/nilai-kategori/$1_$2_$3";
$route['ajax/nilai-kategori/(\w+)-(\w+)-(\w+)-(\w+)']  			= "ajax/nilai-kategori/$1_$2_$3_$4";
$route['ajax/nilai-kategori/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']		= "ajax/nilai-kategori/$1_$2_$3_$4_$5";

$route['ajax/pengumuman/(\w+)-(\w+)']  							= "ajax/pengumuman/$1_$2";
$route['ajax/pengumuman/(\w+)-(\w+)-(\w+)']  					= "ajax/pengumuman/$1_$2_$3";
$route['ajax/pengumuman/(\w+)-(\w+)-(\w+)-(\w+)']  				= "ajax/pengumuman/$1_$2_$3_$4";
$route['ajax/pengumuman/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']			= "ajax/pengumuman/$1_$2_$3_$4_$5";
$route['ajax/pengumuman-kategori/(\w+)-(\w+)']  				= "ajax/pengumuman-kategori/$1_$2";
$route['ajax/pengumuman-kategori/(\w+)-(\w+)-(\w+)']  			= "ajax/pengumuman-kategori/$1_$2_$3";
$route['ajax/pengumuman-kategori/(\w+)-(\w+)-(\w+)-(\w+)']  	= "ajax/pengumuman-kategori/$1_$2_$3_$4";
$route['ajax/pengumuman-kategori/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']= "ajax/pengumuman-kategori/$1_$2_$3_$4_$5";

$route['ajax/chatting/(\w+)-(\w+)']  							= "ajax/chatting/$1_$2";
$route['ajax/chatting/(\w+)-(\w+)-(\w+)']  						= "ajax/chatting/$1_$2_$3";
$route['ajax/chatting/(\w+)-(\w+)-(\w+)-(\w+)']  				= "ajax/chatting/$1_$2_$3_$4";
$route['ajax/chatting/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']			= "ajax/chatting/$1_$2_$3_$4_$5";

$route['ajax/dashboard/(\w+)-(\w+)']              = "ajax/dashboard/$1_$2";
$route['ajax/dashboard/(\w+)-(\w+)-(\w+)']          = "ajax/dashboard/$1_$2_$3";
$route['ajax/dashboard/(\w+)-(\w+)-(\w+)-(\w+)']        = "ajax/dashboard/$1_$2_$3_$4";
$route['ajax/dashboard/(\w+)-(\w+)-(\w+)-(\w+)-(\w+)']    = "ajax/dashboard/$1_$2_$3_$4_$5";

$route['user/login'] 	 										= "login/login";
$route['user/profil']	 										= "profil/index";
$route['user/logout']	 										= "login/logout";
$route['user/forgot']	 										= "login/forgot";
$route['user/reset/(\w+)/(\w+)']	 							= "login/reset";

$route['beranda'] 												= "dashboard/dashboard/index";
$route['dashboard_absensi'] 									= "dashboard/dashboard/absensi";
$route['dashboard_keuangan'] 									= "dashboard/dashboard/keuangan";
$route['not_found'] 											= "dashboard/error_page/not_found";

$route['input_absensi_harian'] 									= "absensi/absensi/harian";
$route['input_absensi'] 										= "absensi/absensi/input";
$route['rekap_absensi_siswa'] 									= "absensi/absensi/siswa";
$route['rekap_absensi_harian'] 									= "absensi/absensi/harian";
$route['rekap_absensi_bulanan'] 								= "absensi/absensi/bulanan";
$route['rekap_absensi_semester'] 								= "absensi/absensi/semester";
$route['periode_absensi'] 										= "absensi/absensi/periode";

$route['tagihan'] 												= "keuangan/keuangan/tagihan";
$route['tagihan/tambah'] 										= "keuangan/keuangan/tagihan_tambah";
$route['tagihan/detail'] 										= "keuangan/keuangan/tagihan_detail/$1";
$route['pembayaran'] 											= "keuangan/keuangan/pembayaran";
$route['pembayaran/cetak'] 										= "keuangan/keuangan/cetak_bukti";
$route['pembayaran/detail'] 									= "keuangan/keuangan/pembayaran_detail";
$route['pembayaran/riwayat'] 									= "keuangan/keuangan/pembayaran_riwayat";
$route['pembayaran/konfirmasi'] 								= "keuangan/keuangan/pembayaran_konfirmasi";
$route['tarif'] 												= "keuangan/keuangan/tarif";
$route['tarif_khusus'] 											= "keuangan/keuangan/tarif_khusus";
$route['tarif_khusus/tambah'] 									= "keuangan/keuangan/tarif_khusus_tambah";
$route['tagihan/kategori'] 										= "keuangan/keuangan/kategori_tagihan";

$route['nilai'] 												= "nilai/nilai/index";
$route['nilai/tambah'] 											= "nilai/nilai/tambah";
$route['nilai/kategori'] 										= "nilai/nilai/kategori";
$route['nilai/kategori/tambah'] 								= "nilai/nilai/kategori_tambah";
$route['nilai/kategori/import'] 								= "nilai/nilai/kategori_import";

$route['pengumuman'] 											= "pengumuman/pengumuman/index";
$route['pengumuman/tambah'] 									= "pengumuman/pengumuman/tambah";
$route['pengumuman/edit'] 										= "pengumuman/pengumuman/edit/$1";
$route['pengumuman/kategori'] 									= "pengumuman/pengumuman/kategori";
$route['pengumuman/kategori/tambah'] 							= "pengumuman/pengumuman/kategori_tambah";
$route['pengumuman/kategori/import'] 							= "pengumuman/pengumuman/kategori_import";

$route['berita'] 												= "berita/berita/index";
$route['berita/tambah'] 										= "berita/berita/tambah";
$route['berita/edit'] 											= "berita/berita/edit/$1";
$route['berita/kategori'] 										= "berita/berita/kategori";
$route['berita/kategori/tambah'] 								= "berita/berita/kategori_tambah";
$route['berita/kategori/import'] 								= "berita/berita/kategori_import";

$route['chat'] 													= "chatting/chatting/index";

$route['siswa'] 												= "master-data/siswa/index";
$route['siswa/tambah'] 											= "master-data/siswa/tambah";
$route['siswa/edit'] 											= "master-data/siswa/edit/$1";
$route['siswa/detail'] 											= "master-data/siswa/detail/$1";
$route['siswa/import'] 											= "master-data/siswa/import";
$route['siswa/cetak'] 											= "master-data/siswa/cetak";

$route['jurusan'] 												= "master-data/jurusan/index";
$route['jurusan/import'] 										= "master-data/jurusan/import";

$route['kelas'] 												= "master-data/kelas/index";
$route['kelas/import'] 											= "master-data/kelas/import";

$route['wali_kelas'] 											= "master-data/wali_kelas/index";
$route['wali_kelas/tambah'] 									= "master-data/wali_kelas/tambah";
$route['wali_kelas/edit'] 										= "master-data/wali_kelas/edit/$1";
$route['wali_kelas/import'] 									= "master-data/wali_kelas/import";

$route['semester'] 												= "master-data/semester/index";

$route['manajemen_user'] 										= "administrator/manajemen_user/index";
$route['manajemen_user/tambah'] 								= "administrator/manajemen_user/tambah";
$route['manajemen_user/edit'] 									= "administrator/manajemen_user/edit/$1";
$route['manajemen_user/import'] 								= "administrator/manajemen_user/import";

$route['manajemen_hak_akses'] 								= "administrator/manajemen_hak_akses/index";
$route['manajemen_hak_akses/tambah'] 							= "administrator/manajemen_hak_akses/tambah";
$route['manajemen_hak_akses/edit'] 								= "administrator/manajemen_hak_akses/edit";

$route['profil_sekolah'] 										= "administrator/profil_sekolah/index";
$route['rekening_sekolah']                     = "administrator/rekening_sekolah/index";
$route['mesin_server'] 											= "administrator/mesin_server/index";
$route['mesin_sidik_jari'] 										= "administrator/mesin_sidik_jari/index";
$route['aktivitas_user'] 										= "administrator/aktivitas_user/index";
$route['notifikasi'] 											= "administrator/notifikasi/index";

$route["download/template/([A-Za-z0-9\-\.]+)"] 					= "downloadtemplate/index/$1";

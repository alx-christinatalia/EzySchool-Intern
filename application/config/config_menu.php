<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	//Daftar Menu untuk roles
	$config["menu_list"] = [
		"Dashboard" => array(
			"Sekolah", 
			"Keuangan"
		),
		"Absensi" => array(
			"Input Absensi", 
			"Rekap Absensi Harian", 
			"Rekap Absensi Bulanan", 
			"Periode Absensi",
			"Rekap Absensi Per Siswa"
		),
		"Keuangan" => array(
			"Daftar Tagihan", 
			"Tambah Tagihan", 
			"Bayar Tagihan", 
			"Daftar Pembayaran", 
			"Konfirmasi Pembayaran",
			"Tarif",
			"Tarif Khusus",
			"Kategori Tagihan"
		),
		"Nilai" => array(
			"Tambah Nilai",
			"Daftar Nilai",
			"Kategori Nilai",
		),
		"Pengumuman" => array(
			"Tambah Pengumuman",
			"Daftar Pengumuman",
			"Kategori Pengumuman"
		),
		"Berita" => array(
			"Tambah Berita",
			"Daftar Berita",
			"Kategori Berita"
		),
		"Chat" => array(),
		"Master Data" => array(
			"Siswa",
			"Kelas",
		),
		"Administrator" => array(
			"Manajemen User",
			"Manajemen Hak Akses",
			"Profil Sekolah",
			"Rekening Sekolah",
			"Aktivitas User",
			"Notifikasi"
		)
	];

	$config["app_title"] = "EzySchool - Smart Education Solutions";

	//Daftar Profil Sekolah yang Required. tab => name/nama kolom
	$config["informasi_list_total"] = 22; //hitung array ke 2
	$config["informasi_list"] = [
		"umum"=>[
			"nama",
			"alamat",
			"jenjang", 
			"status", 
			"telepon", 
			"id_provinsi", 
			"id_kota", 
			"id_kecamatan", 
			"lokasi_lat", 
			"lokasi_lon"
		],
		"khusus"=>[
			"kepsek_nama", 
			"kepsek_nip", 
			"cp_nama", 
			"cp_nohp"
		],
		"pengaturan"=>[
			"ezypay_nohp", 
			"ezypay_pass", 
			"timezone", 
			"timezone_nama", 
			"jam_masuk", 
			"jam_pulang", 
			"jam_keterlambatan", 
			"hari_tidakaktif"
		]
	];
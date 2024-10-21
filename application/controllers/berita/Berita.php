<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}

	public function index() {
		$this->foglobal->HakAkses("6.2");
		$this->load->view("berita/index", array('berita' => 'active', 'index_berita' => 'active'));
	}

	public function tambah() {
		$this->foglobal->HakAkses("6.1");
		$this->load->view("berita/tambah", array('berita' => 'active', 'tambah_berita' => 'active'));
	}

	public function edit() {
		$this->foglobal->HakAkses("6.2");
		$this->load->view("berita/edit", array('berita' => 'active', 'index_berita' => 'active'));
	}

	public function kategori() {
		$this->foglobal->HakAkses("6.3");
		$this->load->view("berita/kategori/index", array('berita' => 'active', 'kategori_berita' => 'active'));
	}

	public function kategori_tambah() {
		$this->foglobal->HakAkses("6.3");
		$this->load->view("berita/kategori/tambah", array('berita' => 'active', 'kategori_berita' => 'active'));
	}

	public function kategori_import() {
		$this->foglobal->HakAkses("6.3");
		$this->load->view("berita/kategori/import", array('berita' => 'active', 'kategori_berita' => 'active'));
	}
}

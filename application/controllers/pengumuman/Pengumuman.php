<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}

	public function index() {
		$this->foglobal->HakAkses("5.2");
		$this->load->view("pengumuman/index", array('pengumuman' => 'active', 'index_pengumuman' => 'active'));
	}

	public function tambah() {
		$this->foglobal->HakAkses("5.1");
		$this->load->view("pengumuman/tambah", array('pengumuman' => 'active', 'tambah_pengumuman' => 'active'));
	}

	public function edit() {
		$this->foglobal->HakAkses("5.2");
		$this->load->view("pengumuman/edit", array('pengumuman' => 'active', 'index_pengumuman' => 'active'));
	}

	public function kategori() {
		$this->foglobal->HakAkses("5.3");
		$this->load->view("pengumuman/kategori/index", array('pengumuman' => 'active', 'kategori_pengumuman' => 'active'));
	}

	public function kategori_tambah() {
		$this->foglobal->HakAkses("5.3");
		$this->load->view("pengumuman/kategori/tambah", array('pengumuman' => 'active', 'kategori_pengumuman' => 'active'));
	}

	public function kategori_import() {
		$this->foglobal->HakAkses("5.3");
		$this->load->view("pengumuman/kategori/import", array('pengumuman' => 'active', 'kategori_pengumuman' => 'active'));
	}
}

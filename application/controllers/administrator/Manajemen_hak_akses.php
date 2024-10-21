<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_hak_akses extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}

	public function index() {
		$this->foglobal->HakAkses("9.2");
		$this->load->view("administrator/manajemen_hak_akses/index", array('administrator' => 'active', 'manajemen_hak_akses' => 'active'));
	}

	public function tambah() {
		$this->foglobal->HakAkses("9.2");
		$this->load->view("administrator/manajemen_hak_akses/tambah", array('administrator' => 'active', 'manajemen_hak_akses' => 'active'));
	}

	public function edit() {
		$this->foglobal->HakAkses("9.2");
		$this->load->view("administrator/manajemen_hak_akses/edit", array('administrator' => 'active', 'manajemen_hak_akses' => 'active'));
	}
}

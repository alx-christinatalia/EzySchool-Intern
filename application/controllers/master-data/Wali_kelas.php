<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wali_kelas extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
		$this->foglobal->HakAkses(8);
	}

	public function index() {
		$this->load->view("master-data/wali_kelas/index", array('master' => 'active', 'wali_kelas' => 'active'));
	}

	public function tambah() {
		$this->load->view("master-data/wali_kelas/tambah", array('master' => 'active', 'wali_kelas' => 'active'));
	}

	public function edit() {
		$this->load->view("master-data/wali_kelas/edit", array('master' => 'active', 'wali_kelas' => 'active'));
	}

	public function import() {
		$this->load->view("master-data/wali_kelas/import", array('master' => 'active', 'wali_kelas' => 'active'));
	}
}

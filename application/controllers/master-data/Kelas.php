<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}

	public function index() {
		$this->foglobal->HakAkses("8.2");
		$this->load->view("master-data/kelas/index", array('master' => 'active', 'kelas' => 'active'));
	}

	public function import() {
		$this->foglobal->HakAkses("8.2");
		$this->load->view("master-data/kelas/import", array('master' => 'active', 'kelas' => 'active'));
	}
}

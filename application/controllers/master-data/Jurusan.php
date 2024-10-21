<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
		$this->foglobal->HakAkses(8);
	}

	public function index() {
		$this->load->view("master-data/jurusan/index", array('master' => 'active', 'jurusan' => 'active'));
	}

	public function import() {
		$this->load->view("master-data/jurusan/import", array('master' => 'active', 'jurusan' => 'active'));
	}
}

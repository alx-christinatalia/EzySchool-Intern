<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
		$this->foglobal->HakAkses(9);
	}

	public function index() {
		$this->load->view("administrator/pengaturan/index", array('administrator' => 'active', 'pengaturan' => 'active'));
	}
}

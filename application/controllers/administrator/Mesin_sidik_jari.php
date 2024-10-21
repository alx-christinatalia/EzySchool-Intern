<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesin_sidik_jari extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
		$this->foglobal->HakAkses(9);
	}

	public function index() {
		$this->load->view("administrator/mesin_sidik_jari/index", array('administrator' => 'active', 'sidik_jari' => 'active'));
	}
}

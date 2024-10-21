<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivitas_user extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}

	public function index() {
		$this->foglobal->HakAkses("9.5");
		$this->load->view("administrator/aktivitas_user/index", array('administrator' => 'active', 'aktivitas_user' => 'active'));
	}
}

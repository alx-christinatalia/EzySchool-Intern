<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mesin_server extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
		$this->foglobal->HakAkses(9);
	}

	public function index() {
		$this->load->view("administrator/mesin_server/index", array('administrator' => 'active', 'server' => 'active'));
	}
}

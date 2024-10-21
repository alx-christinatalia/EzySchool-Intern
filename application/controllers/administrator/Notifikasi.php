<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}

	public function index() {
		$this->foglobal->HakAkses("9.6");
		$this->load->view("administrator/notifikasi/index", array('administrator' => 'active', 'notifikasi' => 'active'));
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manajemen_user extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}

	public function index() {
		$this->foglobal->HakAkses("9.1");
		$this->load->view("administrator/manajemen_user/index", array('administrator' => 'active', 'manajemen_user' => 'active'));
	}

	public function tambah() {
		$this->foglobal->HakAkses("9.1");
		$this->load->view("administrator/manajemen_user/tambah", array('administrator' => 'active', 'manajemen_user' => 'active'));
	}

	public function edit() {
		$this->foglobal->HakAkses("9.1");
		$this->load->view("administrator/manajemen_user/edit", array('administrator' => 'active', 'manajemen_user' => 'active'));
	}

	public function import() {
		$this->foglobal->HakAkses("9.1");
		$this->load->view("administrator/manajemen_user/import", array('administrator' => 'active', 'manajemen_user' => 'active'));
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_sekolah extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}

	public function index() {
		$this->foglobal->HakAkses("9.3");
		$this->load->view("administrator/profil_sekolah/index", array('administrator' => 'active', 'profil_sekolah' => 'active'));
	}
}

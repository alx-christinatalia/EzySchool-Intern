<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_sekolah extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}

	public function index() {
		$this->foglobal->HakAkses("9.4");
		$this->load->view("administrator/rekening_sekolah/index", array('administrator' => 'active', 'rekening_sekolah' => 'active'));
	}
}

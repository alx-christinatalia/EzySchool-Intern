<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Semester extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
		$this->foglobal->HakAkses(8);
	}

	public function index() {
		$this->load->view("master-data/semester/index", array('master' => 'active', 'md_semester' => 'active'));
	}
}

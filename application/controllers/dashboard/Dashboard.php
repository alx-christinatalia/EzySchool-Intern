<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
		
	}

	public function index() {
		$this->foglobal->HakAkses("1.1");
		$this->load->view("dashboard/beranda", array('dashboard' => 'active', 'dash_abs' => 'active'));
	}

	public function keuangan() {
		$this->foglobal->HakAkses("1.2");
		$this->load->view("dashboard/keuangan", array('dashboard' => 'active', 'dash_keu' => 'active'));
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_page extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}
	
	public function not_found() {
		$this->output->set_status_header("404");
		$this->load->view("other/404");
	}
}

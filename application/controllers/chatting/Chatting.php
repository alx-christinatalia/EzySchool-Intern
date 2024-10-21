<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chatting extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
	}

	public function index() {
		$this->foglobal->HakAkses(7);
		$this->load->view("chatting/index", array('chatting' => 'active'));
	}
}

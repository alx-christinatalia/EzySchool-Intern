<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloadtemplate extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->foglobal->CheckSessionLogin();
		$this->db = $this->session->userdata("db");
	}

	public function index($template) {
		$file_name = $template;
		$file_url = 'http://api.ezyschool.id/public/template/excel/'.$this->db.'/' . $file_name;
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary"); 
		header("Content-disposition: attachment; filename=\"".$file_name."\""); 
		readfile($file_url);
	}
}

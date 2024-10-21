<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_absensi_siswa extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("absensi/absensi_siswa");
	}

	public function index() {
        if($this->input->is_ajax_request() and $this->input->post("act")) {
            if(method_exists($this, $this->input->post("act"))) {
                $act = $this->input->post("act");
                $this->req  = $this->input->post("req");
                $this->form = $this->input->post("form");
                print_r($this->$act());
            } else {
                print_r($this->api->msg(true, "Invalid Method"));
            }
        } else {
            print_r($this->api->msg(true, "Invalid Request"));
        }
    }

    private function listdatahtml() {
        $Request = $this->absensi_siswa->HtmlAbsensiSiswa($this->req);
        return $Request;
    }
}

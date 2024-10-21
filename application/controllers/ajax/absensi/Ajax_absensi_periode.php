<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_absensi_periode extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("absensi/absensi_periode");
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
        $Request = $this->absensi_periode->HtmlPeriode($this->req);
        return $Request;
    }

    private function insertdata() {
        $Request = $this->absensi_periode->InsertPeriode($this->req);
        return $Request;
    }

    private function sinkronisasi() {
        $Request = $this->absensi_periode->Sync($this->req);
        return $Request;
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_aktivitas_user extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("administrator/aktivitas_user");
	}

	public function index() {
        if($this->input->is_ajax_request() and $this->input->post("act")) {
            if(method_exists($this, $this->input->post("act"))) {
                $act = $this->input->post("act");
                $this->req  = $this->input->post("req");
                $this->form = $this->input->post("form");
                $this->data = $this->input->post("data");
                print_r($this->$act());
            } else {
                print_r($this->api->msg(true, "Invalid Method"));
            }
        } else {
            print_r($this->api->msg(true, "Invalid Request"));
        }
    }

    private function listdatahtml() {
        $Request = $this->aktivitas_user->HtmlAktivitasUser($this->req);
        return $Request;
    }
}

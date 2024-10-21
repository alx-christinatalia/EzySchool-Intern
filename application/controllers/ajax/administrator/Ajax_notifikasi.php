<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_notifikasi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("administrator/notifikasi");
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
        $Request = $this->notifikasi->HtmlNotifikasi($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->notifikasi->GetNotifikasi(["filter" => ["id_notifikasi" => $this->req]]);
        return json_encode($Request);
    }

}

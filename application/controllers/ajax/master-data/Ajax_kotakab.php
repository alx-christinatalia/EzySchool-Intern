<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_kotakab extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("master-data/kotakab");
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

    private function listdropdownkotakab() {
        $this->req["Limit"] = 1000;
        $Request = $this->kotakab->HtmlDropdownKotaKab($this->req);
        return $Request;
    }
    
    private function getdatabyid() {
        $Request = $this->kotakab->GetKotaKab(["filter" => ["id_kota" => $this->req]]);
        return json_encode($Request);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_provinsi extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("master-data/provinsi");
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

    private function listdropdownprovinsi() {
        $this->req["Limit"] = 1000;
        $Request = $this->provinsi->HtmlDropdownProvinsi($this->req);
        return $Request;
    }
    
    private function getdatabyid() {
        $Request = $this->provinsi->GetProvinsi(["filter" => ["id_prov" => $this->req]]);
        return json_encode($Request);
    }
}

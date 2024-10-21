<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_hak_akses extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("administrator/hak_akses");
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
        if(!isset($this->req["filter"]["status"])) {
            $this->req["filter"]["status"] = 1;
        }
        $Request = $this->hak_akses->HtmlHakAkses($this->req);
        return $Request;
    }

    private function listdropdown() {
        $this->req["filter"]["status"] = 1;
        $Request = $this->hak_akses->HtmlDropdownHakAkses($this->req);
        return $Request;
    }

    private function insertdata() {
        $Request = $this->hak_akses->InsertDataHakAkses($this->form);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id_update"]; unset($this->form["id_update"]);
        $Request = $this->hak_akses->UpdateDataHakAkses($id_update, $this->form);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->hak_akses->GetHakAkses(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }
}

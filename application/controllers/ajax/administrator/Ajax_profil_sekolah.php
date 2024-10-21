<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_profil_sekolah extends CI_Controller {

	public function __construct() {
		parent::__construct();
        $this->load->model("administrator/profil_sekolah");
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

    private function uploadfoto() {
        $Request = $this->profil_sekolah->UploadImage($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->profil_sekolah->GetProfil(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function updatedata() {
        $id_update = $this->form["id_update"]; unset($this->form["id_update"]);
        $Request = $this->profil_sekolah->UpdateProfil($id_update, $this->form);
        return $Request;
    } 
}

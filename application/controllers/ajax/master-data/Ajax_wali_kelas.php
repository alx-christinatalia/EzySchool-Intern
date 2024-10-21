<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_wali_kelas extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("master-data/wali_kelas");
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
    
    private function insertdata() {
        $Request = $this->wali_kelas->InsertDataPegawai($this->form);
        return $Request;
    }

    private function listdatahtml() {
        if (isset($this->req["filter"]["status"]) and $this->req["filter"]["status"] != "") {
            $this->req["filter"]["status"] = $this->req["filter"]["status"];
        }
        else {
            $this->req["filter"]["status"] = 1;
        }
        $Request = $this->wali_kelas->HtmlPegawai($this->req);
        return $Request;
    }

    private function listdropdown() {
        $this->req["filter"]["status"] = 1;
        $Request = $this->wali_kelas->HtmlDropdownPegawai($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->wali_kelas->GetPegawai(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function updatedata() {
        $id_update = $this->form["id_update"]; unset($this->form["id_update"]);
        $Request = $this->wali_kelas->UpdatePegawai($id_update, $this->form);
        return $Request;
    }

    private function uploadfoto() {
        $Request = $this->wali_kelas->UploadFotoPegawai($this->req);
        return $Request;
    }

    private function uploaddata() {
        $Request = $this->wali_kelas->UploadDataPegawai($this->form);
        return $Request;
    }

    private function insertdatarepeat() {
        $Request = $this->wali_kelas->InsertDataPegawaiRepeat($this->req);
        return $Request;
    }

    private function updatedatarepeat() {
        $Request = $this->wali_kelas->UpdateDataPegawaiRepeat($this->req);
        return $Request;
    }

    private function listdropdownpegawai() {
        $this->req["filter"]["status"] = 1;
        $Request = $this->wali_kelas->HtmlDropdownPegawai($this->req);
        return $Request;
    }

    private function updatepassword() {
        $id_update["id"] = $this->form["id_update"]; unset($this->form["id_update"]);
        $id_update["password1"] = $this->form["password1"]; unset($this->form["password1"]);
        $id_update["password2"] = $this->form["password2"]; unset($this->form["password2"]);
        $Request = $this->wali_kelas->UpdatePasswordPengguna($id_update, $this->form);
        return $Request;
    } 
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_siswa extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("master-data/siswa");
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
        if (isset($this->req["filter"]["status"]) and $this->req["filter"]["status"] != "") {
            $this->req["filter"]["status"] = $this->req["filter"]["status"];
        }
        else {
            $this->req["filter"]["status"] = 1;
        }
        $Request = $this->siswa->HtmlDatasiswa($this->req);
        return $Request;
    }

    private function listdatahtmlnamasiswa() {
        $Request = $this->siswa->HtmlDatasiswaNama($this->req);
        return $Request;
    }

    private function listdropdownsiswa() {
        $Request = $this->siswa->HtmlDropdownSiswa($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->siswa->GetDatasiswa(["filter" => ["nis" => $this->req]]);
        return json_encode($Request);
    }

    private function updatedata() {
        $id_update = $this->form["id_update"]; unset($this->form["id_update"]);
        $Request = $this->siswa->UpdateDatasiswa($id_update, $this->form);
        return $Request;
    }

    private function insertdata() {
        $Request = $this->siswa->InsertDatasiswa($this->form);
        return $Request;
    }

    private function insertdatarepeat() {
        $Request = $this->siswa->InsertDataSiswaRepeat($this->req);
        return $Request;
    }
    private function updatedatarepeat() {
        $Request = $this->siswa->UpdateDataSiswaRepeat($this->req);
        return $Request;
    }
    private function uploaddata() {
        $Request = $this->siswa->UploadDataSiswa($this->form);
        return $Request;
    }

    private function uploadfoto() {
        $Request = $this->siswa->UploadFotoSiswa($this->req);
        return $Request;
    }

    private function getdatabyclass() {
        $Request = $this->siswa->GetDatasiswa(["filter" => ["kelas" => $this->req]], true);
        return json_encode($Request);
    }
}

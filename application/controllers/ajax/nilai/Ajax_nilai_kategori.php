<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_nilai_kategori extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("nilai/nilai_kategori");
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
        $Request = $this->nilai_kategori->HtmlKategoriNilai($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->nilai_kategori->GetKategoriNilai(["filter" => ["id_kategori" => $this->req]]);
        return json_encode($Request);
    }

    private function insertdata() {
        $Request = $this->nilai_kategori->InsertKategoriNilai($this->form);
        return $Request;
    }

    private function insertdatarepeat() {
        $Request = $this->nilai_kategori->InsertKategoriNilaiRepeat($this->req);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id_update"]; unset($this->form["id_update"]);
        $Request = $this->nilai_kategori->UpdateKategoriNilai($id_update, $this->form);
        return $Request;
    }

    private function uploaddata() {
        $Request = $this->nilai_kategori->UploadKategoriNilai($this->form);
        return $Request;
    }
}

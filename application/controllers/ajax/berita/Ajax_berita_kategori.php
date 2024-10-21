<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_berita_kategori extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("berita/berita_kategori");
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
        $Request = $this->berita_kategori->HtmlKategoriBerita($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->berita_kategori->GetKategoriBerita(["filter" => ["id_kategori" => $this->req]]);
        return json_encode($Request);
    }

    private function insertdata() {
        $Request = $this->berita_kategori->InsertKategoriBerita($this->form);
        return $Request;
    }

    private function insertdatarepeat() {
        $Request = $this->berita_kategori->InsertKategoriBeritaRepeat($this->req);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id_update"]; unset($this->form["id_update"]);
        $Request = $this->berita_kategori->UpdateKategoriBerita($id_update, $this->form);
        return $Request;
    }

    private function uploaddata() {
        $Request = $this->berita_kategori->UploadKategoriBerita($this->form);
        return $Request;
    }
}

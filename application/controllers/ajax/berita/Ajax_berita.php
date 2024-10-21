<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_berita extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("berita/berita");
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
        $data["subyek"] = $this->form["subyek"];
        $data["isi"] = $this->form["isi"];
        $data["tgl_publish"] = $this->form["tgl_publish"];
        $data["id_kategori"] = $this->form["id_kategori"];
        $data["id_pegawai"] = $this->form["id_pegawai"];
        $data["is_published"] = $this->form["is_published"];
        $data["foto"] = $this->form["foto"];
        $data["source"] = $this->form["source"];
        $data["source_url"] = $this->form["source_url"];
        $Request = $this->berita->InsertDataberita($data, $this->form);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->berita->GetBerita(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function uploadfoto() {
        $Request = $this->berita->UploadFotoBerita($this->req);
        return $Request;
    }

    private function listdatahtml() {
        $Request = $this->berita->HtmlBerita($this->req);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id_update"]; unset($this->form["id_update"]);
        $Request = $this->berita->UpdateBerita($id_update, $this->form);
        return $Request;
    }
    
    private function  getberitaberanda(){
        $data["Limit"] = 3;
        $data["Sort"] = "tgl_publish desc";
        $data["filter"]["is_published"] = 1;
        $Request = $this->berita->GetBeritaBeranda($data);
        return $Request;
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_kategori_import extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("kategori/kategori_import");
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
        //$this->req["Limit"] = 5;
        $Request = $this->kategori_import->HtmlMdkategori($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->kategori_import->Getkategoriimport(["filter" => ["ExcelPath" => $this->req]]);
        return json_encode($Request);
    }
    /*
    private function getdatabyid() {
        $Request = $this->fosekolah->GetVwGroup(["filter" => ["id_group" => $this->req]]);
        return json_encode($Request);
    }

    private function insertdata() {
        unset($this->form["id_update"]); //Hapus id update

        $Request = $this->fosekolah->InsertGroup($this->form);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id_update"]; unset($this->form["id_update"]);
        $Request = $this->fosekolah->UpdateGroup($id_update, $this->form);
        return $Request;
    } */
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("kategori/kategori");
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

    private function listdatahtml() {
        if (isset($this->req["filter"]["status"]) and $this->req["filter"]["status"] != "") {
            $this->req["filter"]["status"] = $this->req["filter"]["status"];
        }
        else {
            $this->req["filter"]["status"] = 1;
        }
        $Request = $this->kategori->HtmlMdkategori($this->req);
        return $Request;
    }

    private function listdropdown() {
        $Request = $this->kategori->HtmlDropdownKategori(["filter" => ["jns_kat" => $this->req]]);
        return $Request;
    }

    private function uploaddata() {
        $Request = $this->kategori->UploadMdkategori($this->form);
        return $Request;
    }

    private function insertdata() {
        $data["nama"] = $this->form["nama"];
        $data["jns_kat"] = $this->form["jns_kat"];
        $Request = $this->kategori->InsertMdkategori($data, $this->form);
        return $Request;
    }

    private function insertdatarepeat() {
        $Request = $this->kategori->InsertMdkategoriRepeat($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->kategori->GetMdkategori(["filter" => ["id_kategori" => $this->req]]);
        return json_encode($Request);
    }

    private function updatedata() {
        $id_update = $this->form["id_kategori"]; unset($this->form["id_kategori"]);
        $Request = $this->kategori->UpdateMdkategori($id_update, $this->form);
        return $Request;
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_jurusan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("master-data/jurusan");
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
        //$this->req["Limit"] = 5;
        $Request = $this->jurusan->HtmlMdjurusan($this->req);
        return $Request;
    }

    private function listdropdownjurusan() {
        $this->req["filter"]["status"] = 1;
        $Request = $this->jurusan->HtmlDropdownJurusan($this->req);
        return $Request;
    }
    
    private function uploaddata() {
        $Request = $this->jurusan->UploadMdjurusan($this->form);
        return $Request;
    }

    private function insertdata() {
        $data["nama"] = $this->form["nama"];
        $Request = $this->jurusan->InsertMdjurusan($data, $this->form);
        return $Request;
    }

    private function insertdatarepeat() {
        $Request = $this->jurusan->InsertMdjurusanRepeat($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->jurusan->GetMdjurusan(["filter" => ["id_jurusan" => $this->req]]);
        return json_encode($Request);
    }

    private function updatedata() {
        $id_update = $this->form["id_jurusan"]; unset($this->form["id_jurusan"]);
        $Request = $this->jurusan->UpdateMdjurusan($id_update, $this->form);
        return $Request;
    }
    
    private function updatedatarepeat() {
        $Request = $this->jurusan->UpdateMdjurusanRepeat($this->req);
        return $Request;
    }
}

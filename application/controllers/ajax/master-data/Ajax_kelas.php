<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_kelas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("master-data/kelas");
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
        } else {
            $this->req["filter"]["status"] = 1;
        }
        $Request = $this->kelas->HtmlMdkelas($this->req);
        return $Request;
    }

    private function listdatahtmlnamakelas() {
        $Request = $this->kelas->HtmlMdkelasNama($this->req);
        return $Request;
    }

    private function listdropdownkelas() {
        if (isset($this->req["filter"]["status"]) and $this->req["filter"]["status"] != "") {
            $this->req["filter"]["status"] = $this->req["filter"]["status"];
        } else {
            $this->req["filter"]["status"] = 1;
        }
        $Request = $this->kelas->HtmlDropdownKelas($this->req);
        return $Request;
    }

    private function insertdata() {
        $Request = $this->kelas->InsertMdkelas($this->form);
        return $Request;
    }

    private function uploaddata() {
        $Request = $this->kelas->UploadMdkelas($this->form);
        return $Request;
    }

    private function getdata() {
        $Request = $this->kelas->GetAllKelas();
        return json_encode($Request);
    }

    private function getdatabyid() {
        $Request = $this->kelas->GetMdkelas(["filter" => ["id_kelas" => $this->req]]);
        return json_encode($Request);
    }

    private function updatedata() {
        $id_update = $this->form["id_kelas"]; unset($this->form["id_kelas"]);
        $Request = $this->kelas->UpdateMdkelas($id_update, $this->form);
        return $Request;
    }

    private function insertdatarepeat() {
        $Request = $this->kelas->InsertKelasRepeat($this->req);
        return $Request;
    }
    
    private function updatedatarepeat() {
        $Request = $this->kelas->UpdateKelasRepeat($this->req);
        return $Request;
    }
}

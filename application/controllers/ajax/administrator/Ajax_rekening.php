<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_rekening extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("administrator/rekening");
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

    private function listdropdown() {
        if (isset($this->req["filter"]["status"]) and $this->req["filter"]["status"] != "") {
            $this->req["filter"]["status"] = $this->req["filter"]["status"];
        } else {
            $this->req["filter"]["status"] = 1;
        }
        $Request = $this->rekening->HtmlDropdownBank($this->req);
        return $Request;
    }
    private function listdatahtml() {
        if (isset($this->req["filter"]["status"]) and $this->req["filter"]["status"] != "") {
            $this->req["filter"]["status"] = $this->req["filter"]["status"];
        } else {
            $this->req["filter"]["status"] = 1;
        }
        $Request = $this->rekening->HtmlRekening($this->req);
        return $Request;
    }
    private function getdatabyid() {
        $Request = $this->rekening->GetRekening(["filter" => ["id_rekening" => $this->req]]);
        return json_encode($Request);
    }
    private function getdatabyidbank() {
        $Request = $this->rekening->GetBank(["filter" => ["kode_bank" => $this->req]]);
        return json_encode($Request);
    }
    private function updatedata() {
        $id_update = $this->form["id_rekening"]; unset($this->form["id_rekening"]);
        $Request = $this->rekening->UpdateRekening($id_update, $this->form);
        return $Request;
    }
    private function insertdata() {
        $Request = $this->rekening->InsertRekening($this->form);
        return $Request;
    }
}

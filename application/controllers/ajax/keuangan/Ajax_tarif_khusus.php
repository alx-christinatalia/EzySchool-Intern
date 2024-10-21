<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_tarif_khusus extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("keuangan/tarif");
        $this->load->model("keuangan/tarif_khusus");
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
        $Request = $this->tarif_khusus->HtmlTarif($this->req);
        return $Request;
    }

    private function listdatahtmlpilihtarif() {
        $Request = $this->tarif->HtmlDataTarif($this->req);
        return $Request;
    } 

    private function getdatabyid() {
        $Request = $this->tarif_khusus->GetTarif(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function insertdata() {
        $Request = $this->tarif_khusus->InsertTarif($this->form);
        return $Request;
    }
    
    private function insertdatarepeat() {
        $Request = $this->tarif_khusus->InsertTarifRepeat($this->req);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id_update"]; unset($this->form["id_update"]);
        $Request = $this->tarif_khusus->UpdateTarif($id_update, $this->form);
        return $Request;
    }

    private function updatedatarepeat() {
        $Request = $this->tarif_khusus->UpdateTarifRepeat($this->req);
        return $Request;
    }

    private function getdatabyclass() {
        $Request = $this->tarif_khusus->GetDatasiswaNoLimit($this->req);
        return json_encode($Request);
    }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_tagihan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("keuangan/tagihan");
        $this->load->model("keuangan/pembayaran");
        $this->load->model("keuangan/tarif");
        $this->load->model("master-data/siswa");
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
        $Request = $this->tagihan->HtmlTagihan($this->req);
        return $Request;
    }

    private function listdatahtmlpilihtarif() {
        $this->req["filter"]["status"] = 1;
        $Request = $this->tarif->HtmlDataTarif($this->req);
        return $Request;
    } 

    private function listdatatransaksihtml() {
        $Request = $this->pembayaran->HtmlRiwayatPembayaran($this->req);
        return $Request;
    }
    
    private function getdatabyid() {
        $Request = $this->tagihan->GetTagihan(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }
    private function getdatabynis() {
        $Request = $this->tagihan->GetTagihansiswaNoLimit($this->req);
        return json_encode($Request);
    }
    private function getdata() {
        $Request = $this->tagihan->GetTagihan($this->req);
        return json_encode($Request);
    }
    
    private function insertdatawithtarif() {
        $Request = $this->tagihan->InsertTagihanWithTarif($this->req);
        return $Request;
    }

    private function insertdatarepeat() {
        $Request = $this->tagihan->InsertTagihanRepeat($this->req);
        return $Request;
    }
    
    private function updatedata() {
        $id_update = $this->form["id_update"]; unset($this->form["id_update"]);
        $Request = $this->tagihan->UpdateTagihan($id_update, $this->form);
        return $Request;
    }
    
    private function getdatabyclass() {
        $Request = $this->siswa->GetDatasiswa(["filter" => ["kelas" => $this->req]]);
        return json_encode($Request);
    }
}

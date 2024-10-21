<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_konfirmasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("keuangan/konfirmasi");
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
        if(!isset($this->req["filter"]["status"])) {
            $this->req["filter"]["status"] = 0;
        }
        $Request = $this->konfirmasi->HtmlKonfirmasi($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->konfirmasi->GetKonfirmasi(["filter" => ["no_ref" => $this->req]]);
        return json_encode($Request);
    }

    private function updatedata() {
        $Request = $this->konfirmasi->UpdateKonfirmasi($this->req);
        return $Request;
    }
}

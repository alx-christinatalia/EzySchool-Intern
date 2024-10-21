<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_keuangan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("dashboard/keuangan");
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

    private function listchart() {
        $Request = $this->keuangan->GetChartList($this->req);
        return $Request;
    }

    private function listtotal() {
        $Request = $this->keuangan->GetListTotal($this->req);
        return $Request;
    }

    private function listtotalezypay() {
        $Request = $this->keuangan->GetListTotalEzyPay($this->req);
        return $Request;
    }
}

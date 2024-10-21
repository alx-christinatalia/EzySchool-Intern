<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_pembayaran extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("keuangan/pembayaran");
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
        $Request = $this->pembayaran->HtmlPembayaran($this->req);
        return $Request;
    }
    private function listdatalog() {
        $Request = $this->pembayaran->HtmlLogPembayaran($this->req);
        return $Request;
    }
    private function getrandom() {
        $Request = $this->pembayaran->RandomID($this->req);
        return $Request;
    }
    private function insertdatarepeat() {
        $Request = $this->pembayaran->InsertBayarRepeat($this->req);
        return $Request;
    }
    private function insertdatasatuan() {
        $Request = $this->pembayaran->InsertBayar($this->req);
        return $Request;
    }
}
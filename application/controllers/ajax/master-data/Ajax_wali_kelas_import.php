<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_wali_kelas_import extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("master-data/wali_kelas");
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
        $Request = $this->wali_kelas->HtmlPegawai($this->req);
        return $Request;
    }
    private function getdatabyid() {
        $Request = $this->wali_kelas->GetPegawaiimport(["filter" => ["ExcelPath" => $this->req]]);
        return json_encode($Request);
    }

    /*private function listdropdowngroup() {
        $this->req["filter"]["status"] = 1;
        $Request = $this->fomdpembayaran->HtmlMdpembayaran($this->req);
        return $Request;
    }*/
    /*
    private function insertdata() {
        unset($this->form["id_update"]); //Hapus id update

        $Request = $this->fomdpembayaran->InsertGroup($this->form);
        return $Request;
    }
     */
}

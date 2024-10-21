<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_absensi_input extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("absensi/absensi_input");
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
            $this->req["filter"]["status"] = 0;
        }
        $Request = $this->absensi_input->HtmlAbsensiKelas($this->req);
        return $Request;
    }

    // private function listdropdowntahun() {
    //     $Request = $this->foabsensi->HtmlDropdownTahun($this->req);
    //     return $Request;
    // }
    /*
    private function getdatabyid() {
        $Request = $this->fomdpembayaran->GetMdpembayaran(["filter" => ["id_group" => $this->req]]);
        return json_encode($Request);
    }
    */
    private function insertdataabsen() {
        //unset($this->form["id_update"]); //Hapus id update
        $Request = $this->absensi_input->InsertDataAbsen($this->req);
        return $Request;
    }
    
     private function updatedataabsen() {
        //unset($this->form["id_update"]); //Hapus id update
        $Request = $this->absensi_input->UpdateDataAbsen($this->req);
        return $Request;
    }

    private function getdatabyclass() {
        if (isset($this->req["filter"]["status"]) and $this->req["filter"]["status"] != "") {
            $this->req["filter"]["status"] = $this->req["filter"]["status"];
        } else {
            $this->req["filter"]["status"] = 0;
        }
        $Request = $this->absensi_input->GetDatasiswaNoLimit($this->req);
        return $Request;
    }
}

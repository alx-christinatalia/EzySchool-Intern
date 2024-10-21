<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_absensi_bulanan extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("absensi/absensi_bulanan");
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
        $Request = $this->absensi_bulanan->HtmlAbsensi($this->req);
        return $Request;
    }

    private function listdropdowntahun() {
        $Request = $this->absensi_bulanan->HtmlDropdownTahun($this->req);
        return $Request;
    }
    /*
    private function getdatabyid() {
        $Request = $this->fomdpembayaran->GetMdpembayaran(["filter" => ["id_group" => $this->req]]);
        return json_encode($Request);
    }

    private function insertdata() {
        unset($this->form["id_update"]); //Hapus id update

        $Request = $this->fomdpembayaran->InsertGroup($this->form);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id_update"]; unset($this->form["id_update"]);
        $Request = $this->fomdpembayaran->UpdateGroup($id_update, $this->form);
        return $Request;
    } */
}

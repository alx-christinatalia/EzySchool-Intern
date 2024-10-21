<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_pengumuman extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("pengumuman/pengumuman");
	}

	public function index() {
        if($this->input->is_ajax_request() and $this->input->post("act")) {
            if(method_exists($this, $this->input->post("act"))) {
                $act = $this->input->post("act");
                $this->req  = $this->input->post("req");
                $this->form = $this->input->post("form");
                $this->data = $this->input->post("data");
                print_r($this->$act());
            } else {
                print_r($this->api->msg(true, "Invalid Method"));
            }
        } else {
            print_r($this->api->msg(true, "Invalid Request"));
        }
    }

    private function listdatahtml() {
        if(isset($param["filter"]["status"]) and $param["filter"]["status"] != "") {
            $this->req["is_published"] = $param["filter"]["status"];
        } else {
            $this->req["is_published"] = 1;
        }
        $Request = $this->pengumuman->HtmlPengumuman($this->req);
        return $Request;
    }

    private function getdatabyid() {
        $Request = $this->pengumuman->GetPengumuman(["filter" => ["id" => $this->req]]);
        return json_encode($Request);
    }

    private function insertdata() {
        $data["subyek"] = $this->form["subyek"];
        $data["pesan"] = $this->form["pesan"];
        $data["tgl_eksekusi"] = $this->form["tgl_eksekusi"];
        $data["id_kategori"] = $this->form["id_kategori"];
        $data["jns_penerima"] = $this->form["jns_penerima"];
        $data["penerima"] = $this->form["penerima"];
        $data["id_pegawai"] = $this->form["id_pegawai"];
        $data["is_published"] = $this->form["is_published"];
        $Request = $this->pengumuman->InsertDatapengumuman($data, $this->form);
        return $Request;
    }

    private function updatedata() {
        $id_update = $this->form["id_update"]; unset($this->form["id_update"]);
        $Request = $this->pengumuman->UpdatePengumuman($id_update, $this->form);
        return $Request;
    }

    private function getpengumumanberanda(){
        $data["Limit"] = 4;
        $data["Sort"] = "tgl_eksekusi desc";
        $data["filter"]["is_published"] = 1;
        $Request = $this->pengumuman->GetPengumumanBeranda($data);
        return $Request;
    }


    

}

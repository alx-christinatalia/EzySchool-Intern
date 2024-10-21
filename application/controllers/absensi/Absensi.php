<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->foglobal->CheckSessionLogin();
        $this->load->model("master-data/kelas");
    }

    public function input() {
        $this->foglobal->HakAkses("2.1");

        $this->req["filter"]["status"] = 1;
        $data['absensi'] = 'active';
        $data['input'] = 'active';
        $data['dropdownkelas'] = json_decode($this->kelas->HtmlDropdownKelas($this->req));
        $this->load->view("absensi/input",$data);
    }

    public function siswa() {
        $this->req["filter"]["status"] = 1;
        $this->foglobal->HakAkses("2.5");
        if($this->uri->segment(1) == "input_absensi_harian") {
            $data = array('absensi' => 'active', 'input' => 'active');
        } else {
            $data = array('absensi' => 'active', 'r_siswa' => 'active');
        }
        $data['dropdownkelas'] = json_decode($this->kelas->HtmlDropdownKelas($this->req));
        $this->load->view("absensi/siswa", $data);
    }

    public function harian() {
        $this->foglobal->HakAkses("2.2");
        if($this->uri->segment(1) == "input_absensi_harian") {
            $focus = array('absensi' => 'active', 'input' => 'active');
        } else {
            $focus = array('absensi' => 'active', 'harian' => 'active');
        }
        $this->load->view("absensi/harian", $focus);
    }

    public function bulanan() {
        $this->foglobal->HakAkses("2.3");
        $this->load->view("absensi/bulanan", array('absensi' => 'active', 'bulanan' => 'active'));
    }

    public function periode() {
        $this->foglobal->HakAkses("2.4");
        $this->load->view("absensi/periode", array('absensi' => 'active', 'periode' => 'active'));
    }

}

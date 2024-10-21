<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->foglobal->CheckSessionLogin();
        $this->load->model("master-data/kelas");
        $this->load->model("kategori/kategori");
    }

    public function index() {
        $this->foglobal->HakAkses("4.2");
        $this->req["filter"]["status"] = 1;
        $this->req["filter"]["jns_kat"] = 3;
        $data['nilai'] = 'active';
        $data['index_nilai'] = 'active';
        $data['dropdownkelas'] = json_decode($this->kelas->HtmlDropdownKelas($this->req));
        $data['dropdownkategori'] = json_decode($this->kategori->HtmlDropdownKategori($this->req));
        $this->load->view("nilai/index", $data);
    }

    public function tambah() {
        $this->foglobal->HakAkses("4.1");
        $this->req["filter"]["status"] = 1;
        $this->req["filter"]["jns_kat"] = 3;
        $this->req["Sort"] = "nama asc";
        $data['nilai'] = 'active';
        $data['tambah_nilai'] = 'active';
        $data['dropdownkelas'] = json_decode($this->kelas->HtmlDropdownKelas($this->req));
        $data['dropdownkategori'] = json_decode($this->kategori->HtmlDropdownKategori($this->req));
        $this->load->view("nilai/tambah", $data);
    }

    public function kategori() {
        $this->foglobal->HakAkses("4.3");
        $this->load->view("nilai/kategori/index", array('nilai' => 'active', 'kategori_nilai' => 'active'));
    }

    public function kategori_tambah() {
        $this->foglobal->HakAkses("4.3");
        $this->load->view("nilai/kategori/tambah", array('nilai' => 'active', 'kategori_nilai' => 'active'));
    }

    public function kategori_import() {
        $this->foglobal->HakAkses("4.3");
        $this->load->view("nilai/kategori/import", array('nilai' => 'active', 'kategori_nilai' => 'active'));
    }

}

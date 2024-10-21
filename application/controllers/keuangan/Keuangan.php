<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Keuangan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->foglobal->CheckSessionLogin();
        $this->load->model("master-data/kelas");
        $this->load->model("master-data/siswa");
        $this->load->model("keuangan/pembayaran");
        $this->load->model("keuangan/kategori_tagihan");
    }

    public function tagihan() {
        $this->foglobal->HakAkses("3.1");

        $this->req["filter"]["status"] = 1;
        $data['keuangan'] = 'active';
        $data['tagihan'] = 'active';
        $data['daftartagihan'] = 'active';
        $data['dropdownkelas'] = json_decode($this->kelas->HtmlDropdownKelas($this->req));
        $data['dropdownkategori'] = json_decode($this->kategori_tagihan->HtmlDropdownKategori($this->req));
        $this->load->view("keuangan/tagihan/index", $data);
    }

    public function tagihan_tambah() {
        $this->foglobal->HakAkses("3.2");
        $this->load->view("keuangan/tagihan/tambah", array('keuangan' => 'active', 'tagihan' => 'active','tambahtagihan' => 'active'));
    }

    public function tagihan_detail() {
        $this->foglobal->HakAkses("3.1");
        $this->load->view("keuangan/tagihan/detail", array('keuangan' => 'active', 'tagihan' => 'active'));
    }

    public function pembayaran() {
        $this->foglobal->HakAkses("3.3");
        $this->load->view("keuangan/pembayaran/index", array('keuangan' => 'active', 'pembayaran' => 'active','bayartagihan' => 'active'));
    }

    public function pembayaran_detail() {
        $this->foglobal->HakAkses("3.4");
        $data['keuangan'] = 'active';
        $data['pembayaran'] = 'active';
        if (!empty($this->input->get('id'))) {
            $this->req["filter"]["no_pembayaran"] = $this->input->get('id');
            $data['list'] = $this->pembayaran->GetPembayaran($this->req);
            if (!empty($data['list']->Data)) {
                $data['detail'] = $data['list']->Data[0];
                $data['no_bayar'] = $this->input->get('id');
                $data['nis'] = $data['detail']->nis;
                $data['nama'] = $data['detail']->siswa_nama;
                $data['kelas'] = $data['detail']->kelas_nama;
                $data['tgl_bayar'] = date_indo("d M Y", strtotime($data['detail']->tgl_bayar));
                $data['cara_bayar'] = $data['detail']->cara_bayar;
                $data['pegawai'] = $data['detail']->pegawai_nama;
                $data['uraian'] = $data['detail']->uraian;
            } else {
                $data['detail'] = "";
                $data['no_bayar'] = "";
                $data['nis'] = "";
                $data['nama'] = "";
                $data['kelas'] = "";
                $data['tgl_bayar'] = "";
                $data['cara_bayar'] = "";
                $data['pegawai'] = "";
                $data['uraian'] = "";
            }
        }
        $this->load->view("keuangan/pembayaran/detail", $data);
    }
    public function pembayaran_riwayat() {
        $this->foglobal->HakAkses("3.4");
        $this->req["filter"]["status"] = 1;
        $data['keuangan'] = 'active';
        $data['pembayaran'] = 'active';
        $data['riwayatbayar'] = 'active';
        $data['dropdownkelas'] = json_decode($this->kelas->HtmlDropdownKelas($this->req));
        $this->load->view("keuangan/pembayaran/riwayat", $data);
    }
    public function pembayaran_konfirmasi() {
        $this->foglobal->HakAkses("3.5");
        $this->req["filter"]["status"] = 1;
        $data['keuangan'] = 'active';
        $data['pembayaran'] = 'active';
        $data['konfirmasibayar'] = 'active';
        $data['dropdownkelas'] = json_decode($this->kelas->HtmlDropdownKelas($this->req));
        $this->load->view("keuangan/konfirmasi/index", $data);
    }

    public function tarif() {
        $this->foglobal->HakAkses("3.6");
        $this->req["filter"]["status"] = 1;
        $data['keuangan'] = 'active';
        $data['tarif'] = 'active';
        $data['dropdownkategori'] = json_decode($this->kategori_tagihan->HtmlDropdownKategori($this->req));
        $this->load->view("keuangan/tarif/index", $data);
    }

    public function tarif_khusus() {
        $this->foglobal->HakAkses("3.7");
        $this->req["filter"]["status"] = 1;
        $data['keuangan'] = 'active';
        $data['tarif_khusus'] = 'active';
        $data['dropdownkelas'] = json_decode($this->kelas->HtmlDropdownKelas($this->req));
        $data['dropdownsiswa'] = json_decode($this->siswa->HtmlDropdownSiswa($this->req));
        $data['dropdownkategori'] = json_decode($this->kategori_tagihan->HtmlDropdownKategori($this->req));
        $this->load->view("keuangan/tarif_khusus/index", $data);
    }

    public function tarif_khusus_tambah() {
        $this->foglobal->HakAkses("3.7");
        $this->load->view("keuangan/tarif_khusus/tambah", array('keuangan' => 'active', 'tarif_khusus' => 'active'));
    }

    public function kategori_tagihan() {
        $this->foglobal->HakAkses("3.8");
        $this->load->view("keuangan/kategori_tagihan/index", array('keuangan' => 'active', 'kategori_tagihan' => 'active'));
    }

    public function cetak_bukti() {
        $this->foglobal->HakAkses("3.4");
        if (!empty($this->input->get('id'))) {
            $this->req["filter"]["no_pembayaran"] = $this->input->get('id');
            $data['list'] = $this->pembayaran->GetPembayaran($this->req);
            
            if($data['list']->IsError) {
                echo "No Pembayaran tidak valid";
                return;
            }
            if(empty($data['list']->Data)) {
               echo "Tidak ada data pembayaran";
               return;
            }

            $data['detail'] = $data['list']->Data[0];
            $data['no_bayar'] = $this->input->get('id');
            $data['nis'] = $data['detail']->nis;
            $data['nama'] = $data['detail']->siswa_nama;
            $data['kelas'] = $data['detail']->kelas_nama;
            $data['tgl_bayar'] = date_indo("d M Y", strtotime($data['detail']->tgl_bayar));
            $data['cara_bayar'] = $data['detail']->cara_bayar;
            $data['pegawai'] = $data['detail']->pegawai_nama;
            $data['uraian'] = $data['detail']->uraian;

            $this->load->view("keuangan/pembayaran/print", $data);
        }
    }
}

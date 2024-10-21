<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->foglobal->CheckSessionLogin();
        $this->load->model("master-data/kelas");
    }

    public function index() {
        $this->foglobal->HakAkses("8.1");
        $this->req["filter"]["status"] = 1;
        $data['master'] = 'active';
        $data['siswa'] = 'active';
        $data['dropdownkelas'] = json_decode($this->kelas->HtmlDropdownKelas($this->req));
        $this->load->view("master-data/siswa/index",$data);
    }

    public function tambah() {
        $this->foglobal->HakAkses("8.1");
        $this->req["filter"]["status"] = 1;
        $data['master'] = 'active';
        $data['siswa'] = 'active';
        $data['dropdownkelas'] = json_decode($this->kelas->HtmlDropdownKelas($this->req));
        $this->load->view("master-data/siswa/tambah", $data);
    }

    public function edit() {
        $this->foglobal->HakAkses("8.1");
        $this->req["filter"]["status"] = 1;
        $data['master'] = 'active';
        $data['siswa'] = 'active';
        $data['dropdownkelas'] = json_decode($this->kelas->HtmlDropdownKelas($this->req));
        $this->load->view("master-data/siswa/edit", $data);
    }

    public function detail() {
        $this->foglobal->HakAkses("8.1");
        $this->load->view("master-data/siswa/detail", array('master' => 'active', 'siswa' => 'active'));
    }

    public function import() {
        $this->foglobal->HakAkses("8.1");
        $this->load->view("master-data/siswa/import", array('master' => 'active', 'siswa' => 'active'));
    }

    public function cetak() {
        $this->foglobal->HakAkses("8.1");
        $this->load->library("pdf");
        $this->load->model("master-data/siswa_cetak");

        $Params = ["Sort" => "id_kelas asc, nama asc"];
        if(empty($this->input->get("nis")) and empty($this->input->get("id_kelas"))) {
            echo "<b>Kesalahan : </b> Silahkan masukkan Nis atau ID Kelas terlebih dahulu";
            return;
        }

        if(!empty($this->input->get("nis"))) {
            $Params["nis"] = $this->input->get("nis");
        }
        if(!empty($this->input->get("id_kelas"))) {
            $Params["id_kelas"] = $this->input->get("id_kelas");
        }
        $duplicate = $this->input->get("duplicate");
        if(empty($duplicate)) {
            $duplicate = 1;
        }

        //Load View
        $pdf = new Pdf("P", "mm", "A4", true, "UTF-8", false);
        $pdf->SetTitle("Cetak Password | ".$this->config->item("app_title"));
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->SetHeaderMargin(0);
        $pdf->SetTopMargin(0);
        $pdf->setFooterMargin(0);
        $pdf->SetAutoPageBreak(TRUE, 0);
        $pdf->SetMargins(-2, 0, 0, true);
        $pdf->SetAuthor("EzySchool");
        $pdf->SetDisplayMode("real", "default");
        $pdf->setListIndentWidth(5);

        $pdf->AddPage();
        $html  = "";

        $result = $this->siswa_cetak->GetDatasiswa($Params);
        if($result["IsError"]) {
            echo "<b>Kesalahan : </b> ".$result->ErrMessage;
            return;
        }
        if(empty($result["Data"])) {
            echo "<b>Kesalahan : </b> Tidak ada Data Siswa. Mohon masukkan Data Siswa";
            return;
        }
        $paging = $result["Paging"];  

        if($duplicate > 1) {
            $DumpData = $result["Data"];
            for($i = 1; $i < $duplicate; $i++) {
                $DumpData = array_merge($result["Data"], $DumpData);
            }
        } else {
            $DumpData = $result["Data"];
        }

        $baris = 1; $halaman = 1;
        $total_data    = count($DumpData);
        $total_bagi    = floor($total_data/8); 
        $total_halaman = ceil($total_data/8);
        $id_sekolah    = $this->session->userdata("db");

        foreach ($DumpData as $index => $item) {
            $page_break = "";
            if($total_data > 8) {
                if(($index == ($baris - 1) and $halaman < $total_bagi) or $total_halaman != $halaman) {
                    $page_break = "page-break-after:always;";
                }
            }
            if($baris == 1 or ($baris%8 == 0)) {
                if($baris != 1 and ($index + 1) == $baris) {
                    goto NextStat;
                }
                $html .= '<table style="width: 100%;'.$page_break.'" border="0" cellspacing="0" cellpadding="0">';
            }
            if($baris != 1 and ($baris%8 == 1)) {
                $html .= '<table style="width: 100%;'.$page_break.'" border="0" cellspacing="0" cellpadding="0">';
            }

            NextStat:
            if($baris == 1 or ($baris%8 == 1)) {
                $html .= "<tr>";
            }
            
            $html .= '
                <td style="width: 50%;font-family:arial, sans-serif;border-right: 1px solid lightgrey;border-bottom: 1px solid lightgrey">
                    <br>
                    <br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <table cellpadding="0" cellspacing="0" style="font-size: 11.5px;">
                        <tr>
                            <td style="width: 25%;"><b>ID Sekolah</b></td>
                            <td style="width: 65%;">: '.$id_sekolah.'</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;"><b>No. Induk</b></td>
                            <td style="width: 65%;">: '.$item["nis"].'</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;"><b>Nama</b></td>
                            <td style="width: 65%;">: '.$item["nama"].'</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;"><b>Kelas</b></td>
                            <td style="width: 65%;">: '.$item["kelas_nama"].'</td>
                        </tr>
                        <tr>
                            <td style="width: 25%;"><b>Password</b></td>
                            <td style="width: 65%;">: '.$this->foglobal->GeneratePassSiswa($item["nis"]).'</td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                <ol style="width: 100%;font-size:11px;">
                                    <li>Install EzyPay dari Google Play atau App Store</li>
                                    <li>Daftar & verifikasi sms di EzyPay</li>
                                    <li>Install EzySchool dari Google Play atau App Store</li>
                                    <li>Login di EzySchool menggunakan akun EzyPay</li>
                                    <li>Tambah akun EzySchool</li>
                                    <li>Jika ada kesulitan, hubungi CS: 081232-081233</li>
                                </ol>
                            </td>
                        </tr>
                    </table>
                    <br/>
                    <div style="text-align: center;">
                        <img src="'.FCPATH.'/assets/img/logo-pesantren-it-ezyschool.png" width="170px">
                    </div>
                </td>
            ';

            if($baris%2 == 0 or ($total_data - $index) == 1) {
                $html .= "</tr>";
                if(($index + 1) < $total_data and ($index%2 == 1)) {
                    if($baris%8 == 0) {
                        goto NextTable;
                    }
                    $html .= "<tr>";
                }
            }

            NextTable:
            if($baris%8 == 0 or ($index + 1) == $total_data) {
                $html .= "</table>";
            }

            if($baris != 1 and $baris%8 == 0) $halaman++;
            $baris++;
        }
        
        $pdf->writeHtml($html, true, 0, true, 0);
        $pdf->Output("Cetak Siswa.pdf", "I");
    }
}
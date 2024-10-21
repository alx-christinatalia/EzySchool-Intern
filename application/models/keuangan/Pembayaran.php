<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Model {

    private $user, $db;

    public function __construct() {
        parent::__construct();
        $this->user = $this->session->userdata("user");
        $this->db = $this->session->userdata("db");
        $this->load->model('Foglobal');
    }

    public function GetPembayaran($param) {
        $args = ["user_key" => $this->user->user_key, "db" => $this->db];

        if (!empty($param["filter"]["kywd"])) {
            $args["search"] = $param["filter"]["kywd"];
        }
        if (!empty($param["filter"]["id_tagihan"])) {
            $args["id_tagihan"] = $param["filter"]["id_tagihan"];
        }
        if (!empty($param["filter"]["no_pembayaran"])) {
            $args["no_pembayaran"] = $param["filter"]["no_pembayaran"];
        }
        if (!empty($param["filter"]["no_ref"])) {
            $args["no_ref"] = $param["filter"]["no_ref"];
        }
        if (!empty($param["filter"]["cara_bayar"])) {
            $args["cara_bayar"] = $param["filter"]["cara_bayar"];
        }
        if (!empty($param["filter"]["nohp"])) {
            $args["jns_tagihan"] = $param["filter"]["nohp"];
        }
        if (!empty($param["filter"]["nis"])) {
            $args["nis"] = $param["filter"]["nis"];
        }

        //Default
        if (!empty($param["Sort"]))
            $args["Sort"] = $param["Sort"]; //Sorting
        if (!empty($param["Limit"]))
            $args["Limit"] = $param["Limit"]; //Limit
        if (!empty($param["Page"]))
            $args["Page"] = $param["Page"]; //Limit

        $this->api->set("tagihan/pembayaran/list", $args);
        return $this->api->exec();
    }

    public function HtmlPembayaran($param) {
        $rHtml = "";

        $query = $this->GetPembayaran($param);
        $total_tagihan = isset($param['total-tagihan']) ? $param['total-tagihan'] : 0;
        if ($query->IsError == false) {

            $data = $query->Data;
            if (!empty($query->Data)) {
                foreach ($query->Data as $item) {
                    $total_tagihan = $total_tagihan - $item->jml_bayar;
                    $tgl_bayar = ($item->tgl_bayar != "0000-00-00 00:00:00") ? date_indo("d M Y", strtotime($item->tgl_bayar)) : "-";
                    $rHtml .= "
                        <tr>
                            <td> <a href='" . base_url('tagihan/detail.html?id=') . $item->id_tagihan . "'>$item->id_tagihan </td>
                            <td><a href='".base_url("siswa/detail.html?nis=".$item->nis)."'>".$item->siswa_nama."</a></td>
                            <td>".$item->cara_bayar."</td>
                            <td>".$tgl_bayar."</td>
                            <td class='text-right'>".$this->foglobal->formatAngka($item->jml_bayar)." </td>
                            <td class='text-center'><a onclick=\"window.open('" . base_url('pembayaran/cetak.html?id=') . $item->no_pembayaran . ", '', 'width=800,height=400');\" class='btn btn-sm blue-soft fa fa-print' role='button'></a></td>
                        </tr>
                        ";
                }
            } else {
                $rHtml = "<tr><td colspan='6' class='text-center'><span class='label label-warning'>Tidak ada data</span></td></tr>";
            }
        } else {
            $rHtml = "<tr><td colspan='6' class='text-center'><span class='label label-warning'>" . $this->user->user_key . "</span></td></tr>";
        }

        $Paging = (!empty($query->Paging)) ? $query->Paging : "";
        $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
        return json_encode($ReturnData);
    }

    public function HtmlRiwayatPembayaran($param) {
        $rHtml = "";

        $query = $this->GetPembayaran($param);
        $total_tagihan = isset($param['total-tagihan']) ? $param['total-tagihan'] : 0;
        if ($query->IsError == false) {
            if (!empty($query->Data)) {
                foreach ($query->Data as $item) {
                    $total_tagihan = $total_tagihan - $item->jml_bayar;
                    $tgl_bayar = ($item->tgl_bayar != "0000-00-00 00:00:00") ? date_indo("d M Y", strtotime($item->tgl_bayar)) : "-";
                    $rHtml .= "
                        <tr>
                            <td><a href='". base_url('pembayaran/detail?id=').$item->no_pembayaran."'>".$item->no_pembayaran."</a></td>
                            <td> $item->no_ref </td>
                            <td> $tgl_bayar </td>
                            <td> $item->cara_bayar </td>
                            <td> Rp. " . $this->foglobal->formatAngka($item->jml_bayar) . " </td>
                            <td> Rp. " . $this->foglobal->formatAngka($total_tagihan) . " </td>
                        </tr>
                        ";
                }
            } else {
                $rHtml = "<tr><td colspan='7' class='text-center'><span class='label label-warning'>Tidak ada data</span></td></tr>";
            }
        } else {
            $rHtml = "<tr><td colspan='7' class='text-center'><span class='label label-warning'>" . $query->ErrMessage . "</span></td></tr>";
        }

        $Paging = (!empty($query->Paging)) ? $query->Paging : "";
        $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
        return json_encode($ReturnData);
    }

    public function GetPembayaranLog($param) {
        $args = ["user_key" => $this->user->user_key, "db" => $this->db];

        if (!empty($param["filter"]["kywd"])) {
            $args["search"] = $param["filter"]["kywd"];
        }
        if (!empty($param["filter"]["no_pembayaran"])) {
            $args["no_pembayaran"] = $param["filter"]["no_pembayaran"];
        }
        if (!empty($param["filter"]["tgl"])) {
            $args["tgl"] = date_indo("Y-m-d", $param["filter"]["tgl"]);
        }
        if (!empty($param["filter"]["bulan"])) {
            $args["bulan"] = $param["filter"]["bulan"];
        }
        if (!empty($param["filter"]["tahun"])) {
            $args["tahun"] = $param["filter"]["tahun"];
        }
        if (!empty($param["filter"]["kelas"])) {
            $args["id_kelas"] = $param["filter"]["kelas"];
        }
        if (!empty($param["filter"]["cara_bayar"])) {
            $args["cara_bayar"] = $param["filter"]["cara_bayar"];
        }

        //Default
        if (!empty($param["Sort"]))$args["Sort"] = $param["Sort"]; //Sorting
        else $args["Sort"] = "tgl_bayar desc";

        if (!empty($param["Limit"])) $args["Limit"] = $param["Limit"]; //Limit
        else $args["Limit"] = 8;

        if (!empty($param["Page"])) $args["Page"] = $param["Page"]; //Limit

        $this->api->set("tagihan/pembayaran/log", $args);
        return $this->api->exec();
    }

    public function HtmlLogPembayaran($param) {
        $rHtml = "";

        $query = $this->GetPembayaranLog($param);
        if ($query->IsError == false) {
            if (!empty($query->Data)) { 
                foreach ($query->Data as $item) {
                    $tgl_bayar = ($item->tgl_bayar != "0000-00-00 00:00:00") ? date_indo("d M Y", strtotime($item->tgl_bayar)) : "-";
                    $rHtml .= "
                        <tr>
                            <td class='text-center'>
                                <a role='button' onclick=\"window.open('".base_url('pembayaran/cetak.html?id=').$item->no_pembayaran ."', '', 'width=800,height=400');\" class='btn btn-primary' target='_blank' role='button'>
                                    <i class='fa fa-print'></i>
                                </a>
                            </td>
                            <td><a href='". base_url('pembayaran/detail.html?id=').$item->no_pembayaran."'>".$item->no_pembayaran."</a></td>
                            <td><span>".$item->kelas_nama."</span> </td>
                            <td><a href='".base_url("siswa/detail.html?nis=".$item->nis)."'>".$item->siswa_nama."</a></td>
                            <td class='text-right'>".$this->foglobal->formatAngka($item->jml_bayar)."</td>
                            <td>".$item->pegawai_nama."</td>
                            <td>".$item->cara_bayar."</td>
                            <td>".$tgl_bayar."</td>
                        </tr>
                        ";
                }
            } else {
                $rHtml = "<tr><td colspan='8' class='text-center'><span class='label label-warning'>Tidak ada data</span></td></tr>";
            }
        } else {
            $rHtml = "<tr><td colspan='8' class='text-center'><span class='label label-warning'>" . $query->ErrMessage . "</span></td></tr>";
        }

        $Paging = (!empty($query->Paging)) ? $query->Paging : "";
        $ReturnData = ["lsdt" => $rHtml, "paging" => $Paging];
        return json_encode($ReturnData);
    }

    public function InsertBayarRepeat($param) {
        $args['user_key'] = $this->user->user_key;
        $args["db"] = $this->db;
        $args["repeater"] = $param;

        $this->api->set("tagihan/pembayaran/repeater/add", $args);
        $query = $this->api->exec();

        return json_encode($query);
    }

    public function InsertBayar($args) {
        $args['user_key'] = $this->user->user_key;
        $args["db"] = $this->db;

        $this->api->set("tagihan/pembayaran/add", $args);
        $query = $this->api->exec();

        if ($query->IsError == true) {
            $dataError = preg_match_all("!Parameter[\s+]\'([\w]+)!", $query->ErrMessage, $matches);
            if ($dataError) {
                switch ($matches[1][0]) {
                    case 'user_key':
                        return $this->foglobal->MakeJsonError("User Key tidak valid.");
                        break;
                    case 'db':
                        return $this->foglobal->MakeJsonError("Sekolah tidak valid.");
                        break;
                    case 'nis':
                        return $this->foglobal->MakeJsonError("NIS tidak valid.");
                        break;
                    case 'id_tagihan':
                        return $this->foglobal->MakeJsonError("ID Tagihan tidak valid.");
                        break;
                    case 'jml_bayar':
                        return $this->foglobal->MakeJsonError("Jumlah Bayar tidak valid.");
                        break;
                }
            }
        }
        return json_encode($query);
    }

    public function RandomID($args) {
        $args['user_key'] = $this->user->user_key;
        $args["db"] = $this->db;
        $this->api->set("tagihan/pembayaran/check/nomor", $args);
        $query = $this->api->exec();
        return json_encode($query);
    }

}
